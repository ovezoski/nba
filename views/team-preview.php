<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">


  </head>
  <body>


    <?php
$id = $this->team;
$this->render("header");


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
      <?php  if(session::get("logedIn")): ?>

        +"<button class='delete' rel='"+data.id+"'> X </button>"
        +"<input type='button' class='toggle-edit' rel='3' value='edit'>"
    <?php endif; ?>
    );

    <?php  if(session::get("logedIn")): ?>



    $(".toggle-edit").on("click", function () {
        td(this);
    });
    $(".delete").click(function(){

      delId = $(this).attr("rel");
      $.ajax({
        type: "POST",
        url: "<?= URL  ?>/teams/delete/",
        data: {
          "id": delId
        },
        success: function(data) {
          console.log(delId);
          renderPlayers();
        }

      })

    });

    <?php endif; ?>
    document.title = data.name;
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
           "<a href='<?= URL ?>/teams/view/"+element.id+"'>"+
              "<img class='logo' src='"+element.logo+"'>"+
              "<span class='name'>" + element.name+ "</span>"+
            "</a>"+

        "</div>"
      )
    });
  }
});

    </script>

<?php if(session::get("logedIn")): ?>
<div>


<div style="display:none" rel='3' class="dialogue">
  <div class="df">
    <input type="button" class='toggle-edit' rel='3' name="button" value='X'/>

    <form id="players-form" action="<?= URL ?>/players/create/<?= $this->id ?>"  method="post">

    </form>
  </div>

</div>


</div>


<?php  endif; ?>
  </body>
</html>
