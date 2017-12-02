<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>


  </head>
  <body>


    <style media="screen">







    </style>
    <?php
    $this->render("header");
      $id = $this->team;

    ?>


    <form id='edit-team' action="<?= URL ?>/teams/edit/<?= $id ?> " method="post">
      <div id="team">

      </div>

      <input type="submit" name="edit" value="Save">

    </form>




<div id="players">

</div>


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
      for(var i = 0; i < keys.length/2; i++){
        $("#team").append(
        "<div>"+
        "<span class='property'>"+ keys[i+keys.length/2]+":</span>"+
        "<input type='text' class='value' name='"+keys[i+keys.length/2]+  "' value='" + data[keys[i]]+"' />"+
        "</div> "
      );
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
          "<span class='weight'>" + element.weight + " kg </span> "+
          "<span class='height'>"+ element.height+ " cm </span>"+
        "</div>"+
        "<div class='ed'>"+
          "<a href='<?= URL ?>/players/edit/"+element.id+"'class='edit' > <button>edit</button> </a>"+
          "<button class='delete' rel='"+ element.id+"' >X</button>"+
        "</div>"+

        "</div>"
            );


          });

          $(".delete").click(function(){

            delId = $(this).attr("rel");
            $.ajax({
              type: "POST",
              url: "<?= URL  ?>/players/delete/",
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
