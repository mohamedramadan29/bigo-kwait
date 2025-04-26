  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class="nav-item {{ Route::is('dashboard.welcome') ? 'active' : '' }}"><a
                      href="{{ route('dashboard.welcome') }}"><i class="la la-home"></i><span class="menu-title"
                          data-i18n="nav.dash.main">الرئيسية</span></a>
              </li>
              @can('ecommerce-plans')
                  <li class="nav-item{{ Route::is('dashboard.ecommerce-plans.*') ? 'active' : '' }}"><a href="#"><i
                              class="bi bi-credit-card"></i><span class="menu-title" data-i18n="nav.users.main">
                              ادارة خطط التجارة الالكترونية
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.ecommerce-plans.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.ecommerce-plans.index') }}"
                                  data-i18n="nav.users.user_profile"> جميع خطط التجارة الالكترونية
                              </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('companies')
                  <li class="nav-item {{ Route::is('dashboard.companies.*') ? 'active' : '' }}"><a href="#"><i
                              class="la la-building"></i><span class="menu-title" data-i18n="nav.role.main"> الشركات
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.companies.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.companies.index') }}"
                                  data-i18n="nav.role.index">
                                  جميع الشركات </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('users')
                  <li class="nav-item {{ Route::is('dashboard.users.*') ? 'active' : '' }}"><a href="#"><i
                              class="la la-users"></i><span class="menu-title" data-i18n="nav.role.main"> الافراد
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.users.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.users.index') }}" data-i18n="nav.role.index">
                                  جميع الافراد </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('superadmin')
                  <li class="nav-item{{ Route::is('dashboard.admins.*') ? 'active' : '' }}"><a href="#"><i
                              class="bi bi-person-lines-fill"></i><span class="menu-title" data-i18n="nav.users.main">
                              الادارين
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.admins.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.admins.index') }}"
                                  data-i18n="nav.users.user_profile"> الادارين
                              </a>
                          </li>

                          <li class="{{ Route::is('dashboard.admins.create') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.admins.create') }}"
                                  data-i18n="nav.users.user_cards"> اضافة اداري </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('payment_transactions')
                  <li class="nav-item{{ Route::is('dashboard.payments.*') ? 'active' : '' }}"><a href="#"><i
                              class="bi bi-credit-card"></i><span class="menu-title" data-i18n="nav.users.main"> عمليات
                              الدفع
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.payments.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.payments.index') }}"
                                  data-i18n="nav.users.user_profile"> عمليات الدفع
                              </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('stores')
                  <li class="nav-item{{ Route::is('dashboard.stores.*') ? 'active' : '' }}"><a href="#"><i
                              class="bi bi-shop"></i><span class="menu-title" data-i18n="nav.users.main"> ادارة المتاجر
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.stores.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.stores.index') }}"
                                  data-i18n="nav.users.user_profile"> ادارة المتاجر
                              </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('products')
                  <li class="nav-item{{ Route::is('dashboard.categories.*') ? 'active' : '' }}"><a href="#"><i
                              class="la la-list"></i><span class="menu-title" data-i18n="nav.users.main"> تصنيفات المنتجات
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.categories.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.categories.index') }}"
                                  data-i18n="nav.users.user_profile"> تصنيفات المنتجات
                              </a>
                          </li>

                          <li class="{{ Route::is('dashboard.categories.create') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.categories.create') }}"
                                  data-i18n="nav.users.user_cards"> اضافة تصنيف جديد </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('brands')
                  <li class="nav-item{{ Route::is('dashboard.brands.*') ? 'active' : '' }}"><a href="#"><i
                              class="la la-copyright"></i><span class="menu-title" data-i18n="nav.users.main"> العلامات
                              التجارية
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.brands.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.brands.index') }}"
                                  data-i18n="nav.users.user_profile"> العلامات التجارية
                              </a>
                          </li>

                          <li class="{{ Route::is('dashboard.brands.create') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.brands.create') }}"
                                  data-i18n="nav.users.user_cards"> اضافة علامة تجارية </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('categories')
                  <li class="nav-item{{ Route::is('dashboard.products.*') ? 'active' : '' }}"><a href="#"><i
                              class="la la-list"></i><span class="menu-title" data-i18n="nav.users.main"> ادارة المنتجات
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.products.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.products.index') }}"
                                  data-i18n="nav.users.user_profile"> المنتجات
                              </a>
                          </li>

                          <li class="{{ Route::is('dashboard.products.create') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.products.create') }}"
                                  data-i18n="nav.users.user_cards"> اضافة منتج جديد </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('orders')
                  <li class="nav-item{{ Route::is('dashboard.orders.*') ? 'active' : '' }}"><a href="#"><i
                              class="la la-list"></i><span class="menu-title" data-i18n="nav.users.main"> ادارة الطلبات
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.orders.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.orders.index') }}"
                                  data-i18n="nav.users.user_profile"> الطلبات
                              </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('coupons')
                  <li class="nav-item{{ Route::is('dashboard.coupons.*') ? 'active' : '' }}"><a href="#"><i
                              class="la la-tag"></i><span class="menu-title" data-i18n="nav.users.main"> كوبونات الخصم
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.coupons.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.coupons.index') }}"
                                  data-i18n="nav.users.user_profile"> جميع الكوبونات
                              </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('shipping')
                  <li class="nav-item{{ Route::is('dashboard.shipping.*') ? 'active' : '' }}"><a href="#"><i
                              class="la la-globe"></i><span class="menu-title" data-i18n="nav.users.main"> ادارة الشحن
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.shipping.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.shipping.index') }}"
                                  data-i18n="nav.users.user_profile"> جميع الدول
                              </a>
                          </li>
                      </ul>
                  </li>
              @endcan
              @can('roles')
                  <li class="nav-item {{ Route::is('dashboard.roles.*') ? 'active' : '' }}"><a href="#"><i
                              class="la la-television"></i><span class="menu-title" data-i18n="nav.role.main"> الصلاحيات
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.roles.index') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.roles.index') }}"
                                  data-i18n="nav.role.index">
                                  جميع الصلاحيات </a>
                          </li>
                          <li class="{{ Route::is('dashboard.roles.create') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.roles.create') }}"
                                  data-i18n="nav.templates.vert.classic_menu"> <i class="la la-plus"></i> <span
                                      class="menu-title""> اضافة صلاحية </a>
                          </li>
                      </ul>
                  </li>
              @endcan

              <li class="nav-item {{ Route::is('dashboard.update_profile.*') ? 'active' : '' }}"><a href="#"><i
                          class="la la-user"></i><span class="menu-title" data-i18n="nav.users.main"> ادارة
                          حسابي
                      </span></a>
                  <ul class="menu-content">
                      <li class="{{ Route::is('dashboard.update_profile') ? 'active' : '' }}">
                          <a class="menu-item" href="{{ route('dashboard.update_profile') }}"
                              data-i18n="nav.users.user_profile"> تعديل البيانات
                          </a>
                      </li>
                      <li class="{{ Route::is('dashboard.update_password') ? 'active' : '' }}">
                          <a class="menu-item" href="{{ route('dashboard.update_password') }}"
                              data-i18n="nav.users.user_profile"> تعديل كلمة المرور
                          </a>
                      </li>
                  </ul>
              </li>

              @can('setting')
                  <li class="nav-item{{ Route::is('dashboard.settings.*') ? 'active' : '' }}"><a href="#"><i
                              class="la la-list"></i><span class="menu-title" data-i18n="nav.users.main"> الاعدادات
                              العامة
                          </span></a>
                      <ul class="menu-content">
                          <li class="{{ Route::is('dashboard.settings.update') ? 'active' : '' }}">
                              <a class="menu-item" href="{{ route('dashboard.settings.update') }}"
                                  data-i18n="nav.users.user_profile"> الاعدادات العامة
                              </a>
                          </li>
                      </ul>
                  </li>
              @endcan

          </ul>
      </div>
  </div>
