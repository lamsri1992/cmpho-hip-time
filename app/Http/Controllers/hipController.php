<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class hipController extends Controller
{
    public function dashboard()
    {
        return view('page.dashboard');
    }

    public function employee()
    {
        $data = DB::table('student')
            ->select('id','studentname','enrollnumber','studentdate','levelname')
            ->leftjoin('level','level.levelcode','student.levelcode')
            ->get();
        return view('page.employee',['data' => $data]);
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
