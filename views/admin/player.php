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
    <?php require("/views/header.php"); ?>

    <div id="player">

      <picture>
        <form class="" action="<?= URL ?>/players/edit/<?php  echo $this->player_id; ?>" method="post">

          <div class="">
            <input type="submit" name="submit" value="Save">
          </div>

        </form>
    </picture>


    </div>



  <form class=""  method="post">
    <div class="">
      Add video: <input type="text" name="video" value="">
    </div>

    <input type="submit" name="" value="">
  </form>



<form action="<?= URL ?>/players/image" enctype="multipart/form-data" method="post">

  <input type='file'>
  <select>
    <option>Point Guard</option>
    <option>Shooting Guard</option>
    <option>Power Forward</option>
    <option>Small Forward</option>
    <option>Center</option>

  <select>

</form>

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
          //console.log(Object.keys(data[0]));
          var keys = Object.keys(data[0]);
          for(var i = 0; i< keys.length/2; i++){
            $("#player form").append("<input name='"+keys[keys.length/2 + i]+ "' value='" +data[0][i]+ "' /> "+keys[keys.length/2 + i]+" </br>");
          }

          if(data[0].description){
            $("#description").html(
            "<form method=\"post\" action='<?= URL ?>/players/edit/<?= $this->player_id ?>'>"+
                  "<textarea id='description' name=\"description\">"+data[0].description+"</textarea>"+
                  "<input type=\"submit\" value=\"Save\">"+
            "</form>");
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
