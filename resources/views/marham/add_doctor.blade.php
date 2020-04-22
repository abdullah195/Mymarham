<!doctype html>
<html lang="en">

@include('layout.header')

<body>
<div class="container">



    <h2>Add New Doctor</h2>
    <div class="row">
        <div class="col-md-6">
            <label for="docName">Name</label>
            <input type="text" value="" class="form-control" name="docName" id="docName" placeholder="Full Name" />
        </div>

        <div class="col-md-6">
            <label for="docEmail">Email</label>
            <input type="email" value="" name="docEmail" class="form-control" id="docEmail" placeholder="Email" />
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <label for="docEmail"> Category<span style="color: red">*</span></label>
        <select class="form-control" required="required">
            <option>------Select------</option>
            @foreach($categories as $category)
                <option value={{$category->catID}}>{{$category->catName}}</option>
            @endforeach
        </select>
        </div>

        <div class="col-md-6">
            <label for="docDegree">Degree <span style="color: red">*</span></label>
            <input type="text" value="" class="form-control" name="docDegree" id="docDegree" placeholder="Degree" required="required"/>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <label for="docPhone">Doctor Phone Number(without dashes)</label>
            <input placeholder="03334742629" type="text" class="form-control" value="" name="docPhone" id="docPhone" placeholder="Phone" />
        </div>
        <div class="col-md-6">
            <label for="docPic">Picture</label>
            <input type="file" value="" name="docPic" class="form-control" id="docPic" placeholder="Picture" />
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <label for="docPhone">Doctor Phone Number(without dashes)</label>
            <input  type="text" value="" class="form-control" name="docPhone" id="docPhone" placeholder="Phone Number" />
        </div>

        <div class="col-md-6">
            <label>Assistant Phone Number (without dashes)</label>
            <input type="text" name="appointment_number" class="form-control" id="appointment_number" value="" placeholder="Assistant Phone Number e.g; 03001234567" />
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="pmdc">PMDC</label>
            <input type="text" value="" name="pmdc" class="form-control" id="pmdc" placeholder="PMDC (Maximum 10 digits)" />
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <label for="relief">Relief</label> <input type="text" value="0" class="form-control" name="relief" id="relief" placeholder="Relief for patients" />
        </div>
        <div class="col-md-6">
            <label for="marham">Marham</label>
            <input type="text" value="0" name="marham" class="form-control" id="marham" placeholder="Marham Discount" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <input  type="checkbox" name="video_consultancy" value="1" id="video_consultancy">
            <label class="day_label2" for="video_consultancy">Willing For Video Consultancy</label>
        </div>

        <div class="col-md-6">
            <input  type="checkbox" name="home_service" value="1" id="home_service">
            <label class="day_label2" for="home_service">Willing to see patient at home</label>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <label for="docEmail">Specialty<span style="color: red">*</span></label>
            <select name="specialities" id="specialities1" class="form-control"  required="required">
                <option>------Select------</option>
                @foreach($specialities as $speciality)
                    <option value={{$speciality->spID}}>{{$speciality->speciality}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="docExp">Experience</label> <input type="text" class="form-control" name="docExp" id="docExp" placeholder="Experience in Years" />
        </div>
    </div>


    <div id="subspecialityDiv" class="row">
        <div class="col-md-6">
            <label for="subspecialities">Sub Speciality <span style="color: red">*</span></label>
            <select name="subspecialities" class="form-control" id="subspecialities">
            </select>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <strong><label for="gender">Select Gender</label>&nbsp;</strong>
            <input type="radio" name="gender" id="male" value="1" > <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="0" > <label for="female">Female</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <strong><label for="fix_fee">Display Fee as </label>&nbsp;</strong>
            <input type="radio" name="fix_fee" id="fix_fee" value="1" > <label for="fix_fee">Fix Amount</label>
            <input type="radio" name="fix_fee" id="range_fee" value="0" > <label for="range_fee">Range</label>
        </div>
    </div>


    <div class="row">

        <div class="col-md-12">
            <label for="services">Services</label>&nbsp;
            <span class="service"><input type="checkbox" name="select_all_services" value="1" id="select_all_services"> <label class="day_label2" for="select_all_services">Select All Services</label></span>
            <span class="service"><input  type="checkbox" name="physician" value="1" id="physician"> <label class="day_label2" for="physician">Physician</label></span>
            <span class="service"><input  type="checkbox" name="surgen" value="1" id="surgen"> <label class="day_label2" for="surgen">Surgen</label></span>

            <div id="services_box" style="width:100%; border:1px solid #CCC; height:150px; overflow:auto; padding:7px;">
                Please select speciality
            </div>

            <div id="addonServices_box" style="width:100%; border:1px solid #CCC; height:150px; overflow:auto; padding:7px;">
                Please select speciality
            </div>
            <br><label>Select Areas of interest</label>
            <span class="areas_of_interest" style="padding-left:10px"><input type="checkbox" name="select_all_areas_of_interest" value="1" id="select_all_areas_of_interest"> <label class="select_all_areas_of_interest" for="select_all_areas_of_interest">Select All Areas Of Interest</label></span>
            <div id="speciality_areas_of_interest_box" style="width:100%; border:1px solid #CCC; height:150px; overflow:auto; padding:7px;">
                Please select speciality
            </div>
            <div id="add_on_areas_of_interest_box" style="width:100%; border:1px solid #CCC; height:150px; overflow:auto; padding:7px;">
                Please select speciality
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="docDetails">Details</label>
            <textarea class="form-control" name="docDetails"  id="docDetails" rows="7" placeholder="Doctor Details"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <label for="docDetails">Appointment Instructions:</label>
            <textarea class="form-control" name="appointment_instructions" id="appointment_instructions" rows="7" placeholder="Appointment Instructions"></textarea>
        </div>

        <div class="col-md-12">
            <label for="sales_notes">Notes for Sales Team:</label>
            <textarea id="sales_notes"  class="form-control" name="sales_notes" rows="7" placeholder="Notes for Sales Team"></textarea>
        </div>
    </div>




    <div class="dyn">
        <fieldset id="buildtimings" class="the-fieldset">
            <legend class="the-legend">Timings <span style="color: red">*</span></legend>
            <select id="procedureToDelete" name="procedureToDelete[]" multiple hidden>
            </select>
        </fieldset>
        <br /><input type="button" value="Add New Time" class="add" id="add" />
    </div>




    <link rel="stylesheet" type="text/css" href="assets/jquery.timeentry.css">
    <script type="text/javascript" src="assets/jquery.plugin.js"></script>
    <script type="text/javascript" src="assets/jquery.timeentry.js"></script>

    <script>
        var time_counter = '0';
        var procedures = new Array();



        $(document).ready(function() {

            $("#subspecialityDiv").hide();
            {{--var subSPID = <?php echo $subspID; ?>;--}}
            {{--if(subSPID > 0) {--}}
            //     $("#subspecialityDiv").show();
            {{--}--}}


           $('.timeEntry').timeEntry({ampmPrefix: ' '});

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#specialities1").change(function() {

                alert("specialities1 11");
                var spID = this.value;
                var request1 = $.ajax({
                    url: "getsubspeciality",
                    method: "POST",
                    data: { spID : spID },
                    dataType: "html"
                });


                request1.done(function( data ) {

                    if(data.length<56) {

                        $("#subspecialities").empty();
                        $("#subspecialityDiv").hide();
                        $('#services_box').html("");
                        $('#speciality_areas_of_interest_box').html("");
                        $('#add_on_areas_of_interest_box').html("");

                        var request = $.ajax({
                            url: "defaultServices",
                            method: "POST",
                            data: { spID : spID },
                            dataType: "html"
                        });

                        var request2 = $.ajax({
                            url: "addonServices",
                            method: "POST",
                            data: { spID : spID },
                            dataType: "html"
                        });


                        var areasOfInterestRequest = $.ajax({
                            url: "get_speciality_areas_of_interest",
                            method: "GET",
                            data: { spID : spID},
                            dataType: "html"
                        });


                        var AddOnareasOfInterestRequest = $.ajax({
                            url: "get_add_on_areas_of_interest",
                            method: "GET",
                            dataType: "html"
                        });


                        $('#select_all_services').prop('checked', false);

                        request.done(function( data ) {

                            $('#services_box').html(data);

                        });

                        request.fail(function( jqXHR, textStatus ) {

                            alert("failed");

                            $('#services_box').html('Please select speciality');

                        });

                        request2.done(function( data ) {

                            $('#addonServices_box').html(data);

                        });

                        request2.fail(function( jqXHR, textStatus ) {

                            $('#addonServices_box').html('');

                        });

                        areasOfInterestRequest.done(function(data){

                            alert("get_speciality_areas_of_interest"+data);
                            $("#speciality_areas_of_interest_box").html(data);
                        });

                        areasOfInterestRequest.fail(function( jqXHR, textStatus ) {
                           alert("failed areas of interest");
                            $('#speciality_areas_of_interest_box').html('');

                        });

                        AddOnareasOfInterestRequest.done(function(data){

                            alert("add_on_areas_of_interest_box"+data);
                            $("#add_on_areas_of_interest_box").html(data);
                        });

                        AddOnareasOfInterestRequest.fail(function( jqXHR, textStatus ) {
                            $('#add_on_areas_of_interest_box').html('');

                        });

                    }

                    /***********************/

                    else {

                        $('#services_box').html("");

                        $('#addonServices_box').html("");
                        $('#speciality_areas_of_interest_box').html("");
                        $('#add_on_areas_of_interest_box').html("");

                        $("#subspecialities").empty();
                        $("#subspecialityDiv").show();
                        $("#subspecialities").append(data);

                    }

                });

                request1.fail(function( jqXHR, textStatus ) {

                    $('#services_box').html('Please select speciality');

                    $('#addonServices_box').html('Please select speciality');
                    $('#speciality_areas_of_interest_box').html("");

                    $('#add_on_areas_of_interest_box').html("");

                });

            });

        //////////////////

            $("#subspecialities").change(function() {

                var spID = this.value;

                if(spID > 0) {

                    var request = $.ajax({

                        url: "index.php?action=defaultServices",

                        method: "POST",

                        data: { spID : spID },

                        dataType: "html"

                    });

                    var request2 = $.ajax({

                        url: "index.php?action=addonServices",

                        method: "POST",

                        data: { spID : spID },

                        dataType: "html"

                    });

                    var areasOfInterestRequest = $.ajax({
                        url: "index.php?action=get_speciality_areas_of_interest",
                        method: "GET",
                        data: {subSpID: spID},
                        dataType: "html"
                    });

                    var AddOnareasOfInterestRequest = $.ajax({
                        url: "index.php?action=get_add_on_areas_of_interest",
                        method: "GET",
                        dataType: "html"
                    });


                    $('#select_all_services').prop('checked', false);

                    request.done(function( data ) {

                        $('#services_box').html(data);

                    });

                    request.fail(function( jqXHR, textStatus ) {

                        $('#services_box').html('Please select speciality');

                    });

                    request2.done(function( data ) {

                        $('#addonServices_box').html(data);

                    });

                    request2.fail(function( jqXHR, textStatus ) {

                        $('#addonServices_box').html('');

                    });

                    areasOfInterestRequest.done(function(data){
                        $("#speciality_areas_of_interest_box").html(data);
                    });

                    areasOfInterestRequest.fail(function( jqXHR, textStatus ) {
                        $("#speciality_areas_of_interest_box").html('');

                    });

                    AddOnareasOfInterestRequest.done(function(data){
                        $("#add_on_areas_of_interest_box").html(data);
                    });

                    AddOnareasOfInterestRequest.fail(function( jqXHR, textStatus ) {
                        $('#add_on_areas_of_interest_box').html('');

                    });

                }

                else {

                    $('#services_box').html('Please select speciality');

                    $('#addonServices_box').html('Please select speciality');

                }

            });




            $("#specialities1").change(function(){


                var spID = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: "get_procedures_by_speciality",
                    data: {
                        spID: spID
                    },
                    success: function(data){
                        if(data.status){
                            procedures = data.procedures;

                        }
                    }
                });
            });



        //////////////////////////////


            $("#add").click(function() {

                procedureCounter =0;
                time_counter++;

                var fieldWrapper = $("#buildtimings");

                var fName = $(
                    '<div class="timings">'+

                    '<input type="text" value="0" class="form-control" name="timeIDs['+time_counter+']" style="display: none" hidden/>'+
                    '<div class="form-row">'+
                    '<div class="column-full">'+
                    '<input type="checkbox" id="monday['+time_counter+']" class="form-control" value="1" name="monday['+time_counter+']" /> <label for="monday['+time_counter+']" class="day_label">Monday</label>'+
                    '<input type="checkbox" id="tuesday['+time_counter+']" value="1" name="tuesday['+time_counter+']" /> <label for="tuesday['+time_counter+']" class="day_label">Tuesday</label>'+

                    '<input type="checkbox" id="wednesday['+time_counter+']" value="1" name="wednesday['+time_counter+']" /> <label for="wednesday['+time_counter+']" class="day_label">Wednesday</label>'+

                    '<input type="checkbox" id="thursday['+time_counter+']" value="1" name="thursday['+time_counter+']" /> <label for="thursday['+time_counter+']" class="day_label">Thursday</label>'+

                    '<input type="checkbox" id="friday['+time_counter+']" value="1" name="friday['+time_counter+']" /> <label for="friday['+time_counter+']" class="day_label">Friday</label>'+

                    '<input type="checkbox" id="saturday['+time_counter+']" value="1" name="saturday['+time_counter+']" /> <label for="saturday['+time_counter+']" class="day_label">Saturday</label>'+

                    '<input type="checkbox" id="sunday['+time_counter+']" value="1" name="sunday['+time_counter+']" /> <label for="sunday['+time_counter+']" class="day_label">Sunday</label>'+

                    '<br /><input type="checkbox" id="oncall['+time_counter+']" value="1" name="oncall['+time_counter+']" /> <label for="oncall['+time_counter+']" class="day_label">On Call</label>'+

                    '</div></div>'+

                    '<div class="form-row">'+

                    '<div class="column-half">'+

                    '<label for="startTime['+time_counter+']">Start Time</label> <input type="text" class="timeEntry" value="" id="startTime['+time_counter+']" name="startTime['+time_counter+']" class="form-control" placeholder="Start Time" /></div>'+

                    '<div class="column-half">'+

                    '<label for="endTime['+time_counter+']">End Time</label> <input type="text" class="timeEntry" value="" id="endTime['+time_counter+']" name="endTime['+time_counter+']" class="form-control" placeholder="End Time" /></div>'+

                    '</div>'+

                    appendHospital(time_counter)+
                    appendDoctorHospitalRefferal(time_counter)+

                    '<input type="button" class="removetiming" class="form-control" value="-" />'+

                    '</div>'+
                    '<br>'

                );

                $('.removetiming').click(function() {
                    timeID = $(this).parent().children().first().val();
                    if(timeID != 0){
                        $('#doctor_form').append(
                            '<input type="text" class="form-control" value="'+timeID+'" name="hospitalsToRemove[]">'
                        );
                    }
                    $(this).parent().remove();

                });

                fieldWrapper.append(fName);

                $("#buildyourform").append(fieldWrapper);
                if(procedures){
                    $.each(procedures, function (i, procedure) {
                        $('#procedures_'+time_counter+'_'+procedureCounter).append($('<option>', {
                            value: procedure.id,
                            text : procedure.title
                        }));
                    });
                }




                //$('.timeEntry').ptTimeSelect();

                $('.timeEntry').timeEntry({ampmPrefix: ' '});

            });





            function appendHospital(time_counter) {

                return '<div class="form-row">'+
                    '<div class="column-half">'+
                    '<label for="hospitals_'+time_counter+'">Hospital</label>'+
                    '<select name="hospitals['+time_counter+']" class="form-control" id="hospitals_'+time_counter+'" onChange="update_address('+ time_counter +', this)">'+
                    '<option value="">--Select Hospital--</option>'+
                    '@foreach($hospitals as $hospital)\n' +
                    {{--'              echo \'<span style="display:none;" id="hidden_city_{{$hospital->hospitalID}}">{{$hospital->city}}</span>;' +--}}
                    {{--'            echo \'<span style="display:none;" id="hidden_address_{{$hospital->hospitalID}}">{{$hospital->address}},{{$hospital->city}}\'</span>\';\n' +--}}
                    {{--'            echo \'<span style="display:none;" id="hidden_apptPhone_\'.{{$hospital->hospitalID}}.\'">\'.{{$hospital->phone}}.\'</span>\';\n' +--}}
                    {{--'            echo \'<span style="display:none;" id="hidden_hospitalAdminNumber_\'.{{$hospital->hospitalID}}.\'">\'.{{$hospital->admin_number}}.\'</span>\';\n ' +--}}
                    '                <option value={{$hospital->hospitalID}}>{{$hospital->name}}</option>\n' +
                    '@endforeach'+
                    '</select>'+
                    '</div>'+
                    '<div class="column-half">'+
                    '<label for="apptPhone['+time_counter+']">Appt Phone (without dashes)</label>'+
                    '<input type="text" value="" class="form-control" id="apptPhone_'+time_counter+'" name="apptPhone['+time_counter+']" placeholder="03334742629, 0426662445" />'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="column-full">'+
                    '<label for="address_'+time_counter+'">Address</label>'+
                    '<textarea  class="form-control" name="address['+time_counter+']" id="address_'+time_counter+'" rows="5" placeholder="Hospital Address" readonly disabled></textarea>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                    ;


            }


            function appendDoctorHospitalRefferal(time_counter){

                procedureCounter++;
                return '<label style="padding-left: 15px; font-weight: bold;">Add Doctor Consultancy Referral:</label>'+
                    '<div class="form-row">'+
                    '<div class="column-half procedure-checkboxes">'+
                    '<label class="radio-inline">'+
                    '<input type="radio" class="form-control" name="consultancy_fee_share_on['+time_counter+']" id="consultancy_fee_share_on_'+time_counter+'" value="1" checked>Share On Complete Fee'+
                    '</label>'+
                    '<label class="radio-inline">'+
                    '<input type="radio" class="form-control" name="consultancy_fee_share_on['+time_counter+']" id="consultancy_fee_share_on_'+time_counter+'" value="2">Share On Doctor Fee'+
                    '</label>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="column-onethird">'+
                    '<label for="docFee_'+time_counter+'">Complete Fees:</label>'+
                    '<input type="text" class="form-control" name="docFee['+time_counter+']" id="docFee_'+time_counter+'" placeholder="Complete Fee" />'+
                    '</div>'+
                    '<div class="column-onethird">'+
                    '<label for="docFeeAfterHospitalShare_'+time_counter+'">Doctor Fees:</label>'+
                    '<input type="text" class="form-control" name="docFeeAfterShare['+time_counter+']" id="docFeeAfterShare_'+time_counter+'" Placeholder="Doctor Fee">'+
                    '</div>'+
                    '<div class="column-onethird">'+
                    '<label for="consultancy_referral_'+time_counter+'" for="">Referral%:</label>'+
                    '<input type="text" class="form-control" name="consultancy_referral['+time_counter+']" id="consultancy_referral_'+time_counter+'" Placeholder="Consultancy Fee">'+
                    '</div>'+
                    '</div>'+
                    '<div class="procedure_fields_wrap_father_'+time_counter+'" hospitalCounter="'+time_counter+'">'+
                    '<label style="padding-left: 15px; font-weight: bold;">Add Doctor Procedures:</label>'+
                    '<select id="number_of_procedures_'+time_counter+'" class="form-control" name="number_of_procedures_'+time_counter+'[]" multiple hidden>'+
                    '<option value="0_1" selected>0</option>'+
                    '</select>'+
                    '<div class="procedure_fields_wrap">'+
                    '<div class="form-row">'+
                    '<div class="column-half">'+
                    '<label class="radio-inline">'+
                    '<input type="radio" class="form-control" name="procedure_fee_share_on_'+time_counter+'_'+procedureCounter+'" value="1" checked>Share On Complete Fee'+
                    '</label>'+
                    '<label class="radio-inline">'+
                    '<input type="radio" class="form-control" name="procedure_fee_share_on_'+time_counter+'_'+procedureCounter+'" value="2">Share On Doctor Fee'+
                    '</label>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-row">'+
                    '<div class="column-twice">'+
                    '<label>Procedure Name:</label>'+
                    '<select class="form-control" id="procedures_'+time_counter+'_'+procedureCounter+'" name="procedureName['+time_counter+'][]">'+
                    '<option value="">--Select Procedure--</option>'+
                    '</select>'+
                    '</div>'+
                    '<div class="column-twice">'+
                    '<label for="procedure_url">URL:</label>'+
                    '<input type="text" name="procedure_url['+time_counter+'][]">'+
                    '</div>'+
                    '<div class="column-fifteen">'+
                    '<label for="procedure_url">Hospital Fee:</label>'+
                    '<input type="text" name="hospital_procedure_fee['+time_counter+'][]">'+
                    '</div>'+
                    '<div class="column-fifteen">'+
                    '<label for="procedure_doctor_fee">Doctor Fee:</label>'+
                    '<input type="text" name="doctor_procedure_fee['+time_counter+'][]">'+
                    '</div>'+
                    '<div class="column-fifteen">'+
                    '<label for="procedure_percentage">Referral%:</label>'+
                    '<input type="text" name="procedure_referral['+time_counter+'][]">'+
                    '</div>'+
                    '<div class="column-fifteen add_or_delete_procedure_button">'+
                    '<a class="add_more_button" hospitalCounter="'+time_counter+'" procedureIndex="'+procedureCounter+'" onclick="return appendDoctorProcedureField(this)">+</a>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>';

            }

        });

    </script>

    <div class="form-row form-group margin-top-2">
        <fieldset class="the-fieldset">
            <legend class="the-legend"><strong>Doctor May Also Occur in <span style="color: red">(Max 5)</span> </strong></legend>
            <div class="form-row">
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_33" name="similarSpIds[]" value="33"  >
                    <label for="similarSpIds_33">Cardiac Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_34" name="similarSpIds[]" value="34"  >
                    <label for="similarSpIds_34">Cardiologist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_53" name="similarSpIds[]" value="53"  >
                    <label for="similarSpIds_53">Chiropractor</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_60" name="similarSpIds[]" value="60"  >
                    <label for="similarSpIds_60">Cosmetic Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_1" name="similarSpIds[]" value="1"  >
                    <label for="similarSpIds_1">Dentistry</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_16" name="similarSpIds[]" value="16"  >
                    <label for="similarSpIds_16">Dietetics/ Nutritionist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_62" name="similarSpIds[]" value="62"  >
                    <label for="similarSpIds_62">Endocrinologist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_42" name="similarSpIds[]" value="42"  >
                    <label for="similarSpIds_42">Ent Physician</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_41" name="similarSpIds[]" value="41"  >
                    <label for="similarSpIds_41">Ent Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_45" name="similarSpIds[]" value="45"  >
                    <label for="similarSpIds_45">Eye Specialist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_46" name="similarSpIds[]" value="46"  >
                    <label for="similarSpIds_46">Eye Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_6" name="similarSpIds[]" value="6"  >
                    <label for="similarSpIds_6">Gastroenterology</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_25" name="similarSpIds[]" value="25"  >
                    <label for="similarSpIds_25">General Physician</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_26" name="similarSpIds[]" value="26"  >
                    <label for="similarSpIds_26">General Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_2" name="similarSpIds[]" value="2"  >
                    <label for="similarSpIds_2">Gynecology/ Obstetrician</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_4" name="similarSpIds[]" value="4"  >
                    <label for="similarSpIds_4">Homeopath</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_52" name="similarSpIds[]" value="52"  >
                    <label for="similarSpIds_52">Internal Medicine</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_49" name="similarSpIds[]" value="49"  >
                    <label for="similarSpIds_49">Interventional Cardiologist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_20" name="similarSpIds[]" value="20"  >
                    <label for="similarSpIds_20">Liver Specialist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_48" name="similarSpIds[]" value="48"  >
                    <label for="similarSpIds_48">Lung Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_23" name="similarSpIds[]" value="23"  >
                    <label for="similarSpIds_23">Nephrology</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_37" name="similarSpIds[]" value="37"  >
                    <label for="similarSpIds_37">Neuro Physician</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_35" name="similarSpIds[]" value="35"  >
                    <label for="similarSpIds_35">Neuro Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_17" name="similarSpIds[]" value="17"  >
                    <label for="similarSpIds_17">Oncology</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_39" name="similarSpIds[]" value="39"  >
                    <label for="similarSpIds_39">Orthopedic Physician</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_40" name="similarSpIds[]" value="40"  >
                    <label for="similarSpIds_40">Orthopedic Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_24" name="similarSpIds[]" value="24"  >
                    <label for="similarSpIds_24">Pathology</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_59" name="similarSpIds[]" value="59"  >
                    <label for="similarSpIds_59">Pediatric Cardiac Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_66" name="similarSpIds[]" value="66"  >
                    <label for="similarSpIds_66">Pediatric Cardiologist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_64" name="similarSpIds[]" value="64"  >
                    <label for="similarSpIds_64">Pediatric Orthopedic Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_30" name="similarSpIds[]" value="30"  >
                    <label for="similarSpIds_30">Pediatric Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_29" name="similarSpIds[]" value="29"  >
                    <label for="similarSpIds_29">Pediatrician</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_11" name="similarSpIds[]" value="11"  >
                    <label for="similarSpIds_11">Physiotherapy</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_65" name="similarSpIds[]" value="65"  >
                    <label for="similarSpIds_65">Plastic Surgeon</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_9" name="similarSpIds[]" value="9"  >
                    <label for="similarSpIds_9">Psychiatry</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_54" name="similarSpIds[]" value="54"  >
                    <label for="similarSpIds_54">Psychologist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_47" name="similarSpIds[]" value="47"  >
                    <label for="similarSpIds_47">Pulmonologist / Lung</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_22" name="similarSpIds[]" value="22"  >
                    <label for="similarSpIds_22">Radiology</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_57" name="similarSpIds[]" value="57"  >
                    <label for="similarSpIds_57">Rheumatologist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_55" name="similarSpIds[]" value="55"  >
                    <label for="similarSpIds_55">Sexologist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_61" name="similarSpIds[]" value="61"  >
                    <label for="similarSpIds_61">Urologist</label>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" id="similarSpIds_63" name="similarSpIds[]" value="63"  >
                    <label for="similarSpIds_63">Vascular Surgeon</label>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="form-row">
        <div class="column-full"><input type="submit" class="btn-success" class="submit" name="send" id="send" value="Send" /></div>
    </div>

    </div>
</div>

</body>
</html>
