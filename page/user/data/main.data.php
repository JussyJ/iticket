<?php 
    require_once 'app/iticket/services/serv.data.php';
    session_start();

    $data = new DATA();


    if (isset($_GET['cat'])) {
    
        switch ($_GET['cat']) {
    
            case '1':
                if(!$data->i_empcontact($_GET['i'], 'email')){
                    $emailadd = $data->i_emp($_GET['i'], 'email');
                }else{
                    $emailadd = $data->i_empcontact($_GET['i'], 'email');
                }
                $datares = array(
                    'empname'=>$_GET['i'].' - '.$data->empfullname($_GET['i']),
                    'department'=>$data->findDeptUnitBranchname($_GET['i']),
                    'location'=>$data->i_emploc($data->i_emp($_GET['i'], 'idloc'), 'loc'),
                    'ipadd'=>$_SERVER['REMOTE_ADDR'],
                    'ipaddb'=>$data->i_empcontact($_GET['i'], 'ipadd'),
                    'email'=>$emailadd,
                    'contactno'=>$data->i_empcontact($_GET['i'], 'contact'),
                    'suffixname'=>$data->suffixname($_GET['i']),
                    'randomA'=>mt_rand(100000, 999999),
                    'randomB'=>mt_rand(1000, 9999)
                );
            break;

            case '2':
                $department = $data->i_ticketdtl($_GET['i'], 'iddept');
                $branch = $data->barnchdesc($data->i_ticketdtl($_GET['i'], 'idunit'));
                if($department==9){
                    if(!$branch){
                        $branchrs = $data->deptunitdesc($data->i_ticketdtl($_GET['i'], 'idunit'));
                        
                    }else{
                        $branchrs = $data->barnchdesc($data->i_ticketdtl($_GET['i'], 'idunit'));
                    }

                    $deptrs = $data->deptdesc($department).' - '. $branchrs;
                }else{
                    $deptrs = $data->deptdesc($department);
                }

                $datares = array(
                    'reporteddate'=>$data->i_ticketdtl($_GET['i'], 'reporteddate'),
                    'form'=>$data->i_ticketdtl($_GET['i'], 'form'),
                    'incharge'=>$data->i_ticketdtl($_GET['i'], 'incharge'),
                    'empname'=>$data->i_ticketdtl($_GET['i'], 'idemp').' - '.$data->empfullname($data->i_ticketdtl($_GET['i'], 'idemp')),
                    'department'=>$deptrs,
                    'location'=>$data->locdesc($data->i_ticketdtl($_GET['i'], 'idlocation')),
                    'ippadd'=>$data->i_ticketdtl($_GET['i'], 'ippadd'),
                    'emailadd'=>$data->i_ticketdtl($_GET['i'], 'emailadd'),
                    'contactno'=>$data->i_ticketdtl($_GET['i'], 'contactno'),
                    'subject'=>$data->i_ticketdtl($_GET['i'], 'subject'),
                    'problemdesc'=>$data->i_ticketdtl($_GET['i'], 'problemdesc'),
                    'attachment'=>$data->i_ticketdtl($_GET['i'], 'attachment'),
                    'status'=>$data->i_ticketdtl($_GET['i'], 'status'),
                    'crtby'=>$data->i_ticketdtl($_GET['i'], 'crtby').' - '.$data->empfullname($data->i_ticketdtl($_GET['i'], 'crtby')),
                    'probcause'=>$data->i_ticketdtlvw_h($_GET['i'], 'probcause'),
                    'probcat'=>$data->i_ticketdtlvw_h($_GET['i'], 'probcat'),
                    'servicesaffctd'=>$data->i_ticketdtlvw_h($_GET['i'], 'servicesaffctd'),
                    'servicepro'=>$data->i_ticketdtlvw_h($_GET['i'], 'servicepro'),
                    'priority'=>$data->i_ticketdtlvw_h($_GET['i'], 'priority'),
                    'emailsub'=>$data->i_ticketdtl($_GET['i'], 'emailsub'),
                    'suffixname'=>$data->suffixname($data->i_ticketdtl($_GET['i'], 'idemp')),
                    'inchargedept'=>$data->deptdesc($data->i_ticketdtl($_GET['i'], 'incharge')),
                    'moveto'=>$data->i_ticketdtl($_GET['i'], 'moveto'),
                    'emailinchrg'=>$data->i_ticketcharge($data->i_ticketdtl($_GET['i'], 'incharge'), 'email'),
                    'randomA'=>mt_rand(100000, 999999),
                    'histroydatetime'=>$data->history_datetime($_GET['i'])
                );
            break;

            case '3':
                $datares = array(
                    'problemcause'=>strtoupper($data->probcause_desc($data->i_ticketmstrdtl($_GET['i'], 'probcause'))),
                    'category'=>strtoupper($data->probcat_desc($data->i_ticketmstrdtl($_GET['i'], 'probcat'))),
                    'servicepro'=>strtoupper($data->servpro_desc($data->i_ticketmstrdtl($_GET['i'], 'servicepro'))),
                    'servicesaffctd'=>strtoupper($data->servaffctd_desc($data->i_ticketmstrdtl($_GET['i'], 'servicesaffctd'))),
                    'priority'=>strtoupper($data->priority_desc($data->i_ticketmstrdtl($_GET['i'], 'priority'))),
                    'resolveddate'=>$data->i_ticketmstrdtl($_GET['i'], 'resolveddate'),
                    'tstatus'=>strtoupper($data->ticket_stat($data->i_ticketdtl($_GET['i'], 'status'))),
                    'rslvby'=>$data->i_ticketmstrdtl($_GET['i'], 'resolvedby').' - '.$data->empfullname($data->i_ticketmstrdtl($_GET['i'], 'resolvedby')),
                );
            break;

            case '4':
                $datares = array(
                    'inchargemail'=>$data->i_ticketcharge($_GET['i'], 'email')
                );
            break;
            case '5':
                $datares = array(
                    'ticketid'=>$data->i_tcktmasterhash($_GET['i'], 'ticketid'),
                    'emailsubject'=>$data->i_tcktmasterhash($_GET['i'], 'emailsubj')
                );
            break;
          
            default:
                die('request not found reviewer.');
                break;
    
        }
    
    }

    
    header('Content-Type: application/json');
    echo json_encode($datares);
?>