<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="list">
                <li class="menu-title">MAIN NAVIGATION</li>

                @if(Request::is('admin*'))
                    <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/tag*') ? 'active' : '' }}">
                        <a href="{{ route('admin.tag.index') }}">
                            <i class="material-icons">label</i>
                            <span>Tag</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                        <a href="{{ route('admin.category.index') }}">
                            <i class="material-icons">category</i>
                            <span>Category</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/ads*') ? 'active' : '' }}">
                        <a href="{{ route('admin.ads.index') }}">
                            <i class="material-icons">code</i>
                            <span>Ads</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/post*') ? 'active' : '' }}">
                        <a href="{{ route('admin.post.index') }}">
                            <i class="material-icons">library_books</i>
                            <span>Posts</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/pending/post') ? 'active' : '' }}">
                        <a href="{{ route('admin.post.pending') }}">
                            <i class="material-icons">library_books</i>
                            <span>Pending Posts</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/favorite') ? 'active' : '' }}">
                        <a href="{{ route('admin.favorite.index') }}">
                            <i class="material-icons">favorite</i>
                            <span>Favorite Posts</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/comments') ? 'active' : '' }}">
                        <a href="{{ route('admin.comment.index') }}">
                            <i class="material-icons">comment</i>
                            <span>Comments</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/authors') ? 'active' : '' }}">
                        <a href="{{ route('admin.author.index') }}">
                            <i class="material-icons">account_circle</i>
                            <span>Authors</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}">
                        <a href="{{ route('admin.subscriber.index') }}">
                            <i class="material-icons">subscriptions</i>
                            <span>Subscribers</span>
                        </a>
                    </li>
                    <li class="menu-title">System</li>

                    <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings') }}">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>
                            <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
                @if(Request::is('author*'))
                    <li class="{{ Request::is('author/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('author.dashboard') }}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('author/post*') ? 'active' : '' }}">
                        <a href="{{ route('author.post.index') }}">
                            <i class="material-icons">library_books</i>
                            <span>Posts</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('author/favorite') ? 'active' : '' }}">
                        <a href="{{ route('author.favorite.index') }}">
                            <i class="material-icons">favorite</i>
                            <span>Favorite Posts</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('author/comments') ? 'active' : '' }}">
                        <a href="{{ route('author.comment.index') }}">
                            <i class="material-icons">comment</i>
                            <span>Comments</span>
                        </a>
                    </li>

                    <li class="header">System</li>
                    <li class="{{ Request::is('author/settings') ? 'active' : '' }}">
                        <a href="{{ route('author.settings') }}">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>
                            <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>



    </div>
    <!-- Sidebar -left -->

</div>