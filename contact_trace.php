<?php
require_once ('init/db-connection.php');
require_once 'scripts/constants.php';
require_once 'scripts/functions.php';

$resultArray = [[]];

$keys = ["restaurant_name","firstname","lastname","phone","timein","timeout"];
render_page("generictable.html", ["nav"=>navList(), "footer"=>footer(), "title"=>title(),"table"=>$resultArray, "keys" => $keys, "heading"=>"Contact trace"]);



