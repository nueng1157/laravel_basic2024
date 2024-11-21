<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list() {
        return response()->json(['customers'=> 'customer list']); //show ข้อความ
    }

    public function detail($id){
        return response()->json(['customer' => 'Customer detail ' . $id]); //รับตัวแปร id เอาค่ามา show
    }

    public function create(Request $request){
        return response()->json(['customer'=> 'Customer create ' .$request->name]); //รับเป็น object เอาค่าใน object มา show
    }

    public function update(Request $request, $id){
        return response()->json(['customer'=> 'Customer update ' . $id . ' '. $request->name]); 
    }

    public function delete($id){
        return response()->json(['customer'=> 'Customer delete ' .$id]);
    }
}
