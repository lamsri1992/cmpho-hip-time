<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header text-center">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href="#">
            <img src="{{ asset('image/logo_cmh.png') }}"
                class="navbar-brand-img" width="26" height="26" alt="main_logo">
            <span class="ms-1 text-sm text-dark">
                CMPHO - HiP TIME
            </span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-xs text-dark">
                    สวัสดี , {{ Auth::user()->name }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark"
                    href="#">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <span class="nav-link-text ms-2 mt-1">ข้อมูลส่วนตัว</span>
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="nav-link text-dark" type="button"
                    onclick="Swal.fire({
                        title: 'ยืนยันการสิ้นสุดการใช้งาน',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'ออกจากระบบ',
                        cancelButtonText: 'ยกเลิก'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit()
                        }
                        });">
                        <i class="fa-solid fa-power-off"></i>
                        <span class="nav-link-text ms-2 mt-1">ลงชื่อออกจากระบบ</span>
                    </button>
                </form>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">
                    เมนูระบบ
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->is('/') || request()->is('dashboard') ? 'active':'' }}"
                    href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="nav-link-text ms-2 mt-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->is('employee*') ? 'active':'' }}"
                    href="{{ url('employee') }}">
                    <i class="fa-solid fa-user"></i>
                    <span class="nav-link-text ms-2 mt-1">ข้อมูลบุคลากร</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->is('report*') ? 'active':'' }}"
                    href="{{ route('report') }}">
                    <i class="fa-regular fa-calendar"></i>
                    <span class="nav-link-text ms-2 mt-1">ข้อมูลการลงเวลาปฏิบัติงาน</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
