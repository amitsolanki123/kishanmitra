    
 <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
     <script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
      <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
	  <script src="<?php echo base_url('assets/js/common.js')?>"></script>
     <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
	 <!-- Select2 -->
     <script src="<?php echo base_url(); ?>assets/backend/plugins/select2/select2.full.min.js"></script>
	 
	</section>
 <script>
 $(document).ready(function(){
  var rowIdx = <?php echo count($bill_trans_info);?>;
  var sum=0.00;
  var total = 0;
   $(".add").click(function(){
      var html = `<tr>
                     <td scope="row">${++rowIdx}</td>
					 <td>
					 <input type="hidden" name="stock_id[]" id="stock_id${rowIdx}" value="">
					  <select name="product_name[]" id="product_name${rowIdx}" class="form-control select2 required" id="size" placeholder="">
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
                     <td><input type="text" name="mgf_company[]" value="" class="form-control" id="mgf_company${rowIdx}" placeholder="MFG Name"> </td>
                     <td><input type="text" name="batch_no[]" value="" class="form-control" id="batch_no${rowIdx}" placeholder="Batch No"></td>
                     <td><input type="text" name="mgf_date[]" value="" class="form-control" id="mgf_date${rowIdx}" placeholder="MGF Date"></td>
					 <td><input type="text" name="exp_date[]" value="" class="form-control" id="exp_date${rowIdx}" placeholder="EXP Date"></td>
					 <td><input type="text" name="pck_qty[]" value="" class="form-control" id="pck_qty${rowIdx}" placeholder="PCK Qty"></td>
					 <td><input type="text" name="price_pcs[]" value="" class="form-control" id="price_pcs${rowIdx}" placeholder="price/pcs"></td>
					 <td><input type="text" name="total_qty[]" value="" class="form-control" id="total_qty${rowIdx}" placeholder="Total Qty"></td>
					 <td><input type="text" name="amount[]" value="" class="form-control" id="amount${rowIdx}" placeholder="Amount"></td>
                     <td><a href="javascript:void(0);" class="btn btn-danger del">-</a></td>
                  </tr>`;
      $("#tbody_id").append(html);   
	   $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();
               });
			   var kk=rowIdx;
			   
		$(document).ready(function(){
            $("#product_name"+kk).change(function(){
                $.ajax({
                    method: 'post',
                    url:'<?php echo base_url('Billing/get_ajax_stock');?>',
                    data:{id:$(this).val()},
                    success:function(response){
                        var data = jQuery.parseJSON(response);
						
						$("#stock_id"+kk).val(data.stock_info.id);
						$("#mgf_company"+kk).val(data.stock_info.mgf_company);
						$("#batch_no"+kk).val(data.stock_info.batch_no);
						$("#mgf_date"+kk).val(data.stock_info.mgf_date);
						$("#exp_date"+kk).val(data.stock_info.exp_date);
						$("#pck_qty"+kk).val(data.stock_info.pack_size);
						$("#price_pcs"+kk).val(data.stock_info.price_pcs);
					}
                })
            })
			
		$("#total_qty"+kk).blur(function(){
		   var price_pcs=$("#price_pcs"+kk).val();
		   var total_qty = $("#total_qty"+kk).val();
		   var newamt= parseFloat(price_pcs*total_qty); // Multiplication net  weight and  addtion of  tunch and WSTG
		   $("#amount"+kk).val(newamt.toFixed(2));
		call_back(kk);
	    });
	   });
	 });
    var total=0;
	
	
  function call_back(kk){
	  //alert(kk);
	    $("#amount"+kk).each(function(){
				 total += parseInt($("#amount"+kk).val());
				  kk++;
		 });
		 
		 var total1=parseInt(total.toFixed(2));
		 //alert("total1==>"+total);
		 var amount=parseInt($("#amount0").val());
		 //alert("amount==>"+amount);
		   var grand_total1 = amount + total1;
		  //alert("Grand==>"+grand_total1);
		  $("#table_total").val(grand_total1.toFixed(2));
		  $("#grand_total").val(grand_total1.toFixed(2));
	}
  
    $(document).on("click",".del",function(){
       $(this).parent().parent().remove();
    });
   
    $( "#MPGST").blur(function() {
		var MPGSTper=parseInt($("#MPGST").val());
		//alert(MPGSTper);
		var sub_total=parseInt ($("#table_total").val());
		//alert(sub_total);
		var getMPGSTper=(sub_total*MPGSTper)/100;
		//alert(getMPGSTper);
		//var totalsub=getMPGSTper + sub_total;
		$("#MPGSTvalue").val(getMPGSTper.toFixed(2));
		
		var gsttotal=parseInt($("#MPGSTvalue").val()) + parseInt($("#MPSGSTvalue").val());
	
	
	
	var allgrandtotal=parseInt($("#table_total").val()) + parseInt(gsttotal);
	
	$("#grand_total").val(allgrandtotal.toFixed(2));
    });
	
	 $("#MPSGST").blur(function() {
		var MPSGSTper=parseInt($("#MPSGST").val());
		//alert(MPSGSTper);
		var sub_total=parseInt($("#table_total").val());
		//alert(sub_total);
		var getMPSGSTper=(sub_total*MPSGSTper)/100;
		//alert(getMPSGSTper);
		$("#MPSGSTvalue").val(getMPSGSTper.toFixed(2));
		
		
		var gsttotal=parseInt($("#MPGSTvalue").val()) + parseInt($("#MPSGSTvalue").val());
	
	
	
	var allgrandtotal=parseInt($("#table_total").val()) + parseInt(gsttotal);
	
	$("#grand_total").val(allgrandtotal.toFixed(2));
		
    });
	
    
	
});
 
 </script>
 
  <script>
    /* format: "yyyy-mm-dd" */
    $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();
               });
        </script>
		
	  <script>
	  var sumofamount=0;
	  </script>	
	  <?php
	  if(count($bill_trans_info) > 0){
		  $counter=0;
		  
		 foreach($bill_trans_info as $view){ 
		  ?>
		<script>
		
        $(document).ready(function(){
            $("#product_name<?php echo $counter?>").change(function(){
				$.ajax({
                    method: 'post',
                    url:'<?php echo base_url('Billing/get_ajax_stock');?>',
                    data:{id:$(this).val()},
                    success:function(response){
                        var data = jQuery.parseJSON(response);
						
						$("#stock_id<?php echo $counter?>").val(data.stock_info.id);
						$("#mgf_company<?php echo $counter?>").val(data.stock_info.mgf_company);
						$("#batch_no<?php echo $counter?>").val(data.stock_info.batch_no);
						$("#mgf_date<?php echo $counter?>").val(data.stock_info.mgf_date);
						$("#exp_date<?php echo $counter?>").val(data.stock_info.exp_date);
						$("#pck_qty<?php echo $counter?>").val(data.stock_info.pack_size);
						$("#price_pcs<?php echo $counter?>").val(data.stock_info.price_pcs);
					}
                })
            })
			
		$("#total_qty<?php echo $counter?>").blur(function(){
		   var price_pcs<?php echo $counter?>=$('#price_pcs<?php echo $counter?>').val();
		   var total_qty<?php echo $counter?> = $('#total_qty<?php echo $counter?>').val();
		   var newamt= parseFloat(price_pcs<?php echo $counter?>*total_qty<?php echo $counter?>); // Multiplication net  weight and  addtion of  tunch and WSTG
		   $('#amount<?php echo $counter?>').val(newamt.toFixed(2));
		       sumofamount += parseFloat($('#amount<?php echo $counter?>').val());
		 $("#table_total").val(sumofamount.toFixed(2));
		   $("#grand_total").val($('#amount<?php echo $counter?>').val());
		});
       });
	  </script>  
	  <?php $counter++;}?> 
	  <script>
	    
	  
	  </script>
	  
	  <?php } else { ?>
	 <script>
        $(document).ready(function(){
            $("#product_name0").change(function(){
                $.ajax({
                    method: 'post',
                    url:'<?php echo base_url('Billing/get_ajax_stock');?>',
                    data:{id:$(this).val()},
                    success:function(response){
                        var data = jQuery.parseJSON(response);
						
						$("#stock_id0").val(data.stock_info.id);
						$("#mgf_company0").val(data.stock_info.mgf_company);
						$("#batch_no0").val(data.stock_info.batch_no);
						$("#mgf_date0").val(data.stock_info.mgf_date);
						$("#exp_date0").val(data.stock_info.exp_date);
						$("#pck_qty0").val(data.stock_info.pack_size);
						$("#price_pcs0").val(data.stock_info.price_pcs);
					}
                })
            })
			
		$("#total_qty0").blur(function(){
		   var price_pcs0=$('#price_pcs0').val();
		   var total_qty0 = $('#total_qty0').val();
		   var newamt= parseFloat(price_pcs0*total_qty0); // Multiplication net  weight and  addtion of  tunch and WSTG
		   $('#amount0').val(newamt.toFixed(2));
		   $("#table_total").val($('#amount0').val());
		   $("#grand_total").val($('#amount0').val());
		});
       });
	  </script>
	 
	 <?php } ?>
  </body>
</html>