<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">


  </head>
  <body>


    <?php

$this->render("header");

      $id = $this->team;
    ?>


        <style media="screen">

          #content{
            width: 80%;
            background: white;
            display: block;
            margin: 80px auto;
            position: relative;
          }
          #content > .right{
            width: 75%;
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
          }
           #team{
             background: #ddd;
             display: inline-block;
             width: 100%;
             position: absolute;
             height: 30%;
             top: 0;
             }
             #team > h1{
               color: white;
               margin: 0;
               position: absolute;
               top: 50%;
               left: 30%;
               font-size: 2.5em;
               margin-top: -19px;
             }
             #team > .logo{
               color: white;
               position: absolute;
               top: 50%;
               margin: -50px 0 0 5% ;
               height: 100px;
               width: 100px;
             }
            #players{
               display: block;
               width: 100%;
               position: absolute;
               overflow-y: scroll;
               height: 70%;
               bottom: 0;

               margin-top: 30%;
            }
             .teams{
               display: inline-block;
               width: 25%;
               height: 700px;
               overflow-y: scroll;
             }
          .teams > div{
            margin: 10px auto;
            height: 50px;
            color: #0B5BE1;
            font-size: 16px;
            text-align: center;
            position: relative;
          }
          .teams > div .logo{
            position: absolute;
            left: 0px;
            height: 100%;
            width:inherit;
          }
          .teams > div .name{
            position: absolute;
            top: 50%;
            left: 30%;
            margin-top: -10px;
          }


        </style>

<div id='content'>

    <div class='teams'>

    </div>

    <div class="right">

      <div id='team'>

      </div>


      <div id="players">

      </div>
  </div>
</div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">


$.ajax({
  type: "POST",
  url: "<?= URL ?>/teams/get/<?= $id ?>",
  data: {
    jt: true
  } ,
  success: function(data) {
    data = JSON.parse(data)[0];
    console.log(data);
    $("#team").html(
      "<img  class='logo' src='"+ data.logo +"'>"+
      "<h1>"+data.name+"</h1>"
    )
    document.title = data.name;
  }


});

prompt();

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
					"<span class='weight'>" + element.weight + " kg </span>| "+
					"<span class='height'>"+ element.height+ " cm </span>"+
				"</div>"+


			  "</div>"
            );


          });


        }
      });
}

$.ajax({
  type: "GET",
  url: "<?= URL ?>/teams/preview",
  success: function (data) {
    data = JSON.parse(data);
    data.forEach(function(element){
      $(".teams").append(

        "<div>"+
        "<img class='logo' src='"+element.logo+"'>"+
       "<span class='name'>" + element.name+ "</span>"+

        "</div>"
      )
    });
  }
});

    </script>

  </body>
</html>
