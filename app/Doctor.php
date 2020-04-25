<?php


namespace App;
use Illuminate\Support\Facades\DB;
use Database;
use Illuminate\Database\Eloquent\Model;




class Doctor
{



    function addDoctorDetail($post = ''){


        $id=0;
        $result = FALSE;
        //If valid request

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


                $id = DB::table('docdetails')->insertGetId(
                    [
                        `surgen` => $surgen,
                        `physician` => $physician,
                        `docName` => $docName,
                        `docExp` => $docExp,
                        `docEmail` => $docEmail,
                        `docPhone` => $docPhone,
                        `docDetails` => $docDetails,
                        `docDegree` => $docDegree,
                        `catID` => $categoryid,
                        `spID` => $specialities,
                        `subspID` => $subspecialities,
                        `relief` => $relief,
                        `marham` => $marham,
                        `pmdc` => $pmdc,
                        `gender` => $gender,
                        `willing_for_video_consultancy` => $willing_for_video_consultancy,
                        `home_service` => $home_service ,
                        `appointment_instructions` => $appointmentInstructions,
                        `appointment_number` => $appointment_number,
                        `fix_fee` => $fix_fee,
                        `marked_red` => $markedRed,
                        `sales_notes` => $salesNotes,
                        `profile_not_completed` => $profileNotCompleted,
                        `added_by_user_id` => '0',
                        `on_leave` => $onLeave,
                        `on_leave_from` => $onLeaveFrom,
                        `on_leave_to` => $onLeaveTo,
                        `first_come_first_serve` => $firstComeFirstServe
                    ]
                );


//                if(isset($post['dlID']) && !empty($post['dlID'])) {
//                    $lastId = $post['dlID'];
//                    $docDetails = str_replace("'", "''", $post['docDetails']);
//                    $leaveUpdateQuery = ($onLeave == 1) ? (" on_leave = 1, on_leave_from = '".$onLeaveFrom."', on_leave_to = '" . $onLeaveTo . "' ") : " on_leave = 0, on_leave_from = NULL, on_leave_to = NULL ";
//                    $stmt = Database::prepare("UPDATE `docdetails` SET `surgen` = '".$surgen."',`physician` = '".$physician."',`docName` = '".$post['docName']."',`docExp`='".$post['docExp']."',`docEmail`='".$post['docEmail']."', `docPhone`='".$post['docPhone']."', `docDetails`='".$docDetails."' ,`docDegree`='".$post['docDegree']."', `catID`='".$post['catID']."', `spID`='". $post['specialities'] ."', `subspID`='". $post['subspecialities'] ."', `relief`='". $post['relief'] ."', `marham`='". $post['marham'] ."', `pmdc`='". $post['pmdc'] ."', `gender`='". $post['gender'] ."', `willing_for_video_consultancy` = ".$willing_for_video_consultancy.", `home_service` = ".$home_service.", `appointment_number` = '".$post['appointment_number']."', `appointment_instructions` = '".$appointmentInstructions."',  `fix_fee` = ".intval($post['fix_fee']).", `marked_red` = ".$markedRed.", sales_notes = '".$salesNotes."', profile_not_completed = ".$profileNotCompleted.", ".$leaveUpdateQuery.", first_come_first_serve = " . $firstComeFirstServe . ", partnership_company_id = ".$post['partnership_company_id'].", updated_at = NOW() WHERE dlID = ".$post['dlID'] ) ;
//                    $result = $stmt->execute();
//                } else {
//                    $stmt = Database::prepare("INSERT INTO `docdetails` (`surgen`, `physician`, `docName`,`docExp`,`docEmail`, `docPhone`, `docDetails`, `docDegree`, `catID`, `spID`, `subspID`, `relief`, `marham`, `pmdc`, `gender`, `willing_for_video_consultancy`, `home_service`, `appointment_instructions`, `appointment_number`, `fix_fee`, `marked_red`, `sales_notes`, `profile_not_completed`,`added_by_user_id`, `on_leave`, `on_leave_from`, `on_leave_to`, `first_come_first_serve`, `partnership_company_id`)".
//                        " VALUES ('".$surgen."', '".$physician."', '".trim($post['docName'])."', '".$post['docExp']."', '".$post['docEmail']."', '".$post['docPhone']."', '".$post['docDetails']."', '".$post['docDegree']."', '".$post['catID']."', '". $post['specialities'] ."', '". $post['subspecialities'] ."', '". $post['relief'] ."', '". $post['marham'] ."', '". $post['pmdc'] ."', '". $post['gender'] ."', '".$willing_for_video_consultancy."', '".$home_service."', '".$appointmentInstructions."' , '".$post['appointment_number']."', ".intval($post['fix_fee']).", ".$markedRed.", '".$salesNotes."', ".$profileNotCompleted.",".$userId.", ".$onLeave.", ".(!is_null($onLeaveFrom) ? "'".$onLeaveFrom."'" : "NULL").", ".(!is_null($onLeaveTo) ? "'".$onLeaveTo."'" : "NULL").", ".$firstComeFirstServe.", ".$post['partnership_company_id'].")" ) ;
//                    $result = $stmt->execute ( ) ;
//                    $lastId = Database::lastInsertId();
//                    $this->updateDoctorAuthToken((!empty($post['dlID']) ? $post['dlID'] : $lastId), $this->generateDoctorAuthToken($lastId));
//                }
//
//                if(($onLeave == 1) || (($onLeave == 0) && $isDoctorOnLeave)) {
//                    $this->updateOnLeaveDoctorPoints($lastId, ($onLeave == 1), ($onLeave == 0), $onLeaveFrom, $onLeaveTo);
//                }
//
//
//                return $lastId;




            } catch(PDOException $e) {
                return FALSE;
            }
        }


        return $id;


    }




}





