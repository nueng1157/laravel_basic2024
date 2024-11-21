<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function list(){
        $users = DB::table('users')->get(); //show data ตัวแปรชื่อ users = db::table(ชื่อตาราง) แล้ว get มันจะ return ค่ามา
        return response()->json(['users'=>$users]); //return ค่าเป็น json จากตาราง users ใส่ตัวแปร $users
    }
}