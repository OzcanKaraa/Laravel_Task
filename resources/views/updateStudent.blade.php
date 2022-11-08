    @extends('layouts.index')
    @section('content')
    <div class="container mt-4">
        <div class="col-md-12">

                <div class="container col-5 list-group-item-success p-5">
                    <h3>Kayıt Güncelleme Formu</h3>
                    <form action="{{ route('update-student', $students->i_d) }}" method="post"  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input class="form-control" value="{{$students->first_name}}" type="text" name="Ad" placeholder="Adınızı giriniz">
                        </div>

                        <div class="form-group">
                            <input class="form-control" value="{{$students->last_name}}" type="text" name="Soyad" placeholder="Soyadı giriniz">
                        </div>

                        <div class="form-group">
                            <input class="form-control" value="{{$students->birth_place}}" type="text" name="Doğum_Yeri" placeholder="Doğum yerinizi giriniz" >
                        </div>

                        <div class="form-group">
                            <input class="form-control" value="{{$students->birth_date}}" type="text" name="Doğum_Tarihi"  placeholder="Doğum tarihinizi giriniz">
                        </div>

                        <div class="col-sm"><br><input class="btn btn-primary" type="submit" value="Güncelle"/></div>
                    </form>

                </div>
                @endsection
