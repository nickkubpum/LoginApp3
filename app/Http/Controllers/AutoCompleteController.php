<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class AutoCompleteController extends Controller
{
    function index()
    {
        return view('autocomplete');
    }

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('department')
            ->where('name', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                // <li><a href="#">'.$row->id_dep.' '.$row->name.'</a></li>
                $output .= '
                <li><a href="#">'.$row->name.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function insert(Request $request)
    {
        $name = $request->input('name');
        $names = DB::table('department')->where('name', $name)->first();
        $name = $names->id_dep;
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $password = Hash::make($password);
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $data=array('name'=>$name,"username"=>$username,"email"=>$email,"password"=>$password,"created_at"=>$created_at,"updated_at"=>$updated_at);
        DB::table('users')->insert($data);
        echo "<br><center><h4><font color='green'>เพิ่มข้อมูลสมาชิกเรียบร้อยแล้ว<br><br></font>";
        echo '<a href = "/autocomplete">กลับสู่หน้าเพิ่มข้อมูลสมาชิก</a>';
    }
}
