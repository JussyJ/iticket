<?php

require_once 'app/iticket/services/serv.data.php';

	class Dire{

		function myticketlist($idemp){
			$data = new DATA();
        
				$list = $data->mytcktlist($idemp);

				if ($list['count']==0) {
					echo '
							<div style="text-align: center;padding-top: 30px;">
								<img src="assets/images/norecord-found.png">
							</div>
					';
				}else { $row=0;
					echo '<table class="tbltckt">
                            <thead>
								<th width="4%">&nbsp;</th>
								<th width="9%">TICKET ID</th>
								<th width="14%">REPORTED DATE</th>
								<th>SUBJECT</th>
								<th width="18%">STATUS</th>
                            </thead>
                            <tbody>';
					foreach ($list['object'] as $rs){$row=$row+1;
						$tcktid = "'".$rs['ticketid']."'";
						$tcktstat = "'".$rs['status']."'";
                        $ccode = $data->i_tcktstatus($rs['status'], 'ccode');
						echo '<tr class="statictrMYAPR trvnt" id='.$tcktid.' name='.$tcktstat.'>
								<td>'.$row.'</td>
								<td>'.$rs['ticketid'].'</td>
								<td>'.$rs['datetime'].'</td>
								<td class="textLeft">'.mb_strimwidth(strtoupper($rs['subject']), 0, 80, "...").'</td>
								<td class="'.$ccode.'">'.$data->i_tcktstatus($rs['status'], 'desc').'</td>
							</tr>';
					}
					echo '<tr class="r_notfound" style="background: none;"><td colspan="5" style="border:0px;"><img src="assets/images/norecord-found.png"></td></tr> </tbody>';
				}
		}

		function mytickethistlist($idemp, $datea, $dateb){
			$data = new DATA();
        
				$list = $data->mytckthist($idemp, $datea, $dateb);

				if ($list['count']==0) {
					echo '
							<div style="text-align: center;padding-top: 30px;">
								<img src="assets/images/norecord-found.png">
							</div>
					';
				}else { $row=0;
					echo '<table class="tbltckt">
                            <thead>
								<th width="4%">&nbsp;</th>
								<th width="9%">TICKET ID</th>
								<th width="14%">REPORTED DATE</th>
								<th>SUBJECT</th>
								<th width="18%">STATUS</th>
                            </thead>
                            <tbody>';
					foreach ($list['object'] as $rs){$row=$row+1;
						$tcktid = "'".$rs['ticketid']."'";
						$tcktstat = "'".$rs['status']."'";
                        $ccode = $data->i_tcktstatus($rs['status'], 'ccode');
						echo '<tr class="statictrMYAPR trvnt" id='.$tcktid.' name='.$tcktstat.'>
								<td>'.$row.'</td>
								<td>'.$rs['ticketid'].'</td>
								<td>'.$rs['datetime'].'</td>
								<td class="textLeft">'.mb_strimwidth(strtoupper($rs['subject']), 0, 80, "...").'</td>
								<td class="'.$ccode.'">'.$data->i_tcktstatus($rs['status'], 'desc').'</td>
							</tr>';
					}
					echo '<tr class="r_notfound" style="background: none;"><td colspan="5" style="border:0px;"><img src="assets/images/norecord-found.png"></td></tr> </tbody>';
				}
		}

		function viewticketlist($id){
			$data = new DATA();
				$list = $data->viewtcktlist($id);

				if ($list['count']==0) {
					echo '
							<div style="text-align: center;padding-top: 30px;">
								<img src="assets/images/norecord-found.png">
							</div>
					';
				}else { $row=0;
					echo '<table class="tbltckt">
                            <thead>
                                <tr>
									<th width="4%">&nbsp;</th>
									<th width="9%">TICKET ID</th>
                                    <th width="14%">REPORTED DATE</th>
                                    <th>SUBJECT</th>
									<th width="10%">PRIORITY</th>
									<th width="5%">DAYS</th>
									<th width="10%">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>';
					foreach ($list['object'] as $rs){$row=$row+1;
						$tcktid = "'".$rs['ticketid']."'";
						$in = "'".$rs['incharge']."'";
                        $ccode = $data->i_tcktstatus($rs['status'], 'ccode');
						echo '<tr class="trvt" id='.$tcktid.' name='.$in.'>
								<td>'.$row.'</td>
								<td>'.$rs['ticketid'].'</td>
								<td>'.$rs['datetime'].'</td>
								<td class="textLeft">'.mb_strimwidth(strtoupper($rs['subject']), 0, 70, "...").'</td>
								<td style="font-weight: bold;">'.strtoupper($data->i_priority($data->i_ticketdtlvw_h($rs['ticketid'], 'priority'), 'priocat')).'</td>
								<td>'.$data->countdays(date('Y-m-d',strtotime($rs['datetime']))).'</td>
								<td class="'.$ccode.'">'.$data->i_tcktstatus($rs['status'], 'desc').'</td>
							</tr>';
					}
					echo '<tr class="r_notfound" style="background: none;"><td colspan="7" style="border:0px;"><img src="assets/images/norecord-found.png"></td></tr> </tbody>';
				}
		}

		function viewtickethistory($id, $c){
			$data = new DATA();

				// if($c==1){
				// 	$list = $data->tickethistory($id);
				// }elseif($c==2){
				// 	$list = $data->tickethistoryb($id);
				// }

				$list = $data->tickethistory($id);

				if ($list['count']==0) {
					echo '
							<div style="text-align: center;padding-top: 30px;">
								<img src="assets/images/norecord-found.png">
							</div>
					';
				}else { $row=0;
					foreach ($list['object'] as $rs){$row=$row+1;
						if($rs['return_remarks']==''){
							$divrm = 'display: none;';
						}else{
							$divrm = '';
						}

						if($rs['attachment']==''){
							$hasattachmnt = 'display: none';
						}else{
							$hasattachmnt = '';
						}

						echo '
							<fieldset class="jussf">
								<legend class="jussf">HISTORY '.$row.'</legend>
									<div  style="padding: 0px 13px 0px 13px; ">
										<div class="row">
											<div class="large-6 columns">
												<label class="boldB">DATE : <span style="color: blue;">'.$rs['datetime'].'</span></label>
												<label class="boldB">ACTION BY : <span style="color: blue;">'.$rs['resolved_by'].' - '.$data->empfullname($rs['resolved_by']).'</span></label>
												<label class="boldB">PRIORITY : <span style="color: blue;">'.strtoupper($data->priority_desc($rs['priority'])).'</span></label>
												<label class="boldB">STATUS : <span style="color: blue;">'.strtoupper($data->ticket_stat($rs['ticket_status'])).'</span></label>
											</div>
											<div class="large-6 columns">
												<label class="boldB">PROBLEM CATEGORY : <span style="color: blue;">'.strtoupper($data->probcat_desc($rs['prob_cat'])).'</span></label>
												<label class="boldB">PROBLEM CAUSE : <span style="color: blue;">'.strtoupper($data->probcause_desc($rs['prob_cause'])).'</span></label>
												<label class="boldB">SERVICES AFFECTED : <span style="color: blue;">'.strtoupper($data->servaffctd_desc($rs['services_affected'])).'</span></label>
												<label class="boldB">SERVICE PROVIDER : <span style="color: blue;">'.strtoupper($data->servpro_desc($rs['service_provider'])).'</span></label>
											</div>
										</div>

										<div class="row" style="padding-top: 10px;">
											<div class="large-12 columns">
												<label class="boldB" for="" style="font-weight: bold; ">
													<div class="row">
														<div class="large-6 columns">
															RESOLUTION
														</div>
														<div class="large-6 columns" style="text-align: right;'.$hasattachmnt.'">
															<a id="viewattchmenthis" class="attchhist" href="r?iticket=previewattach&file='.$rs['attachment'].'">
																<label class="boldB" style="cursor: pointer;color:red;" title="View Attachment"><i class="fa fa-paperclip" aria-hidden="true" style="font-size: 20px;"></i> &nbsp;VIEW ATTACHMENT</label>
															</a>
														</div>
													</div>
												</label>
												<textarea class="myFont" style="width: 100%;background: white;" readonly>'.$rs['resolution'].'</textarea>
											</div>
										</div>

										<div class="row" style="'.$divrm.'">
											<div class="large-12 columns">
												<label class="boldB" style="font-weight: bold; color: red;">
													RETURNED REMARKS
												</label>
												<textarea class="myFont" style="width: 100%;background: white;" readonly>'.$rs['return_remarks'].'</textarea>
											</div>
										</div>

									</div>
							</fieldset>
						'; 

					}
				}
		}

		function auto_ackduedate(){
			$data = new DATA();
				$list = $data->ackduedate();
				foreach ($list['object'] as $rs){
					$data->ack_auto_action($rs['ticketid']);

				}
		}

		function l_probcause($id){
			$data = new DATA();
        
				$list = $data->l_probcause($id);

				if ($list['count']==0) {
					echo '
							<div style="text-align: center;padding-top: 30px;">
								<img src="assets/images/norecord-found.png">
							</div>
					';
				}else { $row=0;
					echo '<table class="tbltckt" style="margin: auto;">
                            <thead>
								<th width="6%">&nbsp;</th>
								<th>PROBLEM CAUSE</th>
								<th width="6%">&nbsp;</th>
                            </thead>
                            <tbody>';
					foreach ($list['object'] as $rs){$row=$row+1;
						$trid = "'".$rs['cause_id']."'";
						$trname = "'".$rs['cause_cat']."'";
						// $tcktstat = "'".$rs['status']."'";
						echo '<tr class="statictrMYAPR trvnt" id='.$trid.' name='.$trname.'>
								<td>'.$row.'</td>
								<td class="edittd" id='.$trid.'>'.strtoupper($rs['cause_cat']).'</td>
								<td class="vw_causedtl" style="font-size:13px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
							</tr>';
					}
				}
		}

		function l_category($id){
			$data = new DATA();
        
				$list = $data->l_category($id);

				if ($list['count']==0) {
					echo '
							<div style="text-align: center;padding-top: 30px;">
								<img src="assets/images/norecord-found.png">
							</div>
					';
				}else { $row=0;
					echo '<table class="tbltckt" style="margin: auto;">
                            <thead>
								<th width="6%">&nbsp;</th>
								<th>CATEGORY</th>
								<th width="6%">&nbsp;</th>
                            </thead>
                            <tbody>';
					foreach ($list['object'] as $rs){$row=$row+1;
						$trid = "'".$rs['prob_id']."'";
						$trname = "'".$rs['prob_name']."'";
						// $tcktstat = "'".$rs['status']."'";
						echo '<tr class="statictrMYAPR trvnt" id='.$trid.' name='.$trname.'>
								<td>'.$row.'</td>
								<td class="edittd" id='.$trid.'>'.strtoupper($rs['prob_name']).'</td>
								<td class="vw_ctgdtl" style="font-size:13px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
							</tr>';
					} 
				}
		}

		function l_services($id){
			$data = new DATA();
        
				$list = $data->l_services($id);

				if ($list['count']==0) {
					echo '
							<div style="text-align: center;padding-top: 30px;">
								<img src="assets/images/norecord-found.png">
							</div>
					';
				}else { $row=0;
					echo '<table class="tbltckt" style="margin: auto;">
                            <thead>
								<th width="6%">&nbsp;</th>
								<th>SERVICES AFFECTED</th>
                            </thead>
                            <tbody>';
					foreach ($list['object'] as $rs){$row=$row+1;
						$trid = "'".$rs['sa_id']."'";
						$trname = "'".$rs['srvcs_name']."'";
						// $tcktstat = "'".$rs['status']."'";
						echo '<tr class="statictrMYAPR trvnt" id='.$trid.' name='.$trname.'>
								<td>'.$row.'</td>
								<td class="edittd" id='.$trid.'>'.strtoupper($rs['srvcs_name']).'</td>
							</tr>';
					}
				}
		}

		function l_priority($id){
			$data = new DATA();
        
				$list = $data->l_priority($id);

				if ($list['count']==0) {
					echo '
							<div style="text-align: center;padding-top: 30px;">
								<img src="assets/images/norecord-found.png">
							</div>
					';
				}else { $row=0;
					echo '<table class="tbltckt" style="margin: auto;">
                            <thead>
								<th width="6%">&nbsp;</th>
								<th>PRIORITY</th>
                            </thead>
                            <tbody>';
					foreach ($list['object'] as $rs){$row=$row+1;
						$tdid = "'".$rs['prio_id']."'";
						// $tcktstat = "'".$rs['status']."'";
						echo '<tr class="statictrMYAPR trvnt" id='.$tcktid.' name='.$tcktstat.'>
								<td>'.$row.'</td>
								<td class="edittd" id='.$tdid.'>'.strtoupper($rs['prio_cat']).'</td>
							</tr>';
					}
				}
		}

		function l_servpro($id){
			$data = new DATA();
        
				$list = $data->l_servpro($id);

				if ($list['count']==0) {
					echo '
							<div style="text-align: center;padding-top: 30px;">
								<img src="assets/images/norecord-found.png">
							</div>
					';
				}else { $row=0;
					echo '<table class="tbltckt" style="margin: auto;">
                            <thead>
								<th width="6%">&nbsp;</th>
								<th>SERVICE PROVIDER</th>
                            </thead>
                            <tbody>';
					foreach ($list['object'] as $rs){$row=$row+1;
						$tdid = "'".$rs['sp_id']."'";
						// $tcktstat = "'".$rs['status']."'";
						echo '<tr class="statictrMYAPR trvnt" id='.$tcktid.' name='.$tcktstat.'>
								<td>'.$row.'</td>
								<td class="edittd" id='.$tdid.'>'.strtoupper($rs['name']).'</td>
							</tr>';
					}
				}
		}

		function reportmaster($datea, $dateb, $inchrg, $rptcat, $probcat){
			$data = new DATA();

				$dateA = date('Y-m-d 00:00:00',strtotime($datea));
				$dateB = date('Y-m-d 23:59:59',strtotime($dateb));
			
				switch ($rptcat) {
					case '1':
						if($inchrg!=1){
							$list = $data->rptddateb($dateA, $dateB, $inchrg);
						}else{
							$list = $data->rptddate($dateA, $dateB, $inchrg);
						}
					break;
					case '2':
						$list = $data->rptprobcat($dateA, $dateB, $probcat);
					break;
					case '3':
						$rc = 'notavail';
					break;
					case '4':
						$rc = 'notavail';
					break;
					case '5':
						$rc = 'notavail';
					break;
					case '6':
						$rc = 'notavail';
				}

				if ($list['count']==0) {
					echo '
							<div style="text-align: center;padding-top: 30px;">
								<img src="assets/images/norecord-found.png">
							</div>
					';
				}else { $row=0;
					echo '<table class="tbltckt">
                            <thead>
								<th width="4%">&nbsp;</th>
								<th width="9%">TICKET ID</th>
								<th width="14%">REPORTED DATE</th>
								<th>SUBJECT</th>
								<th width="18%">STATUS</th>
                            </thead>
                            <tbody>';
					foreach ($list['object'] as $rs){$row=$row+1;
						$tcktid = "'".$rs['ticketid']."'";
						$tcktstat = "'".$rs['status']."'";
                        $ccode = $data->i_tcktstatus($rs['status'], 'ccode');
						echo '<tr class="statictrMYAPR trvnt" id='.$tcktid.' name='.$tcktstat.'>
								<td>'.$row.'</td>
								<td>'.$rs['ticketid'].'</td>
								<td>'.$rs['datetime'].'</td>
								<td class="textLeft">'.mb_strimwidth(strtoupper($rs['subject']), 0, 80, "...").'</td>
								<td class="'.$ccode.'">'.$data->i_tcktstatus($rs['status'], 'desc').'</td>
							</tr>';
					}
					echo '<tr class="r_notfound" style="background: none;"><td colspan="5" style="border:0px;"><img src="assets/images/norecord-found.png"></td></tr> </tbody>';
				}
		}



    }
?>