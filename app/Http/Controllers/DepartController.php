<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartController extends Controller 
{
    public function insertform()
    {
        return view('depart');
    } 

    public function insert(Request $request)
    {
        $s_name = $request->input('s_name');
        $name = $request->input('name');
        $data=array('s_name'=>$s_name,"name"=>$name);
        DB::table('department')->insert($data);
        echo "<br><center><h4><font color='green'>เพิ่มข้อมูลหน่วยงานเรียบร้อยแล้ว<br><br></font>";
        echo '<a href = "insert">กลับสู่หน้าเพิ่มข้อมูลหน่วยงาน</a>';
    }
}