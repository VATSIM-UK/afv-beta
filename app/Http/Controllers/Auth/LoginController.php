<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Vatsim\OAuth\SSO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * This controller handles authenticating users for the application and
 * redirecting them to your home screen. The controller uses a trait
 * to conveniently provide its functionality to your applications.
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $sso;

    public $redirectTo = '/testing';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->sso = new SSO(
            config('vatsim-sso.base'),
            config('vatsim-sso.key'),
            config('vatsim-sso.secret'),
            config('vatsim-sso.method'),
            config('vatsim-sso.cert')
        );
    }

    public function login(Request $request)
    {
        return $this->sso->login(route('auth.login.verify'), function ($key, $secret, $url) use ($request) {
            $request->session()->put('vatsimauth', compact('key', 'secret'));

            return redirect($url);
        }, function ($error) {
            throw new Exception('Could not authenticate: '.$error['message']);
        });
    }

    public function verifyLogin(Request $request)
    {
        $session = $request->session()->get('vatsimauth');
        $intended = route('landing');

        return $this->sso->validate(
            $session['key'],
            $session['secret'],
            Input::get('oauth_verifier'),
            function ($user) use ($request, $intended) {
                $request->session()->forget('vatsimauth');
                $this->completeLogin($user);

                return redirect($intended);
            },
            function ($error) use ($request) {
                throw $error;
            }
        );
    }

    public function completeLogin($user)
    {
        $account = User::firstOrNew(['id' => $user->id]);

        $account->name_first = utf8_decode($user->name_first);
        $account->name_last = utf8_decode($user->name_last);
        $account->rating_atc = $user->rating->short;
        $account->email = $user->email;
        $account->region = $user->region->code;
        $account->division = $user->division->code;
        $account->subdivision = $user->subdivision->code;
        $account->joined_at = $user->reg_date;
        $account->last_login = Carbon::now();
        $account->last_login_ip = \Request::ip();
        $account->save();

        return auth()->login($account);
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('landing'));
    }
}
