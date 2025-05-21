<?php
require_once ('init/db-connection.php');
require_once 'scripts/functions.php';

$renderParams = [FormTypeKey=>VisitForm,"nav"=>navList(), "footer" =>footer(), "title"=>title()];
$renderParams["restaurants"] = [["ID"=>1,"name"=>"rest1"],["ID"=>2,"name"=>"rest2"],["ID"=>3,"name"=>"rest3"]];
$restID = [1,2,3];
$valid = true;
$message = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(array_search(valueIfExists("restuarant",$_POST), $restID)){
        $valid = false;
        $message = $message."restaurant not valid </br>";
        $renderParams["restaurant_class"] = "not_valid";
    }
    if(!isPhone(valueIFExists("phone",$_POST))){
        $valid = false;
        $message = $message."phone not valid </br>";
        $renderParams["phone_class"] = "not_valid";
    }
    if(valueIfExists("firstname",$_POST)==""){
        $valid = false;
        $message = $message."firstname not valid </br>";
        $renderParams["firstname_class"] = "not_valid";
    }
    if(valueIfExists("lastname",$_POST)==""){
        $valid = false;
        $message = $message."lastname not valid </br>";
        $renderParams["lastname_class"] = "not_valid";
    }
    $refDate = "01-04-2020";
    if(!dateCheck(valueIfExists("timein",$_POST),$refDate )){
        $valid = false;
        $message = $message."Time in is not valid <br>";
        $renderParams["timein_class"] = "not_valid";
    }
    if(!dateCheck(valueIfExists("timeout",$_POST),$refDate )){
        $valid = false;
        $message = $message."Time out is not valid <br>";
        $renderParams["timeout_class"] = "not_valid";
    }

} else {
    $valid = false;
}


if(!$valid){
    //Post $_POST parameters from forms
   foreach($_POST as $key=>$value){
      $renderParams[$key] = $value;
   }
   $renderParams["message"] = $message;
   render_page("addvisit.twig.html",$renderParams);
} else {
   render_page('echo.twig.html',["data" =>  $_POST]);
}
