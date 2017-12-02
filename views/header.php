<?php $this->render("styles/global") ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div id="header" >

      <div class=""><a href="<?= URL ?>/"> Home </a></div>




      <?php if(session::get("logedIn")):  ?>

			 <div>
			   <a href="<?=URL ?>/admin"> Admin </a>
			 </div>
				<div>
				        <a href="<?= URL ?>/login/logout">Logout</a>
				</div>


				<?php $this->render("dialogues/newteam") ?>


				<?php

				foreach(explode("/", $_SERVER["REQUEST_URI"]) as $kd => $del): ?>
					<?php

					 if($del == "teams"): ?>
					 <?php
$this->id= explode("/", $_SERVER["REQUEST_URI"])[$kd+2];
					 $this->render("dialogues/newplayer");

					  ?>



					<?php endif;?>
				<?php endforeach; ?>



				<script type="text/javascript">

				function td(thi)
					{
						$(".dialogue[rel='"+$(thi).attr("rel")+"']").toggle();
					}

				$(".dialogue-toggle").on("click", function () {
						td(this);
				});

				</script>



				<style media="screen">
				  .dialogue{
				    position: fixed;
				    width: 100%;
				    height:  100%;
				    top: 0;
				    left: 0;
				    margin: 0 !important;
				    z-index: 10000;
				    background-color: rgba(0, 0, 0, 0.75);

				  }
				  .df{
				    width: 50%;
				    margin: 100px auto !important;
				    text-align: center;
				    display: block !important;
				    background-color: rgba(256, 256, 256, 1);
				    padding: 3%;
						overflow-y: scroll;
						height: 50%;
						color: black;
				  }
					#header > div >.dialogue-toggle{
						font-size: inherit !important;
						color:  inherit !important;
						border: none;
						background: inherit !important;
					}



				</style>


			<?php else: ?>
        <div class="">
					<a href="<?= URL ?>/login/login">Log in</a>
        </div>
      <?php endif  ?>
  </div>




</div>
