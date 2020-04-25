<?php

namespace App\Http\Controllers;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Doctor;


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


    public function savedoctor(Request $request){

        $post=$request->post();



        if(isset($postdata) and !empty($postdata)){


//             $this->doctor->addDoctorDetail($postdata);


            $id=0;
            $result = FALSE;


            if(!empty($post)) {
                try {

                    $docName = '';
                    if(isset($post['docName']) && !empty($post['docName'])) {
                        $docName = $post['docName'];
                    }


                    $docEmail = '';
                    if(isset($post['docEmail']) && !empty($post['docEmail'])) {
                        $docEmail = $post['docEmail'];
                    }


                    $categoryid =0;
                    if(isset($post['categoryid']) && !empty($post['categoryid'])) {
                        $categoryid = $post['categoryid'];
                    }

                    $docDegree = '';
                    if(isset($post['docDegree']) && !empty($post['docDegree'])) {
                        $docDegree = $post['docDegree'];
                    }


                    $docPic = '';
                    if(isset($post['docPic']) && !empty($post['docPic'])) {
                        $docPic = $post['docPic'];
                    }



                    //doctor phone number
                    $docPhone = '';
                    if(isset($post['docPhone']) && !empty($post['docPhone'])) {
                        $docPhone = $post['docPhone'];
                    }


                    //doctor assistant phone number
                    $appointment_number = '';
                    if(isset($post['appointment_number']) && !empty($post['appointment_number'])) {
                        $appointment_number = $post['appointment_number'];
                    }


                    $pmdc = '';
                    if(isset($post['pmdc']) && !empty($post['pmdc'])) {
                        $pmdc = $post['pmdc'];
                    }

                    $relief = '';
                    if(isset($post['relief']) && !empty($post['relief'])) {
                        $relief = $post['relief'];
                    }


                    $marham = '';
                    if(isset($post['marham']) && !empty($post['marham'])) {
                        $marham = $post['marham'];
                    }


                    $video_consultancy = '';
                    if(isset($post['video_consultancy']) && !empty($post['video_consultancy'])) {
                        $video_consultancy = $post['video_consultancy'];
                    }


                    $home_service = 0;
                    if(isset($post['home_service']) && !empty($post['home_service'])) {
                        $home_service = $post['home_service'];
                    }


                    $specialities = '';
                    if(isset($post['specialities']) && !empty($post['specialities'])) {
                        $specialities = $post['specialities'];
                    }


                    $docExp = '';
                    if(isset($post['docExp']) && !empty($post['docExp'])) {
                        $docExp = $post['docExp'];
                    }


                    $subspecialities = '';
                    if(isset($post['subspecialities']) && !empty($post['subspecialities'])) {
                        $subspecialities = $post['subspecialities'];
                    }


                    $gender = '';
                    if(isset($post['gender']) && !empty($post['gender'])) {
                        $gender = $post['gender'];
                    }


                    $fix_fee = '';
                    if(isset($post['fix_fee']) && !empty($post['fix_fee'])) {
                        $fix_fee = $post['fix_fee'];
                    }


                    $physician = '';
                    if(isset($post['physician']) && !empty($post['physician'])) {
                        $physician = $post['physician'];
                    }


                    $surgen = '';
                    if(isset($post['surgen']) && !empty($post['surgen'])) {
                        $surgen = $post['surgen'];
                    }


                    $willing_for_video_consultancy = 0;
                    if(isset($post['video_consultancy']) && !empty($post['video_consultancy'])) {
                        $willing_for_video_consultancy = $post['video_consultancy'];
                    }

                    $partnership_company_id = 0;
                    if(isset($post['partnership_company_id']) && !empty($post['partnership_company_id'])) {
                        $partnership_company_id = $post['partnership_company_id'];
                    }


                    $docDetails = '';
                    if(isset($post['docDetails']) && !empty($post['docDetails'])) {
                        $docDetails = $post['docDetails'];
                    }




                    $markedRed = isset($post['marked_red']) ? $post['marked_red'] : 0;


                    $salesNotes = isset($post['sales_notes']) ? str_replace("'", "`", $post['sales_notes']) : '';

                    $profileNotCompleted = isset($post['profile_not_completed']) ? $post['profile_not_completed'] : 0;
                    $firstComeFirstServe = isset($post['first_come_first_serve']) ? $post['first_come_first_serve'] : 0;


                    $onLeave = isset($post['on_leave']) ? $post['on_leave'] : 0;
                    $onLeaveFrom = isset($post['on_leave_from']) ? date('Y-m-d', strtotime($post['on_leave_from'])) : null;
                    $onLeaveTo = isset($post['on_leave_to']) ? date('Y-m-d', strtotime($post['on_leave_to'])) : null;

                    $appointmentInstructions = str_replace("'", "''", $post['appointment_instructions']);

                    DB::table('docdetails')->insert(
                        [
                            'surgen' => $surgen,
                            'physician' => $physician,
                            'docName' => $docName,
                            'docExp' => $docExp,
                            'docEmail' => $docEmail,
                            'docPhone' => $docPhone,
                            'docDetails' => $docDetails,
                            'docDegree' => $docDegree,
                            'catID' => $categoryid,
                            'spID' => $specialities,
                            'subspID' => $subspecialities,
                            'relief' => $relief,
                            'marham' => $marham,
                            'pmdc' => $pmdc,
                            'gender' => $gender,
                            'willing_for_video_consultancy' => $willing_for_video_consultancy,
                            'home_service' => $home_service ,
                            'appointment_instructions' => $appointmentInstructions,
                            'appointment_number' => $appointment_number,
                            'fix_fee' => $fix_fee,
                            'marked_red' => $markedRed,
                            'sales_notes' => $salesNotes,
                            'profile_not_completed' => $profileNotCompleted,
                            'added_by_user_id' => '0',
                            'on_leave' => $onLeave,
                            'on_leave_from' => $onLeaveFrom,
                            'on_leave_to' => $onLeaveTo,
                            'first_come_first_serve' => $firstComeFirstServe
                        ]
                    );

                } catch(PDOException $e) {
                    return $e;
                }
            }


            return $id;




        }



    }



}
