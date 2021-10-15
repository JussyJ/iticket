<div class="row">
    <div class="large-3 columns">
        <label class="boldB" for="" style="font-weight: bold; ">
            REPORT CATEGORY
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-tag" aria-hidden="true"></i></span>
            </div>
            <select name="cborptcat" id="cborptcat" class="selecticon custom-select form-control bold13 htxt"></select>  
        </div>
    </div>
    <div class="large-9 columns" id="dv_daterange">
       
            <div class="row">
                <div class="large-6 columns">
                    <div id="dv_cboprobcat_dum">&nbsp;</div>
                    <div id="dv_cboprobcat">
                        <label class="boldB" for="" style="font-weight: bold; ">
                            PROBLEM CATEGORY
                        </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                            </div>
                            <select name="cboprobcat" id="cboprobcat" class="selecticon custom-select form-control bold13 htxt">
                                <option value="" disabled selected >Please Select</option>
                            </select>  
                        </div>
                    </div>
                </div>  
                <div class="large-3 columns">
                    <label class="boldB" for="" style="font-weight: bold; ">
                        DATE FROM
                    </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="inputicon form-control boldB freq" id="dateA" name="dateA" autocomplete="off" placeholder="YYYY-MM-DD">
                    </div>
                </div>  
                <div class="large-3 columns">
                    <label class="boldB" for="" style="font-weight: bold; ">
                        DATE TO
                    </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="inputicon form-control boldB freq" id="dateB" name="dateB" autocomplete="off" placeholder="YYYY-MM-DD">
                    </div>
                </div>
            </div>
    </div>
</div>

<div class="row">
    <div class="large-12 columns" style="color: black;">
        <div id="divmaster"></div>
    </div>
</div>


<script>
    $('#dv_daterange').hide();
    
    $.ajax({
        type: 'GET',
        url: 'r?iticket=servoptnlst&cat=7',
        success : function(data){
            var JSONString  = data;
            var JSONObject = JSON.parse(JSONString);
            $('#cborptcat').empty();
            var mycbo = $('#cborptcat');
            $('<option/>',{value:"" , text:"Please Select", disabled:"disabled", selected:"selected"}).appendTo(mycbo);
            for (var opt in JSONObject){
                $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
            }
                mycbo.appendTo('#cborptcat');
            }
    });

    $.ajax({
    type: 'GET',
    url: 'r?iticket=servoptnlst&cat=2&i='+empdept,
    success : function(data){
        var JSONString  = data;
        var JSONObject = JSON.parse(JSONString);
        $('#cboprobcat').empty();
        var mycbo = $('#cboprobcat');
        $('<option/>',{value:"" , text:"Please Select", disabled:"disabled", selected:"selected"}).appendTo(mycbo);
        for (var opt in JSONObject){
            $('<option />',{value:JSONObject[opt].id , text:JSONObject[opt].name}).appendTo(mycbo);
        }
            mycbo.appendTo('#cboprobcat');
        }
});


    $('#cborptcat').change(function(){
        $('#dateA, #dateB').val('');
        $('#dv_daterange').show();
        $('#divmaster').empty();
        
        if($('#cborptcat').val()==2){
            $('#dv_cboprobcat').show();
            $('#dv_cboprobcat_dum').hide();
        }else{
            $('#dv_cboprobcat').hide();
            $('#dv_cboprobcat_dum').show();
        }
    })

    $( "#dateA, #dateB" ).datepicker({ dateFormat: 'yy-mm-dd'});

    $('#dateA').change(function(){
        $('#dateB').val('');
        $('#divmaster').empty();
    })

    $('#dateB').change(function(){


        if($('#cborptcat').val()==1 || $('#cborptcat').val()==2){
            document.getElementById("wboverlay").style.display = "block";
            $('#divmaster').load('r?iticket=rptmaster&datea='+$('#dateA').val()+'&dateb='+$('#dateB').val()+'&rptcat='+$('#cborptcat').val()+'&incharge='+empdept+'&probcat='+$('#cboprobcat').val(),function(responseTxt, statusTxt, xhr){
                if(statusTxt == "success")
                    document.getElementById("wboverlay").style.display = "none";
                if(statusTxt == "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
            });
        }else{
            alert('Report Category '+$("#cborptcat :selected").text()+' is not avaliable for now.');
        }

        

    })
</script>