<?php require_once 'app/iticket/services/serv.data.php';$data = new DATA(); ?>

<div class="row">
    <div class="large-12 columns">
        <fieldset style="margin-top: 0px;">
            <legend>TICKET DETAILS</legend>
            <div class="row">
                <div class="large-6 columns">
                    <div class="row">
                        <div class="large-6 columns">
                            <label for="">
                                Ticket ID
                            </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-ticket" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="inputicon form-control boldB disinput uppercase" id="txttcktid" name="txttcktid" autocomplete="off" readonly>
                            </div>
                        </div>
                        <div class="large-6 columns">
                            <label for="">
                                Date Reported
                            </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="inputicon form-control boldB disinput uppercase" id="txtrprtdate" name="txtrprtdate" autocomplete="off" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="large-6 columns" id="tcktcrtdby">
                    <label for="">
                        Created by
                    </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="inputicon form-control boldB disinput uppercase" id="txtcrtby" name="txtcrtby" autocomplete="off" readonly>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <fieldset style="margin-top: 0px;">
            <legend>FROM : EMPLOYEE INFORMATION</legend>
        
                <div class="row">
                    <div class="large-6 columns">
                        <label for="">
                            Employee Name
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="inputicon form-control boldB disinput uppercase" id="txtfrom" name="txtfrom" autocomplete="off" readonly>
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
                            <input type="text" class="inputicon form-control boldB disinput uppercase" id="txtdeptmnt" name="txtdeptmnt" autocomplete="off" readonly>
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
                            <input type="text" class="inputicon form-control boldB disinput uppercase" id="txtlocation" name="txtlocation" autocomplete="off" readonly>
                        </div>
                    </div>
                    <div class="large-6 columns">
                        <label for="">
                            IP Address
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-desktop" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="inputicon form-control boldB disinput" id="txtipaddress" name="txtipaddress" autocomplete="off" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="large-6 columns">
                        <label for="">
                            Emaill Address
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="inputicon form-control boldB disinput freq" id="txtemailadd" name="txtemailadd" autocomplete="off" readonly>
                        </div>
                    </div>
                    <div class="large-6 columns">
                        <label for="">
                            Contact Number
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="inputicon form-control boldB disinput freq" id="txtcontactno" name="txtcontactno" autocomplete="off" readonly>
                        </div>
                    </div>
                </div>

        </fieldset>
    </div>
</div>            

<div class="row">
    <div class="large-6 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            TICKET INCHARGE - DEPARTMENT
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB disinput htxt" id="txttcktinchrg" name="txttcktinchrg" readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            SUBJECT
            <span id="errtxtsubj" class="errFloatrightB"></span>
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB disinput uppercase freq" id="txtsubj" name="txtsubj" autocomplete="off">
        </div>
    </div>
</div>

<div class="row">
    <div class="large-12 columns" id="contentdiv">
        <label class="boldB" for="" style="font-weight: bold; ">
            <div class="row">
                <div class="large-6 columns">
                    PROBLEM DESCRIPTION
                </div>
                <div class="large-6 columns" style="text-align: right;">
                    <a id="viewattchment" onclick ="return popup(this, 'jussy')">
                        <label class="boldB" style="cursor: pointer;color:red;" title="View Attachment"><i class="fa fa-paperclip" aria-hidden="true" style="font-size: 20px;"></i> &nbsp;VIEW ATTACHMENT</label>
                    </a>
                </div>
            </div>
        </label>
        <textarea name="txtproblemdesc" id="txtproblemdesc" class="myFont freq" style="width: 100%;background: white;" readonly><?php echo $data->i_ticketdtl($_GET['i'], 'problemdesc') ?></textarea>
    </div>
</div>

<div class="row">
    <div class="large-6 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            PROBLEM CATEGORY
            <span id="errcbotcktcat" class="errFloatrightB">Required</span>
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
            </div>
            <select name="cbotcktcat" id="cbotcktcat" class="selecticon custom-select form-control bold13 htxt">
                <option value="" disabled selected >Please Select</option>
            </select>  
        </div>
    </div>
    <div class="large-6 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            PROBLEM CAUSE
            <span id="errcbotcktpcause" class="errFloatrightB">Required</span>
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
            </div>
            <select name="cbotcktpcause" id="cbotcktpcause" class="selecticon custom-select form-control bold13 htxt">
                <option value="" disabled selected >Please Select</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="large-6 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            SERVICES AFFECTED
            <span id="errcboservaffected" class="errFloatrightB">Required</span>
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-tag" aria-hidden="true"></i></span>
            </div>
            <select name="cboservaffected" id="cboservaffected" class="selecticon custom-select form-control bold13 htxt">
                <option value="" disabled selected >Please Select</option>
            </select>  
        </div>
    </div>
    <div class="large-6 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            SERVICE PROVIDER/VENDOR
            <span id="errcboservprov" class="errFloatrightB">Required</span>
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-tag" aria-hidden="true"></i></span>
            </div>
            <select name="cboservprov" id="cboservprov" class="selecticon custom-select form-control bold13 htxt">
                <option value="" disabled selected >Please Select</option>
            </select>  
        </div>
    </div>
</div>

<div class="row">
    <div class="large-7 columns">
        <div class="row">
            <div class="large-6 columns">
                <label class="boldB" for="" style="font-weight: bold; ">
                    PRIORITY
                    <span id="errcbopriority" class="errFloatrightB">Required</span>
                </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-tags" aria-hidden="true"></i></span>
                    </div>
                    <select name="cbopriority" id="cbopriority" class="selecticon custom-select form-control bold13 htxt">
                    </select>  
                </div>
            </div>
            <div class="large-6 columns">
                <label class="boldB" for="" style="font-weight: bold; ">
                    STATUS
                </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    </div>
                    <select name="cbotcktstatus" id="cbotcktstatus" class="selecticon custom-select form-control bold13 htxt">
                        <option value="3">PENDING</option>
                        <option value="4">CANCEL</option>
                        <option value="5">FOR ACKNOWLEDGEMENT</option>
                    </select>
                </div>
            </div>
        </div>
    </div>


    <div class="large-5 columns" id="rslvddt">
        <div class="row">
            <div class="large-6 columns">
                <label class="boldB" for="" style="font-weight: bold;">
                    RESOLVE DATE
                    <span id="errtxtdateresolved" class="errFloatrightB">Required</span>
                </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" class="inputicon form-control boldB htxt" id="txtdateresolved" name="txtdateresolved" placeholder="YYYY-MM-DD" readonly>
                </div>
            </div>
            <div class="large-6 columns">
                <label class="boldB" for="" style="font-weight: bold; ">
                    RESOLVE TIME
                    <span id="errtxttimeresolved" class="errFloatrightB">Required</span>
                </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                    </div>
                    <input type="time" class="inputicon form-control boldB htxt" id="txttimeresolved" name="txttimeresolved">
                </div>
            </div>
        </div>
    </div>    
</div>

<div class="row">
    <div class="large-12 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            RESOLUTION
            <span id="errtxtresolution" class="errFloatrightB">Required</span>
        </label>
        <textarea name="txtresolution" id="txtresolution" class="myFont freq" style="width: 100%;"></textarea>
    </div>
</div>

<div class="row" style="text-align: center;">
    <div class="large-12 columns">
        <input type="file"  accept="image/*, application/pdf" name="image" id="fileb"  onchange="loadFileB(event)" style="display: none;">
        <label class="boldB" style="float: left;" for="fileb" style="cursor: pointer;"><i class="fa fa-paperclip" aria-hidden="true" style="font-size: 20px;"></i> &nbsp;RESOLUTION ATTACHMENT</label>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <img id="outputb"/>
        <label id="lblpdfb" class="lblpdfb"><img src="assets/iticket/icons/pdf_copy.JPG" alt="" style="width: 50px;"><span id="fileoutputb"></span></label>
    </div>
</div>

<div class="row" id="divmoveto" style="padding-top: 20px;">
     <div class="large-6 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            MOVE TICKET
            <span id="s_tinchrg" class="infoFloatrightB"></span>
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
            </div>
            <select name="cbomoveto" id="cbomoveto" class="selecticon custom-select form-control bold13 htxt">
            </select>  
        </div>
    </div>
</div>


<script>var tcktid = '<?php echo $_GET['i'] ?>'; var datekrn = '<?php echo date('Y-m-d') ?>';</script>
<script src = "assets/iticket/js/view.tckt.dtl.js"></script>


  