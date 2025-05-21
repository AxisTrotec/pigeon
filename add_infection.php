<?php
require_once ('init/db-connection.php');
require_once 'scripts/functions.php';

$renderParams = [FormTypeKey=>InfectionForm,"nav"=>navList(), "footer" =>footer(), "title"=>title()];
//Validation first
$valid = true;
$message = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
   if(!isPhone(valueIfExists("phone_number",$_POST))){
       $valid = false;
       $message = $message."Phone Number not valid <br>";
       $renderParams["phone_number_class"] = "not_valid";
   }
   if(valueIfExists("first_name",$_POST)==""){
       $valid = false;
       $message = $message."first name not valid <br>";
       $renderParams["first_name_class"] = "not_valid";
   }
   if(valueIfExists("last_name",$_POST)==""){
       $valid = false;
       $message = $message."last name not valid <br>";
       $renderParams["last_name_class"] = "not_valid";
   }
   
   if(FALSE===array_search(valueIfExists("test_center",$_POST), testCenters())){
       $valid = false;
       $message = $message."test center is not valid <br>";
       $renderParams["test_center_class"] = "not_valid";
   }
   $refDate = "01-04-2020";
   if(!dateCheck(valueIfExists("test_date",$_POST),$refDate )){
       $valid = false;
       $message = $message."test date is not valid <br>";
       $renderParams["test_date_class"] = "not_valid";
   }
   if(!dateCheck(valueIfExists("start_date",$_POST),$refDate )){
       $valid = false;
       $message = $message."start date is not valid <br>";
       $renderParams["start_date_class"] = "not_valid";
   }
   if(!dateCheck(valueIfExists("end_date",$_POST),$refDate )){
       $valid = false;
       $message = $message."end date is not valid <br>";
       $renderParams["end_date_class"] = "not_valid";
   }
} else {
    $valid = false;
}

if(!$valid){
    //Post $_POST parameters from forms
    foreach($_POST as $key=>$value){
        $renderParams[$key] = $value;
    }
  
   $renderParams["testCenters"] = testCenters();
   $renderParams["message"] = $message;
  
   render_page('infections.twig.html', $renderParams);
} else {

    render_page('post_add_infect.php',["data" =>  $_POST]);
}
