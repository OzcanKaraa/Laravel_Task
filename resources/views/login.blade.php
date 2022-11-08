@extends('layouts.index')
@section('content')
    <div class="container mt-4">

        <div class="row">
            <div class="col-12 text-end">
                <a href="{{ route('registerPage') }}">KAYIT OL</a>
            </div>
        </div>
<h3>GİRİŞ EKRANI</h3>
        <hr>
        <div class="row">
            <form action="{{ route('girisYap') }}" method="post">
                @csrf
                <div class="p-3 row"><div class="col-6"> E-mail:   <input type="text" name="email" placeholder="Email giriniz" required="Emailinizi girin..."><br></div>
                <div class="col-6">Password: <input type="password" name="password" placeholder="Şifre Giriniz" required="Şifre girin..."><br></div></div>
                <div class="p-3"><input class="form-control" type="submit" value="Gönder"></div>
            </form>
        </div>
    </div>
    @endsection
