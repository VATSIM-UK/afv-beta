<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Discord_Account;
use Wohali\OAuth2\Client\Provider\Discord;
use Wohali\OAuth2\Client\Provider\Exception\DiscordIdentityProviderException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class DiscordOAuth2Controller
 * @package App\Http\Controllers\login
 */
class DiscordOAuth2Controller extends Controller
{

    /**
     * @var Discord
     */
    private $provider;
	
    private $scopes = ['identify', 'guilds'];

    /**
     * DiscordOAuth2Controller constructor.
     */
    public function __construct()
    {
        $this->provider = new Discord([
            'clientId' => config('discord.clientId'),
            'clientSecret' => config('discord.clientSecret'),
            'redirectUri' => config('discord.redirectUri')
        ]);
    }

    /**
     * Redirect user to Discord Authentication for login
     */
    public function login()
    {
        $options = [
            'scope' => $this->scopes
        ];
        $authUrl = $this->provider->getAuthorizationUrl($options);
        //$authUrl = $this->provider->getAuthorizationUrl();
        session()->put('oauth2state', $this->provider->getState());
        session()->save();
        header('Location: ' . $authUrl);
        die();
    }


    /**
     * Validate the login
     *
     * @param Request $get
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function validateLogin(Request $get)
    {
        if (empty($get->input('code'))){
            return redirect()->route('discord.login');
        }

        
        if (empty($get->input('state')) || ($get->input('state') !== session('oauth2state'))){
            session()->forget('oauth2state');
            return redirect()->route('page')->withError('Error: State mismatch');
        }
        

        try{
            $token = $this->provider->getAccessToken('authorization_code', ['code' => $get->input('code')]);
        } catch (DiscordIdentityProviderException $e){
            return redirect()->route('discord.login');
        }


        try {
            $user = $this->provider->getResourceOwner($token);
        } catch (Exception $e) {
            return redirect()->route('landing')->withError('Uh, oh... we\'re having trouble finding your Discord Account');
        }

        if ( // If the user hasn't granted us the permissions we need, we ignore the token and return an error.
            !strstr($token->getValues()['scope'], "identify")||
            !strstr($token->getValues()['scope'], "guilds")
        ){
            return redirect()->route('landing')->withError('Oops... something went wrong. Please try again');
        }

        Discord_Account::where('id', $user->getId())->delete();//Delete any other records using the same Discord_ID (one CID == one Discord_ID)
        Discord_Account::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'id' => $discord_id = $user->getId(),
            ]
        );
        
        return redirect()->route('landing')->withSuccess('Discord account successfully linked!');
    }
    
}
