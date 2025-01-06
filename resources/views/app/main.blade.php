<!--
=========================================================
* Material Dashboard 3 - v3.2.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('template/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('template//assets/img/favicon.png') }}">
    <title>ระบบรายงานข้อมูลบันทึกเวลาการปฏิบัติงาน</title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('template/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle"
        href="{{ asset('template/assets/css/material-dashboard.css?v=3.2.0') }}"
        rel="stylesheet" />
    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
    <!-- FlatPikr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/f97e59eabd.js" crossorigin="anonymous"></script>
</head>
<style>
    * {
        font-family: "Noto Sans Thai", sans-serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
        font-variation-settings:
            "wdth"100;
    }

    .swal2-title {
        font-family: "Noto Sans Thai", sans-serif;
    }

    /* .select2-selection__rendered {
        line-height: 29px !important;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
    }

    .select2-selection__arrow {
        height: 37px !important;
    } */

</style>

<body class="g-sidenav-show  bg-gray-100">
    @include('app.side')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav d-flex align-items-center  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <small>เมนู</small>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <small>
                    <i class="fa-regular fa-clock"></i>
                    ระบบรายงานข้อมูลบันทึกเวลาการปฏิบัติงาน สำนักงานสาธารณสุขจังหวัดเชียงใหม่
                </small>
            </div>
        </nav>
        <!-- End Navbar -->
        @yield('content')
        @include('app.footer')
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- Core JS Files -->
    <script src="{{ asset('template/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <!-- DataTable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <!-- FlatPikr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/th.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: 'กรุณาเลือก',
                width: '100%',
            });
        });

    </script>
    <script>
        new DataTable('#basicTable', {
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            scrollX: true,
            oLanguage: {
                oPaginate: {
                    sFirst: '<small>หน้าแรก</small>',
                    sLast: '<small>หน้าสุดท้าย</small>',
                    sNext: '<small>ถัดไป</small>',
                    sPrevious: '<small>กลับ</small>'
                },
                sSearch: '<small><i class="fa fa-search"></i> ค้นหา</small>',
                sInfo: '<small>ทั้งหมด _TOTAL_ รายการ</small>',
                sLengthMenu: '<small>แสดง _MENU_ รายการ</small>',
                sInfoEmpty: '<small>ไม่มีข้อมูล</small>'
            },
        });

    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>
    <script src="{{ asset('template/assets/js/material-dashboard.min.js?v=3.2.0') }}"></script>
    @if($message = Session::get('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ $message }}",
                // width: "30%"
            });

        </script>
    @endif
    @if($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "{{ $message }}",
                showConfirmButton: false,
                timer: 3000
            });

        </script>
    @endif

    @if($errors->any())
        <script>
            Swal.fire({
                title: 'พบข้อผิดพลาด',
                icon: 'warning',
                html: '<div class="text-start">' +
                    '<ul>' +
                    '@foreach ($errors->all() as $error)' +
                    '<li>{{ $error }}</li>' +
                    '@endforeach' +
                    '</ul>' +
                    '</div>'
            })

        </script>
    @endif
    @section('script')
    @show
</body>

</html>
