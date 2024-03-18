<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UDOM|Inventory|Management|System</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fontAwesome/css/all.css') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        ::after,
        ::before {
            --tw-content: ''
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal
        }

        body {
            margin: 0;
            line-height: inherit
        }

        .udom-logo {
            border-radius: 50%;
            width: 200px;
            object-fit: contain;

        }

        .udom-text {
            position: absolute;
            top: 70%;
            left: 38%;
        }


        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b,
        strong {
            font-weight: bolder
        }

        code,
        kbd,
        pre,
        samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1em
        }





        .ml-4 {
            margin-left: 1rem
        }

        .loginLink,
        .registerLink {
            color: white;
            text-decoration: none;
            font-weight: bolder;
        }


        .loginLink {
            position: relative;
            left: 3%;
        }

        .registerLink {
            position: relative;
            left: 5%;
        }

        .min-h-screen {
            min-height: 100vh
        }





        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }




        .p-6 {
            padding: 1.5rem
        }


        .text-center {
            text-align: center
        }




        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem
        }

        .font-semibold {
            font-weight: 600
        }

        .leading-relaxed {
            line-height: 1.625
        }

        .navbar {
            background-color: black;
            width: 100%;


        }

        @media (max-width:576px) {
            .udom-logo {
                position: relative;
                top: 50%;
                left: 50%;
            }

            .udom-text {
                position: relative;
                top: 50%;
                left: 50%;
                font-size: 20px;
                text-align: center;
            }

            .system-info {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-100%, -50%);
                display: block;
            }

            .loginLink {
                position: relative;
                left: 1%;
            }


        }

        @media (min-width: 640px) {


            .sm\:fixed {
                position: fixed
            }

            .sm\:top-0 {
                top: 0px
            }

            .sm\:right-0 {
                right: 0px
            }

            .sm\:ml-0 {
                margin-left: 0px
            }

            .sm\:flex {
                display: flex
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-center {
                justify-content: center
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }
    </style>


</head>

<body class="antialiased">


    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 navbar">

                <div class="nav-links">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="loginLink"><i class="fa fa-sign-in"
                                style="position: relative;right:5px;"></i> Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="registerLink"> <i class=" fas fa-user-plus"
                                    style="position: relative;right:5px;"></i> Register</a>
                        @endif
                    @endauth

                </div>

            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8 system-info">
            <img src="{{ asset('vendors/images/udom.png') }}" alt="" srcset="" class="udom-logo">

            <div class="udom-text">UDOM INVENTORY MANAGEMENT SYSTEM</div>
        </div>

    </div>
</body>

</html>
