<div>

  <input type="button" class='dialogue-toggle' rel='1' name="button" value='New Team' />

</div>

<div style="display:none" rel='1' class="dialogue">
  <div class="df">
    <input type="button" class='dialogue-toggle' rel='1' name="button" value='x'/>

    <form id="new-team" action="<?= URL ?>/teams/create"  class="jumbotron" method="post">
    <h1>
        New team
    </h1>

      <input type="text" id="team-name"  name="team" placeholder="Team name">
    <br/><br/>
       <input type="submit" name="" value="Create">

    </form>
  </div>

</div>
<style media="screen">

#new-team{
  width: 50%;
  background: #00092D;
  margin: 10px auto;
  padding-bottom: 10px;
  text-align: center;
}
#new-team > h1{
  color: white;
  text-align: center;
  margin: 5px auto;
}
#new-team > #team-name{
  width: 40%;
  height: 30px;
}
input:last-child{
  border: none !important;

  font-size: 1em;
}

</style>
