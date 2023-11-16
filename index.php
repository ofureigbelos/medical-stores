<?php

require_once "controllers/template.controller.php";
require_once "controllers/bincard.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/contractors.controller.php";
require_once "controllers/productlist.controller.php";
require_once "controllers/stocks.controller.php";
require_once "controllers/dispense.controller.php";
require_once "controllers/unit.controller.php";

require_once "models/users.model.php";
require_once "models/bincard.model.php";
require_once "models/contractors.model.php";
require_once "models/productlist.model.php";
require_once "models/stocks.model.php";
require_once "models/dispense.model.php";
require_once "models/unit.model.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();