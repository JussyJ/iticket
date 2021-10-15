<?php 
    require_once 'app/iticket/directives/dire.data.php';
    $dire = new Dire();
    
?>


<div class="container theme-lime">

    <div class="ui-tabgroup">
        <input class="ui-tab1" type="radio" name="tgroup_c" id="rd_probcause"/>
        <div class="ui-tabs">
            <label class="ui-tab1"><i class="fa fa-list"></i>Problem Cause</label>

        </div>
        <div class="ui-panels">
            <div class="ui-tab1" style="display: block;">
                <div style="margin-top: -10px;">
                    <div class="row">
                        <div class="larg-12 columns" style="text-align: right;">
                        <a class="jussybtnticketnew" title="Add New" id="add_pcause"><i class="fa fa-plus-square" aria-hidden="true"></i> &nbsp;Add New</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="large-12 columns">
                            <div class="tableFixHead">
                            <?php $dire->l_probcause($_GET['i']); ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
        </div>
    
    </div>

</div>



<script>
    $(function(){
    
        $('#add_pcause').click(function(){
            $('#divadminadd').load('r?iticket=adminaddnw',function(responseTxt, statusTxt, xhr){
                if(statusTxt == "success")
                    adminadd = 'mdldvdtl';
                    addroutes = 'adminprobcause';
                    paramI = add_id;
                    addspcat = 3;
                    $('#mylbl').text('PROBLEM CAUSE');
                    $('#mylblA').text('PROBLEM CATEGORY');
                    $('#modaladminadd').modal('toggle');

                if(statusTxt == "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
            });
        })

        $(".edittd").click(function(event){
            var tdid;
            tdid = $(this).closest('td').attr('id');

            if($(this).children("input").length > 0)
                return false;

            var tdObj = $(this);
            var preText = tdObj.html();
            var inputObj = $("<input type='text'/>");
            tdObj.html("");

            inputObj.width(tdObj.width())
                    // .height(tdObj.height())
                    .css({border:"none",fontSize:"13px",height:"30px",padding:"8px", textTransform:"uppercase"})
                    .val(preText)
                    .appendTo(tdObj)
                    .trigger("focus")
                    .trigger("select");

            inputObj.keyup(function(event){
            if(13 == event.which) { // press ENTER-key
                var text = $(this).val().toUpperCase();;
                tdObj.html(text);
                var p_probcause = {
                    groupemail:text,
                    empdept:tdid,
                    actionby:empid,
                    spcat:2,
                    cat:5
                }
                $.ajax({
                    url: "r?iticket=action",
                    type: "POST",
                    data: p_probcause,
                    success: function(data){
                        alert("Successfully Updated!");
                    }
                });

            }
            else if(27 == event.which) {  // press ESC-key
                tdObj.html(preText);
            }
            });
            
            inputObj.focusout(function(){
                tdObj.html(preText);
            });

            inputObj.click(function(){
                return false;
            });
            
        });
    });

    $('.vw_causedtl').click(function(event){
        document.getElementById("wboverlay").style.display = "block";
        var trid, trname;
        trid = $(this).closest('tr').attr('id');
        trname = $(this).closest('tr').attr('name');
        add_id = trid;
        
        $('#mdldvdtlB').load('r?iticket=adminservices&i='+trid,function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
                $('#modalvwdtlB').modal('toggle');
                $('#lbl_prbcause').text(trname);
                document.getElementById("wboverlay").style.display = "none";
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });

    });

   
</script>