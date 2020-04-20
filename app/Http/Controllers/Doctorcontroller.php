<?php

namespace App\Http\Controllers;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Doctor;
use Database;


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

        return view('marham.add_doctor', compact('users','categories','specialities','subspecialities'));

    }


    function changespeciality(request $request){


        if ($request->action ==='subspecialities'){

            $data= $request->spID;
            $spid=response()->json($data);
            $subspeciality = DB::table('specialities')->select('spID','speciality')->where('parent','=',$spid)->get();
            


//            echo "<option value=''>--- Select Sub-Speciality ---</option>";
//            foreach ($subspeciality as $key => $value) {
//                echo '<option value="' . $value['spID'] . '">' . $value['speciality'] . '</option>';
//            }


        }
        elseif ($request->action ==='defaultServices'){

            $subspeciality=$request->action;

//            $where = 'WHERE defaultService=1';
//            if(!empty($specialityID)) {
//                $where = "WHERE spID = $specialityID AND defaultService=1";
//            }
//            try {
//                $stmt = Database :: prepare ( "SELECT sID, service, spID from  services $where ORDER BY service ASC ;" ) ;
//                $stmt -> execute ( ) ;
//                $result =  $stmt -> fetchAll (PDO::FETCH_ASSOC) ;
//            } catch(PDOException $e) {
//                return FALSE;
//            }
//            return $result;

        }








        return $subspeciality;


    }




}
