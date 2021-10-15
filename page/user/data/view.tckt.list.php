<?php 
    require_once 'app/iticket/directives/dire.data.php';
    $dire = new Dire();
    
?>

<div class="row">
    <div class="large-12 columns">
        <div class="tableFixHead">
            <?php $dire->viewticketlist($_GET['i']); ?>
        </div>
    </div>
</div>

<script>

document.addEventListener("DOMContentLoaded", function(event) {window.location.href = "p.php?main=page";}, false);
var inchrgid, cmove;
$('.trvt' ).click(function() {
    document.getElementById("wboverlay").style.display = "block";
    var bid, trid, trname;
    bid = (this.id) ;
    trid = $(this).closest('tr').attr('id');
    trname = $(this).closest('tr').attr('name');
    $('#btnvwtcktsubmit').css('pointer-events', '');
    
    inchrgdpt = trname;

    if(empdept==trname){
        isinchrg = 1;//incharge maka edit
    }else{
        isinchrg = 0;//dli incharge
    }

    $('#viewtcktdiv').load('r?iticket=viewtcktdtl&i='+trid,function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            $('#viewtckthisdiv').load('r?iticket=viewtckthis&c=1&i='+trid,function(responseTxt, statusTxt, xhr){});
            setTimeout(function(){document.getElementById("wboverlay").style.display = "none"; $('#modalviewticket').modal('toggle');}, 1000);
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
   
});

</script>
