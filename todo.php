<?php
require_once ('init/db-connection.php');
require_once 'scripts/constants.php';
require_once 'scripts/functions.php';

$sql = ("SELECT * FROM infections");
$result = $conn->query($sql);
$result->fetch_all(PDO::FETCH_ASSOC);
foreach ($result as $name => $value){
    print "<div style=background-color:aqua;width:30%;border-width:1px;border-style:solid;border-color:black;margin-bottom:10px> $value </div>";
}
    // echo "<script type=\"text/javascript\"> 
    // $(\".list\").append(\"<div style=background-color:aqua;width:30%;border-width:1px;border-style:solid;border-color:black;margin-bottom:10px>\"+ $(\"#todo_text\").val() + \"</div>\");

    // $(\".list div\").click(function(event){
    //     $(event.currentTarget).remove();
    // })
    // </script>
    // ";
render_page("todo.twig.html", ["nav"=>navList(), "footer"=>footer(), "title"=>title()]);