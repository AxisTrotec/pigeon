<?php
require_once ('init/db-connection.php');
require_once 'scripts/constants.php';
require_once 'scripts/functions.php';


$result = [[]];

$keys = ["phone","firstname","lastname","testdate","reportDate","infectionstart","infectionend","contact_trace"];

for($i=0; $i<count($result); $i += 1){
    $str = "<a href='contacttrace.php?ID=".$result[$i]["incident_id"]."'>Trace Contacts</a>";
    $result[$i] += ["contact_trace" => $str];
}

render_page("tables.html", ["nav"=>navList(), "footer"=>footer(), "title"=>title(),"table"=>$result,"keys"=>$keys,"heading"=>"Infection report","page_title"=>"Infection Report"]);

