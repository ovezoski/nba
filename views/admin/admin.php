<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<style media="screen">

	</style>

</head>
<body>
<?php $this->render("header") ?>


	<div id="teams">

	</div>


	<form id="new-team" action="<?= URL ?>/teams/create"  class="jumbotron" method="post">

		<input type="text" id="team-name"  name="team" placeholder="Team name">
		 <span>team logo: <input type="file" name="" value="Team logo"/></span>
		 <input type="submit" name="" value="Create">

	</form>







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

					console.log(element);
					$("#teams").prepend( "<div> <a href='<?= URL ?>/teams/edit/"+element.id+"'> <img src='"+element.logo+"' width='60'> <span> "+ element.name +" </span> </a> <button class='delete' rel='"+element.id+"' > delete </button> </div>	");

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
