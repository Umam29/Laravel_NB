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
            <li class="{{ Route::is('editor.profile') ? 'active' : null }}"><a class="nav-link" href="{{ route('editor.profile') }}"><i class="far fa-square"></i> <span>Profile</span></a></li>
            <li class="menu-header">Category</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Category</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Route::is('category.index') ? 'active' : null }}"><a class="nav-link" href="{{ route('category.index') }}">List Category</a></li>
              </ul>
            </li>
            <li class="menu-header">Post</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Post</span></a>
              <ul class="dropdown-menu">
                <li class="{{ Route::is('editor.postPublish') ? 'active' : null }}"><a class="nav-link" href="{{ route('editor.postPublish') }}">Publish</a></li>
                <li class="{{ Route::is('editor.post') ? 'active' : null }}"><a class="nav-link" href="{{ route('editor.post') }}">Not Publish</a></li>
              </ul>
            </li>
         </aside>
    </div>