<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>


</head>
<body>
<?php $this->render("header") ?>


<style media="screen">

	#new-team{
		width: 50%;
		background: #00092D;
		margin: 10px auto;
		padding-bottom: 10px;
		text-align: center;
	}
	#new-team > h1{
		color: white;
		text-align: center;
		margin: 5px auto;
	}
	#new-team > #team-name{
		width: 40%;
		height: 30px;
	}
	input:last-child{
		border: none !important;
		font-weight: bold;
		border-radius: 15%;
		padding: 5px;
		font-size: 1em;
	}

</style>

<form id="new-team" action="<?= URL ?>/teams/create"  class="jumbotron" method="post">
<h1>
		New team
</h1>

	<input type="text" id="team-name"  name="team" placeholder="Team name">
<br/><br/>
	 <input type="submit" name="" value="Create">

</form>

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
