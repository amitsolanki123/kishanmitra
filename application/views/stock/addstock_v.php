<!--about start here-->
 <section class="dashbord adstock">
 	<div class="dashbord_main">
 		<div class="container">
 			<div class="row">
  <form name="addstock" method="post" action="<?php echo base_url('stock/create_stock')?>">
   <div class="form-row">
     <div class="form-group col-md-3">
      <label for="">MERCHANT NAME</label>
      <input type="text" name="merchant_name" class="form-control"  placeholder="CUSTOMER NAME" required>
    </div>
    <div class="form-group col-md-3 ">
      <label for="">MERCHANT MO.NO.</label>
      <input type="number" name="merchant_mobile_no" class="form-control" id="" placeholder="MOBILE NUMBER" required>
    </div>
      <div class="form-group col-md-3 ">
      <label for="">MERCHANT ADDRESS</label>
      <input type="text" name="merchant_address" class="form-control" id="" placeholder="ADDRESS" required>
    </div>
     <div class="form-group col-md-3 ">
      <label for="">DATE</label>
      <input type="date" name="stock_date" class="form-control" id="" placeholder="DATE.../.../..." required>
    </div>
	
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">Product NAME</label>
      <input type="text" name="product_name" class="form-control" id="" placeholder="Product Name" required>
    </div>
	<div class="form-group col-md-2 col-6">
      <label for="">Batch No</label>
      <input type="text" name="batch_no" class="form-control" id="" placeholder="Batch No." required>
    </div>
    <div class="form-group col-md-2 col-6">
      <label for="">MGF Company</label>
      <input type="text" name="mgf_company" id="mgf_company" class="form-control"  placeholder="MGF Company" required>
    </div>
     <div class="form-group col-md-2 col-6">
       <label for="">MGF DATE</label>
      <input type="date" name="mgf_date" id="mgf_date" class="form-control"  placeholder="MGF DATE" required>
    </div>
      <div class="form-group col-md-2 col-6">
       <label for="">Exp. DATE</label>
      <input type="date" name="exp_date" id="exp_date" class="form-control"  placeholder="Exp. DATE" required>
    </div>
	
  </div>
    <div class="form-row">
	<div class="form-group col-md-2 col-6">
      <label for="">HSN/SAC</label>
      <input type="text" name="hsn_sac" id="hsn_sac" class="form-control" value=""  placeholder="HSN/SAC" required>
    </div>
	 <div class="form-group col-md-2 col-6">
       <label for="">CASES</label>
      <input type="text" name="cases" id="cases" value="" class="form-control"  placeholder="CASES" required>
    </div>
	  <div class="form-group col-md-2 col-6">
       <label for="">Packaging Size</label>
      <input type="text" name="pack_size" id="pack_size"  class="form-control"  placeholder="Packaging Size" required>
    </div>
    <div class="form-group col-md-2 col-6">
     <label for="">PRICE/pcs</label>
      <input type="text" name="price_pcs" id="price_pcs" value=""  class="form-control" placeholder="PRICE/pcs" required>
    </div>
	<div class="form-group col-md-2 col-6">
     <label for="">Total Qty</label>
      <input type="text" name="qty" id="qty"  class="form-control"  placeholder="QTY" required>
    </div>
     <div class="form-group col-md-2 col-6">
      <label for="">Total AMOUNT</label>
      <input type="text" name="amount"  class="form-control"  placeholder="Total Amount">
     </div>
  </div>
  <button type="submit" class="btn btn-primary">save stock</button>
</form>
 			</div>
 		</div>
 	</div>
 </section>
