<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">



      #player{
        width: 90%;
        margin: 10px auto;
        background: #eee;
        padding-left:30%;
        padding-right:30%;

      }
      #player> form > * {
        display: block;
        margin-top: 5px;
      }

      select, input{
        width: 30%;
        height: 20px;
      }

    </style>
  </head>
  <body>
    <?php require("/views/header.php"); ?>

    <div id="player">


        <form class="" action="<?= URL ?>/players/edit/<?php  echo $this->player_id; ?>" method="post">


          <div class="">
            <input type="submit" name="submit" value="Save">
          </div>

        </form>



    </div>



  <form class=""  method="post">
    <div class="">
      Add video: <input type="text" name="video" value="">
    </div>

    <input type="submit" name="" value="">
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
          var keys = Object.keys(data[0]);
          for(var i = keys.length/2; i< keys.length; i++){
            if(keys[keys.length/2 + i] == 'description'){
              $("#player form").append("<form method=\"post\" action='<?= URL ?>/players/edit/<?= $this->player_id ?>'>"+
                    "<textarea id='description' name=\"description\"> "+data[0].description+"</textarea>"+

              "</form>");
            }else if( keys[i-keys.length/2] == 'position' ){
              $("#player form").append(
                    "<div><select name='position'>"+
                    "<option value='1'> Point Guard </option>"+
                    "<option value='2'> Shooting Guard </option>"+
                    "<option value='3'> Small Forward </option>"+
                    "<option value='4'> Power Forward </option>"+
                    "<option value='5'> Center </option>"+
                  "</select> </div>");
            }else if(keys[i-keys.length/2] == 'picture'){
				
				$("#player form").append( "<div><input name='"+keys[keys.length/2 + i]+ "' value='" +data[0][i]+ "' /> </div>");
				
			}else{

              $("#player form").append(
                "<div><input name='"+keys[i]+ "' value='" +data[0][i-keys.length/2]+ "' /> "+
                "<span>"+
					keys[i]+
				"</span>"+
			  " </div>"
			  );
            }
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
