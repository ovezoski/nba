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

      #aditional-players{
        width: 90%;
        background:  #328cc1;
        margin: 10px auto;
        display:block;
        padding: 10px;
      }
      .player{
          margin: 10px auto;
      }
      .player > *{
        margin-left: 5%;

      }


    </style>
    <?php
    require "/views/header.php";
      $id = $this->team[0][0];
    ?>


    <form  action="<?= URL ?>/teams/edit/<?= $id ?> " method="post">

      <div id="team">

      </div>
      <input type="submit" name="edit" value="t">
    </form>
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
    $("#aditional-players").prepend("<div class='player'>"+
    "<input type='text' name='firstname[]' placeholder='Firstname'>"+
    "<input type='text' name='lastname[]' placeholder='Lastname'>"+
    "<input type='number' name='num[]' placeholder='Number'>"+
    "<select name='position[]'>"+
      "<option value='1'> Point Guard </option>"+
      "<option value='2'> Shooting Guard </option>"+
      "<option value='3'> Small Forward </option>"+
      "<option value='4'> Power Forward </option>"+
      "<option value='5'> Center </option>"+

    "</select>"+
    "<input type='number' name='age[]' placeholder='Age'>"+
    "<input type='text' name='origin[]'placeholder='From'>"+
    "<input type='number' name='weight[]'placeholder='weight'>"+
    "<input type='number' name='height[]'placeholder='Height (cm)'>"+
    "<input type='number' name='debut[]'placeholder='NBA debut'>"+
    "<input type='number' name='years[]'placeholder='Years in NBA'>"+

    "</div>")
  });


  $.ajax({
    type: "POST",
    url: "<?= URL ?>/teams/get/<?= $id ?>",
    data: {
      "jt": true
    },
    success: function (data) {
      data = JSON.parse(data)[0];
      var keys = Object.keys(data);
      console.log(data );
      for(var i = 0; i < keys.length/2; i++){
        $("#team").append("<input type='text'  name='"+keys[i+keys.length/2]+  "' value='" + data[keys[i]]+"' /> </br> ");
      }

    }

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

            $("#players").prepend(
              "<div>"+
              "<a href='<?= URL ?>/players/preview/"+element.id+"' >"+element.firstname+" "+ element.lastname+"</a>"+
              "<img src='"+element.picture+"' width='60' /'>"+
              "<a href='<?= URL ?>/players/edit/"+element.id+"' > <button>edit</button> </a>"+
              "<button class='delete' rel='"+ element.id+"' >X</button>"+
              "</div>"
            );


          });

          $(".delete").click(function(){

            delId = $(this).attr("rel");
            $.ajax({
              type: "POST",
              url: "<?= URL  ?>/players/delete/"+delId,
              data: {
                "id": delId
              },
              success: function(data) {
                renderPlayers();
              }

            })

          });

        }
      });
}

    </script>

  </body>
</html>
