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


                    $specialities = '';
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




                   //Save doctor timings in database
                   if(isset($post['hospitals']) && !empty($post['hospitals'])){
//
//                       if(isset($post['hospitalsToRemove'])){
////                           $this->deleteDoctorApptTime($post['hospitalsToRemove']);
//                       }
                       $timeID = $this->addDoctorApptime($id ,$post);



                   }

               }

    }





    function addDoctorApptime($dID = '',$post = ''){

        $timeID = FALSE;
        //If valid request


        if(!empty($dID) && !empty($post)) {
            try {


                $doclistingResult = DB::table('doclisting')->select('historyTime','patientsPerHour','averageTimePerPatient','appointmentMethodID','appointmentMethod','appointmentMethod','nextSlot')
                    ->where('dlID','=',$dID)
                    ->whereNull('deleted_at')
                    ->limit(1);


                if(!empty($doclistingResult[0])) {
                    $doclistingResult = $doclistingResult[0];
                }


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
            try {

                $qry_result = DB::table('docdetails as d')
                    ->join('categories as c', 'd.catID', '=', 'c.catID')
                    ->join('specialities as s', 's.spID', '=', $post['specialities'])
                    ->join('apttimes as t', 'd.dlID', '=', 't.dID')
                    ->join('hospitals as h', 't.hospitalID', '=', 'h.hospitalID')
                    ->select(   'd.dlID', 'd.docEmail', 'd.docPhone', 'd.docPhone', 'd.docPhone', 'd.docPhone','d.docPic', 'd.docDetails', 'd.docDegree', 'd.gender','d.docName','d.docExp','c.catName','c.catID','t.*','h.*','s.speciality','s.spID','h.type as hospital_type','d.active_at','d.inactive_at')
                    ->where('d.dlID','=',$dID)
                    ->whereNull('t.deleted_at')
                    ->get();


//                $stmt = Database :: prepare ("SELECT d.dlID, d.docEmail, d.docPhone, d.docPic, d.`docDetails`, d.docDegree, d.gender, d.docName, d.docExp, c.catName, c.catID, t.*, h.*, s.speciality, s.spID, h.`type` as hospital_type, d.`active_at`, d.`inactive_at`
//					FROM docdetails d
//					JOIN categories c on d.catID = c.catID
//					JOIN specialities s on s.spID = '".$post['specialities']."'
//					JOIN apttimes t on d.dlID = t.dID and t.timeID = $timeID
//					JOIN hospitals h on t.hospitalID = h.hospitalID
//					Where d.dlID = $dID AND t.deleted_at IS NULL " ) ;
//
//                $stmt -> execute ( ) ;
//                $qry_result =  $stmt->fetchAll (PDO::FETCH_ASSOC) ;



//                $stmt = Database::prepare( "SELECT speciality FROM specialities WHERE spID =  ".$post['subspecialities']." ");
//                $stmt->execute();
//                $subspecialitiesresult =  $stmt->fetchAll (PDO::FETCH_ASSOC) ;



                $subspecialitiesresult = DB::table('specialities')
                    ->select('speciality')
                    ->where('spID','=',$post['subspecialities'])
                    ->get();



                if(!empty($qry_result)) {


                    $dr_details = $qry_result[0];
                    $dr_name = trim($dr_details['docName']);
                    $dr_degree = $dr_details['docDegree'];
                    $dr_city = trim($dr_details['city']);
                    $dr_speciality_ID = !empty($post['subspecialities']) ? $post['subspecialities'] : $post['specialities'];
                    $dr_speciality_slug = $this->getSpecialitySlug($dr_speciality_ID);
                    $currentDoctorSlug = $this->getDoctorSlugAttribute($dID);
                    $dr_slug = 'doctors/slugnotfound';
//                    $dr_slug = 'doctors/'.$this->slugify($dr_city).'/'.$this->slugify($dr_speciality_slug).'/'.$this->slugify($dr_name);
//                    if((!is_null($currentDoctorSlug) && !empty($currentDoctorSlug)) && (strtolower($currentDoctorSlug) != strtolower($dr_slug))) {
//                        $this->addRedirects($currentDoctorSlug, $dr_slug, 1);
//                    }



                    $consultancy_fee_share_on = $post['consultancy_fee_share_on'][$index];
                    $doc_fee_after_hospital_share = $post['docFeeAfterShare'][$index];
                    $consultancy_referral = $post['consultancy_referral'][$index];
                    $hospitalType = $dr_details['hospital_type'];
                    $contractType = $post['contract_type'][$index];
                    $hospitalAdminNumber = $post['hospitalAdminNumber'][$index];
                    $consultationTimingType = $post['consultation_timing_type'][$index];
                    //Save doctor listing in database

                    //check if timeID exist
                    $doctorHospitalID = 0;
//                    $stmt = Database::prepare("SELECT id FROM doclisting WHERE timeID= '".$timeID."' AND deleted_at IS NULL ");
//                    $stmt->execute();
//                    $isExist = $stmt->fetch(PDO::FETCH_ASSOC);


                    $isExist = DB::table('doclisting')
                        ->select('id')
                        ->where('timeID','=',$timeID)
                        ->whereNull('deleted_at')
                        ->get();

                    if(!is_null($isExist['id'])){

                        $doctorHospitalID = $isExist['id'];

//                        if(APP_ENV == 'production') {
//                            $isConsultancyReferralChanged = $this->isConsultancyReferralChanged($timeID, $consultancy_referral);
//                        }

                        $stmt = Database::prepare("UPDATE `doclisting` SET `docName`= '".trim($dr_details['docName'])."',`docPic`= '".$dr_details['docPic']."', `docExp`='".$dr_details['docExp']."',`docFee`= '".$dr_details['docFee']."', `catID`='".$dr_details['catID']."', `catName`='".$dr_details['catName']."', `spID`='".$post['specialities']."', `subspID`='".$post['subspecialities']."', `speciality_id` = '".(($post['subspecialities'] == 0) ? $post['specialities'] : $post['subspecialities'])."', `speciality` = '".$dr_details['speciality']."', `subSpeciality` = '".$subspecialitiesresult[0]['speciality']."', `speciality_name`='".(($post['subspecialities'] == 0) ? $dr_details['speciality'] : $subspecialitiesresult[0]['speciality'])."', `gender`='".$dr_details['gender']."', `monday`='".$dr_details['monday']."', `tuesday`='".$dr_details['tuesday']."', `wednesday`='".$dr_details['wednesday']."', `thursday`='".$dr_details['thursday']."', `friday`='".$dr_details['friday']."', `saturday`='".$dr_details['saturday']."', `sunday`='".$dr_details['sunday']."', `startTime`='".$dr_details['startTime']."', `endTime`='".$dr_details['endTime']."', `onCall`='".$dr_details['onCall']."', `apptPhone`='".$dr_details['apptPhone']."', `hospital_admin_number` = '".$hospitalAdminNumber."', `hospitalID`='".$dr_details['hospitalID']."', `hospitalName`='".$dr_details['name']."', `hospitalAddress`='".$dr_details['address']."', `hospitalCity`='".$dr_details['city']."', `lat`='".$dr_details['lat']."', `lng`='".$dr_details['lng']."', `hospitalArea`='".$dr_details['area']."', `hospital_area_slug`='".$this->slugify($dr_details['area'])."', `doctorSoundex`='".$this->getSoundex(trim($dr_details['docName']), false)."', `specialitySoundex`='".$this->getSoundex(trim($dr_details['speciality']), true).$this->getSoundex($subspecialitiesresult[0]['speciality'], true)."', `hospitalSoundex`='".$this->getSoundex($dr_details['name'], true)."', `doctorSlug`='".$dr_slug."', `docDegree`='".$dr_details['docDegree']."' ,`consultancy_fee_referral_on` = '".$consultancy_fee_share_on."', `doctor_fee_after_hospital_share` = '".$doc_fee_after_hospital_share."', `consultancy_referral` = '".$consultancy_referral."', `contract_type` = ".$contractType.", `updatedDate` = '".date('Y-m-d H:i:s')."', hospital_type = ".$hospitalType.", consultation_timing_type = ".$consultationTimingType." Where `timeID`='".$timeID."' AND deleted_at IS NULL ");
                        $result = $stmt->execute();





                    }else{

                        $stmt = Database :: prepare ("INSERT INTO `doclisting` (`dlID`, `docName`, `docPic`, `docExp`, `docFee`, `catID`, `catName`, `spID`, `subspID`, `speciality_id`, `speciality`, `subSpeciality`, `speciality_name`, `gender`, `timeID`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `startTime`, `endTime`, `onCall`, `apptPhone`, `hospital_admin_number`, `hospitalID`, `hospitalName`, `hospitalAddress`, `hospitalCity`, `lat`, `lng`, `hospitalArea`, `hospital_area_slug`, `doctorSoundex`, `specialitySoundex`, `hospitalSoundex`, `doctorSlug`, `docDegree`, `consultancy_fee_referral_on`, `doctor_fee_after_hospital_share`, `consultancy_referral`, `hospital_type`, `active_at`, `contract_type`,`added_by_user_id`, `consultation_timing_type`)".
                            " VALUES ('".$dID."', '".trim($dr_details['docName'])."', '".$dr_details['docPic']."', '".$dr_details['docExp']."', '".$dr_details['docFee']."', '".$dr_details['catID']."', '".$dr_details['catName']."', '".$post['specialities']."', '".$post['subspecialities']."', '".(($post['subspecialities'] == 0) ? $post['specialities'] : $post['subspecialities'])."', '".$dr_details['speciality']."', '".$subspecialitiesresult[0]['speciality']."', '".(($post['subspecialities'] == 0) ? $dr_details['speciality'] : $subspecialitiesresult[0]['speciality'])."', '".$dr_details['gender']."', '".$dr_details['timeID']."', '".$dr_details['monday']."', '".$dr_details['tuesday']."', '".$dr_details['wednesday']."', '".$dr_details['thursday']."', '".$dr_details['friday']."', '".$dr_details['saturday']."', '".$dr_details['sunday']."', '".$dr_details['startTime']."', '".$dr_details['endTime']."', '".$dr_details['onCall']."', '".$dr_details['apptPhone']."', '".$hospitalAdminNumber."', '".$dr_details['hospitalID']."', '".addslashes($dr_details['name'])."', '".addslashes($dr_details['address'])."', '".$dr_details['city']."', '".$dr_details['lat']."', '".$dr_details['lng']."', '".addslashes($dr_details['area'])."', '".$this->slugify($dr_details['area'])."', '".$this->getSoundex(trim($dr_details['docName']), false)."', '".$this->getSoundex($dr_details['speciality'], true) . $this->getSoundex($subspecialitiesresult[0]['speciality'], true)."', '".$this->getSoundex($dr_details['name'], true)."', '".$dr_slug."', '".$dr_details['docDegree']."', '".$consultancy_fee_share_on."', '".$doc_fee_after_hospital_share."', '".$consultancy_referral."', ".$hospitalType.", ". ((!is_null($dr_details['active_at']) && is_null($dr_details['inactive_at'])) ? "NOW()": "NULL") .", ".$contractType.",".$userId.", ".$consultationTimingType.")" ) ;
                        $result = $stmt->execute();
                        $doctorHospitalID = Database::lastInsertId();
                    }


                    if($consultancy_referral != 0) {
                        $stmt = Database::prepare("UPDATE docdetails SET on_panel_at = '" . date('Y-m-d H:i:s') . "', on_panel_by_user_id = " . $userId . " WHERE dlID = " . $dID. " AND on_panel_at IS NULL");
                        $stmt->execute();
                    }

                    if(isset($post['number_of_procedures_'.($index)])){

                        $procedures = $post['number_of_procedures_'.($index)];
                        foreach ($procedures as $proceduresIndex => $procedure) {

                            $procedureArr = explode('_', $procedure);
                            $procedureID = $procedureArr[0];
                            $proceduresNumber = $procedureArr[1];

                            if(isset($post['procedure_fee_share_on_'.($index).'_'.($proceduresNumber)]) && !empty($post['procedure_fee_share_on_'.($index).'_'.($proceduresNumber)])){


                                $procedure_on = $post['procedure_fee_share_on_'.($index).'_'.($proceduresNumber)];
                                $procedure_referral_on = $procedure_on;
                                if(isset($post['procedureName']) && !empty($post['procedureName'])){
                                    if(isset($post['procedureName'][$index]) && isset($post['procedureName'][$index][$proceduresIndex])){
                                        $procedureName = $post['procedureName'][$index][$proceduresIndex];

                                        $procedure_url = $post['procedure_url'][$index][$proceduresIndex];
                                        $hospital_procedure_fee = $post['hospital_procedure_fee'][$index][$proceduresIndex];
                                        $doctor_procedure_fee = $post['doctor_procedure_fee'][$index][$proceduresIndex];
                                        $procedure_referral = $post['procedure_referral'][$index][$proceduresIndex];

                                        if($procedureID != 0){
                                            $stmt = Database::prepare("UPDATE `doctor_procedures` SET `procedure_referral_on` = $procedure_referral_on, `procedure_id` = $procedureName, `procedure_url` = '".$procedure_url."', `total_fee` = $hospital_procedure_fee, `doctor_fee` = $doctor_procedure_fee, `procedure_referral` = $procedure_referral, `contract_type` = $contract_type WHERE `id` = ".$procedureID);
                                            $result = $stmt->execute();
                                        }else{
                                            $stmt = Database::prepare("INSERT INTO `doctor_procedures` (`doctor_hospital_id`, `doctor_id`, `procedure_referral_on`, `procedure_id`, `procedure_url`, `total_fee`, `doctor_fee`, `procedure_referral`, `contract_type`)
															VALUES ($doctorHospitalID, $dID, $procedure_referral_on , $procedureName , '".$procedure_url."', $hospital_procedure_fee, $doctor_procedure_fee, $procedure_referral, $contractType) ");

                                            $result = $stmt->execute();
                                        }
                                    }
                                }

                            }
                        }
                    }

                }
            } catch(PDOException $e) {
                return FALSE;
            }




        }



        return $result;


    }



    function getSpecialitySlug($spID = ''){

//        $stmt = Database::prepare("SELECT slug FROM specialities WHERE spID = ".$spID);
//        $stmt->execute();
//        $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['slug'];


        $result = DB::table('specialities')->select('slug')->get();
        return $result;

    }

    function getDoctorSlugAttribute($dID = 0, $city = null, $spID = 0){


        return "Noslugadded";
//
//        $where  = '';
//        if(!empty($dID)) {
//            $where .= !empty($where) ? ' AND dlID = ' . $dID : ' WHERE dlID = ' . $dID ;
//        }
//
//        if(!is_null($city)) {
//            $where .= !empty($where) ? " AND hospitalCity = '" . $city . "' " : " WHERE hospitalCity = " . $city . "' " ;
//        }
//
//        if(!empty($spID)) {
//            $where .= !empty($where) ? ' AND (spID = ' . $spID . ' OR subspID = ' . $spID . ' ) ' : ' WHERE (spID = ' . $spID . ' OR subspID = ' . $spID . ' ) ' ;
//        }
//
//
//        $where .= !empty($where) ? " AND doclisting.deleted_at IS NULL " : " WHERE doclisting.deleted_at IS NULL ";
//        $where .= !empty($where) ? " AND doclisting.hospital_type = 1 " : " WHERE doclisting.hospital_type = 1 ";
//
//        if(!empty($where)) {
//            $stmt = Database::prepare("SELECT doctorSlug FROM doclisting $where LIMIT 1 ");
//            $stmt->execute();
//            $result = $stmt->fetch(PDO::FETCH_ASSOC);
//            return isset($result['doctorSlug']) ? $result['doctorSlug'] : null;
//
//            $result = DB::table('doclisting')->select('doctorSlug')->get();
//            return $result;
//
//
//        } else {
//            return null;
//        }




    }

    function slugify(){



    }




}
