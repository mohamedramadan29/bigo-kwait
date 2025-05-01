    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <a href="{{ route('user.account') }}"><i class="la la-home"></i><span class="menu-title"
                            data-i18n="nav.dash.main">
                            الرئيسية </span></a>
                </li>
                <li class="nav-item {{ Route::is('user.ecommerce.plans.*') ? 'active' : '' }}">
                    <a href="#"><i class="bi bi-credit-card"></i><span class="menu-title"
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
                        <a href="#"><i class="bi bi-shop"></i><span class="menu-title" data-i18n="nav.navbars.main">
                                ادارة المتجر </span></a>
                        <ul class="menu-content">
                            <li class="{{ Route::is('user.store-setting.update') ? 'active' : '' }}">
                                <a class="menu-item" href="{{ route('user.store-setting.update') }}"
                                    data-i18n="nav.navbars.nav_light">
                                    الاعدادات العامة </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @if (Auth::user()->store)
                    @can('adminstore')
                        <li class="nav-item {{ Route::is('user.store.categories.*') ? 'active' : '' }}">
                            <a href="#"><i class="la la-navicon"></i><span class="menu-title"
                                    data-i18n="nav.navbars.main"> تصنيفات المنتجات </span></a>
                            <ul class="menu-content">
                                <li class="{{ Route::is('user.store.categories') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('user.store.categories') }}"
                                        data-i18n="nav.navbars.nav_light">
                                        جميع التصنيفات </a>
                                </li>
                                <li class="{{ Route::is('user.store.categories.create') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('user.store.categories.create') }}"
                                        data-i18n="nav.navbars.nav_light">
                                        اضافة تصنيف جديد </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('adminstore')
                        <li class="nav-item {{ Route::is('user.store.brands.*') ? 'active' : '' }}">
                            <a href="#"><i class="la la-copyright"></i><span class="menu-title"
                                    data-i18n="nav.navbars.main"> العلامات التجارية </span></a>
                            <ul class="menu-content">
                                <li class="{{ Route::is('user.store.brands') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('user.store.brands') }}"
                                        data-i18n="nav.navbars.nav_light">
                                        جميع العلامات التجارية </a>
                                </li>
                                <li class="{{ Route::is('user.store.brands.create') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('user.store.brands.create') }}"
                                        data-i18n="nav.navbars.nav_light">
                                        اضافة علامة تجارية </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('adminstore')
                        <li class="nav-item {{ Route::is('user.store.products.*') ? 'active' : '' }}">
                            <a href="#"><i class="la la-navicon"></i><span class="menu-title"
                                    data-i18n="nav.navbars.main"> المنتجات </span></a>
                            <ul class="menu-content">
                                <li class="{{ Route::is('user.store.products') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('user.store.products') }}"
                                        data-i18n="nav.navbars.nav_light">
                                        جميع المنتجات </a>
                                </li>
                                <li class="{{ Route::is('user.store.products.create') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('user.store.products.create') }}"
                                        data-i18n="nav.navbars.nav_light">
                                        اضافة منتج جديد </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @can('adminstore')
                        <li class="nav-item {{ Route::is('user.store.orders.*') ? 'active' : '' }}">
                            <a href="#"><i class="la la-tags"></i><span class="menu-title" data-i18n="nav.navbars.main">
                                    الطلبات علي المتجر </span></a>
                            <ul class="menu-content">
                                <li class="{{ Route::is('user.store.orders.index') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('user.store.orders.index') }}"
                                        data-i18n="nav.navbars.nav_light">
                                        الطلبات علي المتجر </a>
                                </li>

                            </ul>
                        </li>

                    @endcan

                    @can('adminstore')
                        <li class="nav-item {{ Route::is('user.store.coupons.*') ? 'active' : '' }}">
                            <a href="#"><i class="la la-tags"></i><span class="menu-title" data-i18n="nav.navbars.main">
                                    كوبونات الخصم </span></a>
                            <ul class="menu-content">
                                <li class="{{ Route::is('user.store.coupons') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('user.store.coupons.index') }}"
                                        data-i18n="nav.navbars.nav_light">
                                        جميع كوبونات الخصم </a>
                                </li>

                            </ul>
                        </li>
                    @endcan
                    @can('adminstore')
                        <li class="nav-item {{ Route::is('user.store.sliders.*') ? 'active' : '' }}">
                            <a href="#"><i class="la la-tags"></i><span class="menu-title" data-i18n="nav.navbars.main">
                                    بنرات المتجر </span></a>
                            <ul class="menu-content">
                                <li class="{{ Route::is('user.store.sliders') ? 'active' : '' }}">
                                    <a class="menu-item" href="{{ route('user.store.sliders.index') }}"
                                        data-i18n="nav.navbars.nav_light">
                                        جميع البنرات  </a>
                                </li>

                            </ul>
                        </li>
                    @endcan
                    @endif
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
