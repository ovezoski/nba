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

    </style>
  </head>
  <body>
    <?php require("header.php"); ?>

    <div id="player">
      <name>
      </name>

      <team>

      </team>

    </div>

<form method="post">

      <textarea id='description' name="description">
        <?php if(isset($this->description)) echo $this->description; ?>
      </textarea>
      <input type="submit" name="" value="Save">

</form>

<form class=""  method="post">
  <div class="">
    Add video: <input type="text" name="video" value="">
  </div>

  <input type="submit" name="" value="">

  <div id="videos">

  </div>

</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">

      $("#des").val();



      $.ajax({
        type: "GET",
        url: "<?= URL ?>/players/get/<?= $this->player_id ?>",
        success: function(data){
          data = JSON.parse(data);
          $("#player name").html(data[0].name);
          document.title = data[0].name;
          $("#player team").html(data[0].team_id);
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
            $("#videos").append("<iframe width=\"420\" height=\"315\" src='"+element.link+"' frameborder=\"0\" allowfullscreen></iframe>")
          });
        }
      })

    </script>

  </body>
</html>
