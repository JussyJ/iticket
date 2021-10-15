<?php 
    require_once 'header.html';
    require_once 'app/iticket/services/serv.data.php';
    require_once 'app/iticket/directives/dire.data.php';
    $dire = new Dire(); $data = new DATA(); $dire->auto_ackduedate(); 
?>

<main class="cd-main-content">
<div class="page-content">

<link rel="stylesheet" href="assets/appraisal_performance/css/style.css">
<link rel="stylesheet" href="assets/css/overlayimg/imgoverlay.css">
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/loader/loader.css">
<link rel="stylesheet" href="assets/css/modal/modalorg.css">
<link rel="stylesheet" href="assets/iticket/css/style.css">
<script src="assets/js/modal/jquery.min.js"></script>
<script src="assets/js/modal/bootsrap.min.js"></script>
<body>
    <div id="wboverlay" class="wboverlay">
		<div class="wbspinner">
			<i class="mylogo">
				<img src="app/leave_fac/icon/wbloader.png" alt="">
			</i>
		</div>
	</div>
    

    <!-- <div class="row mymenu" style="margin-top:30px;">
        <div class="large-4 columns">
            <div class="" style="padding: 10px;">
                <input type="text" placeholder="Search Ticket ID" name="inputsrch" id="inputsrch" class="menusearch">
            </div>
            
        </div>
        <div class="large-8 columns">
            <div class="row" style="text-align: center;">
                <div class="large-2 columns mymenudiv" title="Home" id="go_home">
                    <i class="fa fa-home" aria-hidden="true"></i>&nbsp;HOME
                </div>
                <div class="large-3 columns mymenudiv" title="New Ticket" id="go_newticket">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;NEW TICKET
                </div>
                <div class="large-3 columns mymenudiv" title="View Ticket" id="go_viewticket">
                    <i class="fa fa-ticket" aria-hidden="true"></i>&nbsp;VIEW TICKET
                </div>
                <div class="large-2 columns mymenudiv" title="Reports" id="go_reports">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;REPORTS
                </div>
                <div class="large-2 columns mymenudiv" title="Admin" id="go_admin">
                    <i class="fa fa-cog" aria-hidden="true"></i>&nbsp;ADMIN
                </div>
            </div>
        </div>
    </div> -->

    <div class="row" style="margin-top:0px;">
        <div class="large-12 columns">
            <div class="container theme-cactus">
                <div class="ui-tabgroup">
                    <input class="ui-tab1" type="radio" id="tgroup_c1_tab1" name="tgroup_c1" checked />
                    <input class="ui-tab2" type="radio" id="tgroup_c1_tab2" name="tgroup_c1" />
                    <input class="ui-tab3" type="radio" id="tgroup_c1_tab3" name="tgroup_c1" />
                    <input class="ui-tab4" type="radio" id="tgroup_c1_tab4" name="tgroup_c1" />
                    <input class="ui-tab5" type="radio" id="tgroup_c1_tab5" name="tgroup_c1" />
                    <div class="ui-tabs">
                        <label class="ui-tab1 f15" for="tgroup_c1_tab1" id="go_home"><i class="fa fa-home" aria-hidden="true"></i>HOME</label>
                        <label class="ui-tab2 f15" for="tgroup_c1_tab2" id="go_viewticket"><i class="fa fa-ticket" aria-hidden="true"></i>VIEW TICKET</label>
                        <label class="ui-tab3 f15" for="tgroup_c1_tab3" id="go_report"><i class="fa fa-folder-open" aria-hidden="true"></i>REPORT</label>
                        <label class="ui-tab4 f15" for="tgroup_c1_tab4" id="go_admin"><i class="fa fa-cog" aria-hidden="true"></i>ADMINISTRATOR</label>
                        <label class="ui-tab5 f15" for="tgroup_c1_tab5" id="go_myhist"><i class="fa fa-cog" aria-hidden="true"></i>HISTORY</label>
                        <img src="assets/iticket/icons/iticketlogo.png" alt="" style="float: right;margin-top:-20px;" width="10%">
                    </div>
                </div>
                
            </div>

            <div style="color: #fff;border-top: 5px solid #42A5F5;margin-top: -20px;padding: 5px;">
                <div class="row" style="padding-top: 10px;padding-bottom:10px;">
                    <div class="large-4 columns">
                        <input type="text" placeholder="Search Ticket ID" name="inputsrch" id="inputsrch" class="menusearch">
                    </div>
                    <div class="large-8 columns" style="text-align: right;">
                        <a class="jussybtnticketnew" title="Apply Leave" id="go_newticket"><i class="fa fa-ticket" aria-hidden="true"></i> &nbsp;New Ticket</a>
                    </div>
                </div>
                 <div id="divtcktlst"></div>
            </div>
        </div>
    </div>
   
    <div id="jfooter"></div>
</body>

</div>
</main>

<div class="modal fade" id="modalnewticket" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog modal-xl">

            <div class="modal-content">

                <div class="modal-header" style="padding-top: 0px;">
                    <div class="row">
                        <div class="large-9 columns">
                            <label for="" class="HRIStabHeader headertxtshadow focus-in-expand-fwd myfontmodalheader">NEW TICKET</label>
                        </div>
                        <div class="large-3 columns float-center">
                           
                            <div class="input-group mb-3 newmb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                       <label for="" class="font13B">FORM TYPE &nbsp;<i class="fa fa-tags" aria-hidden="true"></i></label>
                                    </span>
                                </div>
                                <select name="cboformtype" id="cboformtype" class="selecticon custom-select form-control bold13">
                                    <option value="1">A</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="large-12 columns">
                            <fieldset style="margin-top: 0px;">
                                <legend>EMPLOYEE INFORMATION</legend>
                            
                                    <div class="row">
                                        <div class="large-6 columns">
                                            <label for="">
                                                Employee Name
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" class="inputicon form-control boldB" id="txtempname" name="txtempname" autocomplete="off" style="text-transform:uppercase;background: #E8E8E8;" readonly>
                                            </div>
                                        </div>
                                        <div class="large-6 columns">
                                            <label for="">
                                                Department
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-university" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" class="inputicon form-control boldB" id="txtdept" name="txtdept" autocomplete="off" style="text-transform:uppercase;background: #E8E8E8;" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="large-6 columns">
                                            <label for="">
                                                Location
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" class="inputicon form-control boldB" id="txtloc" name="txtloc" autocomplete="off" style="text-transform:uppercase;background: #E8E8E8;" readonly>
                                            </div>
                                        </div>
                                        <div class="large-6 columns">
                                            <label for="">
                                                IP Address
                                                <span id="errtxtipadd" class="errFloatright"></span>
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-desktop" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" class="inputicon form-control boldB freq" id="txtipadd" name="txtipadd" autocomplete="off" style="background: #E8E8E8;" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="large-6 columns">
                                            <label for="">
                                                Emaill Address
                                                <span id="errtxtemail" class="errFloatright">Required</span>
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" class="inputicon form-control boldB freq" id="txtemail" name="txtemail" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="large-6 columns">
                                            <label for="">
                                                Contact Number
                                                <span id="errtxtcontact" class="errFloatright">Required</span>
                                            </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                                </div>
                                                <input type="text" class="inputicon form-control boldB freq" id="txtcontact" name="txtcontact" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                            </fieldset>
                        </div>
                    </div>            
                    
                    <div class="row">
                        <div class="large-6 columns">
                            <label class="boldB" for="" style="font-weight: bold; ">
                                TICKET INCHARGE
                                <span id="errcbotcktinchrg" class="errFloatright"></span>
                            </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-tag" aria-hidden="true"></i></span>
                                </div>
                                <select name="cbotcktinchrg" id="cbotcktinchrg" class="selecticon custom-select form-control bold13 htxt">
                                    <option value="" disabled selected >Please Select</option>
                                </select>  
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-12 columns">
                            <label class="boldB" for="" style="font-weight: bold; ">
                                SUBJECT
                                <span id="errtxtsubject" class="errFloatright"></span>
                            </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="inputicon form-control boldB freq" id="txtsubject" name="txtsubject" autocomplete="off" style="text-transform:uppercase;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-12 columns">
                            <label class="boldB" for="" style="font-weight: bold; ">
                                PROBLEM DESCRIPTION
                                <span id="errtxtprobdesc" class="errFloatright"></span>
                            </label>
                            <textarea name="txtprobdesc" id="txtprobdesc" class="myFont freq" style="width: 100%;"></textarea>
                        </div>
                    </div>

                    <div class="row" style="text-align: center;">
                        <div class="large-12 columns">
                            <input type="file"  accept="image/*, application/pdf" name="image" id="file"  onchange="loadFile(event)" style="display: none;">
                            <label class="bold12" style="font-weight: bold;float: left;" for="file" style="cursor: pointer;"><i class="fa fa-paperclip" aria-hidden="true" style="font-size: 20px;"></i> &nbsp;ATTACHMENT</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <img id="output"/>
                            <label id="lblpdf" class="lblpdf"><img src="assets/iticket/icons/pdf_copy.JPG" alt="" style="width: 50px;"><span id="fileoutput"></span></label>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="row" >
                        <div class="large-12 columns" style="text-align: right;">
                            <a id="btntcktsubmit" class="submitButton" style="color:green;" title="Submit"><i class="fa fa-check-circle-o" aria-hidden="true"></i> SUBMIT</a>
                            <a class="submitButton btnclosemodal" id="closemodalnewticket" style="color:red;" data-dismiss="modal" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i> CLOSE</a>
                        </div>
                    </div>
                </div>
                <div id="msgalertmemoACK" class="alert alert-success"><span id="msgtxt"></span></div>
            </div>
    </div>
</div>

<div class="modal fade" id="modalcreatefor" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog modal-sm">
 
            <div class="modal-content" style="margin-top: 30%;">
                <div class="modal-body">
                    <div class="row">
                        <div class="large-12 columns">
                            <label class="boldB" for="" style="font-weight: bold; ">
                                EMPLOYEE ID NUMBER
                            </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="inputicon form-control boldB freq" id="txtcreatefor" name="txtcreatefor" autocomplete="off" style="text-transform:uppercase;">
                            </div>
                            <label for="" class="font12">Press Enter to Continue <u style="float: right;color: red;font-weight: bold" title="Cancel" id="cancelme">Cancel</u></label>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="modal fade" id="modalticketid" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog modal-sm">

            <div class="modal-content" style="margin-top: 30%;">
                <div class="modal-body">
                    <div class="row">
                        <div class="large-12 columns checkmarkdiv">
                            <div class="checkmark" >
                                <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                                    </path></svg>
                                <svg class="checkmark__background" height="90" viewBox="0 0 120 115" width="95" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z" >
                                    </path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns" style="text-align: center;">
                            <label for="" class="font13">Ticket ID <u id="utcktid" class="font16B"></u> </label>
                            <label for="" class="success14B">Successfully Created! <a class="font13"><u id="uoknwtckt">OK</u></a></label>

                        </div>  
                    </div>
                </div>
            </div>
    </div>
</div>


<div class="modal fade" id="modalviewticket" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog modal-xl">

            <div class="modal-content">

                <div class="modal-header" style="padding-top: 0px;text-align: right;">
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="" class="HRIStabHeader headertxtshadow focus-in-expand-fwd myfontmodalheader">VIEW TICKET</label>
                        </div>
                    </div>
                </div>
                
                <div class="modal-body">
                    <div id="viewtcktdiv"></div>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="large-6 columns">
                            <a id="btnvwhistory" class="submitButton" style="color:blue;" title="View History"><i class="fa fa-history" aria-hidden="true"></i> VIEW HISTORY</a>
                        </div>
                        <div class="large-6 columns" style="text-align: right;">
                            <a id="btnvwtcktsubmit" class="submitButton" style="color:green;" title="Submit"><i class="fa fa-check-circle-o" aria-hidden="true"></i> SUBMIT</a>
                            <a class="submitButton btnclosemodal" id="closemodalnewticket" style="color:red;" data-dismiss="modal" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i> CLOSE</a>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</div>

<div class="modal fade" id="modalviewticketack" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="padding-top: 0px;text-align: right;">
                <div class="row">
                    <div class="large-12 columns">
                        <label for="" class="HRIStabHeader headertxtshadow focus-in-expand-fwd myfontmodalheader">VIEW TICKET</label>
                    </div>
                </div>
            </div>
            
            <div class="modal-body">
                <div id="viewtcktdivb"></div>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="large-6 columns">
                        <a id="btnvwhistoryb" class="submitButton" style="color:blue;" title="View History"><i class="fa fa-history" aria-hidden="true"></i> VIEW HISTORY</a>
                    </div>
                    <div class="large-6 columns" style="text-align: right;">
                        <a id="btnack" class="submitButton" style="color:green;" title="Response"><i class="fa fa-check-circle-o" aria-hidden="true"></i> RESPONSE</a>
                        <a class="submitButton btnclosemodal" id="closemodalnewticket" style="color:red;" data-dismiss="modal" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i> CLOSE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalviewtickethist" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog modal-xl">

            <div class="modal-content">

                <div class="modal-header" style="padding-top: 0px;text-align: right;">
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="" class="HRIStabHeader headertxtshadow focus-in-expand-fwd myfontmodalheader">VIEW TICKET HISTORY</label>
                        </div>
                    </div>
                </div>
                
                <div class="modal-body">
                    <div id="viewtckthisdiv"></div>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="large-12 columns" style="text-align: right;">
                            <a class="submitButton btnclosemodal" id="closemodalnewticket" style="color:red;" data-dismiss="modal" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i> CLOSE</a>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</div>

<div class="modal fade" id="modalack" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header" style="padding-top: 0px;">
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="" class="HRIStabHeader headertxtshadow focus-in-expand-fwd myfontmodalheader">RESPONSE</label>
                        </div>
                    </div>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="large-12 columns">
                            <table style="width:100%">
                                <tr class="acktr">
                                    <td class="ackA" title="Acknowledge" id="tdagree">
                                        <label for="" style="font-size: 20px; font-weight: bold;font-family: 'Open Sans', sans-serif;color: #3c763d;">ACKNOWLEDGE &nbsp;<i class="fa fa-thumbs-o-up" aria-hidden="true"></i></label>
                                        <div>
                                            Ticket will be closed.
                                        </div>
                                    </td>
                                    <td class="ackD" title="Return" id="tddisagree">
                                        <label for="" style="font-size: 20px; font-weight: bold;font-family: 'Open Sans', sans-serif;color: #ff0000;">RETURN &nbsp;<i class="fa fa-thumbs-o-down" aria-hidden="true"></i></label>
                                        <div>
                                            Ticket will be pending.
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="large-12 columns" style="text-align: right;">
                            <a class="submitButton btnclosemodal" id="closemodalnewticket" style="color:red;" data-dismiss="modal" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i> CLOSE</a>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</div>


<div class="modal fade" id="modaldisagree" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header" style="padding-top: 0px;">
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="" class="HRIStabHeader headertxtshadow focus-in-expand-fwd myfontmodalheader">RETURN REMARKS</label>
                        </div>
                    </div>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="large-12 columns">
                            <label class="boldB" for="" style="font-weight: bold; ">
                                REMARKS
                                <span id="errackremarks" class="errFloatrightC">Required</span>
                            </label>
                            <textarea name="ackremarks" id="ackremarks" class="myFont freq" style="width: 100%;"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="large-12 columns" style="text-align: right;">
                            <a id="btnsbtack" class="submitButton" style="color:green;" title="Submit"><i class="fa fa-check-circle-o" aria-hidden="true"></i> SUBMIT</a>
                            <a class="submitButton btnclosemodal" style="color:red;" data-dismiss="modal" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i> CLOSE</a>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</div>

<div class="modal fade" id="modalrateme" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog">

            <div class="modal-content" style="background-color: rgba(0,0,0,0);box-shadow: none;border:0px;">

                <div class="modal-body">
                    <div class="row">
                        <div class="large-12 columns">
                            <div id="divrating"></div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</div>

<div class="modal fade" id="modalvwdtl" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header" style="padding-top: 0px;">
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="">Problem Category</label>
                            <label for="" id="lbl_prbcat" class="HRIStabHeader headertxtshadow focus-in-expand-fwd myfontmodalheader">CATEGORY</label>
                        </div>
                    </div>
                </div>
                
                <div class="modal-body">
                   <div id="mdldvdtl"></div>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="large-12 columns" style="text-align: right;">
                            <a class="submitButton btnclosemodal" style="color:red;" data-dismiss="modal" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i> CLOSE</a>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</div>

<div class="modal fade" id="modalvwdtlB" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header" style="padding-top: 0px;">
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="">Problem Cause</label>
                            <label for="" id="lbl_prbcause" class="HRIStabHeader headertxtshadow focus-in-expand-fwd myfontmodalheader"></label>
                        </div>
                    </div>
                </div>
                
                <div class="modal-body">
                   <div id="mdldvdtlB"></div>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="large-12 columns" style="text-align: right;">
                            <a class="submitButton btnclosemodal" style="color:red;" id="btnclsmb" data-dismiss="modal" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i> CLOSE</a>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</div>

<div class="modal fade" id="modaladminadd" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: scroll;">
    <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header" style="padding-top: 0px;">
                    <div class="row">
                        <div class="large-12 columns">
                            <label for="" class="HRIStabHeader headertxtshadow focus-in-expand-fwd myfontmodalheader">ADD NEW</label>
                        </div>
                    </div>
                </div>
                
                <div class="modal-body">
                   <div id="divadminadd"></div>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="large-12 columns" style="text-align: right;">
                            <a id="btnaddadmnnew" class="submitButton" style="color:green;" title="Submit"><i class="fa fa-check-circle-o" aria-hidden="true"></i> SUBMIT</a>
                            <a class="submitButton btnclosemodal" style="color:red;" data-dismiss="modal" title="Close"><i class="fa fa-times-circle-o" aria-hidden="true"></i> CLOSE</a>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</div>

<div class="modal fade" id="modaliticketg" role="dialog">
    <div class="modal-dialog" style="margin-top:-20px;">
        <div class="modal-content">
            <div class="modal-body">
                <img src="assets/iticket/icons/iticketv2_g.jpg" alt="" width="100%">
            </div>
        </div>
    </div>
</div>

<script src = "assets/iticket/js/jquery-ui1.10.4.js"></script>
<script>
    var appaccess = '<?php echo $data->userAppaccess($empid); ?>';
    var empid = '<?php echo $empid; ?>';
    var empdept = '<?php echo $data->i_emp($empid, 'iddept') ?>'
    var updtdtcktby = '<?php echo $empid.' - '.$data->empfullname($empid); ?>';
    var addspcat;
    $('#modaliticketg').modal('toggle');
</script>
<script src = "assets/iticket/js/user.main.js"></script>







