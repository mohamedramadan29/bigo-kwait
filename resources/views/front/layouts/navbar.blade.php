   <!-- Header Start -->
   <header class="main-header">
       <div class="header-sticky">
           <nav class="navbar navbar-expand-lg">
               <div class="container">
                   <!-- Logo Start -->
                   <a class="navbar-brand" href="{{ url('/') }}">
                       <img width="60" src="{{ $setting->getLogo() }}" alt="Logo" />
                   </a>
                   <!-- Logo End -->
                   <!-- Main Menu Start -->
                   <div class="collapse navbar-collapse main-menu">
                       <div class="nav-menu-wrapper">
                           <ul class="navbar-nav mr-auto" id="menu">
                               <li class="nav-item">
                                   <a class="nav-link" href="{{ route('front.index') }}"> الرئيسية </a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="{{ url('/') }}#about-us"> من نحن </a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="{{ url('/') }}#services"> خدماتنا </a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="{{ url('/contact') }}">تواصل معنا </a>
                               </li>
                           </ul>
                       </div>
                       <!-- Let’s Start Button Start -->
                       <div class="header-btn d-inline-flex">
                           <a href="{{ route('user.login') }}" class="btn-default"> سجل الان  <i class="bi bi-arrow-up-right"></i> </a>
                       </div>
                       <!-- Let’s Start Button End -->
                   </div>
                   <!-- Main Menu End -->

                   <div class="navbar-toggle"></div>
               </div>
           </nav>
           <div class="responsive-menu"></div>
       </div>
   </header>
   <!-- Header End -->
