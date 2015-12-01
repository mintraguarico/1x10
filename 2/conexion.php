<?php
function conectar()
{
	mysql_connect("localhost", "root", "1nf0rgu4");
	mysql_select_db("mintraguarico");
}

function desconectar()
{
	mysql_close();
}
?>