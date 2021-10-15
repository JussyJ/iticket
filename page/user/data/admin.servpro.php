<?php 
    require_once 'app/iticket/directives/dire.data.php';
    $dire = new Dire();
    
?>

<div style="margin-top: -10px;">
    <div class="row">
        <div class="larg-12 columns" style="text-align: right;">
        <a class="jussybtnticketnew" title="Add New" id="add_servpro"><i class="fa fa-plus-square" aria-hidden="true"></i> &nbsp;Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="large-12 columns">
            <div class="tableFixHead">
            <?php $dire->l_servpro($_GET['i']); ?>
            </div>
        </div>
    </div>
    
</div>

<script>
    $(function(){

        $('#add_servpro').click(function(){
            
            $('#divadminadd').load('r?iticket=adminaddnw',function(responseTxt, statusTxt, xhr){
                if(statusTxt == "success")
                    adminadd = 'tab2';
                    addroutes = 'adminservpro';
                    paramI = empdept;
                    addspcat = 11;
                    $('#mylbl').text('SERVICE PROVIDER/VENDOR');
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
                var text = $(this).val().toUpperCase();
                tdObj.html(text);
                var p_servpro = {
                    groupemail:text,
                    empdept:tdid,
                    actionby:empid,
                    spcat:10,
                    cat:5
                }

                $.ajax({
                    url: "r?iticket=action",
                    type: "POST",
                    data: p_servpro,
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