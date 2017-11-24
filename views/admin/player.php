<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">



      #player > form{
        width: 80%;
        margin: 10px auto;
        background: #eee;
        padding: 20px 5% 20px 5%;
      }
      #player> form > * {
        display: inline-block;
        margin-top: 5px;
        width: 33%;
      }

      #player select, #player input{
        width: 50%;
        height: 20px;
        text-align: center;
      }
      #player > form >#save{
        width: 50%;
        margin: 10px auto;
        height: 30px;
        display: block;
        font-size: 1.5em;
      }
      #video-form{
        width: 90%;
        margin: 20px auto;
        text-align: center;
        background: #eee;
        padding: 5px;
      }
      #video-form > *{
        display: block;
        margin: 10px auto;
        width: 50%;
      }

    </style>
  </head>
  <body>
    <?php require("/views/header.php"); ?>

    <div id="player">


        <form class="" action="<?= URL ?>/players/edit/<?php  echo $this->player_id; ?>" method="post">


        </form>



    </div>



  <form id="video-form"  method="post">

    <input type="text" name="video" value="" placeholder='Video URL'>
    <input type="submit" name="" value="Save video">
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
         if( keys[i] == 'position' ){
              $("#player form").append(
                    "<div><select name='position'>"+
                    "<option value='1'> Point Guard </option>"+
                    "<option value='2'> Shooting Guard </option>"+
                    "<option value='3'> Small Forward </option>"+
                    "<option value='4'> Power Forward </option>"+
                    "<option value='5'> Center </option>"+
                  "</select> <span> position </span> </div>");
            }else if(keys[i] == 'picture'){

				          $("#player form").append(
                    "<div>"+
                    "<input name='"+keys[i]+ "' value='" +data[0][keys[i]]+ "' />"+
                    "<span> picture </span>"+
                    "</div>"
                  );

			      }else if(keys[i] == 'description'){

            }else{

              $("#player form").append(
                "<div><input name='"+keys[i]+ "' value='" +data[0][i-keys.length/2]+ "' /> "+
                "<span>" + keys[i] + "</span>"+
        			  " </div>"
        			  );
            }


          }

            $("#player form").append(
              "<textarea style='width:100%; height: 100px' id='description' name=\"description\"> "+
              data[0].description+
              "</textarea>");
            $("#player form").append("<input id='save' type=\"submit\" name=\"submit\" value=\"Save\">");

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
