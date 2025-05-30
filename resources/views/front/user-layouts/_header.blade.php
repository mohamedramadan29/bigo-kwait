    <!-- fixed-top-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light  navbar-shadow" style="background-color: {{ $setting['main_color'] }}">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="index.html">
                            <img class="brand-logo" alt="modern admin logo" src="{{ $setting->getLogo() }}" />
                            <h3 class="brand-text">{{ $setting['name'] }}</h3>
                        </a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                                class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ft-menu"></i></a>
                        </li>

                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <span class="mr-1"> مرحبا ,
                                    <span class="user-name text-bold-700"> {{ Auth::user()->name }} </span>
                                </span>
                                <span class="avatar avatar-online">
                                    @if (!Auth::user()->image)
                                        <img src="{{ asset('assets/front/user-dashboard/images/avatar.png') }}"
                                            alt="{{ Auth::user()->name }}"><i></i>
                                    @else
                                        <img src="{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}"><i></i>
                                    @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('user.update_profile') }}"><i
                                        class="ft-user"></i> تعديل البيانات </a>
                                <a class="dropdown-item" href="{{ route('user.update_password') }}"><i
                                        class="ft-lock"></i> تغير كلمة المرور </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('user.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item" href="#"><i class="ft-power"></i>
                                        تسجبل الخروج </button>
                                </form>
                            </div>
                        </li>

                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i
                                    class="ficon ft-bell"></i>
                                <span
                                    class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                        <span class="grey darken-2">الإشعارات</span>
                                    </h6>
                                    <span class="notification-tag badge badge-default badge-danger float-right m-0">5
                                        جديد</span>
                                </li>
                                <li class="scrollable-container media-list w-100">
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center">
                                                <i class="ft-plus-square icon-bg-circle bg-cyan"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">You have new order!</h6>
                                                <p class="notification-text font-small-3 text-muted">
                                                    Lorem ipsum dolor sit amet, consectetuer elit.
                                                </p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-menu-footer">
                                    <a id="mark-all-read" class="text-center dropdown-item text-muted"
                                        href="{{ route('dashboard.all_read') }}">
                                        جعل جميع الإشعارات مقروءة
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i
                                    class="ficon ft-mail"> </i></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                        <span class="grey darken-2"> الرسائل </span>
                                    </h6>
                                    <span class="notification-tag badge badge-default badge-warning float-right m-0">0
                                        جديد</span>
                                </li>
                                <li class="scrollable-container media-list w-100">
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="avatar avatar-sm avatar-online rounded-circle">
                                                    <img src="{{ asset('assets/front/user-dashboard/') }}/images/portrait/small/avatar-s-19.png"
                                                        alt="avatar" /><i></i></span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading"> {{ Auth::user()->name }} </h6>
                                                <p class="notification-text font-small-3 text-muted">
                                                    {{ Auth::user()->name }}
                                                </p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Today</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-menu-footer">
                                    <a class="dropdown-item text-muted text-center" href="javascript:void(0)"> <i
                                            class="ft-mail"></i> جعل جميع الرسائل مقروءة </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
