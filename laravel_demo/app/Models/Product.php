<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //field ที่เป็นไปได้ของเรามี 4 field  ถ้าไม่ใส่ timestamp เป็น false ต้องไปใส่ code ยากกว่านี้
    protected $table = 'product';
    protected $fillable = ['name', 'price', 'qty', 'detail'];
    public $timestamps = false;
}
