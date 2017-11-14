<style media="screen">

  body{
    padding: 0px;
    margin: 0;
    background: #0b3c59;

  }

  #header{
    display: block;
    width:100%;
    background: #317ee7;
    padding-top: 5px;
    padding-bottom: 5px;
  }

  #header div{
    padding: 10px;
    display: inline-block;
    margin-left: 20px;
    color: white;
    background: #5c95e3;
  }
  a{
    color: inherit;
    text-decoration: none;
  }

</style>

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

      <a href="<?= URL  ?>/teams/create"><div class="">  New team </div> </a>


</div>
