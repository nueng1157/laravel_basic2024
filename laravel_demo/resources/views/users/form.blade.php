@extends('layout') <!--จะไปเอา layout.blade.php มาแสดง-->

@section('content')

<h1> User Form</h1> <!--จะเอา content ตรงนี้ไปวางใน layout.blade.php ตรงที่เป็น yield--><!--//ถ้า form มี id ให้ส่งค่าไปที่ usersทับ id  ถ้าไม่มี id ให้ส่งค่าไปที่ users-->
<form 

    @if (@isset($id))  
        action="/users/{{ $id}}"  
            
    @else
        action ="/users"
    @endif

    method = "post" 
>  
    @csrf
   

    @if (isset($id))
        @method('put') 
    @endif

<div>Name</div>
<input type="text" class="form-control" name="name" value="{{ $name }}" placeholder="Name" />

<div class="mt-3">Email</div>
<input type="text" class="form-control" name="email" value="{{ $email }}" placeholder="Email" />

<div class="mt-3">Password</div>
<input type="text" class="form-control" name="password" value="{{ $password }}" placeholder="Password" />

<div class="mt-3">
    <button type="submit" class="btn btn-primary">
        <i class="fa-solid fa-check me-2"></i>
        Save
    </button>
</div>

</form>

@endsection