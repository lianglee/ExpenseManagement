<div class="expense-add-container">
    		<div class="ossn-widget">
					<div class="widget-heading"><i class="fa fa-shopping-bag"></i><?php echo ossn_print('em:addexpense');?></div>
						<div class="widget-contents">
                                <div>	
                                    <label><i class="fa fa-calendar"></i><?php echo ossn_print('em:date');?></label>
                                    <input type="text" name="expnesedate" required="required"  readonly="readonly"/>
                                </div>
                                <div class="items-enter">
                                	<div class="row expense-form-item">
                                    	<div class="col-md-6">
                                        	<input type="text" class="fa expense-input" name="items[]" placeholder="&#xf02a <?php echo ossn_print('em:itemname');?>"/>
                                        </div>
                                    	<div class="col-md-6">
                                        	<input type="number" class="fa expense-input" name="price[]" step="0.01" placeholder="&#xf0d6 <?php echo ossn_print('em:price');?>"/>
                                        </div>                                        
                                    </div>
                                </div>    
 								<a href="javascript:void(0);" class="btn btn-danger btn-sm remove-item hidden">-</a>
 								<a href="javascript:void(0);" class="btn btn-success btn-sm add-item">+</a>
 								<input type="submit" class="btn btn-success  btn-sm add-items right" value="<?php echo ossn_print('save');?>" />
						</div>
			</div>
</div>
