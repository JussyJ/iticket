<?php 
    require_once 'app/iticket/directives/dire.data.php';
    $dire = new Dire();
    
?>

<div style="margin-top: -10px;">
    <div class="row">
        <div class="larg-12 columns" style="text-align: right;">
        <a class="jussybtnticketnew" title="Add New" id="add_catgery"><i class="fa fa-plus-square" aria-hidden="true"></i> &nbsp;Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <div class="tableFixHead">
            <?php $dire->l_category($_GET['i']); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){

        $('#add_catgery').click(function(){
            document.getElementById("wboverlay").style.display = "block";
            $('#divadminadd').load('r?iticket=adminaddnw',function(responseTxt, statusTxt, xhr){
                if(statusTxt == "success")
                    adminadd = 'tab1';
                    addroutes = 'admincategory';
                    addspcat = 5;
                    paramI = empdept;
                    $('#mylbl').text('CATEGORY');
                    $('#modaladminadd').modal('toggle');
                    $('#divA').hide();
                    document.getElementById("wboverlay").style.display = "none";
                if(statusTxt == "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
            });
        })
        
        $('.vw_ctgdtl').click(function(event){
            document.getElementById("wboverlay").style.display = "block";
            var trid, trname;
            trid = $(this).closest('tr').attr('id');
            trname = $(this).closest('tr').attr('name');
            add_id = trid;
            //alert(trid)


            $('#mdldvdtl').load('r?iticket=adminprobcause&i='+trid,function(responseTxt, statusTxt, xhr){
                if(statusTxt == "success")
                    $('#modalvwdtl').modal('toggle');
                    $('#lbl_prbcat').text(trname);
                    document.getElementById("wboverlay").style.display = "none";
                if(statusTxt == "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
            });

        });
        
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
                var text = $(this).val().toUpperCase();
                tdObj.html(text);
                var p_editcat = {
                    groupemail:text,
                    empdept:tdid,
                    actionby:empid,
                    spcat:4,
                    cat:5
                }

                $.ajax({
                    url: "r?iticket=action",
                    type: "POST",
                    data: p_editcat,
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
</script>