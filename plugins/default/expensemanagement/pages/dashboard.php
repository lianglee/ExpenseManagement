<?php
/**
 * Open Source Social Network
 *
 * @package   (softlab24.com).ossn
 * @author    OSSN Core Team <info@softlab24.com>
 * @copyright (C) SOFTLAB24 LIMITED
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
$expense       = new ExpenseManagement;
$year          = input('year', '', date('Y'));
$user_guid     = 1;
$current_month = date('m');

$jan = $expense->getMonthStatus($user_guid, '01', $year);
$feb = $expense->getMonthStatus($user_guid, '02', $year);
$mar = $expense->getMonthStatus($user_guid, '03', $year);
$apr = $expense->getMonthStatus($user_guid, '04', $year);
$may = $expense->getMonthStatus($user_guid, '05', $year);
$jun = $expense->getMonthStatus($user_guid, '06', $year);
$jul = $expense->getMonthStatus($user_guid, '07', $year);
$aug = $expense->getMonthStatus($user_guid, '08', $year);
$sep = $expense->getMonthStatus($user_guid, '09', $year);
$oct = $expense->getMonthStatus($user_guid, '10', $year);
$nov = $expense->getMonthStatus($user_guid, '11', $year);
$dev = $expense->getMonthStatus($user_guid, '12', $year);

$janf = "";
$febf = "";
$marf = "";
$aprf = "";
$mayf = "";
$junf = "";
$julf = "";
$augf = "";
$sepf = "";
$octf = "";
$novf = "";
$decf = "";

if(!$jan && $current_month !== '01') {
		$janf = ' expense-month-faded';
}
if(!$feb && $current_month !== '02') {
		$febf = ' expense-month-faded';
}
if(!$mar && $current_month !== '03') {
		$marf = ' expense-month-faded';
}
if(!$apr && $current_month !== '04') {
		$aprf = ' expense-month-faded';
}
if(!$may && $current_month !== '05') {
		$mayf = ' expense-month-faded';
}
if(!$jun && $current_month !== '06') {
		$junf = ' expense-month-faded';
}
if(!$jul && $current_month !== '07') {
		$julf = ' expense-month-faded';
}
if(!$aug && $current_month !== '08') {
		$augf = ' expense-month-faded';
}
if(!$sep && $current_month !== '09') {
		$sepf = ' expense-month-faded';
}
if(!$oct && $current_month !== '10') {
		$octf = ' expense-month-faded';
}
if(!$nov && $current_month !== '11') {
		$novf = ' expense-month-faded';
}
if(!$dev && $current_month !== '12') {
		$decf = ' expense-month-faded';
}
?>	
<div class="expense">
<div class="expense-tools-container">
    		<div class="ossn-widget">
					<div class="widget-heading"><i class="fa fa-cogs"></i> <?php echo ossn_print('em:tools');?></div>
						<div class="widget-contents">
                                  <form method="post" id="expense-select-year" class="ossn-form">
                                  		<label><?php echo ossn_print('em:year');?></label>
                                  		<?php 
										echo ossn_plugin_view('input/dropdown', array(
												'name' => 'year',
												'value' => (int)$year,
												'options' => (new ExpenseManagement())->getYears(ossn_loggedin_user()->guid),
										)); 
										?>
                                  </form>
						</div>
			</div>
</div>
<div class="expense-add-container">
    		<div class="ossn-widget">
					<div class="widget-heading"><i class="fa fa-bars"></i><?php echo ossn_print('em:list');?> <?php echo $year;?></div>
						<div class="widget-contents">
								<div class="row">
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $janf;?>" data-year="<?php echo $year;?>" data-month='01'>
                                                    <div class="expense-month-title"><?php echo ossn_print('em:month:jan');?></div>
                                                    <div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '01', $year);?></div>
                                                </div>                                         
                                        </div>
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $febf;?>" data-year="<?php echo $year;?>" data-month='02'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:feb');?></div>
                                                    <div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '02', $year);?></div>
                                                </div>                                         
                                        </div>
                                </div>
								
                                <div class="row">
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $marf;?>" data-year="<?php echo $year;?>" data-month='03'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:mar');?></div>                                        
													<div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '03', $year);?></div>   
                                                </div>                                         
                                        </div>
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $aprf;?>" data-year="<?php echo $year;?>" data-month='04'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:apr');?></div>                                        			<div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '04', $year);?></div>   
                                                </div>                                         
                                        </div>
                                </div> 
                                
								<div class="row">
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $mayf;?>" data-year="<?php echo $year;?>" data-month='05'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:may');?></div>                                        
													<div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '05', $year);?></div>   
                                                </div>                                         
                                        </div>
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $junf;?>" data-year="<?php echo $year;?>" data-month='06'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:jun');?></div>                                        			<div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '06', $year);?></div>   
                                                </div>                                         
                                        </div>
                                </div>    
  
 								<div class="row">
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $julf;?>" data-year="<?php echo $year;?>" data-month='07'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:jul');?></div>                                        
													<div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '07', $year);?></div>   
                                                </div>                                         
                                        </div>
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $augf;?>" data-year="<?php echo $year;?>" data-month='08'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:aug');?></div>                                        			<div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '08', $year);?></div>   
                                                </div>                                         
                                        </div>
                                </div>
                                
								<div class="row">
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $sepf;?>" data-year="<?php echo $year;?>" data-month='09'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:sep');?></div>                                        
													<div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '09', $year);?></div>   
                                                </div>                                         
                                        </div>
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $octf;?>" data-year="<?php echo $year;?>" data-month='10'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:oct');?></div>                                        			<div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '10', $year);?></div>   
                                                </div>                                         
                                        </div>
                                </div>

								<div class="row">
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $novf;?>" data-year="<?php echo $year;?>" data-month='11'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:nov');?></div>                                        
													<div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '11', $year);?></div>   
                                                </div>                                         
                                        </div>
                                		<div class="col-md-6 col-xs-6 col-sm-6">
                                        		<div class="expense-month<?php echo $decf;?>" data-year="<?php echo $year;?>" data-month='12'>
													<div class="expense-month-title"><?php echo ossn_print('em:month:dec');?></div>                                        			<div class="expense-month-total"><?php echo $expense->getTotal(ossn_loggedin_user()->guid, '12', $year);?></div>   
                                                </div>                                         
                                        </div>
                                </div>
                                                                                                                           
						</div>
			</div>
    </div>
</div>    