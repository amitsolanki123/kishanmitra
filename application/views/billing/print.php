<!--about start here-->
 <section class="dashbord stock_manage">
    <div class="container-fluid">
 	<div class="dashbord_main billing">
	<div id="printableArea">
    <div class="row">

      <!--   <div class="col-md-3 col-sm-4">
       <div class="logosls">
        <img src="image/stilogo.png" alt="logo" class="img-fluid">
      </div>
     </div> -->
   <!--  <div class="col-md-3 col-sm-4">
      <div class="bili-heding">
       <h1>Sales Estimate</h1>
      </div>
     </div> -->
  
    <div class="col-md-12 col-sm-4">
     <div class="bili-heding">
          <div class="logosls">
        <img src="<?php echo base_url('assets/image/logo.png')?>" alt="logo" class="img-fluid">
      </div>
       <h1>TEX INVOICE</h1>
       <h2>KISAN mitra krashi seva cendra</h2>
       <P>SHIVPUR, SEONI ROAD, TEHSIL- SEONI MALWA DIST- HOSHANGABAD</P>
       <P>MADHYA PRADESH 461223</P>
       <P>MO.NO. 8602616419, 9754416230, email:kisan@gmail.com</P>
       <P>GSTIN: 23BBBPY3896D1ZF</P>
      </div>
     </div>

    </div>
<!--search bar & entrys start here-->
 	

    <hr>
  <!--     <form>
  <div class="form-row adstock">
    <div class="form-group col-md-3">
      <label for="">Customer Name</label>
      <input type="text" class="form-control" id="" placeholder="Customer Name">
    </div>
    <div class="form-group col-md-3 ">
      <label for="">Mo. No.</label>
      <input type="number" class="form-control" id="" placeholder="Mobile Number">
    </div>
      <div class="form-group col-md-3 ">
      <label for="">Address</label>
      <input type="text" class="form-control" id="" placeholder="Address">
    </div>
     <div class="form-group col-md-3 ">
      <label for="">date</label>
      <input type="date" class="form-control" id="" placeholder="date.../.../...">
    </div> 
 
  </div>

</form> -->
  
<div class="row">
  <div class="col-md-12">
    <div class="detail-left">
      <p>CUSTOMER NAME: <?php echo $bill_info['customer_name']?></p>
      <p>MO.NO. <?php echo $bill_info['mobile_no']?></p>
      <p>ADDRESS. <?php echo $bill_info['address']?></p>
    </div>
     <div class="detail-left right">
      <p>DATE: <?php echo $bill_info['bill_date']?></p>
      <p>BILL NO.<?php echo $bill_info['bill_no']?></p>
    </div>
  </div>
  </div>

<!--table start here-->
<table class="table table-responsive bil-table">
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
    </tr>
  </thead>
  <tbody>
    <?php
   $sno = 0;
   $cnt=0;
   //echo "<pre>";
			//print_r($bill_trans_info);
   foreach($bill_trans_info as $v_trans_info){
	   $sno++;
	   
	   $CI =& get_instance();
            $print=$CI->get_stock_info($v_trans_info['stock_id']);
			
   ?>
    <tr>
      <th scope="row"><?php echo $sno; ?></th>
      <td><?php echo $print['product_name'] ?></td>
      <td><?php echo $print['mgf_company'] ?></td>
      <td><?php echo $print['batch_no'] ?></td>
      <td><?php echo $print['mgf_date'] ?></td>
      <td><?php echo $print['exp_date'] ?></td>
      <td><?php echo $print['pack_size'] ?></td>
      <td><?php echo $v_trans_info['price_pcs'] ?></td>
      <td><?php echo $v_trans_info['total_qty'] ?></td>
      <td style="text-align: right;"><?php echo $v_trans_info['trans_amount'] ?></td>
    </tr>
<?php
	$cnt++;
     }
   ?>



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
      <td class="adrsik4"><?php echo $bill_info['sub_total']?></td>
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
      <td class="adrsik1"><?php echo $bill_info['cgst_mp_per']?>%</td>
      <td class="adrsik88"><?php echo $bill_info['cgst_mp_price']?></td>
      
    </tr>
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area end here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
<!--billing table total counting area start here-->
  <!--   <tr>
      <th scope="row" class="adrsik1"></th>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
      <td class="adrsik1"></td>
    
      <td class="adrsik6"></td>
    </tr> -->
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
       <td class="adrsik5">ADD:SGST-MP</td>
      <td class="adrsik5"><?php echo $bill_info['sgst_mp_per']?>%</td>
      <td class="adrsik88"><?php echo $bill_info['sgst_mp_price']?></td>
      
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
      <td class=""><?php echo $bill_info['grand_total']?></td>
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
      <td class=""><?php echo $deposit_amount?></td>
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
</div>
<div class="butn-boxs">
    <button type="submit" class="btn savbtn">save</button>
     <button type="submit" class="btn savbtn green acontview">share pdf</button>
     <button type="submit" onclick="printDiv('printableArea')" class="btn savbtn green">print</button>
     <button type="submit" class="btn savbtn green acontview">cancel</button>
</div>
 		</div>
 	</div>
 </section>
 <script>
//
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>