<div>
    <!DOCTYPE html>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Basic Page Info -->
        <meta charset="utf-8" />
        <title> UDOM | Inventory | Management | System </title>

        <!-- Site favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png" />

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <!-- Google Font -->

        <link rel="stylesheet" href="{{ asset('fontAwesome/css/all.css') }}">

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}" />
        <link rel="stylesheet" type="text/css"
            href="{{ asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" />
        <link rel="stylesheet" type="text/css"
            href="{{ asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}" />

        {{-- javascripts --}}
        <script src="{{ asset('javascript/chosen.jquery.min.js') }}"></script>
        <script src="{{ asset('javascript/jquery.min.js') }}"></script>
        <script src="{{ asset('javascript/jquery-ui.min.js') }}"></script>


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
            crossorigin="anonymous"></script>
        <script src="./node_modules/html5-qr-code/html5-qrcode.min.js"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "G-GBZ3SGGX85");
        </script>
        <!-- Google Tag Manager -->
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    "gtm.start": new Date().getTime(),
                    event: "gtm.js"
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
        </script>
        <!-- End Google Tag Manager -->
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="font-sans antialiased">

        {{--
        <div class="pre-loader">
            <div class="pre-loader-box">
                <div class="loader-logo">
                    <img src="{{ asset('vendors/images/udom.png') }}" alt="" />
                </div>
                <div class="loader-progress" id="progress_div">
                    <div class="bar" id="bar1"></div>
                </div>
                <div class="percent" id="percent1">0%</div>
                <div class="loading-text">Loading...</div>
            </div>
        </div> --}}


        <div class="header">
            <div class="header-left">
                <div class="menu-icon bi bi-list"></div>
                <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>


            </div>
            <div class="header-right">
                <div class="dashboard-setting user-notification">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                            <i class="dw dw-settings2"></i>
                        </a>
                    </div>
                </div>


                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="user-icon" style="width: 40px;height:">

                                <img src="{{ asset('storage/profile_images/' . $profileImage->profile_image) }}"
                                    alt="" />
                            </span>
                            <span class="user-name">{{ auth()->user()->email }}</span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                            <hr>
                            <a class="dropdown-item">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        Log Out
                                    </x-dropdown-link>
                                </form>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-sidebar">
            <div class="sidebar-title">
                <h3 class="weight-600 font-16 text-blue">
                    Layout Settings
                    <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
                </h3>
                <div class="close-sidebar" data-toggle="right-sidebar-close">
                    <i class="icon-copy ion-close-round"></i>
                </div>
            </div>
            <div class="right-sidebar-body customscroll">
                <div class="right-sidebar-body-content">
                    <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                    <div class="sidebar-btn-group pb-30 mb-10">
                        <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                        <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                    </div>

                    <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                    <div class="sidebar-btn-group pb-30 mb-10">
                        <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                        <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                    </div>

                    <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                    <div class="sidebar-radio-group pb-10 mb-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon"
                                class="custom-control-input" value="icon-style-1" checked="" />
                            <label class="custom-control-label" for="sidebaricon-1"><i
                                    class="fa fa-angle-down"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon"
                                class="custom-control-input" value="icon-style-2" />
                            <label class="custom-control-label" for="sidebaricon-2"><i
                                    class="ion-plus-round"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon"
                                class="custom-control-input" value="icon-style-3" />
                            <label class="custom-control-label" for="sidebaricon-3"><i
                                    class="fa fa-angle-double-right"></i></label>
                        </div>
                    </div>

                    <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                    <div class="sidebar-radio-group pb-30 mb-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-1" name="menu-list-icon"
                                class="custom-control-input" value="icon-list-style-1" checked="" />
                            <label class="custom-control-label" for="sidebariconlist-1"><i
                                    class="ion-minus-round"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-2" name="menu-list-icon"
                                class="custom-control-input" value="icon-list-style-2" />
                            <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                    aria-hidden="true"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-3" name="menu-list-icon"
                                class="custom-control-input" value="icon-list-style-3" />
                            <label class="custom-control-label" for="sidebariconlist-3"><i
                                    class="dw dw-check"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-4" name="menu-list-icon"
                                class="custom-control-input" value="icon-list-style-4" checked="" />
                            <label class="custom-control-label" for="sidebariconlist-4"><i
                                    class="icon-copy dw dw-next-2"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-5" name="menu-list-icon"
                                class="custom-control-input" value="icon-list-style-5" />
                            <label class="custom-control-label" for="sidebariconlist-5"><i
                                    class="dw dw-fast-forward-1"></i></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="sidebariconlist-6" name="menu-list-icon"
                                class="custom-control-input" value="icon-list-style-6" />
                            <label class="custom-control-label" for="sidebariconlist-6"><i
                                    class="dw dw-next"></i></label>
                        </div>
                    </div>

                    <div class="reset-options pt-30 text-center">
                        <button class="btn btn-danger" id="reset-settings">
                            Reset Settings
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="left-side-bar">
            <div class="brand-logo">
                <a href="{{ asset('/dashboard') }}" style="color:black;" href="javascript:;">
                    <img style="width: 55px;border-radius:50%" src="{{ asset('vendors/images/udom.png') }}"
                        alt="" srcset="">
                    <p class="text-gray-500" style="position:relative;left:10%">UIMS</p>
                </a>
                <div class="close-sidebar" data-toggle="left-sidebar-close">
                    <i class="ion-close-round"></i>
                </div>
            </div>
            <div class="menu-block customscroll">
                <div class="sidebar-menu">
                    <ul id="accordion-menu">
                        <li class="dropdown">
                            <a wire:navigate href="{{ asset('/UIMS/dashboard') }}" class="dropdown-toggle">
                                <span class="micon bi bi-house"></span><span class="mtext">Home</span>
                            </a>

                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-person"></span><span class="mtext">View profile</span>
                            </a>
                            <ul class="submenu">
                                <li><a wire:navigate href="{{ asset('/profile/' . auth()->user()->id) }}">Profile</a>
                                </li>

                            </ul>


                            <ul class="submenu">
                                <li><a wire:navigate href="{{ asset('UIMS/add-phone-number') }}">
                                        Phone
                                        number management</a>
                                </li>

                            </ul>


                        </li>



                        @if (auth()->user()->college_name == 'College of Education ( CoED )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-pencil-square"></span><span class="mtext">Asset
                                        management</span>
                                </a>



                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/add-coed-resources') }}">
                                            Add resource
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/view-coed-created-resources') }}">
                                            View created resources
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/view-coed-created-resources') }}">
                                            Resource allocation to areas
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a wire:navigate href="{{ asset('UIMS/qr-code-reader') }}">
                                            Scan Qr code
                                        </a>
                                    </li>

                                </ul>

                            </li>
                        @endif


                        @if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-pencil-square"></span><span class="mtext">Asset
                                        management</span>
                                </a>



                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/add-cive-resources') }}">
                                            Resource management
                                        </a>
                                    </li>

                                </ul>


                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/qr-code-reader') }}">
                                            Scan Qr code
                                        </a>
                                    </li>

                                </ul>

                            </li>
                        @endif
                        @if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-pencil-square"></span><span class="mtext">Asset
                                        management</span>
                                </a>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/view-chas-created-resources') }}">
                                            Track asset
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/CHAS/verification-and-approval') }}">
                                            Verification & approval
                                        </a>
                                    </li>

                                </ul>


                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-wrench"></span><span class="mtext">Maintanance
                                    </span>
                                </a>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/qr-code-reader') }}">
                                            Scan Qr code
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/maintainance/chas') }}">
                                            Maintanance status
                                        </a>
                                    </li>

                                </ul>

                            </li>
                        @endif
                        @if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-pencil-square"></span><span class="mtext">Asset
                                        management</span>
                                </a>



                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/add-coese-resources') }}">
                                            Add resource
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/view-coese-created-resources') }}">
                                            View created resources
                                        </a>
                                    </li>

                                    <ul class="submenu">
                                        <li><a href="{{ asset('UIMS/view-coese-created-resources') }}">
                                                Resource allocation to areas
                                            </a>
                                        </li>

                                    </ul>


                                </ul>
                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/qr-code-reader') }}">
                                            Scan Qr code
                                        </a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-pencil-square"></span><span class="mtext">Asset
                                        management</span>
                                </a>



                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/add-cobe-resources') }}">
                                            Add resource
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/view-cobe-created-resources') }}">
                                            View created resources
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/qr-code-reader') }}">
                                            Scan Qr code
                                        </a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-pencil-square"></span><span class="mtext">Asset
                                        management</span>
                                </a>



                                <ul class="submenu">
                                    <li><a wire:navigate href="{{ asset('UIMS/add-cnms-resources') }}">
                                            Resource management
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/qr-code-reader') }}">
                                            Scan Qr code
                                        </a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-pencil-square"></span><span class="mtext">Asset
                                        management</span>
                                </a>



                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/add-chss-resources') }}">
                                            Add resource
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/view-chss-created-resources') }}">
                                            View created resources
                                        </a>
                                    </li>

                                </ul>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/qr-code-reader') }}">
                                            Scan Qr code
                                        </a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Education ( CoED )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-folder"></span><span class="mtext">Reports</span>
                                </a>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/coed-report') }}">
                                            Report management</a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )')
                            <li class="dropdown">


                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-folder"></span><span class="mtext">Reports</span>
                                </a>

                                <ul class="submenu">
                                    <li><a wire:navigate href="{{ asset('UIMS/cive-report') }}">
                                            Report management</a>
                                    </li>

                                </ul>
                                <ul class="submenu">
                                    <li><a wire:navigate href="{{ asset('UIMS/make-report-request') }}">
                                            Make report request </a>
                                    </li>

                                </ul>

                            </li>
                        @endif



                        @if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-folder"></span><span class="mtext">Reports</span>
                                </a>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/coese-report') }}">
                                            Report management</a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-folder"></span><span class="mtext">Reports</span>
                                </a>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/cobe-report') }}">
                                            Report management</a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-folder"></span><span class="mtext">Reports</span>
                                </a>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/cnms-report') }}">
                                            Report management</a>
                                    </li>

                                </ul>


                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )')
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="micon bi bi-folder"></span><span class="mtext">Reports</span>
                                </a>

                                <ul class="submenu">

                                    <li><a href="{{ asset('UIMS/chss-report') }}">
                                            Report management</a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon bi bi-folder"></span><span class="mtext">Reports</span>
                            </a>
                        @if(auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )')
                        <ul class="submenu">

                            <li><a wire:navigate href="{{ asset('UIMS/detail-reports/chas') }}">
                                    View detail report</a>
                            </li>

                        </ul>

                        <ul class="submenu">

                            <li><a wire:navigate href="{{ asset('UIMS/chas-summary-report') }}">
                                    View summary report</a>
                            </li>

                        </ul>
                        @endif
                        </li>
                        @if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ')
                            @php
                                $unread = App\Models\Replies::whereReplyStatus('unread')
                                    ->whereReplyToSpecifiedCollege('College of Natural Mathematical Science ( CNMS ) ')
                                    ->count();
                            @endphp


                        @endif

                        @if (auth()->user()->college_name == 'College of Education ( CoED )')

                            @php
                                $unread = App\Models\Replies::whereReplyStatus('unread')
                                    ->whereReplyToSpecifiedCollege('College of Education ( CoED )')
                                    ->count();
                            @endphp


                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">

                                    @if ($unread > 0)
                                        <div
                                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-0 -start-0 dark:border-gray-900">
                                            {{ $unread }}
                                        </div>
                                    @endif

                                    <span class="micon bi bi-envelope"></span><span class="mtext">Message
                                        reports</span>
                                </a>


                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/messages') }}">
                                            View reply messages </a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )')
                            @php
                                $unread = App\Models\Replies::whereReplyStatus('unread')
                                    ->whereReplyToSpecifiedCollege('College of Humanities and Social Science ( CHSS )')
                                    ->count();
                            @endphp

                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">

                                    @if ($unread > 0)
                                        <div
                                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-0 -start-0 dark:border-gray-900">
                                            {{ $unread }}
                                        </div>
                                    @endif

                                    <span class="micon bi bi-envelope"></span><span class="mtext">Message
                                        reports</span>
                                </a>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/messages') }}">
                                            View reply messages </a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )')

                            @php
                                $unread = App\Models\Replies::whereReplyStatus('unread')
                                    ->whereReplyToSpecifiedCollege('College of Business and Economics ( CoBE )')
                                    ->count();
                            @endphp

                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">

                                    @if ($unread > 0)
                                        <div
                                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-0 -start-0 dark:border-gray-900">
                                            {{ $unread }}
                                        </div>
                                    @endif
                                    <span class="micon bi bi-envelope"></span><span class="mtext">Message
                                        reports</span>
                                </a>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/messages') }}">
                                            View reply messages </a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )')

                            @php
                                $unread = App\Models\Replies::whereReplyStatus('unread')
                                    ->whereReplyToSpecifiedCollege(
                                        'College of Earth Sciences and Engineering ( CoESE )',
                                    )
                                    ->count();
                            @endphp
                            <li class="dropdown">


                                <a href="javascript:;" class="dropdown-toggle">

                                    @if ($unread > 0)
                                        <div
                                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-0 -start-0 dark:border-gray-900">
                                            {{ $unread }}
                                        </div>
                                    @endif

                                    <span class="micon bi bi-envelope"></span><span class="mtext">Message
                                        reports</span>
                                </a>

                                <ul class="submenu">
                                    <li><a href="{{ asset('UIMS/messages') }}">
                                            View reply messages </a>
                                    </li>

                                </ul>

                            </li>
                        @endif

                        @if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )')
                            <li class="dropdown">

                                @php
                                    $unread = App\Models\Replies::whereReplyStatus('unread')
                                        ->whereReplyToSpecifiedCollege(
                                            'College of Informatics and Virtual Education ( CIVE )',
                                        )
                                        ->count();
                                @endphp

                                <a href="javascript:;" class="dropdown-toggle">
                                    @if ($unread > 0)
                                        <div
                                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-0 -start-0 dark:border-gray-900">
                                            {{ $unread }}
                                        </div>
                                    @endif
                                    <span class="micon bi bi-envelope "></span><span class="mtext">Message
                                        reports</span>

                                </a>

                                <ul class="submenu">
                                    <li>

                                        <a wire:navigate href="{{ asset('UIMS/messages') }}">
                                            View reply messages
                                        </a>

                                    </li>

                                </ul>

                            </li>

                        @endif

                    </ul>

                </div>
            </div>
        </div>

        <div class="mobile-menu-overlay"></div>

        <div class="main-container">
            @yield('content')
        </div>

        <!-- js -->

        <script src="{{ asset('vendors/scripts/core.js') }}"></script>
        <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
        <script src="{{ asset('vendors/scripts/process.js') }}"></script>
        <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
        <script src="{{ asset('src/plugins/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('vendors/scripts/dashboard.js') }}"></script>

        <script src="{{ asset('javascript/select-records.js') }}"></script>


        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
                style="display: none; visibility: hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    </body>

    </html>

</div>