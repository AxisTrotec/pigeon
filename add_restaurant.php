<?php
require_once ('init/db-connection.php');
require_once 'scripts/functions.php';

$renderParams = [FormTypeKey=>RestaurantForm,"nav"=>navList(), "footer" =>footer(), "title"=>title()];
//Validation first
$valid = true;
$message = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
   if(valueIfExists("restaurant_name", $_POST) == ""){
       $valid = false;
       $message = $message."Name not valid </br>";
       $renderParams["restaurant_name_class"] = "not_valid";
   }
   if(!isPhone(valueIfExists("phone_number", $_POST))){
       $valid = false;
       $message = $message."Phone number not valid </br>";
       $renderParams["phone_number_class"] = "not_valid";
   }
   if(!filter_var(valueIfExists("email",$_POST), FILTER_VALIDATE_EMAIL)){
       $valid = false;
       $message = $message."E-mail not valid </br>";
       $renderParams["email_class"] = "not_valid";
   }
   if(valueIfExists("street_address", $_POST)==""){
       $valid = false;
       $message = $message."Street address not valid </br>";
       $renderParams["street_address_class"] = "not_valid";
   
   }
   if(valueIfExists("city", $_POST)==""){
       $valid = false;
       $message = $message."City  not valid </br>";
       $renderParams["city_class"] = "not_valid";
   
   }
   if(array_search(valueIfExists("province",$_POST),provinces())===FALSE){
       $valid = false;
       $message = $message."Province  not valid </br>";
       $renderParams["province_class"] = "not_valid";
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
    $renderParams["provinces"] = provinces();
    render_page('addrestaurants.twig.html',$renderParams);
} else {
    render_page('echo.twig.html',["data" =>  $_POST]);
}
