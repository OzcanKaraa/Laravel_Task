@extends('layouts.index')
@section('content')
    <div class="container col-5 list-group-item-success p-5">
        <h3>Kayıt Ekleme Formu</h3>
    <form action="{{ route('add-student') }}" method="post">
    @csrf
        <div class="col-sm-2"> Ad: <input type="text" name="Ad"  /><br></div>
        <div class="col-sm-2">Soyad: <input type="text" name="Soyad"/><br></div>
        <div class="col-sm-2">Doğum yeri: <input type="text" name="Doğum_Yeri" /><br></div>
        <div class="col-sm-2">Doğum Tarihi: <input type="date" name="Doğum_Tarihi"/><br></div>
        <div class="col-sm"><br><input class="btn btn-primary" type="submit" value="Gönder"/></div>
</form>
    </div>
@endsection

