<?php
function conectar()
{
	mysql_connect("localhost", "root", "1234");
	mysql_select_db("atcsistem");
}

function desconectar()
{
	mysql_close();
}
?>
