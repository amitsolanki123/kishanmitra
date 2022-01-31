<!--about start here-->
 <section class="dashbord stock_manage">
    <div class="container-fluid">
 	<div class="dashbord_main billing">
<!--search bar & entrys start here-->
 	<div class="row">
    <div class="col-md-12 col-sm-4">
      <div class="bili-heding">
       <h1>TEX INVOICE</h1>
       <h2>KISAN mitra krashi seva cendra</h2>
       <P>SHIVPUR, SEONI ROAD, TEHSIL- SEONI MALWA DIST- HOSHANGABAD</P>
       <P>MADHYA PRADESH 461223</P>
       <P>MO.NO. 8602616419, 9754416230, email:kisan@gmail.com</P>
       <P>GSTIN: 23BBBPY3896D1ZF</P>
      </div>
     </div>

    </div>
    <hr>
<!--search bar & entrys end here-->


 <form name="bill" method="post" action="<?php echo base_url('billing/create_bill')?>">
  <div class="form-row adstock">
    <div class="form-group col-md-3">
      <label for="">Customer Name</label>
      <input type="text" name="customer_name" id="customer_name" class="form-control"  placeholder="Customer Name" required>
    </div>
    <div class="form-group col-md-3 ">
      <label for="">Mo. No.</label>
      <input type="number" name="mobile_no" id="mobile_no" class="form-control"  placeholder="Mobile Number" required>
    </div>
      <div class="form-group col-md-3">
      <label for="">Address</label>
      <input type="text" name="address" id="address" class="form-control"  placeholder="Address" required>
    </div>
     <div class="form-group col-md-3 ">
      <label for="">date</label>
      <input type="date" name="bill_date" id="bill_date" class="form-control"  placeholder="date.../.../..." required>
    </div> 
  </div>

  
<!--table start here-->
<table class="table table-responsive bil-table ">
  <thead>
    <tr>
      <th scope="col">s.n</th>
      <th scope="col">कीटनाशक एवं प्रतिशत</th>
      <th scope="col">निर्माता कंपनी </th>
      <th scope="col">बैच नं.</th>
      <th scope="col">निर्माण तिथि</th>
      <th scope="col">अंतिम तिथि </th>
      <th scope="col">पैकिंग मात्रा </th>
      <th scope="col">दर प्रति जमा </th>
      <th scope="col">कुल मात्रा </th>
      <th scope="col" class="sadas">कीमत </th>
      <th scope="col">क्रिया </th>
    </tr>
  </thead>
   <tbody>
   
  <tbody id="tbody_id">
    <tr id="tbody_id">
      <td scope="row">1</td>
      <td>
	  <input type="hidden" name="stock_id[]" id="stock_id0" value="">
	  <select name="product_name[]" id="product_name0"  class="form-control select2 required" id="size" placeholder="">
	   <option value="">Select Product</option>
		<?php 
		foreach($stock_info as $stock_info_v){
	 	?>
		  <option value="<?php echo $stock_info_v['id']?>"><?php echo $stock_info_v['product_name']?></option>
		<?php
		}
		?>
	  </select>
	  </td>
      <td>
	  <input type="text" name="mgf_company[]" value="" class="form-control" id="mgf_company0" placeholder="MFG Name"></td>
      <td><input type="text" name="batch_no[]" value="" class="form-control" id="batch_no0" placeholder="Batch No"></td>
	  <td><input type="text" name="mgf_date[]" value="" class="form-control" id="mgf_date0" placeholder="MGF Date"></td>
      <td><input type="text" name="exp_date[]" value="" class="form-control" id="exp_date0" placeholder="EXP Date"></td>
      <td><input type="text" name="pck_qty[]" value="" class="form-control" id="pck_qty0" placeholder="PCK Qty"></td>
	  <td><input type="text" name="price_pcs[]" value="" class="form-control" id="price_pcs0" placeholder="price/pcs"></td>
	  <td><input type="text" name="total_qty[]" value="" class="form-control" id="total_qty0" placeholder="Total Qty"></td>
	  <td style="text-align: right;"><input type="text" name="amount[]" value="" class="form-control" id="amount0" placeholder="Amount"></td>
      <td><a href="javascript:void(0);" class="btn btn-primary add">+</a></td>
    </tr>
	</tbody>

<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td style="text-align: right;"></td>
      <td class="adrsik5">TOTAL</td>
      <td class="adrsik4"><input type="text" name="table_total" id="table_total" value="0.00"></td>
      <td class="adrsik4"></td>
    </tr>
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->

<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
    <tr>
      <th scope="row" class="adrsik1"></th>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1">ADD:CGST-MP</td>
      <td class="adrsik1"><input type="MPGST" name="MPGST" id="MPGST" value="0"> %</td>
      <td class="adrsik1"><input type="text" name="MPGSTvalue" id="MPGSTvalue" value="0.00"></td>
      <td class="adrsik6"></td>
    </tr>
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
    <tr>
      <th scope="row" class="adrsik1"></th>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1">ADD:SGST-MP</td>
      <td class="adrsik1"><input type="MPSGST" name="MPSGST" id="MPSGST" value="0"> %</td>
      <td class="adrsik1"><input type="text" name="MPSGSTvalue" id="MPSGSTvalue" value="0.00"></td>
      <td class="adrsik6"></td>
    </tr>
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
    <!--<tr>
      <th scope="row" class="adrsik2"></th>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik5">LESS(-)</td>
      <td class="adrsik5"></td>
      <td class="adrsik5">0.0</td>
      <td class="adrsik4"></td>
    </tr>-->
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
 



 <!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
    <tr>
      <th scope="row" class="adrsik2"></th>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik4">grand total</td>
      <td class="adrsik5"><input type="text" name="grand_total" id="grand_total" value="0.00"></td>
      <td class="adrsik4"></td>
      
    </tr>
	
	 <tr>
      <th scope="row" class="adrsik2"></th>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik3"></td>
      <td class="adrsik4">Deposit</td>
      <td class="adrsik5"><input type="text" name="customer_deposit" id="customer_deposit" value="0.00"></td>
      <td class="adrsik4"></td>
    </tr>
	
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
  </tbody>

  
</table>

<!--table end here-->


<div class="bill-details">
  <div class="row">
    <div class="col-md-7">
      <div class="not-detail right">
          <p><i class="fa fa-hand-o-right" aria-hidden="true"></i>सभी प्रकार के कीटनाशक एवं खरपतवार नाशक दवाइयों की गुणवक्ता हमारे नियंत्रण से बाहर है जिसकी जबाबदारी हमारी नहीं है! </p>
          <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> इस बिल का भुगतान 15 दिनों में नहीं आने पर 2% का ब्याज लगेगा !</p>
          <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> कीटनाशक दवाये केवल कृषि उपयोग के लिए है, उनके गलत इस्तेमाल से होने घटना या दुर्घटना के लिए फार्म जवाबदार नहीं है </p>
          <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> कृषि अधिकारी  की सलाह से दवाई का चयन करे </p>  
      </div>
    </div>
    <div class="col-md-5">
      <div class="not-detail">
         <ul>
           <li>ह.क्रेता</li>
           <li>भूल चूक लेना देना</li>
           <li>वास्ते</li>
         </ul>
      </div>
    </div>

  </div>
</div>

<div class="row">
  <div class="col-md-12">
          <div class="bank-details">
            hdfc bank a/c : 50200012094785 | ifsc-hdfc: 0002143
          </div>
  </div>
</div>

<div class="butn-boxs">
    <button type="submit" class="btn savbtn">save</button>
     <button type="submit" class="btn savbtn green acontview">share pdf</button>
     <button type="submit" class="btn savbtn green">print</button>
     <button type="submit" class="btn savbtn green acontview">cancel</button>
</div>
</form>
 		</div>
 	</div>

    
