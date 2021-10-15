<?php 
    require_once 'app/iticket/directives/dire.data.php';
    $dire = new Dire();
?>
<div class="row">
    <div class="large-12 columns">
        <?php $dire->viewtickethistory($_GET['i'], $_GET['c']); ?>
    </div>
</div>

<script>
    $("textarea").each(function() {
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


    
    $('.attchhist').click(function(){

       var mylink = $(this).attr('href');
        var windowname = 'jussy';
        
        if (! window.focus)return true;
            var href;
        if (typeof(mylink) == 'string')
            href=mylink;
        else
            href=mylink.href;
            window.open(href, windowname, 'width=1300px,height=500px,scrollbars=yes');
            return false;
    })
</script>