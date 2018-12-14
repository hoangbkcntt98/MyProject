
<?php include_once('header_sell.php') ?>
<section>
		<div class="container">
					<div>
						<div class="col-sm-7" style="padding-bottom: 100px;">
							<div class="product-information"  style ="background:#FFc125;padding-right: 60px;padding-bottom:150px;border-radius: 10% 10%;"><!--/product-information-->
								
								<h1 class="title text-center" style ="color:#ffffff">Sell Product</h1>
								<div class="login-form"  style="padding: 10%;background: white;display: block;"><!--sell form-->

									<form action="../backend/trade_system/sell_system.php" method="POST" enctype="multipart/form-data"	onsubmit="return formSubmit()" id ="frmForm">
										<input type="text" placeholder="Product_name" name="name"/>
										<input type="text" placeholder="Price" name="price" "/>
										<input type="text" placeholder="Quantity" name="amount"/>
										<input type="text" placeholder="Brand" name="brand"  />
										<h4 style= "color:#ffffff;">EXP:</h4>
										<input name = "exp" dateformat="d M y" type="date"/>
										<h4 style= "color:#ffffff;">MFG:</h4>
										<input type="date" name="mfg"  />
		
										
										<h4 style= "color:#ffffff;">Category</h4>
											<select name = "cate">
											  <option value="SPORTSWEAR">SPORTSWEAR</option>
											  <option value="MENS">MENS</option>
											  <option value="WOMENS">WOMENS</option>
											  <option value="KIDS">KIDS</option>
											  <option value="DRINKS">DRINKS</option>
											  <option value="FOODS">FOODS</option>

											</select>
										<h4 style= "color:#ffffff	;">Image</h4>
										<label class="btn btn-default">
    										Browse <input type="file" name ="file" id="file" hidden>
										</label>
										<br><br>	
										<textarea name = "des" placeholder="Description" rows="5"></textarea>
										<button type="submit" name="submit" style="position: absolute;bottom: 20px; right: 45%;display: block;border-radius: 50% 50%;width: 100px;height: 100px;text-align: center;">SELL</button>
									</form>
								</div><!--/sell form-->
								
							
							</div><!--/product-information-->
						</div>
					</div>
					<!---xu li java scrip-->
					<script type="text/javascript">
						$(document).ready(
							function(){
							var property = document.getElementById("file").files[0];
							var img_name = property.name;
							var img_extension = img_name.split('.').pop().toLowerCase();
							if(jQuery.inArray(img_extension,['gif','png','jpg','jpeg'])==-1)
							{
								alert("fail type");
							}else{
								var  form_data = new FormData();
								form_data.append("file",property);
								$.ajax(
									url:"upload.php",
									method:"POST",
									data:form_data,
									contentType:false,
									cache:false,
									processData:false,
									sucess:function(data)
									{
										$('#uploaded').html(data);
									});
								}




									});

													
						
					</script>
					 <div class="col-sm-5" style="background: blue;">
					 	<div class ="product-information">
					 		<h1 class = "title text-center">REVIEW</h1>
					 	</div>
					 	<div class ="product-information">
					 		<span id="uploaded"></span>
					 	</div>
					 	
					 </div>
					
					
					
			
		
	</section>
	<?php include_once('footer_page.php') ?>