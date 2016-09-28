<?php
if(!@mysql_connect("localhost","root",""))die("DB Error");
if(!@mysql_select_db("nitc_database"))die("DB error");
?>