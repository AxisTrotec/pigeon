<?php
require_once ('init/db-connection.php');
require_once 'scripts/functions.php';


//Fake restaurant data for now
$resultArray = [[]];

for($x=0; $x < count($resultArray); $x += 1){
    $resultArray[$x] += ["link"=>"<a href='visitByRestaurant.php?rid=".$resultArray[$x]["ID"]."'>Visits</a>"];
}
$keys = ["name","phone","streetAddress","City","Province","link"];

$renderParams = ["nav"=>navList(), 
                 "footer" =>footer(), 
                 "title"=>title(),
                 "page_title"=>"Restaurant List", 
                 "heading"=>"Restaurant List",
                 "table" => $resultArray,
                 "keys" => $keys ];


render_page("tables.html", $renderParams);



