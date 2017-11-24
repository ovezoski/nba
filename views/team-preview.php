<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>


  </head>
  <body>


    <?php
    require "/views/header.php";
      $id = $this->team;
    ?>



    <div id="players">

    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">






renderPlayers();

function renderPlayers(){

 $.ajax({
        type: "GET",
        url: "<?= URL."/teams/get/".$id  ?>",
        success: function(data){

          $("#players").html("");
          data = JSON.parse(data);
          data.forEach(function(element){

            $("#players").prepend(
              "<div>"+
			  "<div class='num'>"+
				element.num+
			  "</div>"+

			  "<div >"+
				"<img class='picture'src='"+element.picture+"' /'>"+
			  "</div>"+

              "<a href='<?= URL ?>/players/preview/"+element.id+"' >"+
				"<div class='firstname'>"+
					element.firstname+
				"</div>"+
				"<div class='lastname'>"+
					element.lastname+
				"</div>"+
			 "</a>"+

				"<div class='position'>"+
					element.position+
				"</div>"+

				"<div class='metrics'>"+
					"<span class='weight'>" + element.weight + " kg </span>| "+
					"<span class='height'>"+ element.height+ " cm </span>"+
				"</div>"+


			  "</div>"
            );


          });


        }
      });
}

    </script>

  </body>
</html>
