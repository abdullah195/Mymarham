<?php


namespace App;
use Illuminate\Support\Facades\DB;
use Database;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;



class Doctor
{


    var $limit = 25;

    public function getDoctorDetailForForm($id='') {
        $result = FALSE;

        $where = "WHERE d.dlID = 0";
        if(!empty($id)) {
            $where = "WHERE d.dlID = $id";
        }
        try {

            $stmt = Database :: prepare ( "SELECT d.dlID, d.docEmail, d.physician, d.relief, d.marham, d.pmdc, d.gender, d.surgen, d.docPhone, d.docDetails, d.docDegree, d.docName, d.docPic, d.docExp, s.speciality, d.subspID, s.spID, d.catID, d.interview, d.title, d.aboutMe, d.video_consultancy, d.home_service, d.learn_more, d.appointment_number,d.appointment_instructions, d.fix_fee, d.area_of_interest
					from docdetails d
					LEFT JOIN specialities s on d.spID = s.spID
					$where " ) ;
            $stmt -> execute ( ) ;
            $qry_result =  $stmt -> fetchAll (PDO::FETCH_ASSOC) ;
            if(!empty($qry_result))
            {
                $qry_result =  $qry_result[0] ;
                $qry_result['docName'] = $qry_result['docName'];

                //print_r($qry_result);
                /*$services = $this->getDoctorServices($qry_result['dlID']);*/

                $services = $this->getDoctorDefaultServices($qry_result['dlID']);
                $addonServices = $this->getDoctorAddonServices($qry_result['dlID']);

                //Get doctor added areas of interest
                $areasOfInterest = $this->getDoctorAreasOfInterest($qry_result['dlID']);
                $addonAreasOfInterest = $this->getDoctorAddonAreasOfInterest($qry_result['dlID']);

                $specialities = $this->getDoctorSpecialities($qry_result['dlID']);

                $hospitals = $this->getApttimes($qry_result['dlID']);
                $qualifications = $this->getDoctorQualifications($qry_result['dlID']);
                $publications = $this->getDoctorPublications($qry_result['dlID']);
                $experiences = $this->getDoctorExperiences($qry_result['dlID']);


                for ($s=0 ; $s<count($hospitals) ; $s++){
                    $hospitals[$s]['hospitalAddress'] = ucwords(strtolower($hospitals[$s]['hospitalAddress']));
                    $hospitals[$s]['hospitalName'] = ucwords(strtolower($hospitals[$s]['hospitalName']));
                    // $result[$s]['docName'] = $result[$s]['docName'];
                    //get doctor procedures
                    $hospitals[$s]['doctorProcedures'] = $this->getDoctorProcedures($hospitals[$s]['doctorHospitalID']);
                }

                $result = array_merge(array('details' => $qry_result), array('hospitalTimings' => $hospitals, 'services' => $services, 'qualifications' => $qualifications, 'publications' => $publications, 'experiences' => $experiences, 'addonServices' => $addonServices, 'areasOfInterest' => $areasOfInterest, 'addonAreasOfInterest' => $addonAreasOfInterest, 'specialities' => $specialities));
                //$result = array_merge(array('details' => $qry_result), array('hospitalTimings' => $hospitals, 'services' => $services, 'specialities' => $specialities));
                //echo "<pre>";print_r($result);exit;
            }

        } catch(PDOException $e) {
            return 0;
        }
        return $result;
    }



    public function getDoctorDefaultServices($id = '') {
        try {
            $stmt = Database :: prepare ( "SELECT s.sID, s.service
					FROM services s
					JOIN servicesdoctor sd on s.sID = sd.sID
					WHERE sd.dID = $id AND s.defaultService=1" ) ;
            $stmt -> execute ( ) ;
            return $stmt -> fetchAll (PDO::FETCH_ASSOC) ;
        } catch(PDOException $e) {
            return;
        }
        return;
    }



    /**
     * get doctor addon services from database
     */
    public function getDoctorAddonServices($id = '') {
        try {
            $stmt = Database :: prepare ( "SELECT s.sID, s.service
					FROM services s
					JOIN servicesdoctor sd on s.sID = sd.sID
					WHERE sd.dID = $id AND s.defaultService=0" ) ;
            $stmt -> execute ( ) ;
            return $stmt -> fetchAll (PDO::FETCH_ASSOC) ;
        } catch(PDOException $e) {
            return;
        }
        return;
    }


    /**
     * get doctor selected areas of interest
     */
    public function getDoctorAreasOfInterest($dID) {
        $result = [];
        try {
            $stmt = Database::prepare("SELECT da.area_of_interest_id, ga.title FROM doctor_areas_of_interest da
										JOIN global_areas_of_interest AS ga ON da.area_of_interest_id = ga.id
										WHERE da.doctor_id= $dID AND ga.doctor_id = 0");
            $stmt->execute();
            $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $result = [];
        }
        return $result;
    }

    /**
     * get doctor selected areas of interest
     */
    public function getDoctorAddOnAreasOfInterest($dID) {
        $result = [];

        try {
            $stmt = Database::prepare("SELECT da.area_of_interest_id, ga.title FROM doctor_areas_of_interest da
										JOIN global_areas_of_interest AS ga ON da.area_of_interest_id = ga.id
										WHERE da.doctor_id= $dID AND ga.doctor_id != 0");
            $stmt->execute();
            $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $result = [];
        }
        return $result;
    }



    /**
     * get doctor specialities from database
     */
    public function getDoctorSpecialities($id = '') {
        try {
            $stmt = Database :: prepare ( "SELECT s.spID, s.speciality
					FROM specialities s
					JOIN specialitydoctor sd on s.spID = sd.spID
					WHERE sd.dID = $id" ) ;
            $stmt -> execute ( ) ;
            $result = $stmt -> fetchAll (PDO::FETCH_ASSOC) ;
            return $stmt -> fetchAll (PDO::FETCH_ASSOC) ;
        } catch(PDOException $e) {
            return;
        }
        return;


    }


    /**
     * get appoint times( from database
     */
    public function getApttimes($dID = '') {
        $where = '';
        if(!empty($dID)) {
            $where = "WHERE a.dID = $dID";
        }
        if(!empty($where)) {
            $where .= " AND d.deleted_at IS NULL ";
        }
        else {
            $where = "WHERE d.deleted_at IS NULL ";
        }
        if(!empty($where)) {
            $where .= " AND a.deleted_at IS NULL ";
        }
        else {
            $where = "WHERE a.deleted_at IS NULL ";
        }
        try {
            //`dID`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `onCall`, `docFee`, `startTime`, `endTime`, `apptPhone`, `hospitalID`

            $stmt = Database :: prepare ( "SELECT a.`timeID`, d.`id` AS doctorHospitalID, a.`monday`, a.`tuesday`, a.`wednesday`, a.`thursday`, a.`friday`, a.`saturday`, a.`sunday`, a.`onCall`, a.`docFee`, d.`consultancy_fee_referral_on`, d.`doctor_fee_after_hospital_share`, d.`consultancy_referral` ,a.startTime, a.endTime, a.dID, a.apptPhone, a.hospitalID, h.city as hospitalCity , h.name as hospitalName, h.address as hospitalAddress, h.lat, h.lng, h.area as hospitalArea, d.similar_id_1, d.similar_id_2, d.similar_id_3, d.similar_id_4, d.similar_id_5
								FROM  apttimes a
								JOIN doclisting d ON a.timeID = d.timeID
								JOIN hospitals h on a.hospitalID = h.hospitalID
								$where
								;" );


            $stmt -> execute ( ) ;
            $result =  $stmt -> fetchAll (PDO::FETCH_ASSOC) ;
        } catch(PDOException $e) {
            return 0;
        }
        return $result;
    }



    /**
     * This function is used to
     * get doctor qualifications
     */

    public function getDoctorQualifications($dID = '') {
        $result = '';
        if(!empty($dID)) {
            try {
                $stmt = Database::prepare("SELECT dID, institute, qualification, year_from, year_to FROM doctor_qualifications WHERE dID = " . $dID);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return 0;
            }
        }
        return $result;
    }




    /**
     * This function is used to
     * get doctor publications
     */

    public function getDoctorPublications($dID = '') {
        $result = '';
        if(!empty($dID)) {
            try {
                $stmt = Database::prepare("SELECT dID, publication, year_of_publication FROM doctor_publications WHERE dID = " . $dID);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return 0;
            }
        }
        return $result;
    }


    /**
     * This function is used to
     * get doctor experiences
     */

    public function getDoctorExperiences($dID = '') {
        $result = '';
        if(!empty($dID)) {
            try {
                $stmt = Database::prepare("SELECT dID, designation, institute, years, year_from, year_to FROM doctor_experiences WHERE dID = " . $dID);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return 0;
            }
        }
        return $result;
    }




    /**
     * This function is used to get doctor selected procedures
     */

    public function getDoctorProcedures($doctorHospitalID=''){

        $stmt = Database::prepare("SELECT * FROM doctor_procedures WHERE doctor_hospital_id = ".$doctorHospitalID);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }














    public function getSubSpeciality($specialityID = '') {


        try {

            $stmt = Database::prepare ( "SELECT spID, speciality from specialities WHERE parent = $specialityID " ) ;
            $stmt -> execute () ;
            $result =  $stmt -> fetchAll (PDO::FETCH_ASSOC) ;

        } catch(PDOException $e) {

            return FALSE;

        }


        return $result;


    }




}


