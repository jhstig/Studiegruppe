<?php

// Definerer konstanter med database forbindelse credentials
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', 'root');
define('DBNAME', 'go2food');

// Inkluderer functions.php med alle funktioner
include('functions.php');

// Forbinder til databasen (se functions.php)
connect();
