<div class="row">
    <div class="large-12 columns">


<!-- <div class="container theme-lime">

  <div class="ui-tabgroup">
    <input class="ui-tab1" type="radio" id="tgroup_c_tab1" name="tgroup_c" checked />
    <input class="ui-tab2" type="radio" id="tgroup_c_tab2" name="tgroup_c" />
    <input class="ui-tab3" type="radio" id="tgroup_c_tab3" name="tgroup_c" />
    <input class="ui-tab4" type="radio" id="tgroup_c_tab4" name="tgroup_c" />
    <div class="ui-tabs">
      <label class="ui-tab1" for="tgroup_c_tab1"><i class="fa fa-list"></i>Dropwdown</label>
      <label class="ui-tab2" for="tgroup_c_tab2"><i class="fa fa-cog"></i>Department Group Email</label>
      <label class="ui-tab3" for="tgroup_c_tab3"><i class="fa fa-rocket"></i>Dolor</label>
      <label class="ui-tab4" for="tgroup_c_tab4"><i class="fa fa-cloud-upload"></i>Sit Amet</label>
    </div>
    <div class="ui-panels">
      <div class="ui-tab1">
            

            <div class="ui-tabgroup left-side">
                <input class="ui-tab1" type="radio" id="tgroup_d_tab1" name="tgroup_d" checked />
                <input class="ui-tab2" type="radio" id="tgroup_d_tab2" name="tgroup_d" />
                <input class="ui-tab5" type="radio" id="tgroup_d_tab5" name="tgroup_d" />
                <input class="ui-tab3" type="radio" id="tgroup_d_tab3" name="tgroup_d" />
                <input class="ui-tab4" type="radio" id="tgroup_d_tab4" name="tgroup_d" />

                <div class="ui-tabs">
                    <label class="ui-tab1" for="tgroup_d_tab1" id="admn_category"><i class="fa fa-question-circle"></i>Problem Category</label>
                    <label class="ui-tab2" for="tgroup_d_tab2" id="admn_prbcause"><i class="fa fa-info-circle"></i>Problem Cause</label>
                    <label class="ui-tab5" for="tgroup_d_tab5" id="admn_servaffected"><i class="fa fa-tags"></i>Services Affected</label>
                    <label class="ui-tab3" for="tgroup_d_tab3" id="admn_servpro"><i class="fa fa-tag"></i>Service Provider/Vendor</label>
                    <label class="ui-tab4" for="tgroup_d_tab4" id="admn_priority"><i class="fa fa-tags"></i>Priority</label>
                </div>

                <div class="ui-panels">
                    <div class="ui-tab1">
                        <div id="tab1"></div>
                    </div>
                    <div class="ui-tab2">
                        <div id="tab2"></div>
                    </div>
                    <div class="ui-tab3">
                        <div id="tab3"></div>
                    </div>
                    <div class="ui-tab4">
                        <div id="tab4"></div>
                    </div>
                </div>

            </div>

      </div>
      
      <div class="ui-tab2">
            <div id="admn_email" style="text-align: center;"></div>
      </div>
    </div>
  </div>



  
</div> -->

        <div class="container theme-lime">
            <div class="ui-tabgroup left-side">
                <input class="ui-tab1" type="radio" id="tgroup_d_tab1" name="tgroup_d" checked />
                <input class="ui-tab2" type="radio" id="tgroup_d_tab2" name="tgroup_d" />
                <input class="ui-tab3" type="radio" id="tgroup_d_tab3" name="tgroup_d" />
                <input class="ui-tab4" type="radio" id="tgroup_d_tab4" name="tgroup_d" />
                <input class="ui-tab5" type="radio" id="tgroup_d_tab5" name="tgroup_d" />
                <input class="ui-tab6" type="radio" id="tgroup_d_tab6" name="tgroup_d" />

                <div class="ui-tabs">
                    <label class="ui-tab1" for="tgroup_d_tab1" id="admn_category"><i class="fa fa-question-circle"></i>Problem Category</label>
                    <!-- <label class="ui-tab2" for="tgroup_d_tab2" id="admn_prbcause"><i class="fa fa-question-circle"></i>Problem Cause</label>
                    <label class="ui-tab3" for="tgroup_d_tab3" id="admn_servaffected"><i class="fa fa-tags"></i>Services Affected</label> -->
                    <label class="ui-tab2" for="tgroup_d_tab2" id="admn_servpro"><i class="fa fa-tag"></i>Service Provider/Vendor</label>
                    <label class="ui-tab3" for="tgroup_d_tab3" id="admn_priority"><i class="fa fa-info-circle"></i>Priority</label>
                    <label class="ui-tab4" for="tgroup_d_tab4" id="admn_deptemail"><i class="fa fa-envelope" aria-hidden="true"></i>Department Email</label>
                </div>

                <div class="ui-panels">
                    <div class="ui-tab1">
                        <div id="tab1"></div>
                    </div>

                    <div class="ui-tab2">
                        <div id="tab2"></div>
                    </div>

                    <div class="ui-tab3">
                        <div id="tab3"></div>
                    </div>

                    <div class="ui-tab4">
                        <div id="admn_email" style="text-align: center;"></div>
                    </div>
                </div>

            </div>
        </div>




    </div>
</div>

<script>
 
    $('#tab1').load('r?iticket=admincategory&i='+empdept,function(responseTxt, statusTxt, xhr){});
    $('#admn_email').load('r?iticket=admingrpmail',function(responseTxt, statusTxt, xhr){});

    $('#admn_category').click(function(){
        $('#tab2, #tab3, #tab4').empty();
        $('#tab1').load('r?iticket=admincategory&i='+empdept,function(responseTxt, statusTxt, xhr){});
    });

    // $('#admn_prbcause').click(function(){
    //     $('#tab1, #tab3, #tab4').empty();
    //     $('#tab2').load('r?iticket=adminprobcause&i='+empdept,function(responseTxt, statusTxt, xhr){});
    // });

    $('#admn_servpro').click(function(){
        $('#tab1, #tab3, #tab4').empty();
        $('#tab2').load('r?iticket=adminservpro&i='+empdept,function(responseTxt, statusTxt, xhr){});
    });

    $('#admn_priority').click(function(){
        $('#tab1, #tab2, #tab4').empty();
        $('#tab3').load('r?iticket=adminpriority&i='+empdept,function(responseTxt, statusTxt, xhr){});
    });

</script>