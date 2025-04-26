    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <a href="{{ route('user.account') }}"><i class="la la-home"></i><span class="menu-title"
                            data-i18n="nav.dash.main">
                            الرئيسية </span></a>
                </li>
                <li class="nav-item">
                    <a href="#"><i class="la la-television"></i><span class="menu-title"
                            data-i18n="nav.templates.main">Templates</span></a>
                    <ul class="menu-content">
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.templates.vert.main">Vertical</a>
                            <ul class="menu-content">
                                <li>
                                    <a class="menu-item" href="../vertical-menu-template"
                                        data-i18n="nav.templates.vert.classic_menu">Classic Menu</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="../vertical-modern-menu-template">Modern Menu</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="../vertical-compact-menu-template"
                                        data-i18n="nav.templates.vert.compact_menu">Compact Menu</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="../vertical-content-menu-template"
                                        data-i18n="nav.templates.vert.content_menu">Content Menu</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="../vertical-overlay-menu-template"
                                        data-i18n="nav.templates.vert.overlay_menu">Overlay Menu</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.templates.horz.main">Horizontal</a>
                            <ul class="menu-content">
                                <li>
                                    <a class="menu-item" href="../horizontal-menu-template"
                                        data-i18n="nav.templates.horz.classic">Classic</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="../horizontal-menu-template-nav"
                                        data-i18n="nav.templates.horz.top_icon">Full Width</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="navigation-header">
                    <span data-i18n="nav.category.layouts">Layouts</span><i class="la la-ellipsis-h ft-minus"
                        data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
                </li>
                <li class="nav-item">
                    <a href="#"><i class="la la-columns"></i><span class="menu-title"
                            data-i18n="nav.page_layouts.main">Page layouts</span><span
                            class="badge badge badge-pill badge-danger float-right mr-2">New</span></a>
                    <ul class="menu-content">
                        <li>
                            <a class="menu-item" href="layout-1-column.html" data-i18n="nav.page_layouts.1_column">1
                                column</a>
                        </li>
                        <li>
                            <a class="menu-item" href="layout-2-columns.html" data-i18n="nav.page_layouts.2_columns">2
                                columns</a>
                        </li>
                        <li>
                            <a class="menu-item" href="#" data-i18n="nav.page_layouts.3_columns.main">Content
                                Sidebar</a>
                            <ul class="menu-content">
                                <li>
                                    <a class="menu-item" href="layout-content-left-sidebar.html"
                                        data-i18n="nav.page_layouts.3_columns.left_sidebar">Left sidebar</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="layout-content-left-sticky-sidebar.html"
                                        data-i18n="nav.page_layouts.3_columns.left_sticky_sidebar">Left sticky
                                        sidebar</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="layout-content-right-sidebar.html"
                                        data-i18n="nav.page_layouts.3_columns.right_sidebar">Right sidebar</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="layout-content-right-sticky-sidebar.html"
                                        data-i18n="nav.page_layouts.3_columns.right_sticky_sidebar">Right sticky
                                        sidebar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-item" href="#"
                                data-i18n="nav.page_layouts.3_columns_detached.main">Content Det. Sidebar</a>
                            <ul class="menu-content">
                                <li>
                                    <a class="menu-item" href="layout-content-detached-left-sidebar.html"
                                        data-i18n="nav.page_layouts.3_columns_detached.detached_left_sidebar">Detached
                                        left sidebar</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="layout-content-detached-left-sticky-sidebar.html"
                                        data-i18n="nav.page_layouts.3_columns_detached.detached_sticky_left_sidebar">Detached
                                        sticky left sidebar</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="layout-content-detached-right-sidebar.html"
                                        data-i18n="nav.page_layouts.3_columns_detached.detached_right_sidebar">Detached
                                        right sidebar</a>
                                </li>
                                <li>
                                    <a class="menu-item" href="layout-content-detached-right-sticky-sidebar.html"
                                        data-i18n="nav.page_layouts.3_columns_detached.detached_sticky_right_sidebar">Detached
                                        sticky right sidebar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="navigation-divider"></li>
                        <li>
                            <a class="menu-item" href="layout-fixed-navbar.html"
                                data-i18n="nav.page_layouts.fixed_navbar">Fixed navbar</a>
                        </li>
                        <li>
                            <a class="menu-item" href="layout-fixed-navigation.html"
                                data-i18n="nav.page_layouts.fixed_navigation">Fixed navigation</a>
                        </li>
                        <li>
                            <a class="menu-item" href="layout-fixed-navbar-navigation.html"
                                data-i18n="nav.page_layouts.fixed_navbar_navigation">Fixed navbar &amp; navigation</a>
                        </li>
                        <li>
                            <a class="menu-item" href="layout-fixed-navbar-footer.html"
                                data-i18n="nav.page_layouts.fixed_navbar_footer">Fixed navbar &amp; footer</a>
                        </li>
                        <li class="navigation-divider"></li>
                        <li>
                            <a class="menu-item" href="layout-fixed.html"
                                data-i18n="nav.page_layouts.fixed_layout">Fixed layout</a>
                        </li>
                        <li>
                            <a class="menu-item" href="layout-boxed.html"
                                data-i18n="nav.page_layouts.boxed_layout">Boxed layout</a>
                        </li>
                        <li>
                            <a class="menu-item" href="layout-static.html"
                                data-i18n="nav.page_layouts.static_layout">Static layout</a>
                        </li>
                        <li class="navigation-divider"></li>
                        <li>
                            <a class="menu-item" href="layout-light.html"
                                data-i18n="nav.page_layouts.light_layout">Light layout</a>
                        </li>
                        <li>
                            <a class="menu-item" href="layout-dark.html"
                                data-i18n="nav.page_layouts.dark_layout">Dark layout</a>
                        </li>
                        <li>
                            <a class="menu-item" href="layout-semi-dark.html"
                                data-i18n="nav.page_layouts.semi_dark_layout">Semi dark layout</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Route::is('user.ecommerce.plans.*') ? 'active' : '' }}">
                    <a href="#"><i class="la la-navicon"></i><span class="menu-title"
                            data-i18n="nav.navbars.main"> الخطط والخدمات </span></a>
                    <ul class="menu-content">
                        <li class="{{ Route::is('user.ecommerce.plans') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('user.ecommerce.plans') }}"
                                data-i18n="nav.navbars.nav_light">
                                خطط و خدمات التجارة الالكترونية </a>
                        </li>
                        <li class="{{ Route::is('user.ecommerce.mysubscribe') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('user.ecommerce.mysubscribe') }}"
                                data-i18n="nav.navbars.nav_dark">
                                خططي </a>
                        </li>
                    </ul>
                </li>
                @can('adminstore')
                    <li class="nav-item {{ Route::is('user.store-setting.*') ? 'active' : '' }}">
                        <a href="#"><i class="la la-navicon"></i><span class="menu-title"
                                data-i18n="nav.navbars.main"> ادارة المتجر </span></a>
                        <ul class="menu-content">
                            <li class="{{ Route::is('user.store-setting.update') ? 'active' : '' }}">
                                <a class="menu-item" href="{{ route('user.store-setting.update') }}"
                                    data-i18n="nav.navbars.nav_light">
                                    الاعدادات العامة  </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <li class="nav-item {{ Route::is('user.update_profile.*') ? 'active' : '' }}"><a href="#"><i
                            class="la la-user"></i><span class="menu-title" data-i18n="nav.users.main"> ادارة
                            حسابي
                        </span></a>
                    <ul class="menu-content">
                        <li class="{{ Route::is('user.update_profile') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('user.update_profile') }}"
                                data-i18n="nav.users.user_profile"> تعديل البيانات
                            </a>
                        </li>
                        <li class="{{ Route::is('user.update_password') ? 'active' : '' }}">
                            <a class="menu-item" href="{{ route('user.update_password') }}"
                                data-i18n="nav.users.user_profile"> تعديل كلمة المرور
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
