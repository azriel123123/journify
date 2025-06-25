<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper" style="display: flex; flex-direction: column; height: 100%;">
        <div>
            <div class="sidebar-brand">
                <a href="{{ route('home') }}">Stisla</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{ route('home') }}">St</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fas fa-fire"></i><span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link">
                        <i class="fas fa-folder"></i><span>Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('question.index') }}" class="nav-link">
                        <i class="fas fa-question"></i><span>Question</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('song.index') }}" class="nav-link">
                        <i class="fas fa-music"></i><span>Lagu</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('quote.index') }}" class="nav-link">
                        <i class="fas fa-quote-right"></i><span>Quotes</span>
                    </a>
                </li>
            </ul>
        </div>

        <div style="margin-top: auto; padding: 20px;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger btn-block"
                    style="display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i> Logout
                </button>
            </form>
        </div>
    </aside>
</div>
