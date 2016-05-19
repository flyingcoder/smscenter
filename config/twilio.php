<?php

return [

    'twilio' => [

        'default' => 'twilio',

        'connections' => [

            'twilio' => [

                /*
                |--------------------------------------------------------------------------
                | SID
                |--------------------------------------------------------------------------
                |
                | Your Twilio Account SID #
                |
                */

                'sid' => 'AC381755cd7bbfde1590aa2d04d833773a',//env('TWILIO_SID'),

                /*
                |--------------------------------------------------------------------------
                | Access Token
                |--------------------------------------------------------------------------
                |
                | Access token that can be found in your Twilio dashboard
                |
                */

                'token' => '1b9f49ed2f33d6d697d8c5e02b030cc1',//env('TWILIO_TOKEN'),

                /*
                |--------------------------------------------------------------------------
                | From Number
                |--------------------------------------------------------------------------
                |
                | The Phone number registered with Twilio that your SMS & Calls will come from
                |
                */

                'from' => "+19852950395",

                /*
                |--------------------------------------------------------------------------
                | Verify Twilio's SSL Certificates
                |--------------------------------------------------------------------------
                |
                | Allows the client to bypass verifiying Twilio's SSL certificates.
                | It is STRONGLY advised to leave this set to true for production environments.
                |
                */

                'ssl_verify' => false,

            ],
        ],
    ],
];
