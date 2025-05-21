<?php
require_once 'constants.php';
require_once 'vendor/autoload.php';

function render_page($templateName, $parameters){

    $loader = new \Twig\Loader\FilesystemLoader(TemplateDirectory);
    $twig = new \Twig\Environment($loader, [ ]);
    
    echo $twig->render($templateName, $parameters);
}

function valueIfExists($key,$array){
    if(array_key_exists($key, $array)){
        return $array[$key];
    } else  {
        return "";
    }
}

function isPhone($phone){
    return preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone);
}

function dateCheck($dateString, $refString){
    $now = new dateTime();
    $date = new dateTime($dateString);
    $ref = new dateTime($refString);
    return $now->getTimeStamp() > $date->getTimeStamp() &&
    $date->getTimeStamp() > $ref->getTimeStamp();
}

function navList(){
    return [[ "link" => 'add_restaurant.php', "text"=>'Add - Restaurant'],
            ["link" => 'add_visit.php', "text"=>'Add - Visits'],
            ["link" => 'add_infection.php', "text"=>'Add - Infections'],
            ["link" => 'list_restaurants.php', "text"=>'List - Restaurants'],
            ["link" => 'infections.php', "text"=>'List - Infections'],
            ["link" => 'todo.php', "text"=>'List - To-Do']];
}

function footer(){
    return "Assignment 1: Contact Tracing. Made By: Kelvin Lim.";
}

function title(){
    return "CONTACT TRACING";
}

function testCenters(){
    return [
    "Surrey Whalley UPCC",
    "Ridge Meadow UPCC",
    "Chilliwack &amp; Hope Covid-19 Testing &amp; Assessment Centre",
    "Burnaby, Central Park Drive-Thru Site",
    "Abbotsford UPCC",
    "Mission Memorial Hospital Campus",
    "Peace Arch Hospital",
    "South Delta",
    "Home Health Clinic",
    "Tri-Cities COVID-19 &amp; Influenza-Like Illness Assessment Clinic ",
    "Vernon Urgent and Primary Care Centre",
    "Kelowna Urgent and Primary Care Centre",
    "Kamloops Urgent and Primary Care Centre",
    "Penticton Health Unit",
    "100 Mile House South Cariboo Health Centre",
    "Salmon Arm Public Health Centre",
    "Williams Lake Health Building Services",
    "Kootenay Lake Hospital (old entrance)",
    "Trail Kiro Wellness Centre",
    "Cranbrook Health Unit Centre (Rocky Mountain Lodge)",
    "Golden &amp; District Hospital",
    "Boundary District Hospital",
    "Revelstoke Health Centre",
    "Sparwood Health Centre",
    "Lillooet Hospital Clinic",
    "Kamloops Public Health",
    "Nicola Valley Hospital and Health Centre",
    "Creston Valley Hospital",
    "Enderby Health Centre",
    "Salmo Wellness Centre",
    "Fort Nelson Health Unit",
    "Fort St. John Health Unit",
    "Hudson's Hope Health Centre",
    "Dawson Creek Health Unit",
    "Tumbler Ridge Community",
    "Chetwynd Primary Care Clinic",
    "Lakes District Health Center ",
    "Fraser Lake Diagnostic Health Center",
    "St. J",
    "Fort St. James Health Centre",
    "Urgent Primary Care Centre ",
    "McBride Hospital",
    "Valemount H",
    "Mackenzie &amp; Distr",
    "Prince George Urgent and ",
    "Haida Gwaii Hospital and H",
    "Northern Haida Gwaii ",
    "Prince Rupert Regiona",
    "Kitimat General Hospita",
    "Mills Memorial Hospital ",
    "Stewart Health Centre",
    "Atlin Health Centre",
    "Wrinch Memorial Hospital",
    "Stikine H",
    "Bulkley Valley District Hospital",
    "Houston H",
    "BC Children &amp; Women Campus",
    "St. Vincent",
    "City Centre UPCC",
    "North Vancouver UPCC",
    "REACH UPCC",
    "Sunshine Coast",
    "Bella Bella - RW Large Memorial Hospital Emergency Department",
    "Bella Coola General Hospital - Emergency Department",
    "Powell River General Hospital - Emergency Department",
    "Emergency Departmant / Squamish General Hospital",
    "Whistler Medical Clinic",
    "Pemberton Health Centre",
    "DTES COVID-19 Testing Site",
    "Richmond COVID Collection Centre",
    "Vancouver Community College - Parking Lot",
    "North Vancouver COVID-19 Assessment Centre",
    "Comox Valley Hospital",
    "Campbell River Hospital",
    "Port McNeill Hospital",
    "Port Hardy Hospital",
    "West Coast General Hospital",
    "Public Health Building",
    "Oceanside Health Centre",
    "Tofino General Hospital",
    "Cowichan District Hospital",
    "Peninsula Health Unit",
    "Lady Minto Hospital",
    "Victoria Health Unit",
    "Cormorant Island Health Centre",
    "Sointula Health Centre",
    "Port Alice Health Centre",
    "Gold River",
    "Bamfield Health Centre",
    "Huu-ay-aht First Nations, a Nuu-chah-nulth Community",
    "Ditidaht First Nations,  a Nuu-chah-nulth community",
    "Tseshaht First Nations, a Nuu-chah-nulth community",
    "Hupacasath First Nations, a Nuu-chah-nulth community"];
}

function provinces(){
    return [ "British Columbia",
             "Alberta",
             "Saskatchewan",
             "Manitoba",
             "Ontario",
             "Quebec",
             "Nova Scotia",
             "New Brunswick",
             "Newfoundland",
             "Prince Edward Island",
             "Yukon",
             "Northwest Territory",
             "Nunavut"];
}
?>