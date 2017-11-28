<?php
define("URL", "/phpheroku");
require "libs/database.php";
require "libs/bootstrap.php";
require "libs/view.php";
require "libs/controller.php";
require "libs/model.php";
require 'libs/session.php';

Session::init();
new Controller();
new Bootstrap();
