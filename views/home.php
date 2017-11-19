<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<style media="screen">

	</style>

</head>
<body>
<?php require "header.php" ?>


	<div id="teams">

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript">

		$.ajax({
			type: "GET",
			url: "<?= URL ?>/teams/preview",
			success: function (data) {
				data = JSON.parse(data);
				data.forEach(function(element){
					console.log(element);
					var Name =	element.id;
					$("#teams").prepend("<a href='<?= URL ?>/teams/view/"+Name+"'><div> <img src='"+element.logo+"' width='60'> "+element.name+" </div> </a>");
				});
			}

		})
		$("#teams")

	</script>

</body>
</html>
