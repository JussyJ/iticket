<div class="row">
    <div class="large-4 columns">
        <label for="" class="boldB">SEARCH TICKET ID</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control bold13" id="txtsearch" name="txtsearch" placeholder="Search Ticket ID">
        </div>
    </div>
    <div class="large-2 columns">&nbsp;</div>
    <div class="large-3 columns">
        <label for="" class="boldB">FROM</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control bold13" id="datea" name="datea" autocomplete="off" readonly placeholder="YYYY-MM-DD">
        </div>
    </div>
    <div class="large-3 columns">
        <label for="" class="boldB">TO</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="inputicon form-control bold13" id="dateb" name="dateb" autocomplete="off" readonly placeholder="YYYY-MM-DD">
        </div>
    </div>
</div>

<div id="divtckthistlst"></div>
<script src = "assets/iticket/js/jquery-ui1.10.4.js"></script>
<script>
    var d = new Date();
    var year = d.getFullYear();
    var month = ("0" + (d.getMonth() + 1)).slice(-2);
    var date = ("0" + d.getDate()).slice(-2);
    var datea = year+"-"+month+"-01";
    var dateb = year+"-"+month+"-"+date;
    $( "#datea, #dateb" ).datepicker({dateFormat: 'yy-mm-dd' });
    $('#datea').val(datea);
    $('#dateb').val(dateb);


    $('#divtckthistlst').load('r?iticket=mytckthistlist&i='+empid+'&datea='+datea+'&dateb='+dateb,function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            $('#inputsrch').hide();
            $('#go_newticket').hide();
            document.getElementById("wboverlay").style.display = "none";
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });

    $('#datea').change(function(){
        $('#dateb').val('');
    })

    $('#dateb').change(function(){
        document.getElementById("wboverlay").style.display = "block";
        $('#divtckthistlst').load('r?iticket=mytckthistlist&i='+empid+'&datea='+$('#datea').val()+'&dateb='+$('#dateb').val(),function(responseTxt, statusTxt, xhr){
            if(statusTxt == "success")
                document.getElementById("wboverlay").style.display = "none";
            if(statusTxt == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });
    })

    $('#txtsearch').keyup(function(){
        var search = $(this).val();
        $('.tbltckt tbody tr').hide();
        var len = $('.tbltckt tbody tr:not(.r_notfound) td:contains("'+search+'")').length;

        if(len > 0){
        $('.tbltckt tbody tr:not(.r_notfound) td:contains("'+search+'")').each(function(){
            $(this).closest('tr').show();
        });
        }else{
        $('.r_notfound').show();
        }

    });

</script>