<?php

return [

    /*
     * DO NOT PUBLISH THE KEY AND SECRET TO CODE REPOSITORIES
     * FOR SECURITY.
     */

    /*
     * The client ID for your app (provided by Discord)
     */
    'clientId' => env('DISCORD_CLIENT_ID', '{discord-client-id}'),

    /*
     * The client Key for your app (provided by Discord)
     */
    'clientSecret' => env('DISCORD_CLIENT_SECRET', '{discord-client-secret}'),

    /*
     * The URL of your server to which the user should be redirected
     */
    'redirectUri' => env('DISCORD_REDIRECT_URI', '{your-server-uri-to-this-script-here}')

];
