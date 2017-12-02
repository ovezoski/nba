<style media="screen">
.dialogue-togle{
  background: none;
  border: none;
}
</style>
<div>

  <input type="button" class='dialogue-toggle' rel='<?= $this->rel ?>' name="button" value='<?= $this->value ?>' />

  <?php

  if($this->rel==1){
    $this->render("dialogues/newteam");
  }else{
    $this->render("dialogues/newplayer");
  }

   ?>

</div>
