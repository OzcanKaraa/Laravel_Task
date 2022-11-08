
@extends('layouts.index')
@section('title','Login Form ')
@section('content')
    <div class="container mt-4">
        <h1>Kayıt Ekleme</h1>
        <div class="card">
             <div class="card-header text-center font-weight-bold">
            </div>
            <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ad</label>
                        <input type="text" id="title" name="Ad" class="form-control" required="Adınızı giriniz..." placeholder="Adınızı giriniz...">
                    </div>
                    <label for="exampleInputEmail1">Soyad</label>
                    <input type="text" id="title" name="Soyad" class="form-control" required="Soyadınızı girin..." placeholder="Soyadınızı giriniz...">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email"  name="Email" class="form-control" required="Emailinizi girin..." placeholder="Email giriniz...">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Şifre</label>
                            <input type="password"  name="Şifre" class="form-control" required="Şifrenizi girin..."placeholder="Şifre giriniz...">
                            <div class="form-group">
                    <button type="submit" class="btn btn-primary">Gönder</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection


