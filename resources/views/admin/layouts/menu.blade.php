<!-- Messages Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <img src="{{ url('/') }}/design/admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
            </div>
            <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <img src="{{ url('/') }}/design/admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                        John Pierce
                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
            </div>
            <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <img src="{{ url('/') }}/design/admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
            </div>
            <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
    </div>
</li>
<!-- Notifications Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li>
<!-- Languages Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
       aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-globe"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <a class="dropdown-item" href="{{ adminUrl('lang/ar') }}"><img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt=""> Arabic </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ adminUrl('lang/en') }}"><img src="{{ URL::asset('assets/images/flags/US.png') }}" alt=""> English </a>
    </div>
</li>
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
       aria-haspopup="true" aria-expanded="false">
        <img src="{{ url('/') }}/design/admin/dist/img/user2-160x160.jpg" class="img-circle user-image elevation-2" alt="User Image">
    </a>
    <ul class="dropdown-menu">
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
            <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
            <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
            <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span
                    class="badge badge-info">6</span> </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href=""><i class="text-info ti-settings"></i>Settings</a>
            <form method="GET" action="{{ url('admin/logout') }}">
                @csrf
                <a class="dropdown-item" href="{{ adminUrl('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                    <i class="text-danger ti-unlock"></i>{{ __('main.logout') }}</a>
            </form>
        </li>
    </ul>
</li>
