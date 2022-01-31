<!--about start here-->
 <section class="dashbord stock_manage">
    <div class="container-fluid">
 	<div class="dashbord_main">
<!--search bar & entrys start here-->
 	<div class="row">
    <div class="col-md-6 col-sm-4">
      <form>
    <div class="leftsid">
         <label class="input-group-text" for="inputGroupSelect01">Show 
      <select class="custom-select" id="inputGroupSelect01">
          <option selected>5</option>
          <option value="1">10</option>
          <option value="2">50</option>
          <option value="3">100</option>
      </select>
       entries
     </label>
   </div>
  </form>
     </div>

 <div class="col-md-6 col-sm-8">
   <div class="rightsid">
   <form method="post" action="" class="form-inline">
    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
   </div>
</div>

    </div>
<!--search bar & entrys end here-->

<!--table start here-->
<table class="table table-responsive">
  <thead>
      <tr>
      <th scope="col">sn</th>
      <th scope="col">Product NAME</th>
      <th scope="col">mgf.company</th>
      <th scope="col">batch no.</th>
      <th scope="col">mgf.DATE</th>
      <th scope="col">exp.DATE</th>
      <th scope="col">hsn/sac</th>
      <th scope="col">CASES</th>
      <th scope="col">QTY.</th>
      <th scope="col">PRICE/pcs</th>
      <th scope="col">total AMOUNT</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    if(count($merchant_account_info) > 0){
         foreach ($merchant_account_info as $v_merchant_account_info) { 
  ?>
    <tr class="rocolor1">
      <th scope="row"><?php echo $v_merchant_account_info['id'] ?></th>
      <td style="width: 153px;"><?php echo $v_merchant_account_info['product_name'] ?></td>
      <td><?php echo $v_merchant_account_info['mgf_company'] ?></td>
      <td><?php echo $v_merchant_account_info['batch_no'] ?></td>
      <td><?php echo $v_merchant_account_info['mgf_date'] ?></td>
      <td><?php echo $v_merchant_account_info['exp_date'] ?></td>
      <td><?php echo $v_merchant_account_info['hsn_sac'] ?></td>
	  <td><?php echo $v_merchant_account_info['cases'] ?></td>
	  <td><?php echo $v_merchant_account_info['qty'] ?></td>
	  <td><?php echo $v_merchant_account_info['price_pcs'] ?></td>
	  <td><?php echo $v_merchant_account_info['total_amount'] ?></td>
	  <td>
	   <button type="submit" class="btn btn-primary acontview"><a href="#viewModal<?php echo $v_merchant_account_info['id']?>" class="trigger-btn" data-toggle="modal">View</a></button>
	   <button type="submit" class="btn btn-primary acontview"><a href="<?php echo base_url('stock/edit_merchant_acc/'.$v_merchant_account_info['id'])?>">Edit</a></button>
       <button type="submit" class="btn btn-primary"><a href="#delModal<?php echo $v_merchant_account_info['id']?>" class="trigger-btn" data-toggle="modal">Delete</a></button>
        <button type="submit" class="btn btn-primary acontview"><a href="#viewLedger<?php echo $v_merchant_account_info['id']?>" class="trigger-btn" data-toggle="modal">Ledger</a></button>	
	</td>
    </tr>
	<!--Delete Model Box--->
	<div id="delModal<?php echo $v_merchant_account_info['id']?>" class="modal fade" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="icon-remove"></i> 
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these Stock?.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger"><a href="<?php echo base_url('stock/remove_merchant_acc/'.$v_merchant_account_info['id'])?>">Delete</a></button>
			</div>
		</div>
	</div>
</div>
<!--Delete Model Box--->


	<!-- Modal Box  For View  ledger-->
<div id="viewLedger<?php echo $v_merchant_account_info['id']?>" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h4 class="modal-title">Bill No:- <?php echo $v_merchant_account_info['bill_no']?> </h4>
      </div>
      <div class="modal-body">
				<div class="container">
					  <div class="row">
						 <div class="col-md-2">
						  Sno
						 </div>
						 <div class="col-md-2">
						  Date
						 </div>
						  <div class="col-md-2">
						   Total
						 </div>
						 <div class="col-md-2">
						  Deposit
						 </div>
						 <div class="col-md-2">
						  Balance
						 </div>
					  </div>
					  
	    <?php
	        $CI =& get_instance();
			$result=$CI->getamerchantaccpaymentlist($v_merchant_account_info['id']) ;
			$sumdeposit=0;
		    foreach($result as $v_payment){
			   $sumdeposit +=$v_payment['deposit'];
	           ?>
					  
					  <div class="row">
						 <div class="col-md-2">
						  <?php echo $v_payment['id']?>
						 </div>
						 <div class="col-md-2">
						  <?php echo $v_payment['deposit_date']?>
						 </div>
						 <div class="col-md-2">
						   <?php echo $v_payment['grand_total']?>
						 </div>
						 <div class="col-md-2">
						  <?php echo $v_payment['deposit']?>
						 </div>
						 <div class="col-md-2">
						  <?php  
						      if($v_payment['grand_total'] !=''){
						         $balance=$v_payment['grand_total']-$sumdeposit;
								echo number_format((float)$balance, 2, '.', '');
						      }
						  ?>
						 </div>
					  </div>
                     <?php } ?>
                </div>
				<div class="row">
				   <div class="form-group">
				      <form name="deposit" method="post" action="<?php echo base_url('stock/savedeposit/')?>"
					   <label class="control-label">Deposit</label>
								<input type="text" name="deposit" value="" placeholder="0.00" required>
								<input type="hidden" name="bill_id" value="<?php echo $v_merchant_account_info['id']?>">
								<input type="hidden" name="grand_total" value="<?php echo $v_merchant_account_info['total_amount']?>">
								<input type="submit" name="save" value="save">
						</form>		
					</div>
				</div>
	 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Box  For View  ledger -->


<!-- Modal Box  For View -->
<div id="viewModal<?php echo $v_merchant_account_info['id']?>" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
	 <p><span style="font-weight:500;">Company Name</span>:-  <?php echo $v_merchant_account_info['company_name']; ?></p>
     <p><span style="font-weight:500;">Company Mobile No</span>:-  <?php echo $v_merchant_account_info['company_mobile']; ?></p>
     <p><span style="font-weight:500;">Company Address</span>:-  <?php echo $v_merchant_account_info['company_address']; ?></p>
     <p><span style="font-weight:500;">Stock Date</span>:-  <?php echo $v_merchant_account_info['stock_date']; ?></p>	 
	 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Box  For View -->
 <?php  } 
	  }
	else {
	   echo "<tr><td colspan=13 style=text-align:center;>Record Not Found!</td></tr>";	
	}
  ?>
  </tbody>
</table>
<!--table end here-->

<!--pagination start here-->
<div class="row">
  <div class="col-md-12">
     <ul class="pagination">
    <li class="page-item">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item"><a class="page-link active" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
  </div>
</div>
<!--pagination end here-->

 		</div>
 	</div>
 </section>
