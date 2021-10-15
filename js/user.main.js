var vsuffixname, rndm, ticketid, newtcktid, empidcrt, crtby, emailsubjvw, sufempname, utcktrs, inchrgmail, inchrgdpt, isinchrg, adminadd, addroutes, historydate, paramI, add_id, tabrpt;
$('#lblpdf').hide();
tabrpt = 0;
if(appaccess!=1){
    $("#cboformtype").append(new Option("B", "2"));
}

if(appaccess==1){
    $('label[for="tgroup_c1_tab2"]').hide();
    $('label[for="tgroup_c1_tab3"]').hide();
    $('label[for="tgroup_c1_tab4"]').hide();
    // $('#go_viewticket, #go_reports, #go_admin, #go_home').text('');
}else if(appaccess==2){
    // $('#go_admin').text('');
    $('label[for="tgroup_c1_tab4"]').hide();
    $('label[for="tgroup_c1_tab5"]').hide();
}else if(appaccess==5){
    $('label[for="tgroup_c1_tab5"]').hide();
}

$('#jfooter').load('footer.php',function(){});
$('#divtcktlst').load('r?iticket=mytcktlst&i='+empid,function(responseTxt, statusTxt, xhr){});

function getempdata(i){
    $.ajax({
        url: 'r?iticket=userdata&cat=1&i='+i,
        success: function (data){
            $('#txtempname').val(data.empname);
            $('#txtdept').val(data.department);
            $('#txtloc').val(data.location);
            $('#txtipadd').val(data.ipadd);
            $('#txtipadd').prop('readonly', true).css('background', '#E8E8E8');
            vsuffixname = data.suffixname;
            rndm = data.randomA;
            ticketid = data.randomB;
            newtcktid = new Date().getFullYear().toString().substr(-2)+ticketid;

            if(!data.email){
                $('#errtxtemail').text('Required');
                $('#txtemail').val('');
            }else{
                $('#errtxtemail').text('');
                $('#txtemail').val(data.email);
            }

            if(!data.contactno){
                $('#errtxtcontact').text('Required');
                $('#txtcontact').val('');
            }else{
                $('#errtxtcontact').text('');
                $('#txtcontact').val(data.contactno);
            }
        }
    });
}

$('#go_home').click(function(){
    document.getElementById("wboverlay").style.display = "block";
    $('#divtcktlst').load('r?iticket=mytcktlst&i='+empid,function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            $('#inputsrch').show();
            $('#go_newticket').show();
            tabrpt = 0;
            document.getElementById("wboverlay").style.display = "none";
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
})

$('#go_admin').click(function(){
    document.getElementById("wboverlay").style.display = "block";
    $('#divtcktlst').load('r?iticket=admin',function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            $('#inputsrch').hide();
            $('#go_newticket').hide();
            document.getElementById("wboverlay").style.display = "none";
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
})

$('#go_report').click(function(){
    document.getElementById("wboverlay").style.display = "block";
    $('#divtcktlst').load('r?iticket=rptmain',function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            $('#inputsrch').hide();
            $('#go_newticket').hide();
            tabrpt = 1;
            document.getElementById("wboverlay").style.display = "none";
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
})

$('#go_newticket' ).click(function() {
    $('#cboformtype').val(1);
    $('.errFloatright').text('');
    $('#file, #txtsubject, #txtprobdesc, #cbotcktinchrg').val('');
    $('#output').attr('src', '');
    $('#lblpdf').hide();
    $('#errtxtsubject, #errtxtprobdesc, #errcbotcktinchrg').text('Required');
    getempdata(empid);
    $('#btntcktsubmit').css('pointer-events', '');
    $('#modalnewticket').modal('show');
});

$('#go_myhist').click(function(){
    document.getElementById("wboverlay").style.display = "block";
    $('#divtcktlst').load('r?iticket=mytckthist&i='+empid,function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            $('#inputsrch').hide();
            $('#go_newticket').hide();
            // document.getElementById("wboverlay").style.display = "none";
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
})

$('#cboformtype').change(function(){
    if($(this).val()==1){
        getempdata(empid);
        $('#errtxtipadd').text('');
    }else if($(this).val()==2){
        $('#txtcreatefor').val('');
        $('#modalcreatefor').modal('toggle');
    }
})


$('#txtcreatefor').on('keypress', function (e) {
    if(e.which === 13){        
        $.ajax({
            url: 'r?iticket=userdata&cat=1&i='+$(this).val(),
            success: function (data){
                if(!data.suffixname){
                    alert('No Record Found!');
                    $('#txtcreatefor').val('');
                }else{
                    empidcrt = $('#txtcreatefor').val();
                    $('#txtempname').val(data.empname);
                    $('#txtdept').val(data.department);
                    $('#txtloc').val(data.location);
                   
                    vsuffixname = data.suffixname;
                    rndm = data.randomA;
                    ticketid = data.randomB;
                    newtcktid = new Date().getFullYear().toString().substr(-2)+ticketid;

                    
                    if(!data.ipaddb){
                        $('#errtxtipadd').text('Required');
                        $('#txtipadd').val('');
                        $('#txtipadd').prop('readonly', false).css('background', 'white');
                    }else{
                        $('#errtxtipadd').text('');
                        $('#txtipadd').val(data.ipaddb);
                    }

                    if(!data.email){
                        $('#errtxtemail').text('Required');
                        $('#txtemail').val('');
                    }else{
                        $('#errtxtemail').text('');
                        $('#txtemail').val(data.email);
                    }

                    if(!data.contactno){
                        $('#errtxtcontact').text('Required');
                        $('#txtcontact').val('');
                    }else{
                        $('#errtxtcontact').text('');
                        $('#txtcontact').val(data.contactno);
                    }
                    
                    $('#modalcreatefor').modal('toggle');
                }
            }
        });
    }
    
});

$('#cancelme').click(function(){
    $('#cboformtype').val(1);
    $('#modalcreatefor').modal('toggle');
});

$('#go_viewticket' ).click(function() {
    document.getElementById("wboverlay").style.display = "block";
    $('#divtcktlst').load('r?iticket=viewtcktlst&i='+empdept,function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            $('#inputsrch').show();
            $('#go_newticket').hide();
            $('#btnvwtcktsubmit').css('pointer-events', '');
            document.getElementById("wboverlay").style.display = "none";
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
});

$.ajax({
    type: 'GET',
    url: 'r?iticket=servoptnlst&cat=5',
    success : function(data){
        var JSONString  = data;
        var JSONObject = JSON.parse(JSONString);
        $('#cbotcktinchrg').empty();
        var mycbo = $('#cbotcktinchrg');
        $('<option/>',{value:"" , text:"Please Select", disabled:"disabled", selected:"selected"}).appendTo(mycbo);
        for (var opt in JSONObject){
            $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
        }
            mycbo.appendTo('#cbotcktinchrg');
        }
});

$('#cbotcktinchrg').change(function(){
    $.ajax({
        url: 'r?iticket=userdata&cat=4&i='+$(this).val(),
        success: function (data){
            inchrgmail = data.inchargemail;
        }
    }); 
})

$(".freq").keyup(function(){
    if(!$(this).val()){
        $('#err'+$(this).attr('id')).text('Required');
    }else{
        $('#err'+$(this).attr('id')).text('');
    }
});

$('.htxt').change(function(){
    $('#err'+$(this).attr('id')).text('');
})


$('textarea').each(function () {
    this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
}).on('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

$('#file').click(function(){
    $('#output').attr('src', '');
    $('#lblpdf').hide();
})

var loadFile = function(event) {
 
    var input = document.getElementById("file");
    file = input.files[0];
    var fileb = $('#file').val().replace(/^.*\\/, "");
    

    if(!!file.type.match(/image.*/) || !!file.type.match(/application.pdf/)){
        if(!!file.type.match(/image.*/)){
            $('#lblpdf').hide();
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        }else if(!!file.type.match(/application.pdf/)){
            var numb = input.files[0].size / 1024 / 1024;
            numb = numb.toFixed(2);
            if (numb > 5) {
                alert('To big, maximum is 5MiB. Your file size is: ' + numb + ' MiB');
            } else {
                $('#lblpdf').show();
                $('#fileoutput').text(fileb);
                $('#output').attr('src', '');
            }
        }
    }else{
        alert('Not a valid attachment!');
        $('#output').attr('src', '');
    }
};

$('#btntcktsubmit').click(function(){
    var input = document.getElementById("file");
    file = input.files[0];
    

    if(!$('.errFloatright').text()){
        $('#btntcktsubmit').css('pointer-events', 'none');
        var newFileName;
        var input = document.getElementById("file");
        file = input.files[0];
        var fileb = $('#file').val().replace(/^.*\\/, "");
        
        if(file != undefined){
            newFileName = rndm+fileb;
            formData= new FormData();
            formData.append('image', file, newFileName);

            $.ajax({
                url: "r?iticket=imgupload",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    
                }
            });
        }else{
            newFileName = null;
        }

        if($('#cboformtype').val()==1){
            idemprs = empid;
            crtby = null;
        }else if($('#cboformtype').val()==2){
            idemprs = empidcrt;
            crtby = empid;
        }
        
        var p_newticket = {
            idemp:idemprs,
            createby:crtby,
            employee:$('#txtempname').val(),
            email:$('#txtemail').val(),
            contact:$('#txtcontact').val(),
            subject:$('#txtsubject').val(),
            probdesc:$('#txtprobdesc').val(),
            ipadd:$('#txtipadd').val(),
            attachment:newFileName,
            formtype:$('#cboformtype').val(),
            ticketidf:newtcktid,
            emailsubj:'TICKET ID : '+newtcktid+' | '+$('#txtempname').val(),
            suffixname:vsuffixname,
            incharge:$('#cbotcktinchrg').val(),
            inchargemial:inchrgmail,
            tckthash:rndm,
            cat:1,
            emailcat:1
        }
        
        $.ajax({
            url: "r?iticket=action",
            type: "POST",
            data: p_newticket,
            success: function(data){
                $('#divtcktlst').load('r?iticket=mytcktlst&i='+empid,function(responseTxt, statusTxt, xhr){
                    if(statusTxt == "success")
                    $.ajax({
                        url: 'r?iticket=userdata&cat=5&i='+rndm,
                        success: function (data){
                            
                            var p_emailsend = {
                                email:$('#txtemail').val(),
                                emailsubj:data.emailsubject,
                                suffixname:vsuffixname,
                                subject:$('#txtsubject').val(),
                                probdesc:$('#txtprobdesc').val(),
                                ticketidf:data.ticketid,
                                employee:$('#txtempname').val(),
                                inchargemial:inchrgmail,
                                emailcat:1
                            }

                            $.ajax({
                                type: "POST",
                                url: "http://192.168.70.32:5386/wealthbank/0.php?online-application=iticket",
                                data: p_emailsend, 
                            });

                            $('#utcktid').text(data.ticketid);   
                            $('#modalticketid').modal('toggle');
                        }
                    });
                      
                    if(statusTxt == "error")
                        alert("Error: " + xhr.status + ": " + xhr.statusText);
                });
            }
        });

    }else{
        alert('All Fields are Required!');
    }

});

$('#uoknwtckt').click(function(){
    $('#modalticketid, #modalnewticket').modal('toggle');
})

$('#btnvwhistory, #btnvwhistoryb').click(function(){
    $('#modalviewtickethist').modal('toggle');
})


$('#btnvwtcktsubmit').click(function(){
    var rsubmit, ismove;
    if($('#cbomoveto').val()==cmove || $('#cbomoveto').val()==''){
        ismove = 0;
    }else{
        ismove = 1; //gmoved
    }

    if(!$('.errFloatrightB').text()){

        var newFileNameb;
        var input = document.getElementById("fileb");
        file = input.files[0];
        var fileb = $('#fileb').val().replace(/^.*\\/, "");
        
        if(file != undefined){
            newFileNameb = rndm+fileb;
            formData= new FormData();
            formData.append('image', file, newFileNameb);

            $.ajax({
                url: "r?iticket=imgupload",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    
                }
            });
        }else{
            newFileNameb = null;
        }

       
        var rslvdt = $('#txtdateresolved').val()+' '+$('#txttimeresolved').val();
        var p_viewtckt = {
            reporteddate:$('#txtrprtdate').val(),
            actionby:empid,
            subject:$('#txtsubj').val(),
            status:$('#cbotcktstatus').val(),
            ticketid:tcktid,
            probcause:$('#cbotcktpcause').val(),
            probcat:$('#cbotcktcat').val(),
            servaffctd:$('#cboservaffected').val(),
            servicepro:$('#cboservprov').val(),
            priority:$('#cbopriority').val(),
            resolvedate:rslvdt,
            reso:$('#txtresolution').val(),
            resoattach:newFileNameb,
            emailto:$('#txtemailadd').val(),
            emailsubj:emailsubjvw,  
            suffixname:sufempname,
            updtdby:updtdtcktby,
            emailcat:2,
            tcktinchrg:inchrgdpt,
            probdesc:$('#txtproblemdesc').val(),
            ismoved:ismove,
            tcktmoveto:$('#cbomoveto').val(),
            inchargemial:inchrgmail,
            cat:2
        }

        if($('#cbotcktstatus').val()==5){
            if(rslvdt<=$('#txtrprtdate').val()){
                rsubmit = 0;
                alert('Invalid Resolved DateTime!');
            }else{
                if(historydate>=rslvdt){
                    rsubmit = 0;
                    alert('Invalid Resolved Date & Time! Kindly check Last DateTime in History!');
                }else{
                    rsubmit = 1;
                }
            }
        }else{
            rsubmit = 1;
        }
        
        if(rsubmit==1){
            $('#btnvwtcktsubmit').css('pointer-events', 'none');
            $.ajax({
                type: "POST",
                url: "http://192.168.70.32:5386/wealthbank/0.php?online-application=iticket",
                data: p_viewtckt, 
            });
            
            $.ajax({
                url: "r?iticket=action",
                type: "POST",
                data: p_viewtckt,
                success: function(data){
                    $('#divtcktlst').load('r?iticket=viewtcktlst&i='+empdept,function(responseTxt, statusTxt, xhr){
                        if(statusTxt == "success")
                            alert('Successfully Submitted!');
                            $('#modalviewticket').modal('toggle');
                        if(statusTxt == "error")
                            alert("Error: " + xhr.status + ": " + xhr.statusText);
                    });
                }
            });
        }


    }else{
        alert('All Fields are Required!');
    }
   
});

function popup(mylink, windowname){
    if (! window.focus)return true;
    var href;
    if (typeof(mylink) == 'string')
    href=mylink;
    else
    href=mylink.href;
    window.open(href, windowname, 'width=1300px,height=500px,scrollbars=yes');
    return false;
}

function alertMsg(id) {
    var x = document.getElementById(id);
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 1500);
}

$('#btnack').click(function(){
    if(utcktrs==5){
        $('#modalack').modal('show');
    }else{
        return false;
    }

})

$('#tdagree').click(function(){
    var p_ackA = {
        ticketid:tcktid,
        tstatus:1,
        actionby:empid,
        cat:3
    }

    $.ajax({
        url: "r?iticket=action",
        type: "POST",
        data: p_ackA,
        success: function(data){
            $('#divrating').load('r?iticket=ratingfeedback',function(responseTxt, statusTxt, xhr){});
            $('#modalrateme').modal('show');
        }
    });


})

$('#tddisagree').click(function(){
   $('#modaldisagree').modal('show');
})

$('#btnsbtack').click(function(){
    if(!$('#ackremarks').val()){
        alert('Remarks is Required.');
    }else{
        var p_ackA = {
            ticketid:tcktid,
            tstatus:3,
            actionby:empid,
            remarks:$('#ackremarks').val(),
            emailsubject:tcktemailsub,
            mailincharge:emailtcktnchrg,
            emailcat:3,
            cat:3
        }

        $.ajax({
            type: "POST",
            url: "http://192.168.70.32:5386/wealthbank/0.php?online-application=iticket",
            data: p_ackA, 
        });
    
        $.ajax({
            url: "r?iticket=action",
            type: "POST",
            data: p_ackA,
            success: function(data){
                alert('Successfully Submitted!');
                $('#divtcktlst').load('r?iticket=mytcktlst&i='+empid,function(responseTxt, statusTxt, xhr){});
                $('#modalack, #modalviewticketack, #modaldisagree').modal('toggle');
            }
        });
    }
    
})

$('#inputsrch').keyup(function(){
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

$('#btnaddadmnnew').click(function(){
    
    if($('#txtaddnew').val()==''){
        alert('All Fields Required!')
    }else{
        var p_adminadd = {
            adminaddcat:adminadd,
            routes:addroutes,
            spcat:addspcat,
            actionby:empid,
            groupemail:$('#txtaddnew').val(),
            empdept:empdept,
            cboadd:add_id,
            cat:5
        }
    
        $.ajax({
            url: "r?iticket=action",
            type: "POST",
            data: p_adminadd,
            success: function(data){
                alert("Successfully Added!");
                $('#modaladminadd').modal('toggle');
                $('#'+adminadd).load('r?iticket='+addroutes+'&i='+paramI,function(responseTxt, statusTxt, xhr){});
            }
        });
    }
    
})
