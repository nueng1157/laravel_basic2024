@extends('layout')

@section('content')
<h3>Product Form</h3>

<form 
@if (isset($product))
    action="/product/{{ $product->id }}" 
@else
    action="/product"
@endif

method="post"
>
    @csrf

    @if (isset($product)) <!--ถ้ามี product method เป็น put เพื่อจะเปลี่ยนข้อมูล-->
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name ?? '' }}"> <!--ถ้า product name ไม่มีค่า ให้เอาค่าว่างมาแสดง-->
    </div>
    <div class="form-group mt-3">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price ?? '' }}">
    </div>
    <div class="form-group mt-3">
        <label for="qty">Qty</label>
        <input type="number" name="qty" class="form-control" value="{{ $product->qty ?? '' }}">
    </div>
    <div class="form-group mt-3">
        <label for="detail">Detail</label>
        <input type="text" name="detail" class="form-control" value="{{ $product->detail ?? '' }}">
    </div>


    
    <button type="submit" class="btn btn-primary mt-3">
        <i class="fa fa-save"></i>
        Save
    </button>
</form>
@endsection
