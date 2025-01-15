<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class hipController extends Controller
{
    public function dashboard()
    {
        $emp = DB::table('student')->count();
        return view('page.dashboard',
            [
                'emp' => $emp
            ]
        );
    }

    public function employee()
    {
        $data = DB::table('student')
            ->select('student.id','studentname','enrollnumber','studentdate','levelname','shiftname','starttime','endtime')
            ->leftjoin('level','level.levelcode','student.levelcode')
            ->leftjoin('shift','shift.shiftcode','student.shiftcode')
            ->get();
        $dept = DB::table('level')->get();
        $shift = DB::table('shift')->get();
        return view('page.employee',['data' => $data,'dept' => $dept,'shift' => $shift]);
    }

    public function show_employee($id)
    {
        $data = DB::table('student')
            ->select('student.id','student.levelcode','student.shiftcode','studentname','enrollnumber','studentdate','levelname',
            'shiftname','starttime','endtime','student.active','idcard')
            ->leftjoin('level','level.levelcode','student.levelcode')
            ->leftjoin('shift','shift.shiftcode','student.shiftcode')
            ->where('student.id',$id)
            ->first();
        $dept = DB::table('level')->get();
        $shift = DB::table('shift')->get();
        return view('page.employee_show',['data' => $data,'dept' => $dept,'shift' => $shift]);
    }

    public function store_employee(Request $request)
    {
        $validatedData = $request->validate(
            [
                'enrollnumber' => 'required',
                'studentname' => 'required',
                'levelcode' => 'required',
                'shiftcode' => 'required',
                'idcard' => 'required',
            ],
            [
                'enrollnumber.required' => 'ระบุเลขที่ลายนิ้วมือ',
                'studentname.required' => 'ระบุชื่อ - สกุล',
                'levelcode.required' => 'ระบุกลุ่มงาน / ฝ่าย',
                'shiftcode.required' => 'ระบุเวลาปฏิบัติงาน',
                'idcard.required' => 'ระบุเลขบัตรประชาชน',
            ],
        );

        DB::table('student')->insert(
            [
                'enrollnumber' => $request->enrollnumber,
                'studentname' => $request->studentname,
                'levelcode' => $request->levelcode,
                'shiftcode' => $request->shiftcode,
                'idcard' => $request->idcard,
                'active' => '1',
            ]
        );
        return back()->with('success', 'เพิ่มข้อมูล '.$request->studentname.' สำเร็จ');
    }

    public function update_employee(Request $request,$id)
    {
        $validatedData = $request->validate(
            [
                'enrollnumber' => 'required',
                'studentname' => 'required',
                'levelcode' => 'required',
                'shiftcode' => 'required',
                'active' => 'required',
                'idcard' => 'required',
            ],
            [
                'enrollnumber.required' => 'ระบุเลขที่ลายนิ้วมือ',
                'studentname.required' => 'ระบุชื่อ - สกุล',
                'levelcode.required' => 'ระบุกลุ่มงาน / ฝ่าย',
                'shiftcode.required' => 'ระบุเวลาปฏิบัติงาน',
                'active.required' => 'ระบุสถานะ',
                'idcard.required' => 'ระบุเลขบัตรประชาชน',
            ],
        );

        DB::table('student')->where('id',$id)->update(
            [
                'enrollnumber' => $request->enrollnumber,
                'studentname' => $request->studentname,
                'levelcode' => $request->levelcode,
                'shiftcode' => $request->shiftcode,
                'idcard' => $request->idcard,
                'active' => $request->active,
            ]
        );
        return back()->with('success', 'แก้ไขข้อมูล '.$request->studentname.' สำเร็จ');
    }

    public function report()
    {
        return view('page.report');
    }

    public function search(Request $request)
    {
        $sql = "SELECT
                d.work_date,
                student.studentname,
                level.levelname,
                CONCAT(shift.starttime,'-', shift.endtime) AS time_slot,
                LEFT(TIME(d.time_in),5) as time_in,
                LEFT(TIME(IF(d.time_in < d.time_out,d.time_out,NULL)),5) as time_out
                FROM student
                INNER JOIN `level` ON student.levelcode = level.levelcode
                INNER JOIN shift ON student.shiftcode = shift.shiftcode
                LEFT JOIN(
                SELECT 
                    d.id,
                    d.work_date,
                        MIN(d.datetimescan) AS time_in,
                        MAX(d.datetimescan) AS time_out
                FROM(
                    SELECT 
                    student.id,
                    DATE(transcantime.datetimescan) AS work_date,transcantime.datetimescan
                    FROM student
                    INNER JOIN transcantime ON student.enrollnumber = transcantime.enrollnumber
                        WHERE DATE(transcantime.datetimescan) BETWEEN '$request->d_start' AND '$request->d_end'
                        ORDER BY transcantime.enrollnumber		
                ) d
                GROUP BY d.work_date,d.id
                ) d on student.id=d.id
                WHERE student.active=1
                ORDER BY d.work_date,`level`.levelid,student.enrollnumber *1";
        
        $data = DB::select($sql);

        return view('page.report',
            [
                'data' => $data
            ]
        );
    }
}
