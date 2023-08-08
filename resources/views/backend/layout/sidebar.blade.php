 <!--begin::Sidebar-->
 <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
     <!--begin::Logo-->
     <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
         <!--begin::Logo image-->
         <a href="{{ route('dashboard') }}">
             <img alt="Logo" src="{{ asset('storage/' . siteSetting('header_logo')) }}"
                 class="h-25px app-sidebar-logo-default" />
             <img alt="Logo" src="{{ asset('storage/' . siteSetting('favicon')) }}"
                 class="h-20px app-sidebar-logo-minimize" />
         </a>
         <div id="kt_app_sidebar_toggle"
             class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
             <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                 <span class="path1"></span>
                 <span class="path2"></span>
             </i>
         </div>
         <!--end::Sidebar toggle-->
     </div>
     <!--end::Logo-->
     <!--begin::sidebar menu-->
     <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
         <!--begin::Menu wrapper-->
         <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
             <!--begin::Scroll wrapper-->
             <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                 data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                 data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                 data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                 data-kt-scroll-save-state="true">
                 <!--begin::Menu-->
                 <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6"
                     id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                     <!--begin:Dashboard Menu-->
                     <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                         <!--begin:Menu link-->
                         <a href="{{ route('dashboard') }}">
                             <span
                                 class="menu-link {{ Route::getCurrentRoute()->uri() == 'dashboard' ? 'active' : '' }}">
                                 <span class="menu-icon">
                                     <i class="ki-duotone ki-element-11 fs-2">
                                         <span class="path1"></span>
                                         <span class="path2"></span>
                                         <span class="path3"></span>
                                         <span class="path4"></span>
                                     </i>
                                 </span>
                                 <span class="menu-title">Dashboards</span>
                             </span>
                         </a>
                         <!--end:Menu link-->
                     </div>
                     <!--end:Dashboard Menu-->

                     <!--begin: Users Menu -->
                     <div data-kt-menu-trigger="click"
                         class="menu-item here {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/user') === 0 ? 'show' : '' }} menu-accordion">
                         <!--begin:Menu link-->
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <i class="ki-duotone ki-element-11 fs-2">
                                     <span class="path1"></span>
                                     <span class="path2"></span>
                                     <span class="path3"></span>
                                     <span class="path4"></span>
                                 </i>
                             </span>
                             <span class="menu-title">User Management</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <!--end:Menu link-->
                         <!--begin:Menu sub-->
                         <div class="menu-sub menu-sub-accordion">
                             <!--begin:Menu item-->
                             <div class="menu-item">
                                 <!--begin:Menu link-->
                                 <a class="menu-link {{ Route::getCurrentRoute()->uri() == 'dashboard/user/index' ? 'active' : '' }}"
                                     href="{{ route('user.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">Users List</span>
                                 </a>
                                 <!--end:Menu link-->
                             </div>
                             <!--end:Menu item-->
                         </div>
                         <!--end:Menu sub-->
                     </div>
                     <!--end: Users Menu -->

                     <!--begin: Pages Menu-->
                     <div data-kt-menu-trigger="click"
                         class="menu-item {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page') === 0 ? 'show' : '' }} menu-accordion">
                         <!--begin:Menu link-->
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <i class="ki-duotone ki-abstract-28 fs-2">
                                     <span class="path1"></span>
                                     <span class="path2"></span>
                                 </i>
                             </span>
                             <span class="menu-title">Pages</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <!--end:Menu link-->
                         <!--begin:Menu sub-->
                         <div class="menu-sub menu-sub-accordion">
                             <!--begin:Menu item-->
                             <div data-kt-menu-trigger="click"
                                 class="menu-item {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page/home') === 0 ? 'show' : '' }} menu-accordion mb-1">
                                 <!--begin:Menu link-->
                                 <span class="menu-link">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">Home</span>
                                     <span class="menu-arrow"></span>
                                 </span>
                                 <!--end:Menu link-->
                                 <!--begin:Menu sub-->
                                 <div class="menu-sub menu-sub-accordion">
                                     <!--begin:Menu item-->
                                     <div class="menu-item">
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ Route::getCurrentRoute()->uri() == 'dashboard/page/home/hero/index' ? 'active' : '' }}"
                                             href="{{ route('pages.home.hero.index') }}">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">Hero Section</span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                 </div>
                                 <!--end:Menu sub-->
                                 <!--begin:Menu sub-->
                                 <div class="menu-sub menu-sub-accordion">
                                     <!--begin:Menu item-->
                                     <div class="menu-item">
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page/home/promo') === 0 ? 'active' : '' }}"
                                             href="{{ route('pages.home.promo.index') }}">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">Promo Section</span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                 </div>
                                 <!--end:Menu sub-->
                                 <!--begin:Menu sub-->
                                 <div class="menu-sub menu-sub-accordion">
                                     <!--begin:Menu item-->
                                     <div class="menu-item">
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ Route::getCurrentRoute()->uri() == 'dashboard/page/home/about/index' ? 'active' : '' }}"
                                             href="{{ route('pages.home.about.index') }}">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">About Section</span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                 </div>
                                 <!--end:Menu sub-->

                                 <!--begin:Menu sub-->
                                 <div class="menu-sub menu-sub-accordion">
                                     <!--begin:Menu item-->
                                     <div class="menu-item">
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page/home/service') === 0 ? 'active' : '' }}"
                                             href="{{ route('pages.home.service.index') }}">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">Services Section</span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                 </div>
                                 <!--end:Menu sub-->

                                 <!--begin:Menu sub-->
                                 <div class="menu-sub menu-sub-accordion">
                                     <!--begin:Menu item-->
                                     <div class="menu-item">
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page/home/testimonial') === 0 ? 'active' : '' }}"
                                             href="{{ route('pages.home.testimonial.index') }}">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">Testimonial Section</span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                 </div>
                                 <!--end:Menu sub-->

                                 <!--begin:Menu sub-->
                                 <div class="menu-sub menu-sub-accordion">
                                     <!--begin:Menu item-->
                                     <div class="menu-item">
                                         <!--begin:Menu link-->
                                         <a class="menu-link {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page/home/contact') === 0 ? 'active' : '' }}"
                                             href="{{ route('pages.home.contact.index') }}">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">Contact Section</span>
                                         </a>
                                         <!--end:Menu link-->
                                     </div>
                                     <!--end:Menu item-->
                                 </div>
                                 <!--end:Menu sub-->
                             </div>
                             <!--end:Menu item-->

                             <!--begin:Menu item-->
                             <div class="menu-item">
                                 <!--begin:Menu link-->
                                 <a class="menu-link {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page/faq/') === 0 ? 'active' : '' }}"
                                     href="{{ route('pages.faq.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">FAQ</span>
                                 </a>
                                 <!--end:Menu link-->
                             </div>
                             <!--end:Menu item-->

                             <!--begin:Menu item-->
                             <div class="menu-item">
                                 <!--begin:Menu link-->
                                 <a class="menu-link {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page/refund/') === 0 ? 'active' : '' }}"
                                     href="{{ route('pages.refund.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">Refund</span>
                                 </a>
                                 <!--end:Menu link-->
                             </div>
                             <!--end:Menu item-->

                             <!--begin:Menu item-->
                             <div class="menu-item">
                                 <!--begin:Menu link-->
                                 <a class="menu-link {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page/privacy-policy/') === 0 ? 'active' : '' }}"
                                     href="{{ route('pages.privacy-policy.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">Privacy Policy</span>
                                 </a>
                                 <!--end:Menu link-->
                             </div>
                             <!--end:Menu item-->

                             <!--begin:Menu item-->
                             <div class="menu-item">
                                 <!--begin:Menu link-->
                                 <a class="menu-link {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page/reseller-rules/') === 0 ? 'active' : '' }}"
                                     href="{{ route('pages.reseller-rules.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">Reseller Rules</span>
                                 </a>
                                 <!--end:Menu link-->
                             </div>
                             <!--end:Menu item-->

                             <!--begin:Menu item-->
                             <div class="menu-item">
                                 <!--begin:Menu link-->
                                 <a class="menu-link {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/page/terms-condition/') === 0 ? 'active' : '' }}"
                                     href="{{ route('pages.terms-condition.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">Terms & Condition</span>
                                 </a>
                                 <!--end:Menu link-->
                             </div>
                             <!--end:Menu item-->

                         </div>
                         <!--end:Menu sub-->
                     </div>
                     <!--end:Menu item-->


                     <!--begin: Site Menu -->
                     <div data-kt-menu-trigger="click"
                         class="menu-item here {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/sites') === 0 ? 'show' : '' }} menu-accordion">
                         <!--begin:Menu link-->
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <i class="ki-duotone ki-element-11 fs-2">
                                     <span class="path1"></span>
                                     <span class="path2"></span>
                                     <span class="path3"></span>
                                     <span class="path4"></span>
                                 </i>
                             </span>
                             <span class="menu-title">Sites</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <!--end:Menu link-->
                         <!--begin:Menu sub-->
                         <div class="menu-sub menu-sub-accordion">
                             <!--begin:Menu item-->
                             <div class="menu-item">
                                 <!--begin:Menu link-->
                                 <a class="menu-link {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/sites') === 0 ? 'active' : '' }}"
                                     href="{{ route('sites.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">All Sites</span>
                                 </a>
                                 <!--end:Menu link-->
                             </div>
                             <!--end:Menu item-->
                         </div>
                         <!--end:Menu sub-->
                     </div>
                     <!--end: Site Menu -->


                     <!--begin: Settings Menu -->
                     <div data-kt-menu-trigger="click"
                         class="menu-item here {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/newsletter') === 0 ? 'show' : '' }} || {{ Route::getCurrentRoute()->uri() == 'dashboard/settings/smtp/index' ? 'show' : '' }} menu-accordion">
                         <!--begin:Menu link-->
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <i class="ki-duotone ki-element-11 fs-2">
                                     <span class="path1"></span>
                                     <span class="path2"></span>
                                     <span class="path3"></span>
                                     <span class="path4"></span>
                                 </i>
                             </span>
                             <span class="menu-title">Newsletter</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <!--end:Menu link-->
                         <!--begin:Menu sub-->
                         <div class="menu-sub menu-sub-accordion">
                             <!--begin:Menu item-->
                             <div class="menu-item">
                                 <!--begin:Menu link-->
                                 <a class="menu-link {{ Route::getCurrentRoute()->uri() == 'dashboard/newsletter/index' ? 'active' : '' }}"
                                     href="{{ route('newsletter.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">Subscribers List</span>
                                 </a>
                                 <!--end:Menu link-->
                             </div>
                             <!--end:Menu item-->
                         </div>
                         <!--end:Menu sub-->
                     </div>
                     <!--end: Settings Menu -->

                     <!--begin: Settings Menu -->
                     <div data-kt-menu-trigger="click"
                         class="menu-item here {{ strpos(Route::getCurrentRoute()->uri(), 'dashboard/general') === 0 ? 'show' : '' }} || {{ Route::getCurrentRoute()->uri() == 'dashboard/settings/smtp/index' ? 'show' : '' }} menu-accordion">
                         <!--begin:Menu link-->
                         <span class="menu-link">
                             <span class="menu-icon">
                                 <i class="ki-duotone ki-element-11 fs-2">
                                     <span class="path1"></span>
                                     <span class="path2"></span>
                                     <span class="path3"></span>
                                     <span class="path4"></span>
                                 </i>
                             </span>
                             <span class="menu-title">Settings</span>
                             <span class="menu-arrow"></span>
                         </span>
                         <!--end:Menu link-->
                         <!--begin:Menu sub-->
                         <div class="menu-sub menu-sub-accordion">
                             <!--begin:Menu item-->
                             <div class="menu-item">
                                 <!--begin:Menu link-->
                                 <a class="menu-link {{ Route::getCurrentRoute()->uri() == 'dashboard/general/setting' ? 'active' : '' }}"
                                     href="{{ route('general.setting.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">General Settings</span>
                                 </a>
                                 <!--end:Menu link-->
                             </div>
                             <!--end:Menu item-->
                         </div>
                         <!--end:Menu sub-->

                         <!--begin:Menu sub-->
                         <div class="menu-sub menu-sub-accordion">
                             <!--begin:Menu item-->
                             <div class="menu-item">
                                 <!--begin:Menu link-->
                                 <a class="menu-link {{ Route::getCurrentRoute()->uri() == 'dashboard/settings/smtp/index' ? 'active' : '' }}"
                                     href="{{ route('smtp.index') }}">
                                     <span class="menu-bullet">
                                         <span class="bullet bullet-dot"></span>
                                     </span>
                                     <span class="menu-title">SMTP Settings</span>
                                 </a>
                                 <!--end:Menu link-->
                             </div>
                             <!--end:Menu item-->
                         </div>
                         <!--end:Menu sub-->
                     </div>
                     <!--end: Settings Menu -->


                 </div>
                 <!--end::Menu-->
             </div>
             <!--end::Scroll wrapper-->
         </div>
         <!--end::Menu wrapper-->
     </div>
     <!--end::sidebar menu-->
 </div>
 <!--end::Sidebar-->
