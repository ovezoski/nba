<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style media="screen">

		#profile{
			width: 98%;
			background: #b87;
			margin: 10px auto;
			height: 200px;
			position: relative;
		}
		.picture{
width: 10%;
			display: inline-block;
			position: absolute;
			bottom: 0;
			left: 5%;
}
		.profile-info{
			display: inline-block;
			color: white;
			position: absolute;
			bottom: 25%;
			left: 20%;
		}
		.firstname{
			font-size: 1.2em;
		}
		.lastname{
			font-size: 2em;
			font-weight: bold;
		}


		#bv{
			background: white;
			width: 98%;
			margin: auto;
			padding-top: 20px;
			padding-bottom: 20px;
			}
		#bio{
			width: 48%;
			border-right: 1px solid #aaa;
			display: inline-block;
		}

		.property{
			color: #aaa;
			text-transform: uppercase;
			font-weight: 550;
		}

		.value{
			font-size: 1.2em;
			color: #444;
		}

		#bio > div{
			border-bottom: 2px solid #aaa;
			width: 90%;
			margin: auto;
			height: 40px;
		}
		#bio > div > span{
			width: 50%;
			display: inline-block;
		}

		#videos{
			display: inline-block;
			width: 49%;
			overflow-y: scroll;
			height: 180px;
			position: absolute;
			margin-top: 10px;
		}
		#videos > *{
			border: none;
			width: 98%;
			display: inline-block;
		}

		#description{
			width: 96%;
			margin: 10px auto;
			background: white;
			padding: 1%;

		}

    </style>
  </head>
  <body>
    <?php require("header.php"); ?>

    <div id="profile">

    </div>

	<div id='bv'>

		<div id="bio">

		</div>

		<div id='videos'>

		</div>

	</div>

    <div id="description">
	<h3> PLAYER DESCRIPTION </h3>

    </div>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">

      $("#des").val();



      $.ajax({
        type: "GET",
        url: "<?= URL ?>/players/get/<?= $this->player_id ?>",
        success: function(data){
          player = JSON.parse(data)[0];
			$("#profile").html(

			"<img src='"+player.picture+"' class='picture' />"+

			"<div class='profile-info'>"+
				"<div class='np'>"+
					"<span> #"+  player.num+ "</span> | "+
					"<span>"+  player.position+ "</span>"+

				"</div>"+

				"<div class='name'>"+

					"<div class ='firstname'>"+ player.firstname +"</div>"+
					"<div class ='lastname'>"+ player.lastname +"</div>"+


				"</div>"+
				"</div>"


			);

			$("#bio").html(

			"<div class='metrics'>"+
				"<span class='property'> Height: </span>"+
				"<span class='height'> " + player.height + "cm </span>"+

				"<span class='property'> Weight: </span>"+
				"<span class='weight'>" + player.weight + "kg </span>"+
			"</div>"+

			"<div class='age'>"+

				"<span class='property'> Age </span>"+
				"<span class='value'>"+ player.age +"</span>"+

			"</div>"+

			"<div class='from'>"+

				"<span class='property'> From </span>"+
				"<span class='value'>"+ player.origin +"</span>"+

			"</div>"+

			"<div class='debut'>"+

				"<span class='property'> NBA debut </span>"+
				"<span class='value'>"+ player.age +"</span>"+

			"</div>"+

			"<div class='years'>"+

				"<span class='property'> Years in NBA </span>"+
				"<span class='value'>"+ player.age +"</span>"+

			"</div>"


			);

			if(player.description){
				$("#description").append(player.description);
			}
        }
      });

      $.ajax({
        type: "GET",
        url: "<?=URL ?>/players/getVideos/<?= $this->player_id ?>",
        success: function(data){
          data = JSON.parse(data);
          data.forEach(function(element){
            element.link = element.link.split("watch?v=") .join("embed/")
            $("#videos").append("<iframe src='"+element.link+"'  allowfullscreen></iframe>")
          });
        }
      })

    </script>

  </body>
</html>
