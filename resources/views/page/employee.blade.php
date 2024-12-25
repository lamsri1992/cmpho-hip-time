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
                <table id="filter_table" class="table table-striped table-borderless" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">เลขที่ลายนิ้วมือ</th>
                            <th class="">ชื่อ - สกุล</th>
                            <th class="text-center">กลุ่มงาน / ฝ่าย</th>
                            <th class="text-center">วันที่ลงทะเบียน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $rs)
                            <tr>
                                <td class="text-center">
                                    {{ $rs->enrollnumber }}
                                </td>
                                <td class="">
                                    {{ $rs->studentname }}
                                </td>
                                <td class="text-center">
                                    {{ $rs->levelname }}
                                </td>
                                <td class="text-center">
                                    {{ date("d/m/Y", strtotime($rs->studentdate)) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
            [10,25,50,-1],
            [10,25,50,"All"]
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
