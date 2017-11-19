<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

      form{
        background: skyblue;
        padding: 10px;
        margin: 10px auto;
        width:50%;
        display: block;
      }

      #player{
        width: 90%;
        margin: 10px auto;
        background: 	#E9F;
      }
      #player > *{
        width: 30%;
        margin: 10px auto;
        background: #fdd;
        display: inline-block;
        padding-top: 10px;
        padding-bottom: 10px;
      }

      .de{
        display: block;
        float: left;
        width: 50%;
        position: absolute;
        top: 10%;
        left: 1%;
        background: white;
      }

    </style>
  </head>
  <body>
    <?php require("header.php"); ?>

    <div id="player">

      <picture>

    </picture>

      <name>
      </name>

      <team>

      </team>



    </div>

    <div id="description">

    </div>






  <div id="videos">

  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">

      $("#des").val();



      $.ajax({
        type: "GET",
        url: "<?= URL ?>/players/get/<?= $this->player_id ?>",
        success: function(data){
          data = JSON.parse(data);
          console.log(data[0]);
          $("#player name").html(data[0].firstname+" " +data[0].lastname);
          document.title = data[0].firstname + " " + data[0].lastname;
          $("#player team").html(data[0].team_id);
          if(data[0].description){
            $("#description").html(
                "<div id='description' name=\"description\">"+data[0].description+"</div>"
              );
          }
          if(data[0].picture){
            $("picture").html("<img src=\""+data[0].picture+"\" height=\"80\" />");
          }
        }
      });

      $.ajax({
        type: "GET",
        url: "<?=URL ?>/players/getVideos/<?= $this->player_id ?>",
        success: function(data){
          data = JSON.parse(data);
          console.log(data);
          data.forEach(function(element){
            element.link = element.link.split("watch?v=") .join("embed/")
            $("#videos").append("<iframe src='"+element.link+"'  allowfullscreen></iframe>")
          });
        }
      })

    </script>

  </body>
</html>
