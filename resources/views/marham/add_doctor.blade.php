<!doctype html>
<html lang="en">

@include('layout.header')

<body>
<div class="container">



    <h2>Add New Doctor</h2>
    <form name="doctor_form" id="doctor_form" action="" method="post" enctype="multipart/form-data">
      @csrf

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
                <select class="form-control"  required="required"  name="categoryid">
                    <option value="0">------Select------</option>
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

            <div class="col-md-12">
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
                <label for="docExp">Experience</label><input type="text" class="form-control" name="docExp" id="docExp" placeholder="Experience in Years" />
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
                <span class="areas  _of_interest" style="padding-left:10px"><input type="checkbox" name="select_all_areas_of_interest" value="1" id="select_all_areas_of_interest"> <label class="select_all_areas_of_interest" for="select_all_areas_of_interest">Select All Areas Of Interest</label></span>
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



        @foreach($hospitals as $hospital)

            <span style="display:none;" id="hidden_city_{{$hospital->hospitalID}}">{{$hospital->city}}</span>
            <span style="display:none;" id="hidden_address_{{$hospital->hospitalID}}">{{$hospital->address}},{{$hospital->city}}</span>
            <span style="display:none;" id="hidden_apptPhone_{{$hospital->hospitalID}}">{{$hospital->phone}}</span>
            <span style="display:none;" id="hidden_hospitalAdminNumber_{{$hospital->hospitalID}}">{{$hospital->admin_number}}</span>

        @endforeach





        <link rel="stylesheet" type="text/css" href="assets/jquery.timeentry.css">
        <script type="text/javascript" src="assets/jquery.plugin.js"></script>
        <script type="text/javascript" src="assets/jquery.timeentry.js"></script>

        <script>
            var time_counter = 0;
            var procedures = new Array();


            $(document).ready(function() {

                $("#subspecialityDiv").hide();
                var subSPID = -1;
                if(subSPID > 0) {
                    $("#subspecialityDiv").show();
                }


                $('.timeEntry').timeEntry({ampmPrefix: ' '});
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $("#specialities1").change(function() {

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
                            data: {subSpID: spID},
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
                        '<input type="text" value="0" name="timeIDs['+time_counter+']" style="display: none" hidden/>'+
                        '<div class="row">'+
                        '<div class="column-full">'+
                        '<input type="checkbox" id="monday['+time_counter+']" value="1" name="monday['+time_counter+']" /> <label for="monday['+time_counter+']" class="day_label">Monday</label>'+
                        '<input type="checkbox" id="tuesday['+time_counter+']" value="1" name="tuesday['+time_counter+']" /> <label for="tuesday['+time_counter+']" class="day_label">Tuesday</label>'+
                        '<input type="checkbox" id="wednesday['+time_counter+']" value="1" name="wednesday['+time_counter+']" /> <label for="wednesday['+time_counter+']" class="day_label">Wednesday</label>'+
                        '<input type="checkbox" id="thursday['+time_counter+']" value="1" name="thursday['+time_counter+']" /> <label for="thursday['+time_counter+']" class="day_label">Thursday</label>'+
                        '<input type="checkbox" id="friday['+time_counter+']" value="1" name="friday['+time_counter+']" /> <label for="friday['+time_counter+']" class="day_label">Friday</label>'+
                        '<input type="checkbox" id="saturday['+time_counter+']" value="1" name="saturday['+time_counter+']" /> <label for="saturday['+time_counter+']" class="day_label">Saturday</label>'+
                        '<input type="checkbox" id="sunday['+time_counter+']" value="1" name="sunday['+time_counter+']" /> <label for="sunday['+time_counter+']" class="day_label">Sunday</label>'+
                        '<br /><input type="checkbox" id="oncall['+time_counter+']" value="1" name="oncall['+time_counter+']" /> <label for="oncall['+time_counter+']" class="day_label">On Call</label>'+
                        '</div></div>'+
                        '<div class="row">'+
                        '<div class="col-md-6">'+
                        '<label for="startTime['+time_counter+']">Start Time</label> <input type="text" class="timeEntry  form-control" value="" id="startTime['+time_counter+']" name="startTime['+time_counter+']" placeholder="Start Time" /></div>'+
                        '<div class="col-md-6">'+
                        '<label for="endTime['+time_counter+']">End Time</label> <input type="text" class="timeEntry  form-control" value="" id="endTime['+time_counter+']" name="endTime['+time_counter+']" placeholder="End Time" /></div>'+
                        '</div>'+
                        appendHospital(time_counter)+
                        appendDoctorHospitalRefferal(time_counter)+
                        // appendRamzanTiming(time_counter)+
                        '<input type="button"   class="removetiming btn" value="-" />'+
                        '</div>'+
                        '<br>'
                    );
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
                    $('.timeEntry').timeEntry({ampmPrefix: ' '});
                });



                // $('.removetiming').click(function() {
                $(document).on('click', '.removetiming', function() {
                    timeID = $(this).parent().children().first().val();
                    if(timeID != 0){
                        $('#doctor_form').append('<input type="hidden" value="'+timeID+'" name="hospitalsToRemove[]">');
                    }
                    $(this).parent().remove();
                });




                $("#add_old").click(function() {
                    time_counter++;
                    var fieldWrapper = $("#buildtimings");
                    var fName = $('<div class="timings"><div class="form-row">'+
                        '<div class="column-half">'+
                        '<label for="startDay">Start Day</label> <input type="text" value="" name="startDay[]" placeholder="Start Day" /></div>'+
                        '<div class="column-half">'+
                        '<label for="startTime">Start Time</label> <input type="text" value="" name="startTime[]" placeholder="Start Time" /></div>'+
                        '</div>'+
                        '<div class="form-row">'+
                        '<div class="column-half">'+
                        '<label for="endDay">End Day</label> <input type="text" value="" name="endDay[]" placeholder="End Day" /></div>'+
                        '<div class="column-half">'+
                        '<label for="endTime">End Time</label> <input type="text" value="" name="endTime[]" placeholder="End Time" /></div>'+
                        '</div>'+
                        appendHospital(time_counter) +
                        '<input type="button" class="removetiming" value="-" />'+
                        '</div>');
                    $('.removetiming').click(function() {
                        $(this).parent().remove();
                    });
                    fieldWrapper.append(fName);
                    $("#buildyourform").append(fieldWrapper);
                });


                $('#select_all_services').click(function() {
                    if($(this).is(':checked')) {
                        $('.speciality_service').prop('checked', true);
                    } else {
                        $('.speciality_service').prop('checked', false);
                    }
                });


                $("#remove_picture").click(function(e) {
                    $("#doctor_form").append('<input type="hidden" name="remove_picture" value="1" />');
                    $("#remove_picture_div").remove();
                });



                $("#onLeave").click(function() {
                    if($(this).is(":checked")) {
                        $("#onLeaveFrom").prop('disabled', false).prop('required', true);
                        $("#onLeaveTo").prop('disabled', false).prop('required', true);
                    } else {
                        $("#onLeaveFrom").prop('disabled', true).prop('required', false);
                        $("#onLeaveTo").prop('disabled', true).prop('required', false);
                    }
                });


                //////////////


                function appendHospital(time_counter) {

                    return '<div class="row">'+
                        '<div class="col-md-6">'+
                        '<label for="hospitals_'+time_counter+'">Hospital</label>'+
                        '<select name="hospitals['+time_counter+']" class="form-control" id="hospitals_'+time_counter+'" onChange="update_address('+ time_counter +', this)">'+
                        '<option value="">--Select Hospital--</option>'+
                        '@foreach($hospitals as $hospital)'+
                        '<span style="display:none;" id="hidden_city_{{$hospital->hospitalID}}">{{$hospital->city}};</span>'+
                        '<span style="display:none;" id="hidden_address_{{$hospital->hospitalID}}">{{$hospital->address}},{{$hospital->city}}</span>'+
                        '<span style="display:none;" id="hidden_apptPhone_{{$hospital->hospitalID}}">{{$hospital->address}}</span>'+
                        '<span style="display:none;" id="hidden_hospitalAdminNumber_{{$hospital->hospitalID}}">{{$hospital->admin_number}}</span>'+
                        '<option value="{{$hospital->hospitalID}}">{{$hospital->name}}</option>'+
                        '@endforeach'+
                        '</select>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                        '<label for="apptPhone['+time_counter+']">Appt Phone (without dashes)</label>'+
                        '<input type="text" value="" class="form-control" id="apptPhone_'+time_counter+'" name="apptPhone['+time_counter+']" placeholder="03334742629, 0426662445" />'+
                        '</div>'+
                        '<div class="row">'+
                        '<div class="col-md-12">'+
                        '<label for="hospitalAdminNumber_['+time_counter+']">Hospital Admin Number</label>'+
                        '<input type="text" class="form-control" value="" id="hospitalAdminNumber_'+time_counter+'" name="hospitalAdminNumber['+time_counter+']" placeholder="Hospital Admin Number" />'+
                        '</div>'+
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
                        '<input type="radio" name="consultancy_fee_share_on['+time_counter+']" id="consultancy_fee_share_on_'+time_counter+'" value="1" checked>Share On Complete Fee'+
                        '</label>'+
                        '<label class="radio-inline">'+
                        '<input type="radio" name="consultancy_fee_share_on['+time_counter+']" id="consultancy_fee_share_on_'+time_counter+'" value="2">Share On Doctor Fee'+
                        '</label>'+
                        '</div>'+
                        '</div>'+
                        '<div class="row" style="margin-top: 10px">'+
                        '<div class="col-md-3">'+
                        '<label>Contract Type <span style="color: red">(Required)</span></label>'+
                        '<select id="contract_type_'+time_counter+'" name="contract_type['+time_counter+']" class="form-control" required>'+
                        '<option value="1" selected >Individual Doctor</option>'+
                        '<option value="2">Hospital Doctor</option>'+
                        '</select>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                        '<label>Consultation Timing <span style="color: red">(Required)</span></label>'+
                        '<select id="consultation_timing_type_'+time_counter+'" name="consultation_timing_type['+time_counter+']" class="form-control" required>'+
                        '<option value="1" selected>Strict</option>'+
                        '<option value="2">Flexible</option>'+
                        '<option value="3">Anytime</option>'+
                        '</select>'+
                        '</div>'+
                        '</div>'+
                        '<div class="row">'+
                        '<div class="col-md-4">'+
                        '<label for="docFee_'+time_counter+'">Complete Fees:</label>'+
                        '<input type="text" class="form-control" name="docFee['+time_counter+']" id="docFee_'+time_counter+'" placeholder="Complete Fee" />'+
                        '</div>'+
                        '<div class="col-md-4">'+
                        '<label for="docFeeAfterHospitalShare_'+time_counter+'">Doctor Fees:</label>'+
                        '<input type="text" class="form-control" name="docFeeAfterShare['+time_counter+']" id="docFeeAfterShare_'+time_counter+'" Placeholder="Doctor Fee">'+
                        '</div>'+
                        '<div class="col-md-4">'+
                        '<label for="consultancy_referral_'+time_counter+'" for="">Referral%:</label>'+
                        '<input type="text" class="form-control" name="consultancy_referral['+time_counter+']" id="consultancy_referral_'+time_counter+'" Placeholder="Consultancy Fee">'+
                        '</div>'+
                        '</div>'+
                        '<div class="procedure_fields_wrap_father_'+time_counter+'" hospitalCounter="'+time_counter+'">'+
                        '<div class="procedure_fields_wrap">'+
                        '<div class="form-row">'+
                        '<div class="column-half">'+
                        '<label class="radio-inline">'+
                        '<input type="radio"  name="procedure_fee_share_on_'+time_counter+'_'+procedureCounter+'" value="1" checked>Share On Complete Fee'+
                        '</label>'+
                        '<label class="radio-inline">'+
                        '<input type="radio"  name="procedure_fee_share_on_'+time_counter+'_'+procedureCounter+'" value="2">Share On Doctor Fee'+
                        '</label>'+
                        '</div>'+
                        '</div>'+
                        '<div class="row">'+
                        '<div class="col-md-2">'+
                        '<label>Procedure Name:</label>'+
                        '<select class="form-control" id="procedures_'+time_counter+'_'+procedureCounter+'" name="procedureName['+time_counter+'][]">'+
                        '<option value="">--Select Procedure--</option>'+
                        '</select>'+
                        '</div>'+
                        '<div class="col-md-2">'+
                        '<label for="procedure_url">URL:</label>'+
                        '<input type="text" class="form-control" name="procedure_url['+time_counter+'][]">'+
                        '</div>'+
                        '<div class="col-md-2">'+
                        '<label for="procedure_url">Hospital Fee:</label>'+
                        '<input type="text" class="form-control" name="hospital_procedure_fee['+time_counter+'][]">'+
                        '</div>'+
                        '<div class="col-md-2">'+
                        '<label for="procedure_doctor_fee">Doctor Fee:</label>'+
                        '<input type="text" class="form-control" name="doctor_procedure_fee['+time_counter+'][]">'+
                        '</div>'+
                        '<div class="col-md-2">'+
                        '<label for="procedure_percentage">Referral%:</label>'+
                        '<input type="text" class="form-control" name="procedure_referral['+time_counter+'][]">'+
                        '</div>'+
                        '<div class="column-fifteen add_or_delete_procedure_button">'+
                        '<a class="add_more_button" hospitalCounter="'+time_counter+'" procedureIndex="'+procedureCounter+'" onclick="return appendDoctorProcedureField(this)" style="padding: 5px; background: #5cb85c" >+</a>'+
                        '</div>'+
                        '</div>'+
                        '</div>'+
                        '</div>';

                }


            });

            function update_address(counter, obj) {


                $('#cities_'+counter).val($("#hidden_city_"+ obj.value ).html());
                $('#address_'+counter).val($("#hidden_address_"+ obj.value ).html());
                $('#apptPhone_'+counter).val($("#hidden_apptPhone_"+ obj.value ).html());
                $('#hospitalAdminNumber_'+counter).val($("#hidden_hospitalAdminNumber_"+ obj.value ).html());


            }

            function appendDoctorProcedureField(event){
                //procedureCounter++;
                hospitalCounter = $(event).attr('hospitalCounter');
                procedureCounter = $(event).attr('procedureIndex');
                procedureCounter++;

                $(".procedure_fields_wrap_father_"+hospitalCounter).append(
                    '<div class="procedure_fields_wrap">'+
                    '<div class="row">'+
                    '<div class="col-md-6">'+
                    '<label class="radio-inline">'+
                    '<input type="radio" name="procedure_fee_share_on_'+hospitalCounter+'_'+procedureCounter+'" value="1" checked>Share On Complete Fee'+
                    '</label>'+
                    '<label class="radio-inline">'+
                    '<input type="radio" name="procedure_fee_share_on_'+hospitalCounter+'_'+procedureCounter+'" value="2">Share On Doctor Fee'+
                    '</label>'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="col-md-2">'+
                    '<label>Procedure Name:</label>'+
                    '<select id="procedures_'+hospitalCounter+'_'+procedureCounter+'" class="form-control" name="procedureName['+hospitalCounter+'][]">'+
                    '<option value="">--Select Procedure--</option>'+
                    '</select>'+
                    '</div>'+
                    '<div class="col-md-2">'+
                    '<label for="procedure_url">URL:</label>'+
                    '<input type="text" class="form-control" name="procedure_url['+hospitalCounter+'][]">'+
                    '</div>'+
                    '<div class="col-md-2">'+
                    '<label for="procedure_url">Hospital Fee:</label>'+
                    '<input type="text" class="form-control" name="hospital_procedure_fee['+hospitalCounter+'][]">'+
                    '</div>'+
                    '<div class="col-md-2">'+
                    '<label for="procedure_doctor_fee">Doctor Fee:</label>'+
                    '<input type="text" class="form-control" name="doctor_procedure_fee['+hospitalCounter+'][]">'+
                    '</div>'+
                    '<div class="col-md-2">'+
                    '<label for="procedure_percentage">Referral%:</label>'+
                    '<input type="text" class="form-control" name="procedure_referral['+hospitalCounter+'][]">'+
                    '</div>'+
                    '<div class="column-fifteen add_or_delete_procedure_button">'+
                    '<a class="add_more_button" class="form-control" hospitalCounter="'+hospitalCounter+'" procedureIndex="'+procedureCounter+'" onclick="return appendDoctorProcedureField(this)" style="padding: 5px; background: #5cb85c">+</a>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                );


                var hospitalCounter = $(event).attr('hospitalcounter');
                $("#number_of_procedures_"+hospitalCounter).append($('<option>', {
                    value: 0+'_'+(procedureCounter),
                    text: 0,
                    selected: true
                }));
                $(event).removeAttr('onclick');
                $(event).addClass('remove_field_button').text('-');
                $(event).on('click', function() {
                    $(event).parent().parent().parent().remove();
                    var procedureID = $(event).attr('procedureID');
                    if(typeof procedureID !== typeof undefined && procedureID !== false){
                        $("#procedureToDelete").append($('<option>', {
                            value: procedureID,
                            text : procedureID,
                            selected: true
                        }));
                    }
                });
                if(procedures){
                    $.each(procedures, function (i, procedure) {
                        $('#procedures_'+hospitalCounter+'_'+procedureCounter).append($('<option>', {
                            value: procedure.id,
                            text : procedure.title
                        }));
                    });
                }
            }

            $(".removeProcedure").click(function(){
                var procedureID = $(this).attr('procedureID');
                $("#procedureToDelete").append($('<option>', {
                    value: procedureID,
                    text : procedureID,
                    selected: true
                }));

                $(this).parent().parent().parent().remove();
            });





        </script>


        <div class="form-row form-group margin-top-2">
            <fieldset class="the-fieldset">
                <legend class="the-legend"><strong>Doctor May Also Occur in <span style="color: red">(Max 5)</span> </strong></legend>
                <div class="form-row">
                    @foreach($specialitiesAndSubSpecialities as $specialitiesAndSubSpeciality)
                        <div class="col-md-4">
                            <input type="checkbox" id="similarSpIds_{{$specialitiesAndSubSpeciality->spID}}" name="similarSpIds[]" value="{{$specialitiesAndSubSpeciality->spID}}">
                            <label for="similarSpIds_{{$specialitiesAndSubSpeciality->spID}}">{{$specialitiesAndSubSpeciality->speciality}}</label>
                        </div>
                    @endforeach
                </div>
            </fieldset>
        </div>

        <br>
        <br>

        <div class="form-row form-group margin-top-2">
            <fieldset class="the-fieldset">
                <legend class="the-legend"><strong><span style="color: red">Actions</span></strong></legend>
                <div class="row">
                    <div class="col-md-4">
                        <input type="checkbox" id="marked_red" name="marked_red" value="1"  >
                        <label for="marked_red">Mark Doctor as Red</label>
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" id="profile_not_completed" name="profile_not_completed" value="1"  >
                        <label for="profile_not_completed">Mark Profile as Incomplete</label>
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" id="first_come_first_serve" name="first_come_first_serve" value="1"  >
                        <label for="first_come_first_serve">First Come First Serve</label>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="form-row form-group margin-top-2">
            <fieldset class="the-fieldset">
                <legend class="the-legend"><strong><span style="color: red">Doctor Leave Form</span></strong></legend>
                <div class="row">
                    <div class="col-md-4" style="margin-top: 20px">
                        <input type="checkbox" class="on_leave"  id="onLeave" name="on_leave" value="1" />
                        <label for="onLeave">On Leave</label>
                    </div>
                    <div class="col-md-4">
                        <label for="onLeaveFrom_0">On Leave From</label>
                        <input type="date" value="" class="form-control" name="on_leave_from" id="onLeaveFrom" disabled value="" placeholder="On Leave From">
                    </div>
                    <div class="col-md-4">
                        <label for="onLeaveTo_0">On Leave To</label>
                        <input type="date" value="" class="form-control" name="on_leave_to" id="onLeaveTo" disabled value="" placeholder="On Leave To">
                    </div>
                </div>
            </fieldset>
        </div>





        <div class="form-row">
            <div class="column-full"><input type="submit" class="btn-success" class="submit" name="send" id="send" value="Send" /></div>
        </div>


    </form>

</div>


<div id="divLoading" hidden style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(102, 102, 102); z-index: 30001; opacity: 0.8;">
    <p style="position: absolute; color: white; top: 50%; left: 45%;">
        Processing, please wait...
    </p>
</div>







</body>
</html>
