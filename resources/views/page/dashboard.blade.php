@extends('app.main')
@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="ms-3 mb-2">
            <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
            <small>
                <i class="fa-regular fa-calendar"></i>
                {{ "วันที่ ".date('d/m/Y') }}
            </small>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">จำนวนบุคลากร</p>
                            <h4 class="mb-0">{{ number_format($emp) }} คน</h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-info text-center border-radius-lg">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2 ps-3"></div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">เข้างานปกติ</p>
                            <h4 class="mb-0">N/A คน</h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-success text-center border-radius-lg">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2 ps-3"></div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">เข้างานสาย</p>
                            <h4 class="mb-0">N/A คน</h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-warning text-center border-radius-lg">
                            <i class="fa-solid fa-user-minus"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2 ps-3"></div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">ไม่ได้บันทึกเวลา</p>
                            <h4 class="mb-0">N/A คน</h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-danger text-center border-radius-lg">
                            <i class="fa-solid fa-user-xmark"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-2 ps-3"></div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-header">
                <i class="fa-solid fa-line-chart"></i>
                แผนภูมิแสดงข้อมูล
            </div>
            <div class="card-body">
                <small class="text-muted">กำลังพัฒนาระบบจ้า</small>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    
</script>
@endsection
