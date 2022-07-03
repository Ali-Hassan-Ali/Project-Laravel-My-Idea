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

                {{--roles--}}
        @if (auth('admin')->user()->hasPermission('read_roles'))
            <li><a class="app-menu__item {{ request()->is('*roles*') ? 'active' : '' }}" href="{{ route('dashboard.admin.roles.index') }}"><i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">@lang('roles.roles')</span></a></li>
        @endif

        {{--admins--}}
        @if (auth('admin')->user()->hasPermission('read_admins'))
        @endif
            <li><a class="app-menu__item {{ request()->is('*admins*') ? 'active' : '' }}" href="{{ route('dashboard.admin.admins.index') }}"><i class="app-menu__icon fa-solid fa-users"></i> <span class="app-menu__label">@lang('admins.admins')</span></a></li>

        {{--categorys--}}
        @if (auth('admin')->user()->hasPermission('read_categorys'))
        @endif
            <li><a class="app-menu__item {{ request()->is('*categorys*') ? 'active' : '' }}" href="{{ route('dashboard.admin.categorys.index') }}"><i class="app-menu__icon fa-solid fa-users"></i> <span class="app-menu__label">@lang('categorys.categorys')</span></a></li>

        {{--admins--}}
        @if (auth('admin')->user()->hasPermission('read_ideas'))
        @endif
            <li><a class="app-menu__item {{ request()->is('*ideas*') ? 'active' : '' }}" href="{{ route('dashboard.admin.ideas.index') }}"><i class="app-menu__icon fa-solid fa-users"></i> <span class="app-menu__label">@lang('ideas.ideas')</span></a></li>
    
    </ul>
</aside>
