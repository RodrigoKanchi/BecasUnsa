<?php

declare(strict_types=1);

return [
    /*
     * ------------------------------------------------------------------------
     * Default Firebase project
     * ------------------------------------------------------------------------
     */

    'default' => env('FIREBASE_PROJECT', 'app'),

    /*
     * ------------------------------------------------------------------------
     * Firebase project configurations
     * ------------------------------------------------------------------------
     */

    'projects' => [
        'app' => [

            /*
             * ------------------------------------------------------------------------
             * Credentials / Service Account
             * ------------------------------------------------------------------------
             *
             * In order to access a Firebase project and its related services using a
             * server SDK, requests must be authenticated. For server-to-server
             * communication this is done with a Service Account.
             *
             * If you don't already have generated a Service Account, you can do so by
             * following the instructions from the official documentation pages at
             *
             * https://firebase.google.com/docs/admin/setup#initialize_the_sdk
             *
             * Once you have downloaded the Service Account JSON file, you can use it
             * to configure the package.
             *
             * If you don't provide credentials, the Firebase Admin SDK will try to
             * auto-discover them
             *
             * - by checking the environment variable FIREBASE_CREDENTIALS
             * - by checking the environment variable GOOGLE_APPLICATION_CREDENTIALS
             * - by trying to find Google's well known file
             * - by checking if the application is running on GCE/GCP
             *
             * If no credentials file can be found, an exception will be thrown the
             * first time you try to access a component of the Firebase Admin SDK.
             *
             */

            'credentials' => [
                "type" => "service_account",
                "project_id" => "becasunsa-c774c",
                "private_key_id" => "419e6a3b865c4c8d159f3299f3a0b3ce45aaa62d",
                "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDffC4GhmDCL7+o\nFJ+H5+OM5oBq+yivblQHVlcJpTajfTmUI/mtfYA9In0bZj9tQxQwJwNUQomdmRvC\n93JkaQyOY5O22Tp8xSlxhZJFRJ/KaVBZCLUcVRI3HmT5Q8v+RPBcfg7Fm4nf0ItP\n6abnzh3i6SA5BeGs2DyiQLNU4IggVMqmt68qoEItBKHdMSi50KN2M+ooCTPlArTG\nUDJIv4657UtMJi2SBU5unKdpgEF8onksU6iBLrhpqmtyBQV3hWZqotNWIXuv02ql\nPYEq8xPGeWa2I4sBH5SV9ijE1MzmT5dP1bO5WTHwJL/lPiMaDf4dqLtaFGoyKKvM\nWYp1YgYRAgMBAAECggEARUkcg81ZZhqjkpqCMwJDW8WCfqhLHshXqMatyUG9RMZn\n+XOFzrGf9lQg8UOr2lX3hk4yDAds3r0/DBznDBY9XE+m1gNWzKPbi2RbyrnRyFEK\nJfA7JgOB2DDGITlRnw0Eb8htD/p+rjLbXfUUV71hKp4X7VXTd2C6u5rPfjr2OP88\nBrwoJakQDYjd4Kmyw37DoDnMwN7S96sEDkMoF7ipA1tfNJnoD+1bsyt7NWiRdABF\nO57biZTltEaybbxO1kIxzWct7hKHhgH+fy8bx2Wv1iLCaaxFCOUM/UU/6Mo1bGNo\nM/VXrUuXrxZ8h86n0rWne+mWPEJtsVLKbgSFxNlZGQKBgQD/2fHqEBsePlwOEEkT\nDB95Fb1U8abmuA8ngGSe5W5/7miz0n1G4Kd2zeV/By815Mlzdyhs0D8ph38Mpp2T\noCb86NRN7+M3/YX2y9eZbDlBYmCC7zlAxXkK6bv7BtaLI4aSPb96vUl8JgpWYvJf\nwhBce0insOneG5AxEvvCSyNocwKBgQDfnWuySDDz+GycP4S7H0vs+pB5tiZhJwed\nLtj5Yj+vqtRdni9OVvvfOzkON0dohWfCzgobTfKD9RbMe1YmlsUZQJQXnYZW8Sff\nvOcQnKnBG0N+snHafAij5rY+zTZMKSJracLRQZIA5mzRmoxHK16LqnnalhT6KX0x\nDmbuk6OqawKBgCyxLYjtd085JWtvfNRO8dB886266KS00jDcRLdc7Ih8ZN3Ejw2q\ngJZIMSaXYq/PX0FEN1OKrP3cJV1YXX5EI4taQHu8w7wsFRKfWPH77aR2QtWcZCvk\nUtiNK8EV2LRFaGRzVNdj6Uo+et/MOPpxM9pzzqU8Sh36Qp3P6xptdanxAoGAHfUt\nFHlvdX/2rQgldBxBQ8Jd0LCCe8mKz5gTIXX0Kkisos4qcEhe/g0lG650NqCIwiRw\nXjAXKW6QW1y6sfjI9xUbwf4snUE5olPgcO1MIL7SUAsADdFIJw0lpUxA1fs8zT8i\nBn7OXKiCM6KM4IwC4ps4L/yjWtBsIUJYr+W/q3kCgYEA8/nlDB8vj5ZpPP2V/LGQ\n2gdaosp5Us6MWpQXK8cS8hYAGTUes4FoC9fAeFJeAq7U5p2pnXjZYR1I0rDzWm/N\nSfVyjE+9CQKxcLdR2bP9wVWh53ZnH+HwLjefU2u9hBdh9SWAZNpr0zxlph2pgzvW\nV3SNizNb/BJHnaHzyS9u3a8=\n-----END PRIVATE KEY-----\n",
                "client_email" => "firebase-adminsdk-fbsvc@becasunsa-c774c.iam.gserviceaccount.com",
                "client_id" => "111636530861105967908",
                "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
                "token_uri" => "https://oauth2.googleapis.com/token",
                "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
                "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-fbsvc%40becasunsa-c774c.iam.gserviceaccount.com",
                "universe_domain" => "googleapis.com"
            ]
            ,

            /*
             * ------------------------------------------------------------------------
             * Firebase Auth Component
             * ------------------------------------------------------------------------
             */

            'auth' => [
                'tenant_id' => env('FIREBASE_AUTH_TENANT_ID'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firestore Component
             * ------------------------------------------------------------------------
             */

            'firestore' => [

                /*
                 * If you want to access a Firestore database other than the default database,
                 * enter its name here.
                 *
                 * By default, the Firestore client will connect to the `(default)` database.
                 *
                 * https://firebase.google.com/docs/firestore/manage-databases
                 */

                // 'database' => env('FIREBASE_FIRESTORE_DATABASE'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firebase Realtime Database
             * ------------------------------------------------------------------------
             */

            'database' => [

                /*
                 * In most of the cases the project ID defined in the credentials file
                 * determines the URL of your project's Realtime Database. If the
                 * connection to the Realtime Database fails, you can override
                 * its URL with the value you see at
                 *
                 * https://console.firebase.google.com/u/1/project/_/database
                 *
                 * Please make sure that you use a full URL like, for example,
                 * https://my-project-id.firebaseio.com
                 */

                'url' => env('FIREBASE_DATABASE_URL'),

                /*
                 * As a best practice, a service should have access to only the resources it needs.
                 * To get more fine-grained control over the resources a Firebase app instance can access,
                 * use a unique identifier in your Security Rules to represent your service.
                 *
                 * https://firebase.google.com/docs/database/admin/start#authenticate-with-limited-privileges
                 */

                // 'auth_variable_override' => [
                //     'uid' => 'my-service-worker'
                // ],

            ],

            /*
             * ------------------------------------------------------------------------
             * Firebase Cloud Storage
             * ------------------------------------------------------------------------
             */

            'storage' => [

                /*
                 * Your project's default storage bucket usually uses the project ID
                 * as its name. If you have multiple storage buckets and want to
                 * use another one as the default for your application, you can
                 * override it here.
                 */

                'default_bucket' => env('FIREBASE_STORAGE_DEFAULT_BUCKET'),

            ],

            /*
             * ------------------------------------------------------------------------
             * Caching
             * ------------------------------------------------------------------------
             *
             * The Firebase Admin SDK can cache some data returned from the Firebase
             * API, for example Google's public keys used to verify ID tokens.
             *
             */

            'cache_store' => env('FIREBASE_CACHE_STORE', 'file'),

            /*
             * ------------------------------------------------------------------------
             * Logging
             * ------------------------------------------------------------------------
             *
             * Enable logging of HTTP interaction for insights and/or debugging.
             *
             * Log channels are defined in config/logging.php
             *
             * Successful HTTP messages are logged with the log level 'info'.
             * Failed HTTP messages are logged with the log level 'notice'.
             *
             * Note: Using the same channel for simple and debug logs will result in
             * two entries per request and response.
             */

            'logging' => [
                'http_log_channel' => env('FIREBASE_HTTP_LOG_CHANNEL'),
                'http_debug_log_channel' => env('FIREBASE_HTTP_DEBUG_LOG_CHANNEL'),
            ],

            /*
             * ------------------------------------------------------------------------
             * HTTP Client Options
             * ------------------------------------------------------------------------
             *
             * Behavior of the HTTP Client performing the API requests
             */

            'http_client_options' => [

                /*
                 * Use a proxy that all API requests should be passed through.
                 * (default: none)
                 */

                'proxy' => env('FIREBASE_HTTP_CLIENT_PROXY'),

                /*
                 * Set the maximum amount of seconds (float) that can pass before
                 * a request is considered timed out
                 *
                 * The default time out can be reviewed at
                 * https://github.com/beste/firebase-php/blob/6.x/src/Firebase/Http/HttpClientOptions.php
                 */

                'timeout' => env('FIREBASE_HTTP_CLIENT_TIMEOUT'),

                'guzzle_middlewares' => [
                    // MyInvokableMiddleware::class,
                    // [MyMiddleware::class, 'static_method'],
                ],
            ],
        ],
    ],
];
