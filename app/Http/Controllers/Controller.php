<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {

//        $students = Students::all();
//        dd($students);
//        return view('homepage');

        $student = Students::sortable()->paginate(5);
//        $students  = student ?: LengthAwarePaginator::resolveCurrentPage($students);
        return view('homepage')->with('students', $student);
        //return view('homepage', ["data" => $student] );
    }

    public function studentRegister()
    {
        return view("studentRegister");
    }


    public
    function kayıtOl(Request $request)
    {
        $name = $request->Ad;
        $lastName = $request->Soyad;
        $email = $request->Email;
        $password = $request->Şifre;
        Users::insert([
            "name" => $name,
            "surname" => $lastName,
            "email" => $email,
            "password" => $password
        ]);
        return redirect()->route('loginView');
    }

    /*public  function kayıtol(Request $request){
        $email = $request->Email;
        $password= $request->Şifre;
        Users::insert([
            "email" => $email,
            "password" => $password
        ]);
        return redirect()->route('/register');
    }*/

    public
    function girisYap(Request $request)
    {
        //email ve pass degerini al
        //email ve pass icin users da var ise homepage e gitsin
        //yokSa logine geri gelsin

        $email = $request->email;
        $password = $request->password;

//        $flights = Users::where('email', 1);
//        $allRecords = Users::where('id','=','5')->get();
//            ->get();
        //If ıle emaıl içi  boş ise girmesin
        $users = Users::where('email', '=', $request->email)
            ->where('password', '=', $request->password)
            ->get();
        if (!empty($users)) {
            return redirect()->route('home');
        }
        return redirect()->route('loginView');
    }

    public function addStudent(Request $request)
    {
        $first_name = $request->Ad;
        $last_name = $request->Soyad;
        $birth_place = $request->Doğum_Yeri;
        $birth_date = $request->Doğum_Tarihi;
        Students::insert([
            "first_name" => $first_name,
            "last_name" => $last_name,
            "birth_place" => $birth_place,
            "birth_date" => $birth_date
        ]);
        return redirect()->route('home');
    }

    public function deleteStudent($id)
    {
        DB::table('students')->where('i_d', $id)
            ->delete();
        return back()->withInput();
    }


    public function updateStudentPage($id)
    {
        //ıd esıt olan student al vıew gonder

        $students = Students::whereID($id)->first();
        // dd($students);
        if ($students) {
            // return view('updateStudent');
            return view('updateStudent')->with('students', $students);
        } else {
            return redirect()->route("homepage");
        }
    }

    public
    function updateStudent(Request $request, $id)
    {
        //     dd($request);
        $first_name = $request->Ad;
        $last_name = $request->Soyad;
        $birth_place = $request->Doğum_Yeri;
        $birth_date = $request->Doğum_Tarihi;
//                    Students::updated([
//                        "first_name" => $first_name,
//                        "last_name" => $last_name,
//                        "birth_place" => $birth_place,
//                        "birth_date" => $birth_date
//                ]);

        $students = DB::table('students')
            ->where('i_d', $id)
            ->update([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'birth_place' => $birth_place,
                'birth_date' => $birth_date,
            ]);
        return redirect()->route('home');
    }

//    public function search()
//    {
//        $search_text = $_GET['query'];
//        $students = Students::where('id', 'LIKE', '%' . $search_text . '%')->get();
//        return view('homepage', compact('students'))->with('home')->get();
//        $search = $request['search'] ?? "";
//        if ($search != "") {
//        $students =Students::where('first_name','LIKE',"%$search%")->orWhere('	Last_name','LIKE',"%$search%")->get();
//        } else {
//            $students =Students::all();
//            return view('homepage')->with($students);
//        }


    public function search(Request $request)
    {
        $search = $request->input('search_student');

        $students = Students::query()
            ->where('first_name', 'LIKE', "%" . $search . "%")
            ->paginate(5);
        return view('homepage', ['students' => $students,
            'search_student' => $search]);
    }
}

