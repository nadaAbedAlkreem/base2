<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
    <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
        <div class=" menu-active-bg">
            <div class="menu-item">
                <a class="menu-link {{ isActiveRoute('home') }}" href="{{route('home')}}">
                    <span class="menu-bullet">
                        <span class="fa fa-home"></span>
                    </span>
                    <span class="menu-title">
                        الرئيسية
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="menu-content pt-8 pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">الصفحات</span>
        </div>
    </div>


@can('roles.index')
    <!--begin::Menu item-->
<div class="menu-item menu-sub-indention menu-accordion  {{areActiveRoutes(['roles.index' , 'roles.create' , 'roles.edit'])}}" data-kt-menu-trigger="click">
    <!--begin::Menu link-->
    <a href="#" class="menu-link py-3 {{areActiveRoutes(['roles.index' , 'roles.create' , 'roles.edit'])}}">
        <span class="menu-icon">
            <img src="{{ asset('images/roles.png') }}" style="width:25px;height:25px">
        </span>
        <span class="menu-title">@lang('dashboard.roles')</span>
        <span class="menu-arrow"></span>
    </a>
    <!--end::Menu link-->

    <!--begin::Menu sub-->
    <div class="menu-sub menu-sub-accordion pt-3">
        <!--begin::Menu item-->
        <div class="menu-item">
            <a href="{{ route('roles.index') }}" class="menu-link py-3  {{ isActiveRoute('roles.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">@lang('dashboard.all_title', ['page_title' => __('dashboard.roles')])</span>
            </a>
        </div>
        <!--end::Menu item-->


        @can('roles.create')
        <!--begin::Menu item-->
        <div class="menu-item">
            <a href="{{route('roles.create')}}" class="menu-link py-3 {{ isActiveRoute('roles.create') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">@lang('dashboard.create_title', ['page_title' => __('dashboard.role')])</span>
            </a>
        </div>
        <!--end::Menu item-->
        @endcan
    </div>
    <!--end::Menu sub-->
</div>
<!--end::Menu item-->
@endcan 
   
@can('admins.index')
    <!--begin::Menu item-->
    <div class="menu-item menu-sub-indention menu-accordion  {{areActiveRoutes(['admins.index' , 'admins.create' , 'admins.edit'])}}" data-kt-menu-trigger="click">
        <!--begin::Menu link-->
        <a href="#" class="menu-link py-3 {{areActiveRoutes(['admins.index' , 'admins.create' , 'admins.edit'])}}">
            <span class="menu-icon">
                    <img src="{{ asset('images/admins.png') }}" style="width:25px;height:25px">
            </span>
            <span class="menu-title">@lang('dashboard.admins')</span>
            <span class="menu-arrow"></span>
        </a>
        <!--end::Menu link-->

        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-accordion pt-3">
            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="{{ route('admins.index') }}" class="menu-link py-3  {{ isActiveRoute('admins.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">@lang('dashboard.all_title', ['page_title' => __('dashboard.admins')])</span>
                </a>
            </div>
            <!--end::Menu item-->

            @can('admins.create')
            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="{{route('admins.create')}}" class="menu-link py-3 {{ isActiveRoute('admins.create') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">@lang('dashboard.create_title', ['page_title' => __('dashboard.admin')])</span>
                </a>
            </div>
            @endcan 
            <!--end::Menu item-->
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->
@endcan 
   


    <!--begin::Menu item-->
    <div class="menu-item menu-sub-indention menu-accordion  {{areActiveRoutes(['categories.index' , 'categories.create' , 'categories.edit'])}}" data-kt-menu-trigger="click">
        <!--begin::Menu link-->
        <a href="#" class="menu-link py-3 {{areActiveRoutes(['categories.index' , 'categories.create' , 'categories.edit'])}}">
            <span class="menu-icon">
                <i class="bi bi-layers-fill fs-3"></i>
            </span>
            <span class="menu-title">@lang('dashboard.categories')</span>
            <span class="menu-arrow"></span>
        </a>
        <!--end::Menu link-->

        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-accordion pt-3">
            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="{{ route('categories.index') }}" class="menu-link py-3  {{ isActiveRoute('categories.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">@lang('dashboard.all_title', ['page_title' => __('dashboard.categories')])</span>
                </a>
            </div>
            <!--end::Menu item-->

            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="{{route('categories.create')}}" class="menu-link py-3 {{ isActiveRoute('categories.create') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">@lang('dashboard.create_title', ['page_title' => __('dashboard.category')])</span>
                </a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item menu-sub-indention menu-accordion  {{areActiveRoutes(['banners.index' , 'banners.create' , 'banners.edit'])}}" data-kt-menu-trigger="click">
        <!--begin::Menu link-->
        <a href="#" class="menu-link py-3 {{areActiveRoutes(['banners.index' , 'banners.create' , 'banners.edit'])}}">
            <span class="menu-icon">
                <i class="bi bi-images fs-3"></i>
            </span>
            <span class="menu-title">@lang('dashboard.banners')</span>
            <span class="menu-arrow"></span>
        </a>
        <!--end::Menu link-->

        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-accordion pt-3">
            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="{{ route('banners.index') }}" class="menu-link py-3  {{ isActiveRoute('banners.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">@lang('dashboard.all_title', ['page_title' => __('dashboard.banners')])</span>
                </a>
            </div>
            <!--end::Menu item-->

            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="{{route('banners.create')}}" class="menu-link py-3 {{ isActiveRoute('banners.create') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">@lang('dashboard.create_title', ['page_title' => __('dashboard.banner')])</span>
                </a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item menu-sub-indention menu-accordion  {{areActiveRoutes(['initial-pages.index' , 'initial-pages.create' , 'initial-pages.edit'])}}" data-kt-menu-trigger="click">
        <!--begin::Menu link-->
        <a href="#" class="menu-link py-3 {{areActiveRoutes(['initial-pages.index' , 'initial-pages.create' , 'initial-pages.edit'])}}">
            <span class="menu-icon">
                <i class="bi bi-book-half fs-3"></i>
            </span>
            <span class="menu-title">@lang('dashboard.initial_pages')</span>
            <span class="menu-arrow"></span>
        </a>
        <!--end::Menu link-->

        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-accordion pt-3">
            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="{{ route('initial-pages.index') }}" class="menu-link py-3  {{ isActiveRoute('initial-pages.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">@lang('dashboard.all_title', ['page_title' => __('dashboard.initial_pages')])</span>
                </a>
            </div>
            <!--end::Menu item-->

            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="{{route('initial-pages.create')}}" class="menu-link py-3 {{ isActiveRoute('initial-pages.create') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">@lang('dashboard.create_title', ['page_title' => __('dashboard.initial_page')])</span>
                </a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->




    <!--begin::Menu item-->
    <div class="menu-item menu-sub-indention menu-accordion  {{areActiveRoutes(['users.index' , 'users.create' , 'users.edit'])}}" data-kt-menu-trigger="click">
        <!--begin::Menu link-->
        <a href="#" class="menu-link py-3 {{areActiveRoutes(['users.index' , 'users.create' , 'users.edit'])}}">
            <span class="menu-icon">
                <i class="bi bi-people-fill fs-3"></i>
            </span>
            <span class="menu-title">@lang('dashboard.users')</span>
            <span class="menu-arrow"></span>
        </a>
        <!--end::Menu link-->

        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-accordion pt-3">
            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="{{ route('users.index') }}" class="menu-link py-3  {{ isActiveRoute('users.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">@lang('dashboard.all_title', ['page_title' => __('dashboard.users')])</span>
                </a>
            </div>
            <!--end::Menu item-->

            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="{{route('users.create')}}" class="menu-link py-3 {{ isActiveRoute('users.create') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">@lang('dashboard.create_title', ['page_title' => __('dashboard.user')])</span>
                </a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->

    
    <!--Start :Single Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item">
            <a href="{{ route('settings') }}" class="menu-link py-3">
                <span class="menu-icon">
                    <i class="bi bi-gear fs-3"></i>
                </span>
                <span class="menu-title">@lang('dashboard.settings')</span>
            </a>
        </div>
        <!--end::Menu item-->
    <!--End:Single Menu item-->
</div>