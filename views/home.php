<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<style media="screen">
	#teams{
		padding-top: 10px;
		padding-bottom: 10px;
	}
		#teams div{
			width: 15%;
			padding-top: 30px;
			padding-bottom: 30px;
			text-align: center;
			margin: 10px;
			background: #88f;
			float: left;
		}
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
					var Name =	element.id;
					$("#teams").prepend("<a href='<?= URL ?>/teams/view/"+Name+"'><div> "+element.name+" </div>");
				});
			}

		})
		$("#teams")

	</script>

</body>
</html>
