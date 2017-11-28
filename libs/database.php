<?php


class Database extends PDO
{

  function __construct()
  {
    //  parent::__construct("mysql:host=sql103.epizy.com;dbname=epiz_21109089_nba", "epiz_21109089", "blagoja06");
      parent::__construct("mysql:host=localhost;dbname=nba", "root", "");

}
}



 ?>
