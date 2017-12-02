<style media="screen">

#container{
  width: 85%;
  display: block;
  position: relative;
  height: 1000px;
  background: #fff;
  margin: 80px auto;
}

#right{
  width: 74%;
  margin-left: 1%;
  display: block;
  position: absolute;
  top: 0;
  right: 0;
  height: 100%;
}

#profile{
  width: 100%;
  background: #b87;
  height: 15%;
  position: absolute;
  right: 0;
  z-index: 1221;
  background: #1d428a; /* Old browsers */
  background: -moz-linear-gradient(left, #1d428a 0%, #1d428a 60%, #399ae5 100%); /* FF3.6-15 */
  background: -webkit-linear-gradient(left, #1d428a 0%,#1d428a 60%,#399ae5 100%); /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to right, #1d428a 0%,#1d428a 60%,#399ae5 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1d428a', endColorstr='#399ae5',GradientType=1 );
}
.picture{
width: 10%;
  display: inline-block;
  position: absolute;
  bottom: 0;
  left: 5%;
}
.profile-info{
  display: inline-block;
  color: white;
  position: absolute;
  bottom: 25%;
  left: 20%;
}
.firstname{
  font-size: 1.2em;
}
.lastname{
  font-size: 2em;
  font-weight: bold;
}


#bv{
  background: white;
  width: 100%;
  display: block;
  position: absolute;
  height: 20%;
  padding-top: 1%;
  padding-bottom: 1%;
  right: 0;
  top: 20%;

  }
#bio{
  width: 48%;
  border-right: 1px solid #aaa;
  display: inline-block;
  position: absolute;
  top:0;
  height: 100%;
}

.property{
  color: #aaa;
  text-transform: uppercase;
  font-weight: 550;
}

.value{
  font-size: 1.2em;
  color: #444;
}

#bio > div{
  border-bottom: 2px solid #aaa;
  width: 90%;
  margin: auto;
height: 18%;
}
#bio > div > span{
  width: 50%;
  display: inline-block;
}

#videos{
  display: inline-block;
  width: 49%;
  overflow-y: scroll;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
}
#videos > *{
  border: none;
  width: 98%;
  display: inline-block;
}

#description{
  width: 100%;
  margin: 10px auto;
  background: white;
  position: absolute;
  top: 45%;
  right: 0;
  height: 40%;
}
#players{
  width: 26%;
  background: #fff;
  height: 100%;
  position: absolute;
  margin: 0;
  padding: 0;

}

#players > div{
  display: block;
  width: 92%;
  font-size: 16px;
  font-family: sans-serif;
  height: 25px;
  color: #2086bf;
  text-align: left;
  padding-left: 8%;
  margin-top: 5px;
}

</style>
