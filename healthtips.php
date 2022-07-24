<?php

$sql = 'SELECT tip_id, tip_title, tip_content FROM tips';
   mysql_select_db('tween_db');
   $retval = mysql_query( $sql, $conn );

   
//connect to mysql database//database connection
$connect = new mysqli("localhost","root","","tween_db");

$connect->close();


?>