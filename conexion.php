<?php
function conectar()
{
	mysql_connect("localhost", "root", "1nf0rgu4");
	mysql_select_db("mintraguarico");
        mysql_query("SET NAMES 'utf8'");
}
//mysql --user=root --password=1nf0rgu4 mintraguarico < "C:\xampp\htdocs\mintraguarico\db\1.sql"
//mysqldump --user=root --password=1nf0rgu4 mintraguarico > C:\xampp\htdocs\mintraguarico\db\archivo_dump.SQL
function desconectar()
{
	mysql_close();
}
?>