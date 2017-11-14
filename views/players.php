<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Team</title>
  </head>
  <body>


<style media="screen">

  body{
    background: #0b3c59;
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
    width: 100%;
    background:  #328cc1;
    width: 50%;
    margin: 10px auto;
    display:block;
    padding: 10px;
  }
   .player input{
    margin: 10px auto;
    width: 90%;
    border: none;
    display: block;
  }
  #form{
    background: skyblue;
    padding: 10px;
    width: 50%;
    margin: auto;
  }

</style>

    <form id="form" action="<?= URL ?>/players/submit"   method="post">

      <div id="aditional-players">
;alala
      </div>

      <button type="button"  name="button" id="add-player">+</button>

      <input type="submit" name="" value="Create">


</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

  $("#add-player").on("click", function(){
    $("#aditional-players").prepend("<div class='player'><input type='text' name='players[]'></div>");
  });

</script>


  </body>
</html>
