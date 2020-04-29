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



//        if(isset($postdata) and !empty($postdata)){


//             $this->doctor->addDoctorDetail($postdata);


            $id=0;

//            if(!empty($post)) {

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

                    $relief =0;
                    if(isset($post['relief']) && !empty($post['relief'])) {
                        $relief = $post['relief'];
                    }


                    $marham =0;
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


                    $specialities = 0;
                    if(isset($post['specialities']) && !empty($post['specialities'])) {
                        $specialities = $post['specialities'];
                    }


                    $docExp = 0.0;
                    if(isset($post['docExp']) && !empty($post['docExp'])) {
                        $docExp = $post['docExp'];
                    }


                    $subspecialities = 0;
                    if(isset($post['subspecialities']) && !empty($post['subspecialities'])) {
                        $subspecialities = $post['subspecialities'];
                    }


                    $gender = 0;
                    if(isset($post['gender']) && !empty($post['gender'])) {
                        $gender = $post['gender'];
                    }


                    $fix_fee = 0;
                    if(isset($post['fix_fee']) && !empty($post['fix_fee'])) {
                        $fix_fee = $post['fix_fee'];
                    }


                    $physician = 0;
                    if(isset($post['physician']) && !empty($post['physician'])) {
                        $physician = $post['physician'];
                    }


                    $surgen = 0;
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

                    $id=DB::table('docdetails')->insertGetId(
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
                            'added_by_user_id' => 0,
                            'on_leave' => $onLeave,
                            'on_leave_from' => $onLeaveFrom,
                            'on_leave_to' => $onLeaveTo,
                            'first_come_first_serve' => $firstComeFirstServe,
                            'no_direct_booking' => '0'
                        ]
                    );









                } catch(PDOException $e) {



                }



//            }



//            return $id;



               if (!empty($id)){

                   //now we have to save doctor services in table

                   if(isset($post['hospitals']) && !empty($post['hospitals'])){



//                       if(isset($post['hospitalsToRemove'])){
////                           $this->deleteDoctorApptTime($post['hospitalsToRemove']);
//                       }


                       $timeID = $this->addDoctorApptime($id ,$post);


                   }





                   foreach($post['services'] as $service) {
                       $this->addDoctorService($id, $service);
                   }



                   //Save Areas of interest in database
                   foreach($post['areasOfInterest11'] as $areaOfInterestID) {
                       $this->addDoctorAreaOfInterest($id, $areaOfInterestID);
                   }



                   //Save speciality in database
                   if(!empty($post['subspecialities'])){

                       $this->addDoctorSpeciality($id, $post['subspecialities']);
                   }
                   else{
                       $this->addDoctorSpeciality($id, $post['specialities']);
                   }



                   //now complete data is save now


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



                   echo '<script>alert("Data Successfully Added")</script>';

                   return view('marham.add_doctor', compact('users','categories','specialities','subspecialities','hospitals','specialitiesAndSubSpecialities'));



               }

    }



    function addsimilarSpIds($dId = 0, $similarIds = [])
    {


        if (!empty($dId)) {


            for ($i = 0; $i < count($similarIds) && ($i < 5); $i++) {

                $affected = DB::table('doclisting')
                    ->where('dlID', $dId)
                    ->update(
                        [
                            'similar_id_'.($i + 1) => $similarIds[$i]
                        ]
                    );

            }

        }

    }


    function addDoctorApptime($dID = '',$post = ''){

        $timeID = FALSE;
        //If valid request


        if(!empty($dID) && !empty($post)) {
            try {


                //Save doctor listing in database
                foreach($post['timeIDs'] as $time_counter => $timeID) {

                    $monday = $tuesday = $wednesday = $thursday = $friday = $saturday = $sunday = $onCall = $docFee = 0;

                    if(isset($post['monday'][$time_counter]) && !empty($post['monday'][$time_counter])){
                        $monday = 1;
                    }

                    if(isset($post['tuesday'][$time_counter]) && !empty($post['tuesday'][$time_counter])){
                        $tuesday = 1;
                    }

                    if(isset($post['wednesday'][$time_counter]) && !empty($post['wednesday'][$time_counter])){
                        $wednesday = 1;
                    }

                    if(isset($post['thursday'][$time_counter]) && !empty($post['thursday'][$time_counter])){
                        $thursday = 1;
                    }

                    if(isset($post['friday'][$time_counter]) && !empty($post['friday'][$time_counter])){
                        $friday = 1;
                    }

                    if(isset($post['saturday'][$time_counter]) && !empty($post['saturday'][$time_counter])){
                        $saturday = 1;
                    }


                    if(isset($post['sunday'][$time_counter]) && !empty($post['sunday'][$time_counter])){
                        $sunday = 1;
                    }


                    $onCall = 0;
                    $docFee = $post['docFee'][$time_counter];
                    if(isset($post['oncall'][$time_counter]) && !empty($post['oncall'][$time_counter]))
                    {

                        $onCall = $post['oncall'][$time_counter];


                    }



                    if($timeID != 0){


                        $result = DB::table('apttimes')
                            ->where('timeID','=',$timeID)
                            ->whereNull('deleted_at')
                            ->update([
                                    'monday' => $monday,
                                    'tuesday' => $tuesday,
                                    'wednesday' => $wednesday ,
                                    'thursday' => $thursday ,
                                    'friday' => $friday,
                                    'saturday' => $saturday,
                                    'sunday' => $sunday,
                                    'onCall' =>$onCall,
                                    'docFee' => $docFee,
                                    'startTime' => $post['startTime'][$time_counter],
                                    'endTime' =>$post['endTime'][$time_counter],
                                    'apptPhone' =>$post['apptPhone'][$time_counter],
                                    'hospitalID' =>$post['hospitals'][$time_counter]
                                ]
                            );



//                        $stmt = Database::prepare("UPDATE `apttimes` SET `monday`= '".$monday."', `tuesday`= '".$tuesday."', `wednesday`= '".$wednesday."', `thursday`= '".$thursday."', `friday`= '".$friday."', `saturday`= '".$saturday."', `sunday`= '".$sunday."',`onCall`='".$onCall."', `docFee`= '".$docFee."', `startTime`= '".$post['startTime'][$time_counter]."', `endTime`= '".$post['endTime'][$time_counter]."', `apptPhone`= '".$post['apptPhone'][$time_counter]."', `hospitalID`= '".$post['hospitals'][$time_counter]."' WHERE timeID = '".$timeID."' AND apttimes.deleted_at IS NULL");
//                        $result = $stmt->execute();



                    }else{


                        if(!empty($post['hospitals'][$time_counter]))
                        {

                            $timeID=DB::table('apttimes')->insertGetId(
                                [
                                    'dID' => $dID,
                                    'monday' => $monday,
                                    'tuesday' => $tuesday,
                                    'wednesday' => $wednesday ,
                                    'thursday' => $thursday ,
                                    'friday' => $friday,
                                    'saturday' => $saturday,
                                    'sunday' => $sunday,
                                    'onCall' =>$onCall,
                                    'docFee' => $docFee,
                                    'startTime' => $post['startTime'][$time_counter],
                                    'endTime' =>$post['endTime'][$time_counter],
                                    'apptPhone' =>$post['apptPhone'][$time_counter],
                                    'hospitalID' =>$post['hospitals'][$time_counter]
                                ]
                            );



//                            $stmt = Database:: prepare("INSERT INTO `apttimes` (`dID`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `onCall`, `docFee`, `startTime`, `endTime`, `apptPhone`, `hospitalID`)" .
//                                    " VALUES ('" . $dID . "', '" . $monday . "', '" . $tuesday . "', '" . $wednesday . "', '" . $thursday . "', '" . $friday . "', '" . $saturday . "', '" . $sunday . "', '" . $onCall . "', '" . $docFee . "', '" . $post['startTime'][$time_counter] . "', '" . $post['endTime'][$time_counter] . "', '" . $post['apptPhone'][$time_counter] . "', '" . $post['hospitals'][$time_counter] . "')");
//                            $result = $stmt->execute();
//                            $timeID = Database::lastInsertId();

                        }



                    }

                    $listing = $this->addOrUpdateDoctorListingNew($time_counter, $timeID, $dID, $post);
                }


                // $stmt = Database:: prepare("UPDATE doclisting SET historyTime = ".$doclistingResult['historyTime'].", patientsPerHour = ".$doclistingResult['patientsPerHour'].", averageTimePerPatient = ".$doclistingResult['averageTimePerPatient'].", appointmentMethodID = ".$doclistingResult['appointmentMethodID'].", appointmentMethod = '".$doclistingResult['appointmentMethod']."', nextSlot = ".$doclistingResult['nextSlot'].", updatedDate = '".date('Y-m-d H:i:s')."' WHERE dlID = " . $dID . " AND deleted_at = '".date('Y-m-d H:i:s')."' ");
                // $stmt->execute();


            } catch(PDOException $e) {
                return FALSE;
            }
        }




        return $timeID;







    }


    function addDoctorSpeciality($lastId = '',$speciality = ''){

        $result = FALSE;
        if(!empty($lastId) && !empty($speciality)) {


            $result= DB::table('specialitydoctor')->where('dID', '=', $lastId)->delete();
            $result=DB::table('specialitydoctor')->insert(
                [
                    'dID' => $lastId,
                    'spID' => $speciality
                ]
            );

        }


        return $result;

    }

    function addDoctorService($lastId = '',$service = ''){
        $result = FALSE;
        //If valid request

        $resultservice=DB::table('servicesdoctor')->insertGetId(
            [
                'dID' => $lastId,
                'sID' => $service
            ]
        );


       return $resultservice;

    }


    function addDoctorAreaOfInterest($dID='', $areaOfInteretID=''){
        $result = FALSE;
        //If valid request
        $resultareaofintrest=DB::table('doctor_areas_of_interest')->insertGetId(
            [
                'doctor_id' => $dID,
                'area_of_interest_id' => $areaOfInteretID
            ]
        );


        return $resultareaofintrest;
    }



    function addOrUpdateDoctorListingNew($index='', $timeID= '', $dID='', $post=''){


        $result = FALSE;
        $isConsultancyReferralChanged = false;
        //If valid request
        if($dID) {


//            try {



                $qry_result = DB::table('docdetails')
                    ->where('dlID','=',$dID)->get();



                if(!empty($qry_result)) {

                    $selectedhospital = DB::table('hospitals')
                        ->where('hospitalID','=',$post['hospitals'][$index])
                        ->get();

                    $selectedhospital= json_decode($selectedhospital);

                    $hospitaldataindex= $index-1;

//                    var_dump($selectedhospital);

//                    $selectedhospital[$hospitaldataindex]->hospitalID;


                    $dr_details = $post;
                    $dr_name = trim($post['docName']);
                    $dr_degree = $post['docDegree'];

                    $dr_speciality_ID = !empty($post['subspecialities']) ? $post['subspecialities'] : $post['specialities'];
                    $dr_speciality_slug = $this->getSpecialitySlug($dr_speciality_ID);
                    $currentDoctorSlug = $this->getDoctorSlugAttribute($dID);
                    $dr_slug = 'doctors/slugnotfound';

//                    $dr_slug = 'doctors/'.$this->slugify($dr_city).'/'.$this->slugify($dr_speciality_slug).'/'.$this->slugify($dr_name);
//                    if((!is_null($currentDoctorSlug) && !empty($currentDoctorSlug)) && (strtolower($currentDoctorSlug) != strtolower($dr_slug))) {
//                        $this->addRedirects($currentDoctorSlug, $dr_slug, 1);
//                    }





//                    $consultancy_fee_share_on = 0;
//                    $doc_fee_after_hospital_share = 0;
//                    $consultancy_referral = 0;





                    $consultationTimingType = $post['consultation_timing_type'][$index];


                    //Save doctor listing in database


                    //check if timeID exist
                    $doctorHospitalID = 0;


                    $isExist = DB::table('doclisting')
                        ->select('id')
                        ->where('timeID','=',$timeID)
                        ->whereNull('deleted_at')
                        ->get();



                    if(false){

                    }else{

                     //   $sspid=($post['subspecialities'] == 0) ? $post['specialities'] : $post['subspecialities'];
                      //  $speciality_name=($post['subspecialities'] == 0) ? $post['specialities'] : $post['subspecialities'];


                        $subspecialities=0;
                        if(isset($post['subspecialities'])){

                            $subspecialities=$post['subspecialities'];

                        }


                        $specialities=0;
                        if(isset($post['specialities'])){
                            $specialities=$post['specialities'];

                        }
                        else{
                            $subspecialities=0;
                        }



                        $docPic='';
                        if (isset($dr_details['docPic'])){
                            $docPic=$dr_details['docPic'];
                        }

                        $gender=0;
                        if (isset($dr_details['gender'])){
                            $gender=$dr_details['gender'];
                        }


                        $docExp=0.0;
                        if (isset($dr_details['docExp'])){
                            $docExp=$dr_details['docExp'];
                        }



                        $catID=0;
                        if (isset($dr_details['catID'])){
                            $catID=$dr_details['catID'];
                        }

                        $catName='';
                        if (isset($dr_details['catName'])){
                            $catName=$dr_details['catName'];
                        }

                        $monday=0;
                        if (isset($dr_details['monday'][$index])){
                            $monday=$dr_details['monday'][$index];
                        }


                        $tuesday=0;
                        if (isset($dr_details['tuesday'][$index])){
                            $tuesday= $dr_details['tuesday'][$index];
                        }

                        $wednesday=0;
                        if (isset($dr_details['wednesday'][$index])){
                            $wednesday= $dr_details['wednesday'][$index];
                        }

                        $thursday=0;
                        if (isset($dr_details['thursday'][$index])){
                            $thursday= $dr_details['thursday'][$index];
                        }

                        $friday=0;
                        if (isset($dr_details['friday'][$index])){
                            $friday= $dr_details['friday'][$index];
                        }

                        $saturday=0;
                        if (isset($dr_details['saturday'][$index])){
                            $saturday= $dr_details['saturday'][$index];
                        }


                        $sunday=0;
                        if (isset($dr_details['sunday'][$index])){
                            $sunday= $dr_details['sunday'][$index];
                        }


                        $onCall=0;
                        if (isset($dr_details['onCall'][$index])){
                            $onCall=$dr_details['onCall'][$index];
                        }

                        $startTime=0;
                        if (isset($dr_details['startTime'][$index])){
                            $startTime= $dr_details['startTime'][$index];
                        }


                        $endTime=0;
                        if (isset($dr_details['endTime'][$index])){
                            $endTime=$dr_details['endTime'][$index];
                        }

                        $apptPhone=0;
                        if (isset($dr_details['apptPhone'][$index])){

                            $apptPhone= $dr_details['apptPhone'][$index];

                        }



                        $consultancy_fee_share_on='';
                        if (isset($post['consultancy_fee_share_on'][$index])){
                            $consultancy_fee_share_on = $post['consultancy_fee_share_on'][$index];
                        }


                        $doc_fee_after_hospital_share='';
                        if (isset($post['docFeeAfterShare'][$index])){
                            $doc_fee_after_hospital_share = $post['docFeeAfterShare'][$index];
                        }



                        $consultancy_referral='';
                        if (isset($post['consultancy_referral'][$index])){

                            $consultancy_referral =$post['consultancy_referral'][$index];

                        }

                        $hospitalType = 0;
                        $contractType = 1;



                        $hospitalAdminNumber=0;
                        if (isset($post['hospitalAdminNumber'][$index])){
                            $hospitalAdminNumber=$post['hospitalAdminNumber'][$index];
                        }



                        $docFee=0.0;
                        if (isset($dr_details['docFee'][$index])){
                            $docFee=$dr_details['docFee'][$index];
                        }


//                        $selectedhospital[$hospitaldataindex]->hospitalID;
//                        $selectedhospital[$hospitaldataindex]->name;
//                        $selectedhospital[$hospitaldataindex]->address;
//                        $selectedhospital[$hospitaldataindex]->city;
//                        $selectedhospital[$hospitaldataindex]->lat;
//                        $selectedhospital[$hospitaldataindex]->lng;
//                        $selectedhospital[$hospitaldataindex]->area;
//                        $selectedhospital[$hospitaldataindex]->area_slug;


                        $sp=0;
                        if (isset($dr_details['specialities'])){
                            $sp=$dr_details['specialities'];
                        }


//                        var_dump($dID);
//                        var_dump($docExp);
//                        var_dump($docFee);
//                        var_dump($catID);
//                        var_dump($catName);
//                        var_dump($dr_details['specialities']);


                        $sepid=0;
                        if (isset($dr_details['specialities'])){
                            $sepid=$dr_details['specialities'];
                        }


//
//                        var_dump($subspecialities);
//                        var_dump($sepid);
//                        var_dump($subspecialities);
//                        var_dump($specialities);
//                        var_dump($subspecialities);
//                        var_dump($specialities);
//                        var_dump($gender);
//                        var_dump($timeID);
//                        var_dump($monday);
//                        var_dump($tuesday);
//                        var_dump($wednesday);
//                        var_dump($thursday);
//                        var_dump($friday);
//                        var_dump($saturday);
//                        var_dump($sunday);
//                        var_dump($startTime);
//                        var_dump($endTime);
//                        var_dump($onCall);
//                        var_dump($apptPhone);
//                        var_dump($hospitalAdminNumber);

//                        $aaaa="aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
//                        var_dump($aaaa);
//                        var_dump($docFee);


                        $doctorHospitalID = DB::table('doclisting')->insertGetId(
                                [
                                    'dlID' =>$dID,
                                    'docName' =>$dr_details['docName'],
                                    'docPic' =>$docPic,
                                    'docExp' =>$docExp,
                                    'docFee' =>$docFee,
                                    'catID' =>$catID,
                                    'catName' =>$catName,
                                    'spID' =>$sepid,
                                    'subspID' =>$subspecialities,
                                    'speciality_id' =>$sepid,
                                    'speciality' =>$specialities,
                                    'subSpeciality' =>$subspecialities,
                                    'speciality_name' =>$specialities,
                                    'gender' =>$gender,
                                    'timeID'=>$timeID,
                                    'monday'=>$monday,
                                    'tuesday'=>$tuesday,
                                    'wednesday'=>$wednesday,
                                    'thursday'=>$thursday,
                                    'friday'=>$friday,
                                    'saturday' =>$saturday,
                                    'sunday'=>$sunday,
                                    'startTime' =>$startTime,
                                    'endTime' =>$endTime,
                                    'onCall'=>$onCall,
                                    'apptPhone' =>$apptPhone,
                                    'hospital_admin_number' =>$hospitalAdminNumber,
                                    'hospitalID'=>$selectedhospital[$hospitaldataindex]->hospitalID,
                                    'hospitalName' =>$selectedhospital[$hospitaldataindex]->name,
                                    'hospitalAddress'=>$selectedhospital[$hospitaldataindex]->address,
                                    'hospitalCity'=>$selectedhospital[$hospitaldataindex]->city,
                                    'lat' =>$selectedhospital[$hospitaldataindex]->lat,
                                    'lng' =>$selectedhospital[$hospitaldataindex]->lng,
                                    'hospitalArea' =>$selectedhospital[$hospitaldataindex]->area,
                                    'hospital_area_slug'=>$selectedhospital[$hospitaldataindex]->area_slug,
                                    'doctorSoundex' =>"MBBS",
                                    'specialitySoundex' =>"ENT",
                                    'hospitalSoundex'=>"nohospitalsoundex",
                                    'doctorSlug' =>"nodoctorslug",
                                    'docDegree'=>$dr_details['docDegree'],
                                    'consultancy_fee_referral_on' =>$consultancy_fee_share_on,
                                    'doctor_fee_after_hospital_share' =>$doc_fee_after_hospital_share,
                                    'consultancy_referral'=>$consultancy_referral,
                                    'hospital_type'=>$hospitalType,
                                    'contract_type'=>$contractType

                                ]
                        );


                        if (isset($post['similarSpIds'])){

                            $this->addsimilarSpIds($dID,$post['similarSpIds']);

                        }


                    }


//                    if($consultancy_referral != 0) {
//                        $stmt = Database::prepare("UPDATE docdetails SET on_panel_at = '" . date('Y-m-d H:i:s') . "', on_panel_by_user_id = " . $userId . " WHERE dlID = " . $dID. " AND on_panel_at IS NULL");
//                        $stmt->execute();
//                    }


//                    var_dump("ready to go in procedure");

//                    dd($post);

//                       $post[procedureName[$index]];
//                       $post[procedure_url[$index]];
//                       $post[hospital_procedure_fee[$index]];
//                       $post[doctor_procedure_fee[$index]];
//                       $post[procedure_referral[$index]];





                    if(isset($post["procedureName"])){

                        $procedureName=$post["procedureName"][$index];
                        $procedure_url=$post["procedure_url"][$index];
                        $hospital_procedure_fee=$post["hospital_procedure_fee"][$index];
                        $doctor_procedure_fee=$post["doctor_procedure_fee"][$index];
                        $procedure_referral=$post["procedure_referral"][$index];

                        for ($i=0; $i<count($procedureName); $i++){


//                            var_dump($procedureName[$i]);
//                            var_dump($procedure_url[$i]);
//                            var_dump($hospital_procedure_fee[$i]);
//                            var_dump($doctor_procedure_fee[$i]);
//                            var_dump($procedure_referral[$i]);


                            $result = DB::table('doctor_procedures')->insertGetId(
                                [
                                    'doctor_hospital_id' =>$doctorHospitalID,
                                    'doctor_id'=>$dID,
                                    'procedure_referral_on' =>0,
                                    'procedure_id' =>$procedure_referral[$i],
                                    'procedure_url' =>$procedure_url[$i],
                                    'total_fee' =>$hospital_procedure_fee[$i],
                                    'doctor_fee' =>$doctor_procedure_fee[$i],
                                    'procedure_referral' =>$procedure_referral[$i],
                                    'contract_type' =>1
                                ]
                            );


                        }




//                        dd($post);



                    }

                }

        }



        return $result;


    }



    function getSpecialitySlug($spID = ''){

        $result = DB::table('specialities')->select('slug')->where('spID','=',$spID)->get();
        return $result;

    }

    function getDoctorSlugAttribute($dID = 0, $city = null, $spID = 0){


        return "Doctorslugadded";


    }



    function slugify(){


    }




}
