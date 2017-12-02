<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>

  </head>
  <body>
    <?php $this->render("header");
          $this->render("/styles/player-style");
     ?>

<div id="container">

<div id='players'>

</div>

<div id="right">

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
  </div>

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
        <?php  if(session::get("logedIn")): ?>
        +"<input type='button' value='edit' class='tep' rel='4' />"+
        "<input type='button' value='X' class='delete' />"




        <?php endif; ?>


			);

      <?php  if(session::get("logedIn")): ?>

      $(".tep").click(function () {
        td(this);
      });

      <?php endif; ?>

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
      $.ajax({
             type: "GET",
             url: "<?= URL?>/teams/get/"+player["team_id"],
             success: function (players) {
               players = JSON.parse(players);
               players.forEach(function (player) {
                  $("#players").append(

                    "<div>"+
                    "<a href='<?= URL ?>/players/preview/"+player.id+"' >"+
                        player.firstname + " "+ player.lastname+
                    "</a>"+
                    "</div>"

                  )
               });
             }
           });

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
    <?php  if(session::get("logedIn")): ?>



    <div style="display:none" rel='4' class="dialogue">
      <div class="df">
        <input type="button" class='tep' rel='4' name="button" value='x'/>

        <form id="new-team" action="<?= URL ?>/teams/create"  class="jumbotron" method="post">
        <h1>
            New team
        </h1>

          <input type="text" id="team-name"  name="team" placeholder="Team name">
        <br/><br/>
           <input type="submit" name="" value="Create">

        </form>
      </div>

    </div>
  <?php endif; ?>

  </body>
</html>
