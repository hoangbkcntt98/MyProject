
<?php include_once('connect_db.php') ?>
<?php 
	//sql process
	$idBuy = $_SESSION['id'];
	$sql = "SELECT * FROM buy WHERE id_buy = '$idBuy';";
	$a=pg_query($conn,$sql);
	while($row = pg_fetch_assoc($a))
		{
			$idSell = $row['id_sell'];
			$idP = $row['id_p'];
			$sql = "SELECT * FROM sell_product WHERE id_p = '$idP' AND id_user= '$idSell'";
			$b = pg_query($conn,$sql);
			while ($row1 = pg_fetch_assoc($b))
			{
				echo "
				<tbody>
						<tr>
							<td class='cart_product'>
								<a href=''><img src='../backend/trade_system/products/".$row1['img']."' alt='' style = 'width:110px;height:110px;'></a>
							</td>
							<td class='cart_description'>
								<h4><a href=''>".$row1['name']."</a></h4>
								
							</td>
							<td class='cart_price'>
								<p>".$row1['price']."</p>
							</td>
							<td class='cart_quantity'>
								<div class='cart_quantity_button'>
									<a class='cart_quantity_up' href=''> + </a>
									<input class='cart_quantity_input' type='text' name='quantity' value='1' autocomplete='off' size='2'>
									<a class='cart_quantity_down' href=''> - </a>
								</div>
							</td>
							<td class='cart_total'>
								<p class='cart_total_price'>$59</p>
							</td>
							<td class='cart_delete'>
								<a class='cart_quantity_delete' href=''><i class='fa fa-times'></i></a>
							</td>
						</tr>
				</TBODY>
				";

			}
		}
			

 ?>