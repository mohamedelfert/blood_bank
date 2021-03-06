<!-- Messages Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">{{ \App\Models\Contact::count() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        @forelse(\App\Models\Contact::latest()->take(5)->get() as $contact)
            <a href="{{ adminUrl('contacts/'.$contact->id) }}" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            Name : {{ optional($contact->client)->name }}
                            <span class="float-right text-sm"><i class="fas fa-envelope-open"></i></span>
                        </h3>
                        <p class="text-sm">Subject : {{ $contact->subject }}</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{ $contact->created_at }}</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
        @endforeach
        <div class="dropdown-divider"></div>
        <a href="{{ adminUrl('contacts') }}" class="dropdown-item dropdown-footer">See All Messages</a>
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
            <a class="dropdown-item" href="{{ adminUrl('settings') }}"><i class="text-info fas fa-cogs"></i> Settings </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="text-danger fas fa-sign-out-alt"></i> {{ trans('main.logout') }} </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</li>
