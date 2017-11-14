<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Team</title>
  </head>
  <body>
<?php require "header.php"; ?>

<style media="screen">

  form{
    margin: 20px auto;
    padding: 10px;
    background: #377CF3;
    width: 50%;
  }
  form input, form span{
    margin: 10px auto;
    display: block;
    width: 90%;
  }
</style>

    <form id="form" action="<?= URL ?>/teams/create"  class="jumbotron" method="post">

      <input type="text" id="team-name"  name="team" placeholder="Team name">
       <span>team logo: <input type="file" name="" value="Team logo"/></span>
       <input type="submit" name="" value="Create">

    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">


</script>


  </body>
</html>
