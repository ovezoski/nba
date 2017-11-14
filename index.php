<?php
define("URL", "/php/index");

require "libs/database.php";
require "libs/bootstrap.php";
require "libs/view.php";
require "libs/controller.php";
require "libs/model.php";
require 'libs/session.php';

SEssion::init();
new Controller();
new Bootstrap();
