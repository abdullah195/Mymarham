<?php

namespace App\Http\Controllers;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{


    public $service;
    public function __construct(Service $service)
    {
        $this->service =$service;
    }

    public function getdefaultServices(Request $request){

        $data= $request->spID;
        $defaultServices = DB::table('services')->select('sID','service','spID')
            ->where('spID','=',$data)
            ->where('defaultService','=',1)
            ->orderBy('service')->get();

        $obj = json_decode($defaultServices);



        foreach($obj as $key => $value) {
            echo '<span class="service">
                     <input class="speciality_service" type="checkbox" id="services_'.$value->sID.'" value="'.$value->sID.'" name="services[]" />
                      <label for="services_'.$value->sID.'" class="day_label">'.$value->service.'</label>
                  </span>';
        }

        return;

    }


    public function getaddonServices(Request $request) {

        $data= $request->spID;
        $addonServices = DB::table('services')->select('sID','service','spID')
            ->where('spID','=',$data)
            ->where('defaultService','=',0)
            ->orderBy('service')->get();

        $obj = json_decode($addonServices);


        foreach($obj as $key => $value) {
            echo '<span class="service">
                  <input class="addonservice" type="checkbox" id="services_'.$value->sID.'" value="'.$value->sID.'" name="services[]" />
                   <label for="services_'.$value->sID.'" class="day_label">'.$value->service.'</label>
                  </span>';
        }




        return;

    }


    public function get_speciality_areas_of_interest(Request $request){

        $data= $request->spID;

        $get_speciality_areas_of_interest = DB::table('global_areas_of_interest')
            ->where('speciality_id','=',$data)->get();

        $obj = json_decode($get_speciality_areas_of_interest);

        foreach ($obj as $key => $areaOfInterest) {
            echo '<span class="areasOfInterest">
						<input class="speciality_areasOfInterest" type="checkbox" id="areasOfInterest_'.$areaOfInterest->id.'" value="'.$areaOfInterest->id.'" name="areasOfInterest[]" />
						<label for="services_'.$areaOfInterest->id.'" class="day_label">'.$areaOfInterest->title.'</label>
					</span>';
        }

        return;

    }



    public function get_add_on_areas_of_interest(){



        $get_speciality_areas_of_interest = DB::table('global_areas_of_interest')
            ->where('doctor_id','!=',0)->get();

        $obj = json_decode($get_speciality_areas_of_interest);

        foreach ($obj as $key => $areaOfInterest) {
            echo '<span class="areasOfInterest">
							<input class="speciality_areasOfInterest" type="checkbox" id="areasOfInterest_'.$areaOfInterest->id.'" value="'.$areaOfInterest->id.'" name="areasOfInterest[]" />
							<label for="services_'.$areaOfInterest->id.'" class="day_label">'.$areaOfInterest->title.'</label>
						</span>';
        }



        return ;
    }


    public function get_procedures_by_speciality(Request $request){

        $data= $request->spID;

        $get_procedures_by_speciality = DB::table('global_procedures')
            ->select('global_procedure_id AS id','global_procedure_title AS title')
            ->where('speciality_id','=',$data)
            ->where('deleted','=',0)->get();

        $procedures= json_decode($get_procedures_by_speciality);

        if(!empty($procedures)){
            $output =array(
                'status' => true,
                'procedures' => $procedures
            );
        }else{
            $output = array(
                'status' => false
            );
        }



        return;
    }


}
