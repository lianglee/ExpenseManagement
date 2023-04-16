<?php
	$query = input('query');
?>	
<style>
div.ui-datepicker-header a.ui-datepicker-prev,div.ui-datepicker-header a.ui-datepicker-next{
    display: none;  
}
</style>
<div class="expense" data-year="<?php echo $params['year'];?>" data-month="<?php echo $params['month'];?>">
<?php
	echo ossn_view_form('expensemanagement/add', array(
			'action' => ossn_site_url('action/expense/management/add'),
	));
?>
<div class="expense-tools-container">
    		<div class="ossn-widget">
					<div class="widget-heading"><i class="fa fa-cogs"></i> <?php echo ossn_print('em:tools');?></div>
						<div class="widget-contents">
							<div class="row">
                            	<div class="col-md-8 col-sm-8 col-xs-8">
                                  <form method="post" id="expense-search">
	                                  <input type="text" id="expense-search-input" name="query" value="<?php echo $query;?>"/>
  	                                  <a class="btn btn-info btn-sm expense-search-list"><i class="fa fa-search"></i></a>
                                  </form>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                   <a target="_blank" class="btn btn-success btn-sm right" href="<?php echo ossn_site_url("expensemanagement/print/{$params['month']}/{$params['year']}");?>"><i class="fa fa-print"></i></a>
                                </div>
                            </div>

						</div>
			</div>
</div>
<div class="expense-list-container">
    		<div class="ossn-widget">
					<div class="widget-heading"><i class="fa fa-bars"></i><?php echo ossn_print('em:itemslist');?></div>
						<div class="widget-contents">
                        	<table class="table table-striped">
                            	<?php 
								$em = new ExpenseManagement;
								$list = $em->getList(ossn_loggedin_user()->guid, $params['month'], $params['year'], $query);
								if($list){
										foreach($list  as $item){
											$prices[] = floatval($item->price);
											?>
  											<tr class="expense-lists-item-<?php echo $item->guid;?>">
    											<td><?php echo $item->title;?></td>
    											<td class="ammount"><?php echo $item->price;?></td>
    											<td width="10%" class="buttons"><a href="<?php echo ossn_site_url("action/expense/management/delete?guid={$item->guid}", true);?>" data-guid="<?php echo $item->guid;?>" class="label label-danger expense-item-delete">-</a></td>
 											 </tr>
                                            <?php		
										}
								}	
								if(is_int($prices)){
									$sumtotal = array_sum($prices);
								} else {
									$sumtotal = 0;	
								}
								?>
                                <td></td><td><strong><?php echo ossn_print('em:total');?><span class="total"><?php echo $sumtotal;?></span></strong></td><td width="10%"></td></td>
                                </table>

						</div>
			</div>
    </div>
</div>    