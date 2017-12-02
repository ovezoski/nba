<div>

<input type="button" class='dialogue-toggle' rel='2' name="button" value='New Player' />


<div style="display:none" rel='2' class="dialogue">
  <div class="df">
    <input type="button" class='dialogue-toggle' rel='2' name="button" value='x'/>

    <form id="players-form" action="<?= URL ?>/players/create/<?= $this->id ?>"  method="post">
      <h1> Add players</h1>

      <div id="aditional-players">
        <div class="player">

          <input type="text" name="firstname[]" placeholder="Firstname">

          <input type="text" name="lastname[]" placeholder="Lastname">

          <input type="number" name="num[]" placeholder="Number">
          <select name="position[]">
            <option value="1"> Point Guard </option>
            <option value="2"> Shooting Guard </option>
            <option value="3"> Small Forward </option>
            <option value="4"> Power Forward </option>
            <option value="5"> Center </option>
          </select>

          <input type="number" name="age[]" placeholder="Age">

          <input type="text" name="origin[]" placeholder="From">
          <input type="number" name="weight[]" placeholder="weight">
          <input type="number" name="height[]" placeholder="Height (cm)">
          <input type="number" name="debut[]" placeholder="NBA debut">
          <input type="number" name="years[]" placeholder="Years in NBA">
        </div>
        <button type="button"  name="button" id="add-player">+</button>

        <input type="submit" name="" value="Create">

      </div>

    </form>
  </div>

</div>


</div>

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


        #add-player{
          border-radius: 100%;
          background: #4C9EDE;
          border: none;
          color: white;
          width: 50px;
          height: 50px;
          font-size: 40px;
          position: absolute;
          bottom: 40px;
          left: 50%;
          margin-left:-25px;
          text-align: center;
        }
        #add-player:focus, button:focus {
          outline:none;
        }
        #players-form input[type=submit]{
          position: absolute;
          bottom: 0px;
          left: 50%;
          margin-left: -32px;
        }
        #add-player:active, button:active{
          border: 1px solid #4C9EDE;
          color: #4C9EDE;
          background: white;
        }

        #players-form{
          width: 96%;
          background:  #00092D;
          margin: 10px auto;
          display:block;
          padding: 10px 1% 80px 1%;
          position: relative;
        }
        #players-form > h1{
          color:white;
          text-align: center;
        }
        #players-form select{
          width: 173px;
        }
        .player{
            margin: 10px auto;
        }
        .player > *{
          margin-left: 5%;

        }
        #edit-team{
          width: 94%;
          background: #eee;
          text-align: center;
          margin: 10px auto;
          padding: 2%;
        }
        #edit-team> #team >*{
          margin-top: 10px;

        }
        #edit-team> #team >* > .value {
          text-align: center;
          display: inline-block;
          width: 90%;
          height: 20px;
        }
        #edit-team .property{
              display: inline-block;
          width: 8%;
          text-align:right !important;
          text-transform: capitalize;
          color: red;
          margin-right: 0.5%;
        }
</style>
