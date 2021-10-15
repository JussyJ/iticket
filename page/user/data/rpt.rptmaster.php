<?php 
    require_once 'app/iticket/directives/dire.data.php';
    $dire = new Dire();
?>

<div class="row" style="padding-top: 5px;">
    <div class="large-4 columns">
        <input type="text" placeholder="Search Ticket ID" name="inputsrchrptd" id="inputsrchrptd" class="menusearch">
    </div>
    <div class="large-8 columns">
        <div style="float: right;">
        <a class="custom_rptbtnblue">SLA</a>
        <a class="custom_rptbtngrn" id="btnLexport">EXPORT</a>
        </div>
    </div>
</div>

<div class="row" style="padding-top: 5px;">
    <div class="large-12 columns">
        <div class="tableFixHead" style="height: 300px;">
            <?php $dire->reportmaster($_GET['datea'], $_GET['dateb'], $_GET['incharge'], $_GET['rptcat'], $_GET['probcat']); ?>
        </div>
    </div>
</div>


<script>
    var rpt_cat = '<?php echo $_GET['rptcat']; ?>';
    var rpt_datea = '<?php echo $_GET['datea']; ?>';
    var rpt_dateb = '<?php echo $_GET['dateb']; ?>';
    var rpt_probcat = '<?php echo $_GET['probcat']; ?>';

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

    $('#btnLexport').on( "click", function() {
        switch (rpt_cat) {
            case '1':
                window.location.href='r?iticket=rptexport_daterprtd&datea='+rpt_datea+'&dateb='+rpt_dateb+'&incharge='+empdept;
            break;
            case '2':
                window.location.href='r?iticket=rptexport_probcat&datea='+rpt_datea+'&dateb='+rpt_dateb+'&probcat='+rpt_probcat;
            break;
            case '3':
            
            break;
        }
        
    });

</script>