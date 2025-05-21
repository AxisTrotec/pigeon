<?php
require_once ('init/db-connection.php');
require_once 'scripts/constants.php';
require_once 'scripts/functions.php';



$resultArray = [["firstname"=>"John","lastname"=>"DOG","phone"=>"000-000-0000","timein"=>"3:00pm May 5","timeout"=>"3:55pm May 5"],
               ["firstname"=>"Ted","lastname"=>"Lop","phone"=>"000-100-0000","timein"=>"4:00pm May 5","timeout"=>"4:55pm May 5"],
               ["firstname"=>"Sam","lastname"=>"Njel","phone"=>"000-200-0000","timein"=>"5:00pm May 5","timeout"=>"5:55pm May 5"]];

$keys=["firstname","lastname","phone","timein","timeout"];
render_page("tables.html",["nav"=>navList(), "footer"=>footer(), "title"=>title(),"table" => $resultArray,"keys"=>$keys,"heading"=>"Visits By Restaurant"]);

