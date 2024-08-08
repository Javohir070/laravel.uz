<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="/admin/dist/images/logo.png" rel="shortcut icon">
        <meta name="viewport" content="Ilmiy-innovatsion faoliyat monitoringi tizimi">
        <meta name="description" content="Ilmiy-innovatsion faoliyat monitoringi tizimi">
        <meta name="keywords" content="Ilmiy-innovatsion faoliyat monitoringi tizimi">
        <meta name="author" content="LEFT4CODE">
        <title>Ilmiy-innovatsion faoliyat monitoringi tizimi </title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="/admin/dist/css/app.css" />
        
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Ilmiy-innovatsion faoliyat monitoringi tizimi" class="w-6" src="/admin/dist/images/logo.png">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="{{ route("home.index") }}" class="menu menu{{ request()->is('/*') ? '--active':'' }}" >
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Bosh  sahifa</div>
                    </a>
                </li>
                <!-- start superadmin -->
                @role('super-admin')
                    <li>
                        <a href="javascript:;" class="menu menu{{ request()->is('iqtisodiylar*') ? '--active':'' }}{{ request()->is('tashkilotrahbarilar*') ? '--active':'' }}{{ request()->is('tashkilot*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title">  Tashkilotlar <i data-feather="chevron-down"
                                    class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="{{ request()->is('iqtisodiylar*') ? 'menu__sub-open':'' }}{{ request()->is('tashkilotrahbarilar') ? 'menu__sub-open':'' }}{{ request()->is('tashkilot*') ? 'menu__sub-open':'' }}">
                            
                            <li>
                                <a href="" class="menu menu{{ request()->is('tashkilot*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Tashkilot pasportilari </div>
                                </a>
                            </li>
                            
                            <li>
                                <a href="" class="menu menu{{ request()->is('tashkilotrahbarilar*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title">  Tashkilotlar raxbarlari  </div>
                                </a>
                            </li>
                            
                            <li>
                                <a href="" class="menu menu{{ request()->is('iqtisodiylar*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title">  Iqtisodiy moliyaviy faoliyatlari   </div>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endrole

                @role('super-admin')
                    <li>
                        <a href="" class="menu menu{{ request()->is('xodim*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                            <div class="menu__title"> Xodimlar </div>
                        </a>
                    </li>
                @endrole
                
                

                

                @role('super-admin')
                    
                    <li>
                        <a href="javascript:;" class="menu menu{{ request()->is('users*') ? '--active':'' }}{{ request()->is('permissions*') ? '--active':'' }}{{ request()->is('roles*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="settings"></i> </div>
                            <div class="menu__title">  Sozlamalar <i data-feather="chevron-down"
                                    class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="{{ request()->is('users*') ? 'menu__sub-open':'' }}{{ request()->is('permissions*') ? 'menu__sub-open':'' }}{{ request()->is('roles*') ? 'menu__sub-open':'' }}">

                            

                            <li>
                                <a href="{{ route('users.index') }}" class="menu menu{{ request()->is('users*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Userlar </div>
                                </a>
                            </li>

                            
                            <li>
                                <a href="{{ route("roles.index") }}" class="menu menu{{ request()->is('roles*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Rolelar </div>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{ route('permissions.index') }}" class="menu menu{{ request()->is('permissions*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title">  Permissions  </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole

            
                
                <div class="nav__devider my-6"></div>
                    <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link style="color: white;padding: 8px;margin-left: 16px;" class="menu flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <div class="menu__icon"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> </div>
                            Chiqish
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            @include('layouts.nav-admin')
            <!-- END: Side Menu -->

            
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Tizim</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Asosiy</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
                        <marquee direction="left" width="500" style="color:red;">
                        Sayt test rejimida ishlamoqda
                        </marquee>
                    </div> -->
                    <!-- BEGIN: Search -->
                    <div class="intro-x relative mr-3 sm:mr-6">
                        <div class="search hidden sm:block">
                            <input type="text"  class="search__input input placeholder-theme-13" placeholder="Search...">
                            <i data-feather="search" class="search__icon"></i> 
                        </div>
                        <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
                    </div>
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown relative mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer">
                             <i data-feather="bell" class="notification__icon"></i>
                         </div>
                    </div>
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="Midone Tailwind HTML Admin Template" src="/admin/dist/images/profile-12.jpg">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium">{{ auth()->user()->name }}</div>
                                    <div class="text-xs text-theme-41">{{ auth()->user()->email }}</div>
                                </div>
                                <div class="p-2">
                                    <a href="{{ route("profileview.index") }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <!-- <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a> -->
                                    <a href="{{ route("profileview.index") }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Parolni o'zgartirish </a>
                                    <!-- <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i>Sizgani yordam beris </a> -->
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link style="color: white;padding: 8px;" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                           <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Chiqish
                                        </x-dropdown-link>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                @yield("content")
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="/admin/dist/js/app.js"></script>
    </body>
</html>