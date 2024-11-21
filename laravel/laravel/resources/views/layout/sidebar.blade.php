<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html" target="_blank">
      <img src="https://arsip.unair.ac.id/wp-content/uploads/2019/01/logo-unair.png" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">PROJECT UTS</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
    @foreach( $all_setting_menu_user as $item )
        @foreach( $all_jenis_user as $value)
            @if(Auth::user()->ID_JENIS_USER == $value->id)
                
                @if( $item->ID_JENIS_USER == $value->id)
                <li class="nav-item">
                  <a class="nav-link" id="{{ $item->RelationMenu->CLASS }}">
                  <div class="icon icon-shape small-icon-box bg-gradient-primary shadow text-center border-radius-md">
                      <i class="{{ $item->RelationMenu->MENU_ICON }} small-icon" aria-hidden="true"></i>
                  </div>
                    <span class="nav-link-text ms-1">{{ $item->RelationMenu->MENU_NAME }}</span>
                  </a>
                </li>
                @endif

            @endif
        @endforeach
    @endforeach
    </ul>
  </div>
  <style>
    .small-icon-box {
    margin-right: 10px;
    width: 40px;   
    height: 40px;  
    padding: 5px;  
    }

    .small-icon {
        font-size: 20px; 
    }

  </style>
</aside>