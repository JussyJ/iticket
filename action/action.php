<?php 
   

    require_once 'app/iticket/services/serv.db.php';
    $db = new Database();
    $db->connect();


    if (isset($_POST['cat'])) {
        switch ($_POST['cat']) {

            case '1':

                $qry = "CALL iticket.new_ticket('".$_POST['ticketidf']."', '".date('Y-m-d H:i:s', time())."', '".$_POST['idemp']."', '".$_POST['ipadd']."', '".$_POST['email']."', '".$_POST['contact']."', '".strtoupper($_POST['subject'])."', '".$_POST['probdesc']."', '".$_POST['attachment']."', '".$_POST['formtype']."', '".$_POST['emailsubj']."', '".$_POST['createby']."', '".$_SERVER['REMOTE_ADDR']."', '".$_POST['incharge']."', '".$_POST['tckthash']."')";
                $db->sp_con($qry);
                $db->disconnect();

            break;
            case '2':

                if($_POST['resolvedate']==' '){
                    $resolvedaters = date('Y-m-d H:i:s', time());
                }else{
                    $resolvedaters = $_POST['resolvedate'];
                }

                $waitingtime = $db->wait_time($resolvedaters, $_POST['reporteddate']);
                $rdays = $db->countdays($_POST['reporteddate'], $resolvedaters);
                $rhrs = $db->counthrs($_POST['reporteddate'], $resolvedaters);
                $rmins = $db->countmins($_POST['reporteddate'], $resolvedaters);

                $qry = "CALL iticket.action('".date('Y-m-d H:i:s', time())."', '".$_POST['actionby']."', '".$_SERVER['REMOTE_ADDR']."', '".$_POST['subject']."', '".$_POST['status']."', '".$_POST['ticketid']."', '".$_POST['probcause']."', '".$_POST['probcat']."', '".$_POST['servicepro']."', '".$_POST['priority']."', '".$resolvedaters."', '".$_POST['reso']."', '".$waitingtime."', '".$rdays."', '".$rhrs."', '".$rmins."', '".$_POST['tcktmoveto']."', '".$_POST['ismoved']."', '".$_POST['servaffctd']."', '".$_POST['resoattach']."')";
                $db->sp_con($qry);
                $db->disconnect();

            break;
            case '3':
                $qry = "CALL iticket.acknowledgement('".$_POST['ticketid']."', '".$_POST['tstatus']."', '".date('Y-m-d H:i:s', time())."', '".$_POST['actionby']."', '".$_SERVER['REMOTE_ADDR']."', '".$_POST['remarks']."')";
                $db->sp_con($qry);
                $db->disconnect();
            break;
            case '4':
                $qry = "CALL iticket.ratingfeedback('".$_POST['ticketid']."', '".$_POST['star']."')";
                $db->sp_con($qry);
                $db->disconnect();
            break;
            case '5':
                $qry = "CALL iticket.admin_action('".$_POST['spcat']."', '".$_POST['actionby']."', '".$_SERVER['REMOTE_ADDR']."', '".$_POST['groupemail']."', '".$_POST['empdept']."', '".$_POST['cboadd']."')";
                $db->sp_con($qry);
                $db->disconnect();
            break;


            
            default:
                die('NO REQUEST.');
                break;

        }

    }

?>



