<!--about start here-->
 <section class="dashbord adstock">
 	<div class="dashbord_main com-acont">
 		<div class="container">
 			<div class="row">
 		  <form method="post" action="<?php echo base_url('stock/create_merchant_acc')?>">
   <div class="form-row">


    <div class="form-group col-md-4">
      <label for="">company NAME</label>
      <input type="text" class="form-control" name="company_name" id="company_name" placeholder="CUSTOMER NAME" required>
    </div>
    <div class="form-group col-md-4 ">
      <label for="">company MO/tel no.</label>
      <input type="number" class="form-control" name="company_mobile" id="company_mobile" placeholder="MOBILE NUMBER" required>
    </div>
      <div class="form-group col-md-4 ">
      <label for="">company ADDRESS</label>
      <input type="text" class="form-control" name="company_address" id="company_address" placeholder="ADDRESS" >
    </div>
        <div class="form-group col-md-4 ">
      <label for="">GSTIN</label>
      <input type="text" class="form-control" name="gstin" id="gstin" placeholder="gstin.">
    </div>     
     
     <div class="form-group col-md-4 ">
      <label for="">DATE</label>
      <input type="date" class="form-control" name="stock_date" id="stock_date" placeholder="DATE.../.../...">
    </div> 

    <div class="form-group col-md-4 ">
      <label for="">bill bo.</label>
      <input type="text" class="form-control" name="bill_bo" id="bill_bo" placeholder="bill no.">
    </div>







  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="">Product NAME</label>
      <input type="text" class="form-control" name="product_name" id="product_name" placeholder="PRODUCT NAME">
    </div>
    <div class="form-group col-md-2">
      <label for="">batch no.</label>
      <input type="text" class="form-control" name="batch_no" id="batch_no" placeholder="batch no.">
    </div>
    <div class="form-group col-md-4 ">
      <label for="">mgf company</label>
      <input type="text" class="form-control" name="mgf_company" id="mgf_company" placeholder="manufacturing company">
    </div> 
     <div class="form-group col-md-3 ">
      <label for="">mgf. DATE</label>
      <input type="date" class="form-control" name="mgf_date" id="mgf_date" placeholder="DATE.../.../...">
    </div>
      <div class="form-group col-md-3 ">
      <label for="">exp. DATE</label>
      <input type="date" class="form-control" name="exp_date" id="exp_date" placeholder="DATE.../.../...">
    </div>
     <div class="form-group col-md-2 col-6">
      <label for="">HSN/SAC</label>
      <input type="text" class="form-control" name="hsn_sac" id="hsn_sac" placeholder="HSN/SAC">
    </div>  
     <div class="form-group col-md-2 col-6">
      <label for="">CASES</label>
      <input type="text" class="form-control" name="cases" id="cases" placeholder="BAGES QTY">
    </div>
      <div class="form-group col-md-2 col-6">
      <label for="">QTY.</label>
      <input type="text" class="form-control" name="qty" id="qty" placeholder="QTY..">
    </div>
      <div class="form-group col-md-2 col-6">
      <label for="">PRICE/pcs</label>
      <input type="text" class="form-control" name="price_pcs" id="price_pcs" placeholder="PRICE/pcs">
    </div>
    <div class="form-group col-md-2 col-6">
      <label for="">total AMOUNT</label>
      <input type="text" class="form-control" name="total_amount" id="total_amount" placeholder="total AMOUNT" required>
    </div>
  </div>
 <button type="submit" class="btn btn-primary">save stock</button>
</form>
 			</div>
 		</div>
 	</div>
 </section>
