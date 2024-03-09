<div class="container-fluid p-0 nav-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="max-height: 65px;">
        <div class="container d-inline-flex">
            <a class="navbar-brand navbar-nav-logo" href="#"><img class="navbar-nav-logo-image" src="https://khoroblox.vn/upload/setting/0426812b8306bca5f49feb450356825b.png" width="250px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-start">
                    <li class="nav-item">
                        <a class="nav-link fw-bolder navbar-nav-a" href="#">
                            <span class="navbar-nav-a-span d-inline-flex justify-content-center align-items-center rounded-1 h-1">
                                <i class="fa-solid fa-dollar-sign"></i>
                            </span> 
                            NẠP THẺ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder navbar-nav-a" href="#">
                            <span class="navbar-nav-a-span d-inline-flex justify-content-center align-items-center rounded-1 h-1">
                                <i class="fa-regular fa-credit-card"></i>
                            </span> 
                            NẠP ATM/MOMO
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder navbar-nav-a" href="#">
                            <span class="navbar-nav-a-span d-inline-flex justify-content-center align-items-center rounded-1 h-1">
                                <i class="fa-regular fa-file"></i>
                            </span> 
                            HƯỚNG DẪN
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder navbar-nav-a" href="#">
                            <span class="navbar-nav-a-span d-inline-flex justify-content-center align-items-center rounded-1 h-1">
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </span> 
                            HƯỚNG DẪN
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <a class="navbar-brand btn btn-danger btn-login navbar-nav-button-facebook" href="#"><span class="rounded-circle"><i class="fa-solid fa-f"></i></span></a>
                @if (auth()->check())
                    <a class="navbar-brand btn btn-danger btn-login navbar-nav-button-login" href="#">
                        <span class="navbar-nav-button-login-span"><i class="fa-regular fa-user" style="top: 10px;"></i></span>
                        <span class="md:tw-ml-6">{{ auth()->user()->full_name ?? '' }}</span>
                    </a>
                @else
                    <a class="navbar-brand btn btn-danger btn-login navbar-nav-button-login login-form-process" href="#">
                        <span class="navbar-nav-button-login-span"><i class="fa-regular fa-user" style="top: 10px;"></i></span>
                        <span class="md:tw-ml-6">ĐĂNG NHẬP</span>
                    </a>
                @endif
            </div>
        </div>
    </nav>
</div>
