<div class="row">
    <div class="large-2 columns">&nbsp;</div>
    <div class="large-8 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            DEPARTMENT EMAIL
            <span id="errtxtsubj" class="errFloatrightB"></span>
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control boldB" id="txtgrpemail" name="txtgrpemail" autocomplete="off">
        </div>
        <a id="btngroupmail" class="submitButton" style="color:green;" title="Submit"><i class="fa fa-check-circle-o" aria-hidden="true"></i> SUBMIT</a>
    </div>
    <div class="large-2 columns">&nbsp;</div>
</div>

<script>
    $.ajax({
        url: 'r?iticket=userdata&cat=4&i='+empdept,
        success: function (data){
          $('#txtgrpemail').val(data.inchargemail);
        }
    });

    $('#btngroupmail').click(function(){

        var p_groupmail = {
            spcat:1,
            actionby:empid,
            groupemail:$('#txtgrpemail').val(),
            empdept:empdept,
            cat:5
        }

         $.ajax({
            url: "r?iticket=action",
            type: "POST",
            data: p_groupmail,
            success: function(data){
                alert('Successfully Submitted!');
            }
        });
    })


  
</script>