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
    <div class="btns-file">
     <button type="button" class="btn file-btn acontview"><a href="<?php echo base_url('billing/exportCSV')?>">csv</a></button>
   </div>
  </form>
     </div>

 <div class="col-md-6 col-sm-8">
   <div class="rightsid">
   <form class="form-inline" method="post" action="">
    <input type="text" class="form-control mr-sm-2" name="search"  placeholder="Search" aria-label="Search">
    <button type="submit" class="btn btn-outline-success my-2 my-sm-0" >Search</button>
  </form>
   </div>
</div>

    </div>
<!--search bar & entrys end here-->

<!--table start here-->
<table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">s.n</th>
	  <th scope="col">Bill No.</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Mobile NO</th>
      <th scope="col">Address</th>
      <th scope="col">Bill Date</th>
      <th scope="col">Sub Total</th>     
	  <th scope="col">CGST-MP</th>
      <th scope="col">SGST-MP</th>
      <th scope="col">Grand Total</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  <?php $sl = 1;
   $PAGINATION=10;
     		$range = RANGE;  
			$totalpages = ceil($bill_count / $PAGINATION);

			if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {

			$currentpage = (int) $_GET['currentpage'];
			} else {

			$currentpage = 1;
			}

							?>
  <?php
  $b=1;
  foreach($billing_info as $v_billing_info)
  {
  ?>
    <tr class="rocolor1">
      <th scope="row"><?php echo $b;?></th>
	  <td><?php echo $v_billing_info['bill_no']?></td>
      <td><?php echo $v_billing_info['customer_name']?></td>
      <td><?php echo $v_billing_info['mobile_no']?></td>
      <td><?php echo $v_billing_info['address']?></td>
	  <td><?php echo $v_billing_info['bill_date']?></td>
	  <td><?php echo $v_billing_info['sub_total']?></td>
      <td><?php echo $v_billing_info['cgst_mp_price']?></td>
      <td><?php echo $v_billing_info['sgst_mp_price']?></td>
      <td><?php echo $v_billing_info['grand_total']?></td>
      <td class="responsvv"><button type="submit" class="btn btn-primary"><a href="<?php echo base_url('billing/edit_bill/'.$v_billing_info['id'])?>">View</a></button>
	  <button type="submit" class="btn btn-primary"><a href="<?php echo base_url('billing/printbill/'.$v_billing_info['id'])?>">Print</a></button>
      <button type="submit" class="btn btn-primary acontview"><a href="#viewLedger<?php echo $v_billing_info['id']?>" class="trigger-btn" data-toggle="modal">Ledger</a></button>
    </tr>
	
	<!-- Modal Box  For View -->
<div id="viewLedger<?php echo $v_billing_info['id']?>" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h4 class="modal-title">Bill No:- <?php echo $v_billing_info['bill_no']?> </h4>
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
            $result=$CI->getpaymentlist($v_billing_info['id']) ;
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
				      <form name="deposit" method="post" action="<?php echo base_url('billing/savedeposit/')?>"
					   <label class="control-label">Deposit</label>
								<input type="text" name="deposit" value="" placeholder="0.00" required>
								<input type="hidden" name="bill_id" value="<?php echo $v_billing_info['id']?>">
								<input type="hidden" name="grand_total" value="<?php echo $v_billing_info['grand_total']?>">
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
<!-- Modal Box  For View -->
	
	
  <?php $b++;} ?>
  </tbody>
</table>
<!--table end here-->

<!--pagination start here-->
<div class="row">
  <div class="col-md-12">
     <ul class="pagination"> 
	 <?php   
	 
	$search='';
	 if($_GET['search']){
		 
		 $search .= '&search='.$_GET['search'].'';
	 } 
	 
	 if($_GET['product_id']){
		 
		 $search .= '&product_id='.$_GET['product_id'].'';
	 }
	 
	  if($_GET['status']){
		 
		 $search .= '&status='.$_GET['status'].'';
	 }
	 
	 
	if ($currentpage > $totalpages) { 
	      $currentpage = $totalpages;
	} 

	if ($currentpage < 1) { 
	$currentpage = 1;
	}   
	if($bill_count>$PAGINATION){  
	  
	if ($currentpage > 1) { 
	   echo "<li> <a href='{$_SERVER['SCRIPT_URI']}?currentpage=1".$search."'><<</a></li> "; 
	        $prevpage = $currentpage - 1; 
	   echo "<li> <a href='{$_SERVER['SCRIPT_URI']}?currentpage=$prevpage".$search."'><</a> </li>";
	}   
	
	for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) { 
	if (($x > 0) && ($x <= $totalpages)) { 
	if ($x == $currentpage) { 
	echo "<li class='active'> <a href='javascript:;' class='paginate_button'>$x</a> </li>"; 
	} else { 
	echo "<li> <a href='{$_SERVER['SCRIPT_URI']}?currentpage=$x".$search."'>$x</a> </li>";
	} 
	} 
	}  


	if ($currentpage != $totalpages) {

	$nextpage = $currentpage + 1;

	echo "<li> <a href='{$_SERVER['SCRIPT_URI']}?currentpage=$nextpage".$search."'>></a> </li>";

	echo "<li> <a href='{$_SERVER['SCRIPT_URI']}?currentpage=$totalpages".$search."'>>></a> </li>";
	} 

	} 
   ?> 
	</ul>
  </div>
</div>
<!--pagination end here-->

 		</div>
 	</div>
 </section>

