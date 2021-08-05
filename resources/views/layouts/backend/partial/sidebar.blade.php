<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background-image: url({{ asset('asset/backend/images/background/user-info.jpg') }});">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ Storage::disk('public')->url('profile/'.Auth::user()->photo) }}" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->name
                    }}</a>
                <div class="dropdown-menu animated flipInY">
                    <div class="dropdown-divider"></div>
                    <a href="{{Auth::user()->role->id == 1 ? route('admin.settings.index') : route('author.settings.index')}}" class="dropdown-item">Account Setting</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();" class="dropdown-item"> {{ __('Logout') }}</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->

        <nav class="sidebar-nav">
            @if(Request::is('admin*'))
                <ul id="sidebarnav">
                    <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.dashboard') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                    </li>
                    <li class="{{ Request::is('admin/tag*') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.tag.index') }}" aria-expanded="false"><i class="fa fa-tags"></i><span class="hide-menu">Tag </span></a>
                    </li>
                    <li class="{{ Request::is('admin/category*') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.category.index') }}" aria-expanded="false"><i class="fa fa-list-alt"></i><span class="hide-menu">Category </span></a>
                    </li>
                    <li class="{{ Request::is('admin/post*') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.post.index') }}" aria-expanded="false"><i class="fa fa-bookmark"></i><span class="hide-menu">Post </span></a>
                    </li>
                    <li class="{{ Request::is('admin/pending/post') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.pending.post') }}" aria-expanded="false"><i class="fas fa-database"></i><span class="hide-menu">Pending Post </span><span style="margin-left: 10px;" class="badge badge-danger">{{ App\Post::where('is_approved',false)->count() }}</span></a>
                    </li>
                    <li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.subscriber.index') }}" aria-expanded="false"><i class="fa fa-bell"></i><span class="hide-menu">Subscribers</span></a>
                    </li>
                    <li class="{{ Request::is('admin/favorite') ? 'active' : '' }}"> <a class="has-arrow waves-effect
                    waves-dark" href="{{ route('admin.favorite.index') }}" aria-expanded="false"><i class="fa
                    fa-heart"></i><span class="hide-menu">Favorite Post</span></a>
                    </li>
                    <li class="{{ Request::is('admin/comment') ? 'active' : '' }}"> <a class="has-arrow waves-effect
            waves-dark" href="{{ route('admin.comment.index') }}" aria-expanded="false"><i class="fa
            fa-comments"></i><span class="hide-menu">Comments</span></a>
            </li>
                    <li class="{{ Request::is('admin/authors') ? 'active' : '' }}"> <a class="has-arrow waves-effect
            waves-dark" href="{{ route('admin.author.index') }}" aria-expanded="false"><i class="fa
            fa-user"></i><span class="hide-menu">All Author</span></a>
            </li>
                    <li class="header">System</li>
                    <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="{{ route('admin.settings.index') }}" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Settings</span></a>
                    </li>

                </ul>
            @endif
        </nav>


        <nav class="sidebar-nav">
            @if(Request::is('author*'))
                <ul id="sidebarnav">
                    <li class="{{ Request::is('author/dashboard') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="{{ route('author.dashboard') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                    </li>
                    <li class="{{ Request::is('author/post*') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="{{ route('author.post.index') }}" aria-expanded="false"><i class="fa fa-bookmark"></i><span class="hide-menu">Posts </span></a>
                    </li>
                    <li class="{{ Request::is('author/favorite') ? 'active' : '' }}"> <a class="has-arrow waves-effect waves-dark" href="{{ route('author.favorite.index') }}" aria-expanded="false"><i class="fa fa-heart"></i><span class="hide-menu">Favorite Post</span></a>
                    </li>
                    <li class="{{ Request::is('author/comment') ? 'active' : '' }}"> <a class="has-arrow waves-effect
            waves-dark" href="{{ route('author.comment.index') }}" aria-expanded="false"><i class="fa
            fa-comments"></i><span class="hide-menu">Comments</span></a>
                    </li>
                    <li class="header">System</li>
                    <li class="{{ Request::is('author/settings*') ? 'active' : '' }}"> <a class="has-arrow waves-effect
            waves-dark" href="{{ route('author.settings.index') }}" aria-expanded="false"><i class="fa
            fa-cog"></i><span class="hide-menu">Settings </span></a>
                    </li>
                </ul>
            @endif
        </nav>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item--><a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item--><a href="#" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item--><a href="#" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
    <!-- End Bottom points-->
</aside>
