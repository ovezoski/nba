<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>


  </head>
  <body>


    <style media="screen">

      body{
        background: #0b3c59;
      }

      #players{
        width: 100%;
        padding-top: 10px;
        padding-bottom: 10px;
        display:block;

      }

      #players div{
        display: inline-block;
        width: 40%;
        margin: 0.5%;
        padding: 10px;
        background: skyblue;
      }
      #players div *{
        max-width: 100%;
      }

      #add-player{
        border-radius: 100%;
        background: #4C9EDE;
        border: none;
        color: white;
        width: 50px;
        height: 50px;
        font-size: 40px;
        margin: 5px auto;
        display: block;
      }
      #add-player:focus, button:focus {
        outline:none;
      }
      #add-player:active, button:active{
        border: 1px solid #4C9EDE;
        color: #4C9EDE;
        background: white;
      }

      #form{
        background: skyblue;
        padding: 10px;
        width: 50%;
        margin: 10px auto;
      }

      #aditional-players{
        width: 90%;
        background:  #328cc1;
        margin: 10px auto;
        display:block;
        padding: 10px;
      }
        .player{
          background: #889;
        }
       .player input{
        margin: 10px auto;
        width: 90%;
        border: none;
        display: block;
      }

    </style>


    <?php
    require "header.php";
      $id = $this->team[0][0];
    ?>

    <div id="players">

    </div>

    <form id="form" action="<?= URL ?>/players/create/<?= $id ?>"  method="post">

      <div id="aditional-players">

      </div>

      <button type="button"  name="button" id="add-player">+</button>

      <input type="submit" name="" value="Create">


</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">

  $("#add-player").on("click", function(){
    $("#aditional-players").prepend("<div class='player'><input type='text' name='players[]'>"+

    "</div>")
  });

renderPlayers();

function renderPlayers(){
    $.ajax({
        type: "GET",
        url: "<?= URL."/teams/get/".$id  ?>",
        success: function(data){
          $("#players").html("");
          data = JSON.parse(data);
          data.forEach(function(element){
            console.log(element);
            $("#players").prepend(
              "<div> <button><a href='<?= URL ?>/players/edit/"+element.id+"' >edit</button>"+
              "</a> <button class='delete' rel='"+ element.id+
              "' >X</button>"+
              "<a href='<?= URL ?>/players/preview/"+element.id+"' >"+element.name+"</a>"+
              "<img src='"+element.picture+"'/' width='100'>"+
              "</div>"
            );


          });

          $(".delete").click(function(){

            delId = $(this).attr("rel");
        

          });

        }
      });
}

    </script>

  </body>
</html>
