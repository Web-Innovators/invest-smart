<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background: linear-gradient(to right, #222134, #000);">
    <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index.get') }}">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.get') }}">
                <span class="icon-bg"><i class="mdi mdi-account menu-icon"></i></span>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.queries.get') }}">
                <span class="icon-bg"><i class="mdi mdi-message menu-icon"></i></span>
                <span class="menu-title">Queries</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.packages.get') }}">
                <span class="icon-bg"><i class="mdi mdi-package menu-icon"></i></span>
                <span class="menu-title">Packages</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.deposits.get') }}">
                <span class="icon-bg"><i class="mdi mdi-currency-usd menu-icon"></i></span>
                <span class="menu-title">Deposits</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.withdraws.get') }}">
                <span class="icon-bg"><i class="mdi mdi-currency-usd menu-icon"></i></span>
                <span class="menu-title">Withdraws</span>
            </a>
        </li>
    </ul>
</nav>
