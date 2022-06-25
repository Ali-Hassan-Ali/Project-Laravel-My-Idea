<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ auth('admin')->user()->image_path }}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth('admin')->user()->name }}</p>
            <p class="app-sidebar__user-designation"></p>
        </div>
    </div>

    <ul class="app-menu">

        <li><a class="app-menu__item {{ request()->is('*home*') ? 'active' : '' }}" href="{{ route('dashboard.admin.home') }}"><i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">@lang('site.home')</span></a></li>
    
    </ul>
</aside>
