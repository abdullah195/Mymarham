<?php

namespace App\Http\Controllers;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Doctor;
use Database;
use phpDocumentor\Reflection\Types\Object_;
use phpDocumentor\Reflection\Types\Parent_;


class Doctorcontroller extends Controller
{

    public $doctor;
    public function __construct(Doctor $doctor)
    {
        $this->doctor =$doctor;
    }


    function index(){

        $users = DB::table('users')->get();
        $categories = DB::table('categories')->select('catID','catName')->get();
        $specialities = DB::table('specialities')->select('spID', 'speciality')->get();
        $subspecialities = DB::table('specialities')->select('spID', 'speciality')->where('parent','33')->get();
        $hospitals = DB::table('hospitals')->get();

        $specialitiesAndSubSpecialities = DB::table("specialities")->select('spID','parent','speciality','slug')
            ->whereNotIn('spID',function($query){
                $query->select('parent')->from('specialities');
            })
            ->orderBy('speciality')
            ->get();



        return view('marham.add_doctor', compact('users','categories','specialities','subspecialities','hospitals','specialitiesAndSubSpecialities'));


    }


    function getsubspeciality(request $request){

            $data= $request->spID;
            $subspeciality = DB::table('specialities')->select('spID','speciality')->where('parent','=',$data)->get();

        $obj = json_decode($subspeciality);
        $count=0;
        echo '<option value="">--- Select Sub-Speciality ---</option>';
        foreach ($obj as $key =>$value) {
            echo '<option value="' . $value->spID . '">' . $value->speciality . '</option>';
        }

            return ;

    }



}
