<nav class="sidebar sidebar-offcanvas position-fixed" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="images/faces/face1.jpg" alt="profile image">
                    </div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{ Auth::user()->name }}</p>
                    <div class="text-center">
                        <small class="designation text-muted">{{ Auth::user()->user_type === 'super_admin' ? 'Super Admin': 'Manager'}}</small>
                        <span class="status-indicator online"></span>
                    </div>
                </div>
            </div>
            <hr>
        </li>
        @if(Auth::user()->user_type ==='super_admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('restaurants.list') }}">
                    <i class="menu-icon mdi mdi-television"></i>
                    <span class="menu-title">Restaurants List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('restaurants.pending.list') }}">
                    <i class="menu-icon mdi mdi-television"></i>
                    <span class="menu-title">Pending Restaurants</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="menu-icon mdi mdi-television"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="bs-categories" href="{{ route('categories') }}">
                    <i class="menu-icon mdi mdi-box"></i>
                    <span class="menu-title">Menu Categories</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="menu-icon mdi mdi-backup-restore"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
    </ul>
</nav>
