<!-- ========== Left Sidebar Start ========== -->
@php
    $currentRouteName = \Illuminate\Support\Facades\Route::currentRouteName();
    $current = \Illuminate\Support\Facades\Route::current();
    $currentID = isset($current->parameters['id']) ? $current->parameters['id'] : '';
@endphp
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ !empty($configSystem['website_logo']) ? $configSystem['website_logo'] : asset('images/logo-default.png') }}"
                class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">
                {{ !empty($configSystem['website_name']) ? $configSystem['website_name'] : 'Cloudzone' }}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="{{ $currentRouteName == 'admin.home' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.home') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        {{-- KHÁCH HÀNG --}}
        <li class="menu-label">KHÁCH HÀNG</li>
        <li class="{{ $currentRouteName == 'admin.user' ? 'mm-active' : '' }}">
            <a href="javascript:void(0)" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user'></i></div>
                <div class="menu-title">Customers</div>
            </a>
            <ul class="{{ $currentRouteName == 'admin.user' ? 'mm-show' : '' }}">
                <li class="{{ $currentRouteName == 'admin.user' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.user') }}"><i class="bx bx-right-arrow-alt"></i>Quản lý người dùng</a>
                </li>
                <li class="{{ $currentRouteName == 'admin.hire' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.hire') }}"><i class="bx bx-right-arrow-alt"></i>Quản lý Hire Partner</a>
                </li>
                <li class="{{ $currentRouteName == 'admin.refer' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.refer') }}"><i class="bx bx-right-arrow-alt"></i>Quản lý Refer Partner</a>
                </li>
            </ul>
        </li>
        {{-- ./KHÁCH HÀNG --}}

        {{-- ĐƠN HÀNG --}}
        <li class="menu-label">ĐƠN HÀNG</li>
        <li class="{{ $currentRouteName == 'admin.order' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.order') }}">
                <div class="parent-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-width="2">
                            <rect width="14" height="17" x="5" y="4" rx="2" />
                            <path stroke-linecap="round" d="M9 9h6m-6 4h6m-6 4h4" />
                        </g>
                    </svg>
                </div>
                <div class="menu-title">Quản lý đơn hàng</div>
            </a>
        </li>
        {{-- ./ĐƠN HÀNG --}}

        {{-- SẢN PHẨM --}}
        <li class="menu-label">SẢN PHẢM</li>
        <li class="{{ $currentRouteName == 'admin.categoryPost' ? 'mm-active' : '' }}">
            <a href="javascript:void(0)" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-box'></i></div>
                <div class="menu-title">Quản lý sản phẩm</div>
            </a>
            <ul class="{{ $currentRouteName == 'admin.category' ? 'mm-show' : '' }}">
                <li class="{{ $currentRouteName == 'admin.category' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.category') }}"><i class="bx bx-right-arrow-alt"></i>Ngành hàng</a>
                </li>
                <li class="{{ $currentRouteName == 'admin.group-product.index' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.group-product.index') }}"><i class="bx bx-right-arrow-alt"></i>Nhóm sản
                        phẩm</a>
                </li>
                <li class="{{ $currentRouteName == 'admin.product' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.product') }}"><i class="bx bx-right-arrow-alt"></i>Sản phẩm</a>
                </li>
            </ul>
        </li>
        {{-- ./SẢN PHẨM --}}

        {{-- CARD --}}
        <li class="menu-label">CARD</li>
        <li class="{{ $currentRouteName == 'admin.card-provider' || $currentRouteName == 'admin.card-exchanger' ? 'mm-active' : '' }}">
            <a href="javascript:void(0)" class="has-arrow">
                <div class="parent-icon"><i class="fadeIn animated bx bx-credit-card-front"></i></div>
                <div class="menu-title">Quản lý card</div>
            </a>
            <ul class="{{ $currentRouteName == 'admin.card-provider' || $currentRouteName == 'admin.card-exchanger' ? 'mm-show' : '' }}">
                <li class="{{ $currentRouteName == 'admin.card-provider' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.card-provider') }}"><i class="bx bx-right-arrow-alt"></i>Nhà cung cấp thẻ</a>
                </li>
                <li class="{{ $currentRouteName == 'admin.card-exchanger' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.card-exchanger') }}"><i class="bx bx-right-arrow-alt"></i>Trao đổi thẻ</a>
                </li>
            </ul>
        </li>
        {{-- ./CARD --}}

        {{-- KOL --}}
        <li class="menu-label">KOL</li>
        <li class="{{ $currentRouteName == 'admin.kol' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.kol') }}">
                <div class="parent-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M20.29 8.29L16 12.58l-1.3-1.29l-1.41 1.42l2.7 2.7l5.72-5.7zM4 8a3.91 3.91 0 0 0 4 4a3.91 3.91 0 0 0 4-4a3.91 3.91 0 0 0-4-4a3.91 3.91 0 0 0-4 4m6 0a1.91 1.91 0 0 1-2 2a1.91 1.91 0 0 1-2-2a1.91 1.91 0 0 1 2-2a1.91 1.91 0 0 1 2 2M4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z" />
                    </svg>
                </div>
                <div class="menu-title">Quản lý KOL</div>
            </a>
        </li>
        {{-- ./KOL --}}


        {{-- SLIDER --}}
        <li class="menu-label">Slider</li>
        <li class="{{ $currentRouteName == 'admin.slider' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.slider.index') }}">
                <div class="parent-icon">
                    <i class='fadeIn animated bx bx-slider'></i>
                </div>
                <div class="menu-title">Quản lý Slider</div>
            </a>
        </li>
        {{-- ./SLIDER --}}

        {{-- PROMO CODE --}}
        <li class="menu-label">MÃ GIẢM GIÁ</li>
        <li class="{{ $currentRouteName == 'admin.promo_code' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.promo_code') }}">
                <div class="parent-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2M4 18V6h16v12z" />
                        <path fill="currentColor" d="M6 8h2v8H6zm3 0h1v8H9zm8 0h1v8h-1zm-4 0h3v8h-3zm-2 0h1v8h-1z" />
                    </svg></div>
                <div class="menu-title">Mã giảm giá</div>
            </a>
        </li>
        {{-- ./PROMO CODE --}}

        {{-- FEEDBACK --}}
        <li class="menu-label">FEEDBACK</li>
        <li class="{{ $currentRouteName == 'admin.feedback' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.feedback') }}">
                <div class="parent-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M14.77 12.4c.15.07.32.1.48.1c.33 0 .64-.13.88-.36L18.31 10h.94C20.77 10 22 8.77 22 7.25v-2.5C22 3.23 20.77 2 19.25 2h-4.5C13.23 2 12 3.23 12 4.75v2.5c0 1.26.85 2.32 2 2.65v1.35c0 .5.31.95.77 1.15M8 13.5c-1.93 0-3.5-1.57-3.5-3.5S6.07 6.5 8 6.5s3.5 1.57 3.5 3.5s-1.57 3.5-3.5 3.5M8 22c-2.06 0-3.64-.56-4.7-1.67c-1.336-1.404-1.303-3.174-1.3-3.357v-.013C2 15.89 2.9 15 4 15h8c1.1 0 2 .9 2 2l.001.006c.003.127.045 1.91-1.3 3.324C11.64 21.44 10.06 22 8 22" />
                    </svg>
                </div>
                <div class="menu-title">Feedback</div>
            </a>
        </li>
        {{-- ./PROMO CODE --}}

        {{-- KHÁCH HÀNG --}}
        <li class="menu-label">Bài viết</li>
        <li
            class="{{ $currentRouteName == 'admin.categoryPost' ||
            $currentRouteName == 'admin.tabPost' ||
            $currentRouteName == 'admin.viewPost' ||
            $currentRouteName == 'admin.createPost' ||
            $currentRouteName == 'admin.editPost'
                ? 'mm-active'
                : '' }}">
            <a href="javascript:void(0)" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-news'></i></div>
                <div class="menu-title">Quản lý bài viết</div>
            </a>
            <ul
                class="{{ $currentRouteName == 'admin.categoryPost' ||
                $currentRouteName == 'admin.tabPost' ||
                $currentRouteName == 'admin.viewPost' ||
                $currentRouteName == 'admin.createPost' ||
                $currentRouteName == 'admin.editPost'
                    ? 'mm-show'
                    : '' }}">
                <li class="{{ $currentRouteName == 'admin.viewPost' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.viewPost') }}"><i class="bx bx-right-arrow-alt"></i>Bài viết</a>
                </li>
                <li class="{{ $currentRouteName == 'admin.categoryPost' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.categoryPost') }}"><i class="bx bx-right-arrow-alt"></i>Chuyên mục</a>
                </li>
                <li class="{{ $currentRouteName == 'admin.tabPost' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.tabPost') }}"><i class="bx bx-right-arrow-alt"></i>Thẻ</a>
                </li>
            </ul>
        </li>
        {{-- ./KHÁCH HÀNG --}}

        {{-- THIẾT LẬP --}}
        <li class="menu-label">THIẾT LẬP</li>
        <li class="{{ $currentRouteName == 'admin.system_config' ? 'mm-active' : '' }}">
            <a href="{{ route('admin.system_config') }}">
                <div class="parent-icon"><i class='bx bx-cog'></i></div>
                <div class="menu-title">Thiết lập hệ thống</div>
            </a>
        </li>
        {{-- ./THIẾT LẬP --}}
    </ul>
    <!--end navigation-->
</div>
