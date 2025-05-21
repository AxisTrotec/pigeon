<?php
require_once ('init/db-connection.php');
require_once 'scripts/constants.php';
require_once 'scripts/functions.php';

render_page("index.html", ["nav"=>navList(), "footer"=>footer(), "title"=>title()]);

