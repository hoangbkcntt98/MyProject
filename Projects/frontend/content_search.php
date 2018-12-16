

<section id="advertisement">
		<?php 
			$fulUrl= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if(strpos($fulUrl,'sucess'))
			{
				echo "<script type='text/javascript'>
        			var timeout = setTimeout(function(){
            		 alert('Buy sucessfully!!!');
        			},1000);
        			
    				</script>";
				
			}
			if(strpos($fulUrl,'?'))
			{
				echo "<script type='text/javascript'>
        			
        			$(document).ready(function(){
     					$('body,html').animate({scrollTop: 800}, 800); 
					});
    				</script>";
				
			}
			if(strpos($fulUrl,'fail'))
			{
				echo "<script type='text/javascript'>
        			var timeout = setTimeout(function(){
            		 alert('Fail to add to cart');
        			},1000);
        			$(document).ready(function(){
     					$('body,html').animate({scrollTop: 800}, 800); 
					});
    				</script>";
				

			}

		?>
		<div class="container">
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">

				<div class="col-sm-12 padding-center">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Search Items</h2>
						<?php include_once('./shop/search_sub.php'); ?>

						
						
					</div><!--features_items-->
					<?php 
					echo "
								<ul class='pagination' style='margin-left:50%;'>";
								
								
									if(strpos($fulUrl,'?brand'))
									{
										if(strpos($fulUrl,'&page'))
										{
											$fulUrl = explode('&page',$fulUrl);
											array_pop($fulUrl);
											$fulUrl= implode($fulUrl);
											
											for($b=1;$b<=$a;$b++)
											{
											echo "<li><a href='".$fulUrl."&page=".$b."'>".$b."</a></li>";
											}
										}else
										{
											for($b=1;$b<=$a;$b++)
												{
													echo "<li><a href='".$fulUrl."&page=".$b."'>".$b."</a></li>";
												}
											
										}
										
									}else
									{
											for($b=1;$b<=$a;$b++)
												{
													echo "<li><a href='shop.php?page=".$b."'>".$b."</a></li>";
												}
										
										
									}
 ?>
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
	    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });
</script>