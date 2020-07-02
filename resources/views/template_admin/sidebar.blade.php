    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Profile</li>
            <li class="{{ Route::is('admin.profile') ? 'active' : null }}"><a class="nav-link" href="{{ route('admin.profile') }}"><i class="far fa-square"></i> <span>Profile</span></a></li>
            <li class="menu-header">User</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>User</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.editor') ? 'active' : null }}"><a class="nav-link" href="{{ route('admin.editor') }}">Editor</a></li>
                <li class="{{ Route::is('admin.writer') ? 'active' : null }}"><a class="nav-link" href="{{ route('admin.writer') }}">Penulis</a></li>
              </ul>
            </li>
            <li class="{{ Route::is('user-types.index') ? 'active' : null }}"><a class="nav-link" href="{{ route('user-types.index') }}"><i class="fas fa-fire"></i> <span>User Types</span></a></li>
         </aside>
    </div>