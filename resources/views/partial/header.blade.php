<div class="primary-nav">
    <button href="#" class="hamburger open-panel nav-toggle">
        <span class="screen-reader-text">Menu</span>
    </button>
    <nav role="navigation" class="menu">
        <a href="#" class="logotype">Fruit <span> Shop</span></a>
        <div class="overflow-container">
            <ul class="menu-dropdown">
                <li {{ str_contains(Route::currentRouteName(), 'invoice') ? 'class=active' : '' }}>
                    <a href="{{ route("invoice.index") }}">Invoice</a><span class="icon"><i class="fa fa-money"></i></span>
                </li>
                <li {{ str_contains(Route::currentRouteName(), 'category') ? 'class=active' : '' }}>
                    <a href="{{ route("category.index") }}">Category</a><span class="icon"><i class="fa fa-book"></i></span>
                </li>
                <li {{ str_contains(Route::currentRouteName(), 'fruit') ? 'class=active' : '' }}>
                    <a href="{{ route("fruit.index") }}">Fruit</a><span class="icon"><i class="fa fa-ticket"></i></span>
                </li>
                <li {{ str_contains(Route::currentRouteName(), 'setting') ? 'class=active' : '' }}>
                    <a href="{{ route("setting.index") }}">Settings</a><span class="icon"><i class="fa fa-gear"></i></span>
                </li>
                <li>
                    <a href="{{ route("authentication.logout") }}">Logout</a><span class="icon"><i class="fa fa-sign-out"></i></span>
                </li>
            </ul>
        </div>
    </nav>
</div>