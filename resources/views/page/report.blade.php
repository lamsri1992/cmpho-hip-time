@extends('app.main')
@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h6>
                            <i class="fa-regular fa-calendar"></i>
                            ข้อมูลการลงเวลาปฏิบัติงาน
                        </h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('search') }}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label>วันที่เริ่มต้น</label>
                                        <input type="date" class="form-control" name="d_start"
                                        onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label>วันที่สิ้นสุด</label>
                                        <input type="date" class="form-control" name="d_end"
                                        onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-search"></i>
                                        รายงานข้อมูล
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (isset($data))
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <h6>
                                    <i class="fa-regular fa-calendar-check"></i>
                                    วันที่ {{ date("d/m/Y", strtotime($_REQUEST['d_start'])) ." ถึง ". date("d/m/Y", strtotime($_REQUEST['d_end'])) }} 
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table id="filter_table" class="table table-striped table-borderless" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">วันที่</th>
                                    <th class="text-center">ชื่อ - สกุล</th>
                                    <th class="text-center">เลือกเวลาปฏิบัติงาน</th>
                                    <th class="text-center">เวลาเข้างานจริง</th>
                                    <th class="text-center">เวลาเลิกงานจริง</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $rs)
                                    <tr>
                                        <td class="text-center">
                                            {{ $rs->work_date }}
                                        </td>
                                        <td class="text-center">
                                            {{ $rs->studentname }}
                                        </td>
                                        <td class="text-center">
                                            {{ $rs->time_slot }}
                                        </td>
                                        <td class="text-center">
                                            {{ $rs->time_in }}
                                        </td>
                                        <td class="text-center">
                                            {{ $rs->time_out }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    new DataTable('#filter_table', {
        layout: {
            topStart: {
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa-solid fa-file-excel text-success"></i> Export Excel',
                        customize: function (xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            sheet.querySelectorAll('row c[r^="C"]').forEach((el) => {
                                el.setAttribute('s', '2');
                            });
                        }
                    }
                ]
            }
        },
        lengthMenu: [
            [300,-1],
            [300,"All"]
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
@endsection
