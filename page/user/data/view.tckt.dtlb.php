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
                                <input type="text" class="inputicon form-control boldB" id="txtA" name="txtA" autocomplete="off" style="text-transform:uppercase;" readonly>
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
                                <input type="text" class="inputicon form-control boldB" id="txtB" name="txtB" autocomplete="off" style="text-transform:uppercase;" readonly>
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
                        <input type="text" class="inputicon form-control boldB" id="txtcrtby" name="txtcrtby" autocomplete="off" style="text-transform:uppercase;" readonly>
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
                            <input type="text" class="inputicon form-control boldB" id="txtC" name="txtC" autocomplete="off" style="text-transform:uppercase;" readonly>
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
                            <input type="text" class="inputicon form-control boldB" id="txtD" name="txtD" autocomplete="off" style="text-transform:uppercase;" readonly>
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
                            <input type="text" class="inputicon form-control boldB" id="txtE" name="txtE" autocomplete="off" style="text-transform:uppercase;" readonly>
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
                            <input type="text" class="inputicon form-control boldB" id="txtF" name="txtF" autocomplete="off" readonly>
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
                            <input type="text" class="inputicon form-control boldB" id="txtG" name="txtG" autocomplete="off" readonly>
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
                            <input type="text" class="inputicon form-control boldB" id="txtH" name="txtH" autocomplete="off" readonly>
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
            <input type="text" class="inputicon form-control boldB" id="txtAA" name="txtAA" readonly>
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
            <input type="text" class="inputicon form-control boldB" id="txtI" name="txtI" autocomplete="off" style="text-transform:uppercase;" readonly>
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
                        <label class="boldB" style="cursor: pointer;" title="View Attachment"><i class="fa fa-paperclip" aria-hidden="true" style="font-size: 20px;"></i> &nbsp;VIEW ATTACHMENT</label>
                    </a>
                </div>
            </div>
        </label>
        <textarea name="txtJ" id="txtJ" class="myFont" style="width: 100%;background: white;" readonly><?php echo $data->i_ticketdtl($_GET['i'], 'problemdesc') ?></textarea>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            PROBLEM CATEGORY
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB" id="txtL" name="txtL" autocomplete="off" style="text-transform:uppercase;" readonly>
        </div>
    </div>

    <div class="large-4 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            PROBLEM CAUSE
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB" id="txtK" name="txtK" autocomplete="off" style="text-transform:uppercase;" readonly>
        </div>
    </div>
    
    <div class="large-4 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
        SERVICES AFFECTED
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-tag" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB" id="txtAB" name="txtAB" autocomplete="off" style="text-transform:uppercase;" readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="large-4 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            SERVICE PROVIDER
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-tag" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB" id="txtM" name="txtM" autocomplete="off" style="text-transform:uppercase;" readonly>
        </div>
    </div>

    <div class="large-4 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            PRIORITY
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-tags" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB" id="txtN" name="txtN" autocomplete="off" style="text-transform:uppercase;" readonly>
        </div>
    </div>
    <div class="large-4 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            STATUS
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB" id="txtO" name="txtO" autocomplete="off" style="text-transform:uppercase;" readonly>
        </div>
    </div>

    <div class="large-4 columns">

        
    </div>

</div>

<div class="row">
    <div class="large-12 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            RESOLUTION
        </label>
        <textarea name="txtQ" id="txtQ" class="myFont" style="width: 100%;background: white;" readonly><?php echo $data->i_ticketmstrdtl($_GET['i'], 'reso'); ?></textarea>
    </div>
</div>

<div class="row">
    <div class="large-6 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            RESOLVED BY
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB" id="txtR" name="txtR" autocomplete="off" style="text-transform:uppercase;" readonly>
        </div>
    </div>
    <div class="large-6 columns">
        <label class="boldB" for="" style="font-weight: bold;">
            RESOLVED DATE AND TIME
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB htxt" id="txtP" name="txtP" readonly>
        </div>
    </div>
</div>

<script>var tcktid = '<?php echo $_GET['i'] ?>';var emailtcktnchrg, tcktemailsub;</script>
<script>
    if(tabrpt==1){
        $('#btnack').hide();
    }else{
        $('#btnack').show();
    }

    $("#txtJ, #txtQ").each(function() {
        var txt = $(this),
        hiddenDiv = $(document.createElement('div')),
        content = null;

        txt.addClass('txtstuffAP');
        hiddenDiv.addClass('hiddendivAP commonAP');

        $('body').append(hiddenDiv);

        if ($.trim($(this).val()).length < 1){
        }else{
            content = $(this).val();
            content = content.replace(/\n/g, '<br>');
            hiddenDiv.html(content + '<br class="lbrAP">');
            $(this).css('height', hiddenDiv.height());
        }
    });

    $.ajax({
        url: 'r?iticket=userdata&cat=2&i='+tcktid,
        success: function (data){
            emailtcktnchrg = data.emailinchrg;
            tcktemailsub = data.emailsub;
            $('#txtA').val(tcktid);
            $('#txtB').val(data.reporteddate);
            $('#txtC').val(data.empname);
            $('#txtD').val(data.department);
            $('#txtE').val(data.location);
            $('#txtF').val(data.ippadd);
            $('#txtG').val(data.emailadd);
            $('#txtH').val(data.contactno);
            $('#txtI').val(data.subject);
            $('#txtJ').val(data.problemdesc);
            $('#txtcrtby').val(data.crtby);
            $('#txtAA').val(data.inchargedept);
          
        
            if(!data.attachment){
                $('#viewattchment').hide();
            }else{
                $("#viewattchment").attr('href', 'r?iticket=previewattach&file='+data.attachment);
            }
            
            if(data.form==1){
                $('#tcktcrtdby').hide();
            }else{
                $('#tcktcrtdby').show();
            }


        }
    });

    $.ajax({
        url: 'r?iticket=userdata&cat=3&i='+tcktid,
        success: function (data){
            $('#txtK').val(data.problemcause);
            $('#txtL').val(data.category);
            $('#txtM').val(data.servicepro);
            $('#txtN').val(data.priority);
            $('#txtO').val(data.tstatus);
            $('#txtR').val(data.rslvby);
            $('#txtP').val(data.resolveddate);
            $('#txtAB').val(data.servicesaffctd)
        }
    });
</script>