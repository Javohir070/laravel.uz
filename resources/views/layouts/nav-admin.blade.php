<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img width="40px" alt="Midone Tailwind HTML Admin Template" class="w-10" src="/admin/dist/images/logo.png">
        <span class="hidden xl:block text-white text-lg ml-3" style="font-size: 12px; "> Ilmiy-innovatsion faoliyat monitoringi tizimi </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route("home.index") }}" class="side-menu side-menu{{ request()->is('/*') ? '--active':'' }}" >
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Bosh  sahifa</div>
            </a>
        </li>
    <!-- start superadmin -->
    @role('super-admin12')     
        <li>
            <a href="javascript:;" class="side-menu side-menu{{ request()->is('iqtisodiylar*') ? '--active':'' }}{{ request()->is('tashkilotrahbarilar*') ? '--active':'' }}{{ request()->is('tashkilot*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title">  Tashkilotlar <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ request()->is('iqtisodiylar*') ? 'side-menu__sub-open':'' }}{{ request()->is('tashkilotrahbarilar') ? 'side-menu__sub-open':'' }}">
                
                <li>
                    <a href="" class="side-menu side-menu{{ request()->is('tashkilot*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot pasportlari </div>
                    </a>
                </li>
                
                <li>
                    <a href="" class="side-menu side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  Tashkilotlar rahbarlari  </div>
                    </a>
                </li>
                
                

            </ul>
        </li>
    @endrole

    @role('super-admin')
        <!-- <li>
            <a href="#" class="side-menu side-menu{{ request()->is('xodim*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Xodimlar </div>
            </a>
        </li> -->
        <li>
            <a href="{{ route('news.index') }}" class="side-menu side-menu{{ request()->is('news*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Yangliklar </div>
            </a>
        </li>
        <li>
            <a href="{{ route('annoucement.index') }}" class="side-menu side-menu{{ request()->is('annoucement*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Tanlovlar </div>
            </a>
        </li>
        <li>
            <a href="{{ route('responsible.index') }}" class="side-menu side-menu{{ request()->is('responsible*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Masullar</div>
            </a>
        </li>
    @endrole
    
   

  
    @role('super-admin')
        
        <li>
            <a href="javascript:;" class="side-menu side-menu{{ request()->is('users*') ? '--active':'' }}{{ request()->is('permissions*') ? '--active':'' }}{{ request()->is('roles*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                <div class="side-menu__title">  Sozlamalar <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ request()->is('users*') ? 'side-menu__sub-open':'' }}{{ request()->is('permissions*') ? 'side-menu__sub-open':'' }}{{ request()->is('roles*') ? 'side-menu__sub-open':'' }}">

                

                <li>
                    <a href="{{ route('users.index') }}" class="side-menu side-menu{{ request()->is('users*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Userlar </div>
                    </a>
                </li>

                
                <li>
                    <a href="{{ route("roles.index") }}" class="side-menu side-menu{{ request()->is('roles*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Rolelar </div>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('permissions.index') }}" class="side-menu side-menu{{ request()->is('permissions*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  Permissions  </div>
                    </a>
                </li>
            </ul>
        </li>
    @endrole



    <div class="side-nav__devider my-6"></div>
		<li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link style="color: white;padding: 8px;margin-left: 16px;" class="side-menu flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md" :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                <div class="side-menu__icon"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> </div>
                Chiqish
            </x-dropdown-link>
        </form>
    </li>
    </ul>
</nav>
