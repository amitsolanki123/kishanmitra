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
      <th scope="col">Product Name</th>
      <th scope="col">MGF Company</th>
      <th scope="col">Batch No</th>
      <th scope="col">MFG Date</th>
      <th scope="col">Exp Date</th>
      <th scope="col">HSN/SAC</th>
	  <th scope="col">Cases</th>
	  <th scope="col">Packaging Size</th>
      <th scope="col">PRICE/PCS</th>     
	  <th scope="col">Total Qty</th>
      <th scope="col">Total Amount</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
   <?php $sl = 1;
   $PAGINATION=10;
     		$range = RANGE;  
			$totalpages = ceil($stock_count / $PAGINATION);

			if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {

			$currentpage = (int) $_GET['currentpage'];
			} else {

			$currentpage = 1;
			}

							?>
  <?php
  $backgoundcolor='';
  $stock='';
    if(count($stock_info) > 0){
       foreach ($stock_info as $v_stock_info) {
           if($v_stock_info['qty'] <= 10){
              $backgoundcolor='#c2ddd4';
			  $stock='out of stock';
	    }		
  ?>
    <tr class="rocolor1 <?php if($v_stock_info['qty'] <= 10){ ?> out_of_stock <?php } ?>">
      <th scope="row"><?php echo $v_stock_info['id'] ?></th>
      <td style="width: 153px;"><?php echo $v_stock_info['product_name'] ?></td>
      <td><?php echo $v_stock_info['mgf_company'] ?></td>
      <td><?php echo $v_stock_info['batch_no'] ?></td>
      <td><?php echo $v_stock_info['mgf_date'] ?></td>
      <td><?php echo $v_stock_info['exp_date'] ?></td>
      <td><?php echo $v_stock_info['hsn_sac'] ?></td>
	  <td><?php echo $v_stock_info['cases'] ?></td>
	  <td><?php echo $v_stock_info['pack_size']?></td>
	  <td><?php echo $v_stock_info['price_pcs']?></td>
      <td><?php echo $v_stock_info['qty'] ?>
      <?php	 
	 if($v_stock_info['qty'] <= 10){
	    echo '&nbsp;'.($stock);
	  }
	  ?></td>
      <td><?php echo $v_stock_info['amount'] ?></td>
	  <td>
	   <button type="submit" class="btn btn-primary acontview"><a href="#viewModal<?php echo $v_stock_info['id']?>" class="trigger-btn" data-toggle="modal">View</a></button>
	   <button type="submit" class="btn btn-primary acontview"><a href="<?php echo base_url('stock/edit_stock/'.$v_stock_info['id'])?>">Edit</a></button>
       <button type="submit" class="btn btn-primary"><a href="#delModal<?php echo $v_stock_info['id']?>" class="trigger-btn" data-toggle="modal">Delete</a></button>
	 </td>
    </tr>
	<!--Delete Model Box--->
	<div id="delModal<?php echo $v_stock_info['id']?>" class="modal fade" aria-hidden="true" style="display: none;">
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
				<button type="button" class="btn btn-danger"><a href="<?php echo base_url('stock/remove_stock/'.$v_stock_info['id'])?>">Delete</a></button>
			</div>
		</div>
	</div>
</div>
<!--Delete Model Box--->


<!-- Modal Box  For View -->
<div id="viewModal<?php echo $v_stock_info['id']?>" class="modal fade" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
	 <p><span style="font-weight:500;">Merchant Name</span>:-  <?php echo $v_stock_info['merchant_name']; ?></p>
     <p><span style="font-weight:500;">Merchant Mobile No</span>:-  <?php echo $v_stock_info['merchant_mobile_no']; ?></p>
     <p><span style="font-weight:500;">Merchant Address</span>:-  <?php echo $v_stock_info['merchant_address']; ?></p>
     <p><span style="font-weight:500;">Date</span>:-  <?php echo $v_stock_info['stock_date']; ?></p>	 
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
<div class="col-sm-7 pull-right">
	<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"> 
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
	if($stock_count>$PAGINATION){  
	  
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
</div>
<!--pagination end here-->

 		</div>
 	</div>
 </section>
