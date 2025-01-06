@extends('app.main')
@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h6>
                            <i class="fa-solid fa-user"></i>
                            ข้อมูลบุคลากร
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
                            <th class="text-center">เวลาปฏิบัติงาน</th>
                            <th class="text-center">วันที่ลงทะเบียน</th>
                            <th class="text-center"><i class="fa-solid fa-bars"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $rs)
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
                                    {{ $rs->shiftname." : ".$rs->starttime." - ".$rs->endtime }}
                                </td>
                                <td class="text-center">
                                    {{ date("d/m/Y", strtotime($rs->studentdate)) }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('employee.show',$rs->id) }}"
                                        class="badge bg-success">
                                        <i class="fa-solid fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addList" tabindex="-1" aria-labelledby="addListLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addListLabel">
                        <i class="fa-solid fa-plus-circle text-success"></i>
                        สร้างแผนงานโครงการ
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group input-group-static mb-4">
                                <label>เลขที่ลายนิ้วมือ</label>
                                <input type="text" name="enrollnumber" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-static mb-4">
                                <label>ชื่อ - สกุล</label>
                                <input type="text" name="studentname" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-static mb-4">
                                <label for="" class="ms-0">กลุ่มงาน / ฝ่าย</label>
                                <select class="select2" name="levelcode">
                                    <option></option>
                                    @foreach($dept as $rs)
                                        <option value="{{ $rs->levelcode }}">
                                            {{ $rs->levelname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-static mb-4">
                                <label for="" class="ms-0">เวลาปฏิบัติงาน</label>
                                <select class="select2" name="shiftcode">
                                    <option></option>
                                    @foreach($shift as $rs)
                                        <option value="{{ $rs->shiftcode }}">
                                            {{ $rs->shiftname." : ".$rs->starttime." - ".$rs->endtime }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-success" onclick="
                            Swal.fire({
                                icon: 'success',
                                title: 'ยืนยันการเพิ่มข้อมูลบุคลากร ?',
                                showCancelButton: true,
                                confirmButtonText: 'เพิ่มข้อมูล',
                                cancelButtonText: 'ยกเลิก',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit()
                                }
                            });
                        ">
                        <i class="fa-regular fa-save"></i>
                        บันทึกข้อมูล
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    new DataTable('#filter_table', {
        layout: {
            topStart: {
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fa-solid fa-file-excel text-success"></i> Export Excel',
                        customize: function (xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            sheet.querySelectorAll('row c[r^="C"]').forEach((el) => {
                                el.setAttribute('s', '2');
                            });
                        }
                    },
                    {
                        text: '<i class="fa-solid fa-user-plus text-info"></i> เพิ่มข้อมูลบุคลากร',
                        action: function (e, dt, node, config) {
                            $('#addList').modal('show')
                        }
                    }
                ]
            }
        },
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
        initComplete: function () {
            this.api()
                .columns([2, 3])
                .every(function () {
                    var column = this;
                    var select = $(
                            '<select class="select2" style="width:100%;"><option value="">แสดงทั้งหมด</option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = DataTable.util.escapeRegex($(this).val());
                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option class="select2" value="' + d + '">' + d +
                                '</option>');
                        });
                });
        }
    });

</script>
@endsection
