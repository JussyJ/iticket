var dtl_probcause, dtl_srvcsaffctd;

$(document).ready( function() {
    $('#outputb').attr('src', '');
    $('#lblpdfb').hide();
    var mvto;

    $.ajax({
        url: 'r?iticket=userdata&cat=2&i='+tcktid,
        success: function (data){
            
            emailsubjvw = data.emailsub;
            sufempname = data.suffixname;
            $('#txttcktid').val(tcktid);
            $('#txtrprtdate').val(data.reporteddate);
            $('#txtfrom').val(data.empname);
            $('#txtdeptmnt').val(data.department);
            $('#txtlocation').val(data.location);
            $('#txtipaddress').val(data.ippadd);
            $('#txtemailadd').val(data.emailadd);
            $('#txtcontactno').val(data.contactno);
            $('#txtsubj').val(data.subject);
            $('#txtproblemdesc').val(data.problemdesc);
            $('#txtcrtby').val(data.crtby);
            $('#cbomoveto').val(data.incharge);
            $('#txttcktinchrg').val(data.inchargedept);
            inchrgid = data.incharge;
            cmove = data.moveto;
            dtl_probcause = data.probcause;
            dtl_srvcsaffctd = data.servicesaffctd;
            rndm = data.randomA;
            historydate = data.histroydatetime;

            if(data.moveto==null || data.moveto==''){
                mvto = data.incharge;
            }else{
                mvto = data.moveto;
            }

            $.ajax({
                type: 'GET',
                url: 'r?iticket=servoptnlst&cat=5&ID='+mvto,
                success : function(data){
                    var JSONString  = data;
                    var JSONObject = JSON.parse(JSONString);
                    $('#cbomoveto').empty();
                    var mycbo = $('#cbomoveto');
                    $('<option/>',{value:"" , text:"-", selected:"selected"}).appendTo(mycbo);
                    for (var opt in JSONObject){
                        $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
                    }
                        mycbo.appendTo('#cbomoveto');
                }
            });
            
           
            if(data.status==2){
                $('#cbotcktstatus').val(3);
            }else{
                $('#cbotcktstatus').val(data.status);
            }
        
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

            if(!data.probcat){
                $('#errcbotcktcat').text('Required');
                $('#cbotcktcat').val('');
            }else{
                $('#errcbotcktcat').text('');
                $('#cbotcktcat').val(data.probcat);
                setTimeout(function(){ loadselect(); }, 500);
            }

            if(!data.probcause){
                $('#errcbotcktpcause').text('Required');
                // $('#cbotcktpcause').val('');
            }else{
                $('#errcbotcktpcause').text('');
                // $('#cbotcktpcause').val(data.probcause);
            }

            if(!data.servicesaffctd){
                $('#errcboservaffected').text('Required');
                // $('#cboservaffected').val('');
            }else{
                $('#errcboservaffected').text('');
                // $('#cbotcktpcause').val(data.probcause);
            }

            if(!data.servicepro){
                $('#errcboservprov').text('Required');
                $('#cboservprov').val('');
            }else{
                $('#errcboservprov').text(''); 
                $('#cboservprov').val(data.servicepro);
            }

            if(!data.priority){
                $('#errcbopriority').text('Required');
                $('#cbopriority').val('');
            }else{
                $('#errcbopriority').text('');
                $('#cbopriority').val(data.priority);
            }

        }
    });
    
    $('#divdateresolved').hide();
   
    if($('#cbotcktstatus').val()==1){
        $('#rslvddt').removeClass('stsclose');
        $( "#txtdateresolved" ).datepicker("option", "disabled", false);
        document.getElementById("txttimeresolved").disabled = false;
    }else{
        $('#errtxtdateresolved, #errtxttimeresolved').text('');
        $('#rslvddt').addClass('stsclose');
        $( "#txtdateresolved" ).datepicker("option", "disabled", true);
        document.getElementById("txttimeresolved").disabled = true;
    }


    $("#txtproblemdesc").each(function() {
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

});



function loadselect(){
    $.ajax({
        type: 'GET',
        url: 'r?iticket=servoptnlst&cat=1&ID='+$('#cbotcktcat').val(),
        success : function(data){
            var JSONString  = data;
            var JSONObject = JSON.parse(JSONString);
            $('#cbotcktpcause').empty();
            var cbo = $('#cbotcktpcause');
            for (var opt in JSONObject){
                $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(cbo);
            }
            $('#cbotcktpcause option[value="'+dtl_probcause+'"]').attr("selected",true);
         }
    });

    $.ajax({
        type: 'GET',
        url: 'r?iticket=servoptnlst&cat=6&ID='+dtl_probcause,
        success : function(data){
            var JSONString  = data;
            var JSONObject = JSON.parse(JSONString);
            $('#cboservaffected').empty();
            var cbo = $('#cboservaffected');
            for (var opt in JSONObject){
                $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(cbo);
            }
            $('#cboservaffected option[value="'+dtl_srvcsaffctd+'"]').attr("selected",true);
         }
    });
}

$('#txtresolution').on('input', function () {
    this.style.height = 'auto'; 
    this.style.height = (this.scrollHeight) + 'px'; 
});

$('#fileb').click(function(){
    $('#outputb').attr('src', '');
    $('#lblpdfb').hide();
})

$.ajax({
    type: 'GET',
    url: 'r?iticket=servoptnlst&cat=2&i='+inchrgdpt,
    success : function(data){
        var JSONString  = data;
        var JSONObject = JSON.parse(JSONString);
        $('#cbotcktcat').empty();
        var mycbo = $('#cbotcktcat');
        $('<option/>',{value:"" , text:"Please Select", disabled:"disabled", selected:"selected"}).appendTo(mycbo);
        for (var opt in JSONObject){
            $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
        }
            mycbo.appendTo('#cbotcktcat');
        }
});

$.ajax({
    type: 'GET',
    url: 'r?iticket=servoptnlst&cat=3&i='+inchrgdpt,
    success : function(data){
        var JSONString  = data;
        var JSONObject = JSON.parse(JSONString);
        $('#cboservprov').empty();
        var mycbo = $('#cboservprov');
        $('<option/>',{value:"" , text:"Please Select", disabled:"disabled", selected:"selected"}).appendTo(mycbo);
        for (var opt in JSONObject){
            $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
        }
            mycbo.appendTo('#cboservprov');
        }
});

$.ajax({
    type: 'GET',
    url: 'r?iticket=servoptnlst&cat=4&i='+inchrgdpt,
    success : function(data){
        var JSONString  = data;
        var JSONObject = JSON.parse(JSONString);
        $('#cbopriority').empty();
        var mycbo = $('#cbopriority');
        $('<option/>',{value:"" , text:"Please Select", disabled:"disabled", selected:"selected"}).appendTo(mycbo);
        for (var opt in JSONObject){
            $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
        }
            mycbo.appendTo('#cbopriority');
        }
});




$('#cbotcktstatus').change(function(){
    if($(this).val()==5){
        $( "#txtdateresolved" ).datepicker({ dateFormat: 'yy-mm-dd', maxDate: new Date(datekrn), minDate: new Date($('#txtrprtdate').val()) });
        $('#rslvddt').removeClass('stsclose');
        $( "#txtdateresolved" ).datepicker("option", "disabled", false);
        document.getElementById("txttimeresolved").disabled = false;
        $('#errtxtdateresolved, #errtxttimeresolved').text('Required');
    }else{
        $('#rslvddt').addClass('stsclose');
        $( "#txtdateresolved" ).datepicker("option", "disabled", true);
        document.getElementById("txttimeresolved").disabled = true;
        $('#txtdateresolved, #txttimeresolved').val('');
        $('#errtxtdateresolved, #errtxttimeresolved').text('');
    }
})

$('#cbotcktstatus').change(function(){
    if($(this).val()==5 || $(this).val()==4){
        $('#divmoveto').hide();
    }else{
        $('#divmoveto').show();
    }
})

$('.htxt').change(function(){
    $('#err'+$(this).attr('id')).text('');
})

$(".freq").keyup(function(){
    if(!$(this).val()){
        $('#err'+$(this).attr('id')).text('Required');
    }else{
        $('#err'+$(this).attr('id')).text('');
    }
});

if(isinchrg==0){
    $('#txtsubj').prop("readonly", true);
    $('#cbotcktpcause, #cbotcktcat, #cbopriority, #cboservprov, #cboservaffected, #cbopriority, #cbotcktstatus').prop( "disabled", true );
}else{
    $('#txtsubj').prop("readonly", false);
    $('#cbotcktpcause, #cbotcktcat, #cbopriority, #cboservprov, #cboservaffected, #cbopriority, #cbotcktstatus').prop( "disabled", false );
}


$('#cbotcktcat_old').change(function(){
    $.ajax({
        type: 'GET',
        url: 'r?iticket=servoptnlst&cat=3&ID='+$(this).val(),
        success : function(data){
            var JSONString  = data;
            var JSONObject = JSON.parse(JSONString);
            $('#cboservprov').empty();
            var mycbo = $('#cboservprov');
            $('<option/>',{value:"" , text:"Please Select", disabled:"disabled", selected:"selected"}).appendTo(mycbo);
            for (var opt in JSONObject){
                $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
            }
                mycbo.appendTo('#cboservprov');
            }
    });
})


$('#cbotcktcat').change(function(){
    $.ajax({
        type: 'GET',
        url: 'r?iticket=servoptnlst&cat=1&ID='+$(this).val(),
        success : function(data){
            var JSONString  = data;
            var JSONObject = JSON.parse(JSONString);
            $('#cbotcktpcause').empty();
            var mycbo = $('#cbotcktpcause');
            $('<option/>',{value:"" , text:"Please Select", disabled:"disabled", selected:"selected"}).appendTo(mycbo);
            for (var opt in JSONObject){
                $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
            }
                mycbo.appendTo('#cbotcktpcause');
            }
    });
})

$('#cbotcktpcause').change(function(){
    $.ajax({
        type: 'GET',
        url: 'r?iticket=servoptnlst&cat=6&ID='+$(this).val(),
        success : function(data){
            var JSONString  = data;
            var JSONObject = JSON.parse(JSONString);
            $('#cboservaffected').empty();
            var mycbo = $('#cboservaffected');
            $('<option/>',{value:"" , text:"Please Select", disabled:"disabled", selected:"selected"}).appendTo(mycbo);
            for (var opt in JSONObject){
                $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
            }
                mycbo.appendTo('#cboservaffected');
            }
    });
})

$('#cboservaffected').change(function(){
    $.ajax({
        type: 'GET',
        url: 'r?iticket=servoptnlst&cat=3&i='+inchrgdpt,
        success : function(data){
            var JSONString  = data;
            var JSONObject = JSON.parse(JSONString);
            $('#cboservprov').empty();
            var mycbo = $('#cboservprov');
            $('<option/>',{value:"" , text:"Please Select", disabled:"disabled", selected:"selected"}).appendTo(mycbo);
            $('<option/>',{value:"38" , text:"NA"}).appendTo(mycbo);
            for (var opt in JSONObject){
                $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
            }
                mycbo.appendTo('#cboservprov');
            }
    });
})

$('#cbomoveto').change(function(){
    if($(this).val()==''){
        $('#s_tinchrg').text('');
        inchrgmail = null;
    }else{
        $('#s_tinchrg').text('Ticket will be move after clicking submit.');
        $.ajax({
            url: 'r?iticket=userdata&cat=4&i='+$(this).val(),
            success: function (data){
                inchrgmail = data.inchargemail;
            }
        });
    }

    
})

var loadFileB = function(event) {
 
    var inputb = document.getElementById("fileb");
    fileb = inputb.files[0];
    var filebb = $('#fileb').val().replace(/^.*\\/, "");
    

    if(!!fileb.type.match(/image.*/) || !!fileb.type.match(/application.pdf/)){
        if(!!fileb.type.match(/image.*/)){
            $('#lblpdf').hide();
            var image = document.getElementById('outputb');
            image.src = URL.createObjectURL(event.target.files[0]);
        }else if(!!fileb.type.match(/application.pdf/)){
            var numbb = inputb.files[0].size / 1024 / 1024;
            numbb = numbb.toFixed(2);
            if (numbb > 5) {
                alert('To big, maximum is 5MiB. Your file size is: ' + numbb + ' MiB');
            } else {
                $('#lblpdfb').show();
                $('#fileoutputb').text(filebb);
                $('#outputb').attr('src', '');
            }
        }
    }else{
        alert('Not a valid attachment!');
        $('#outputb').attr('src', '');
    }
};

document.addEventListener("DOMContentLoaded", function(event) {window.location.href = "p.php?main=page";}, false);

