@extends('app.main')
@section('content')
<style>
    .select2-selection__rendered {
        line-height: 37px !important;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
    }

    .select2-selection__arrow {
        height: 37px !important;
    }
</style>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-12">
                        <h6>
                            <i class="fa-solid fa-user"></i>
                            ข้อมูลบุคลากร - {{ $data->studentname }}
                        </h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('employee.update',$data->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group input-group-static mb-4">
                                <label>เลขที่ลายนิ้วมือ</label>
                                <input type="text" name="enrollnumber" class="form-control" value="{{ $data->enrollnumber }}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group input-group-static mb-4">
                                <label>ชื่อ - สกุล</label>
                                <input type="text" name="studentname" class="form-control" value="{{ $data->studentname }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-static mb-4">
                                <label for="" class="ms-0">กลุ่มงาน / ฝ่าย</label>
                                <select class="select2" name="levelcode">
                                    @foreach ($dept as $rs)
                                    <option value="{{ $rs->levelcode }}"
                                        {{ $data->levelcode == $rs->levelcode ? 'SELECTED':'' }}>
                                        {{ $rs->levelname }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-static mb-4">
                                <label for="" class="ms-0">เวลาปฏิบัติงาน</label>
                                <select class="select2" name="shiftcode">
                                    @foreach ($shift as $rs)
                                    <option value="{{ $rs->shiftcode }}"
                                        {{ $data->shiftcode == $rs->shiftcode ? 'SELECTED':'' }}>
                                        {{ $rs->shiftname." : ".$rs->starttime." - ".$rs->endtime }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-static mb-4">
                                <label for="" class="ms-0">สถานะ</label>
                                <select class="select2" name="active">
                                    <option value="1"
                                        {{ $data->active == '1' ? 'SELECTED':'' }}>
                                        เปิดใช้งาน
                                    </option>
                                    <option value="0"
                                        {{ $data->active != '1' ? 'SELECTED':'' }}>
                                        ระงับใช้งาน
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success"
                                onclick="
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ยืนยันการแก้ไขข้อมูล ?',
                                        showCancelButton: true,
                                        confirmButtonText: 'แก้ไขข้อมูล',
                                        cancelButtonText: 'ยกเลิก',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            form.submit()
                                    } 
                                });
                            ">
                            <i class="fa-solid fa-save"></i>
                            บันทึกข้อมูล
                            </button>
                            <a href="{{ route('employee') }}" class="btn btn-secondary">
                                <i class="fa-solid fa-circle-chevron-left"></i>
                                ยกเลิก
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
