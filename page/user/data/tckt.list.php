<?php 
    require_once 'app/iticket/directives/dire.data.php';
    $dire = new Dire();
    
?>

<div class="row">
    <div class="large-12 columns">
        <div class="tableFixHead">
            <?php $dire->myticketlist($_GET['i']); ?>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {window.location.href = "p.php?main=page";}, false);

    $('.trvnt' ).click(function() {
        var bid, trid, trname;
        bid = (this.id) ;
        trid = $(this).closest('tr').attr('id');
        trname = $(this).closest('tr').attr('name');
        utcktrs = trname;
        document.getElementById("wboverlay").style.display = "block";
        if(trname==2 || trname==3){
            $('#itactiondv').addClass('stsclose');
        }else{
            $('#itactiondv').removeClass('stsclose');
        }

        if(trname==5){
            $('#btnack').show();
        }else{
            $('#btnack').hide();
        }

        $('#viewtcktdivb').load('r?iticket=viewtcktdtlb&i='+trid,function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
                $('#viewtckthisdiv').load('r?iticket=viewtckthis&c=2&i='+trid,function(responseTxt, statusTxt, xhr){});
                setTimeout(function(){document.getElementById("wboverlay").style.display = "none"; $('#modalviewticketack').modal('toggle');}, 1000);
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    });

</script>



