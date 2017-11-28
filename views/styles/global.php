<style media="screen">

  body{
    padding: 0px;
    margin: 0;
    background: #ccc;
    font-family: "Helvetica","Verdana";
  }

  #header{
    display: block;
    width:100%;
    background:#1d428a;
    padding-top: 5px;
    padding-bottom: 5px;
  }

  #header div{
    padding: 10px;
    display: inline-block;
    margin-left: 20px;
    color: white;

  }
  a{
    color: inherit !important;
    text-decoration: none;
  }

  #teams{
    width: 98%;
    margin: 10px auto;
    background-color: #fff;
    display: block;
    padding-bottom: 10px;
    position: relative;
  }
     #teams > a > div, .at{
      width: 48%;
      padding-top: 10px;
      padding-bottom: 10px;
      color: blue;
      margin-top: 10px;
      margin-left: 0.7%;
      background: #fff;
      display: inline-block;
      border: 1px solid #ddd;
      position: relative;
    }
    .team-name{
		text-align:center;
		padding-top: 30px;
		padding-bottom:30px;
		display: inline-block;
		margin-left: 5%;
		position: absolute;
    }

	.logo{
		margin-left: 2%;
		display: inline-block;
		width: 70px;
		height: 70px;
	}


  #players{
    width: 98%;
margin: 10px auto;
    padding-top: 10px;
    padding-bottom: 10px;
    display:block;
background: white;
  }


  #players > div{
display: inline-block;
width: 5cm;
text-align:center;
margin: 0.5%;
position: relative;
}

#players > div > a > .firstname, #players > div > a >  .lastname{
  color: #0B5BE1;
  font-size: 0.9em;
  font-weight:650;
}

#players > div  .picture{
  width: 90%;
display: block;
border-radius: 100%;
margin: 10px auto;
}
#players > div> .position{
  margin-top: 20px;
}
#players > div> .metrics{
  margin-top: 5px;
}

.weight, .height{
font-size: 0.8em;
font-weight: bold;
}
.num{
float: left;
font-size: 0.8em;
font-weight: bold;
position: absolute;
top: 3px;
left: 3px;
}
.ed{
  position: absolute;
  top: 0;
  right: 0;
}
.edit{
  position: absolute;
  display: inline-block;
  right: 25px;
}
.delete{
  position: absolute;
  display: inline-block;
  right: 0;
  background: red;
  border: none;
  color: white;
  font-weight: 900;
  border-radius: 100%;
}
</style>
