<!--about start here-->
 <section class="dashbord adstock">
 	<div class="dashbord_main">
 		<div class="container">
 			<div class="row">
  <form name="addstock" method="post" action="<?php echo base_url('stock/update_stock')?>">
  <input type="hidden" name="edit_id" value="<?php echo $stock_info['id'] ?>">
   <div class="form-row">
     <div class="form-group col-md-3">
      <label for="">MERCHANT NAME</label>
      <input type="text" name="merchant_name" value="<?php echo $stock_info['merchant_name']?>" class="form-control"  placeholder="CUSTOMER NAME">
    </div>
    <div class="form-group col-md-3 ">
      <label for="">MERCHANT MO.NO.</label>
      <input type="number" name="merchant_mobile_no" value="<?php echo $stock_info['merchant_mobile_no']?>" class="form-control" id="" placeholder="MOBILE NUMBER">
    </div>
      <div class="form-group col-md-3">
      <label for="">MERCHANT ADDRESS</label>
      <input type="text" name="merchant_address" value="<?php echo $stock_info['merchant_address']?>" class="form-control" id="" placeholder="ADDRESS">
    </div>
     <div class="form-group col-md-3">
      <label for="">DATE</label>
      <input type="date" name="stock_date" value="<?php echo $stock_info['stock_date']?>" class="form-control" id="" placeholder="DATE.../.../...">
    </div>
	
   <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">Product NAME</label>
      <input type="text" name="product_name" value="<?php echo $stock_info['product_name']?>" class="form-control" id="" placeholder="Product NAME">
    </div>
	<div class="form-group col-md-2 col-6">
      <label for="">Batch No</label>
      <input type="text" name="batch_no"  value="<?php echo $stock_info['batch_no']?>" class="form-control" id="" placeholder="Batch No." required>
    </div>
    <div class="form-group col-md-2 col-6">
      <label for="">MGF Company</label>
      <input type="text" name="mgf_company" value="<?php echo $stock_info['mgf_company']?>" id="mgf_company" class="form-control"  placeholder="G.WEIGHT">
    </div>
     <div class="form-group col-md-2 col-6">
      <label for="">mgf_date</label>
      <input type="date" name="mgf_date" value="<?php echo $stock_info['mgf_date']?>" id="mgf_date" class="form-control"  placeholder="BAGES QTY">
    </div>
      <div class="form-group col-md-2 col-6">
      <label for="">Exp. DATE</label>
      <input type="date" name="exp_date" value="<?php echo $stock_info['exp_date']?>" id="exp_date" class="form-control"  placeholder="BAGES WEIGHT">
    </div>
  </div>

    <div class="form-row">
	 <div class="form-group col-md-2 col-6">
       <label for="">HSN/SAC</label>
       <input type="text" name="hsn_sac" value="<?php echo $stock_info['hsn_sac']?>" id="hsn_sac"  class="form-control"  placeholder="NET WEIGHT">
     </div>
    <div class="form-group col-md-2 col-6">
      <label for="">CASES</label>
      <input type="text" name="cases" value="<?php echo $stock_info['cases']?>" id="cases" class="form-control"  placeholder="MELTING">
    </div>
	<div class="form-group col-md-2 col-6">
       <label for="">Packaging Size</label>
      <input type="text" name="pack_size" id="pack_size" value="<?php echo $stock_info['pack_size']?>"  class="form-control"  placeholder="Packaging Size" required>
    </div>
     <div class="form-group col-md-2 col-6">
      <label for="">QTY</label>
      <input type="text" name="qty" value="<?php echo $stock_info['qty']?>" id="qty" class="form-control" placeholder="Qty">
    </div>
      <div class="form-group col-md-2 col-6">
      <label for="">PRICE/pcs</label>
      <input type="text" name="price_pcs" value="<?php echo $stock_info['price_pcs']?>" id="price_pcs" class="form-control"  placeholder="PRICE/pcs">
    </div>
      <div class="form-group col-md-2 col-6">
      <label for="">Total AMOUNT</label>
      <input type="text" name="amount" value="<?php echo $stock_info['amount']?>"  class="form-control"  placeholder="AMOUNT">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Update stock</button>
</form>
 			</div>
 		</div>
 	</div>
 </section>
