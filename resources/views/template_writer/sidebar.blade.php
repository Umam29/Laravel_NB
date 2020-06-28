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
            <li class="{{ Route::is('writer.profile') ? 'active' : null }}"><a class="nav-link" href="{{ route('writer.profile') }}"><i class="far fa-square"></i> <span>Profile</span></a></li>
            <li class="menu-header">Post</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Post</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Route::is('writer.postCreate') ? 'active' : null }}"><a class="nav-link" href="{{ route('writer.postCreate') }}">Create</a></li>
                <li class="{{ Route::is('writer.postPublish') ? 'active' : null }}"><a class="nav-link" href="{{ route('writer.postPublish') }}">Publish</a></li>
                <li class="{{ Route::is('writer.post') ? 'active' : null }}"><a class="nav-link" href="{{ route('writer.post') }}">Not Publish</a></li>
                <li class="{{ Route::is('writer.draft') ? 'active' : null }}"><a class="nav-link" href="{{ route('writer.draft') }}">Draft</a></li>
              </ul>
            </li>
         </aside>
    </div>