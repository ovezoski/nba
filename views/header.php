<?php $this->render("styles/global") ?>
<div id="header" >

    <a href="<?= URL ?>/">  <div class="">
 Home </div></a>


    <div>

      <?php
       if(session::get("logedIn")):  ?>
        <a href="<?= URL ?>/login/logout">Logout</a>
      <?php else: ?>
        <a href="<?= URL ?>/login">Log in</a>
      <?php endif  ?>
  </div>

    
<div>
  <a href="<?=URL ?>/admin"> Admin </a>
</div>

</div>
