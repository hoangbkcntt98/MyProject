<!DOCTYPE html>
<html>
<head>
	<title>ss</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div>
		<input type="file" id = "file" name="file">
		<span id = "uploaded"></span>
		<button id="button">Click</button>
	</div>
	
</body>
</html>


</script>
<script>
	
	$('#button').click(function(){
		var input = document.getElementById('file');
		property = input.files[0];
		
		var image_name = property.name;
		var image_extension = image_name.split('.').pop().toLowerCase();

		if(jQuery.inArray(image_extension,['gif','png','jpg','jpeg'])==-1)
		{
			alert('not ok type');
		}else{
			var form_data = new FormData();
			form_data.append('file',property);
			$.ajax(
				{
					url:"./upload.php",
					data:form_data,
					type:"POST",
					processData: false,
					contentType:false,
					success: function(data){
						$('#uploaded').html(data);
					}
				}
				);
		}

	});

	
</script>