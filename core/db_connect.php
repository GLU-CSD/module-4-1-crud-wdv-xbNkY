<?php
session_start();

// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "root";
// $dbname = "webdev_base";


 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "webshop";

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}

define("BASEURL","http://localhost/Webshop-module4/");
define("BASEURL_CMS","http://localhost/Webshop-module4/admin/");
define("ABSOLUTE_HREF","D:/xampp/htdocs/Webshop-module4/admin/assets/upload");

function prettyDump ( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}