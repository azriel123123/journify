<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper" style="display: flex; flex-direction: column; height: 100%;">
        <div>
            <div class="sidebar-brand">
                <a href="index.html">Stisla</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">St</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="nav-link" href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div style="margin-top: auto; padding: 20px;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger btn-block" style="display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i> Logout
                </button>
            </form>
        </div>
    </aside>
</div>
