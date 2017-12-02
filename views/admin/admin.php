<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>


</head>
<body>
<?php $this->render("header") ?>







	<div id="teams">

	</div>









	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script type="text/javascript">

	function renderTeams() {
		$.ajax({
			type: "GET",
			url: "<?= URL ?>/teams/preview",
			success: function (data) {
				data = JSON.parse(data);
				$("#teams").html("");
				data.forEach(function(element){
					var Name =	element.id;
					$("#teams").prepend(
					"<div class='at'>"+
					"<a href='<?= URL ?>/teams/edit/"+element.id+"'>"+
					"<img src='"+element.logo+"' class='logo'/>"+
					" <span class='team-name'> "+ element.name +" </span>"+
					"</a>"+
					"<button class='delete' rel='"+element.id+"'> X </button>"+
					"</div>"
				);
				


				});

				$(".delete").click(function() {
					$.ajax({
						type: "POST", url: "<?= URL ?>/teams/delete",
						data: {
							"id": $(this).attr("rel")
						},
						success: function(data) {
							renderTeams();
						}
					});
				});

			}

		});
	}
	renderTeams();
	</script>

</body>
</html>
