<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style media="screen">
  #players{
    width: 60%;
    background: skyblue;
    margin: 10px;
    overflow: scroll;
    height: 300px;
  }
  #players > div{
    padding-top: 5px;
    padding-bottom: 5px;
    margin: 5px;
    background: #f99;
  }
</style>

<div class="">
  New team
</div>

<div class="">
  Edit team
</div>

<div class="">
  Edit player
</div>
<div id="players">

</div>

<script type="text/javascript">
function renderPlayers(){

    $.ajax({
      type: "GET",
      url: "<?= URL ?>/players/get",
      success: function (data) {
        data = JSON.parse(data);
        $("#players").html("");
        data.forEach(function(element){
          $("#players").append(
            "<div>"+
            element.name+
            " <button class='delete' rel='"+element.id+"'>"+
            " delete </button>"+
            " <button>"+
            " edit </button>"+
            "</div>"

          );
        });


        $(".delete").on("click", function(){
          var id=$(this).attr("rel");
          $.ajax({
            type: "GET",
            url: "<?= URL ?>/players/delete/"+id,
            success: function(res){
              console.log(res);
              renderPlayers();
            }
          });
        });


      }

    });
}

renderPlayers();

</script>

  </body>
</html>
