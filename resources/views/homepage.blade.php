@extends('layouts.index')
@section('content')

    <div class="container p-5">
            <table class="table">
                <form class="form-inline my-2 my-lg-0" method="get" action="{{route('students')}}">
                <input class="form-control  me-sm-0" type="search" value="{{@$search_student}}"
                       name="search_student" placeholder="NE ARIYORSUNUZ ..."
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <thead>
            <tr>
                <th scope="col" style="text-decoration: none !important;"> @sortablelink('id')</th>
                <th scope="col"> @sortablelink('first_name')</th>
                <th scope="col">@sortablelink('last_name')</th>
                <th scope="col">@sortablelink('birth_place')</th>
                <th scope="col">@sortablelink('birth_date')</th>
            </tr>

            </thead>
            <div align="right">
                <a class="btn btn-success" href="{{route('student-register')}}">Yeni Kayıt</a></div>
            <tbody>

            <?php $count = 1; ?>
            @foreach($students as $student)
                <tr>
                    <td> {{ $student->id }} </td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->birth_place }}</td>
                    <td>{{ $student->birth_date }}</td>
                    <td width="10"><a href="{{ route('update-student-page', ['id' => $student->i_d])}}">
                            <button class="btn btn-primary">Düzenle</button>
                        </a></td>
                    <td width="10"><a href="{{ route('delete-student', ['id' => $student->i_d])}}">
                            <button class="btn btn-primary">Sil</button>
                        </a></td>
                        <?php $count++; ?>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div style="display: flex;
  justify-content: center;">
            {!! $students->links('pagination::bootstrap-4')  !!}
        </div>
    </div>

@endsection
