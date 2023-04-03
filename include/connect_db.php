<?php
//check if a current session is in place and the user is correctly logged in
//also check the calling page / domain to ensure the call only comes from
//this domain -- this check may take a little configuration to get the
//correct host name

//echo "server is : ".$_SERVER['SERVER_NAME'];     //use this the first time to get the host name...then comment it out or delete to complete the security check

/*if (($_SERVER['SERVER_NAME']!="")){
    if (($_SERVER['SERVER_NAME']!="localhost")){
     echo "piss off, hackers!";
    die();
} */

function connect($sql)
{
    $host = "localhost";
    $dbname = "my_simonsoft";
    $username = "simonsoft";
    $pwd = "";

    $host = "localhost";
    $dbname = "my_simonsoft";
    $username = "root";
    $pwd = "";



    //echo "<br>SQL : ".$sql;

    if (!($conn=mysql_connect($host, $username, $pwd)))  {
       printf("error connecting to DB by user = $username and pwd=$pwd");
       exit;
    }
    $db=mysql_select_db($dbname,$conn) or die("Unable to connect to database1");

    //$result = mysql_query($sql, $conn)or die("Unable to query local database <b>". mysql_error()."</b><br>$sql");
    $result = mysql_query($sql, $conn)or die("Unable to query local database <b>". mysql_error()."</b><br>");
    if (!$result){
        echo "database query failed.";
    }else{
        return $result;
    }//end if
}//end function


/*
ESEMPIO

<?php

$sql = "select * from tableName where....";
$result = connect($sql);
if ($result){
   //do something with the result
}//end if
?>

*/


?>