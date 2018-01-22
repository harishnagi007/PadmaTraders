<?php

function db_conn()
{
	$conn=mssql_connect('localhost','sa','mnsms@123');

	if($conn)
	{
		mssql_select_db("PADMA");
		return $conn;
	}
	else
	{
		die("db error: ".mssql_get_last_message());
	}	
}

?>