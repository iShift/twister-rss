<?php
$sdd_db_host='localhost';
// Имя базы данных с которой вы хотите работать, так как их может быть множество
$sdd_db_name='';
// логин доступ к базе данных
$sdd_db_user='';
// пароль доступа к базе данных
$sdd_db_pass='';
// устанавливаем связь с сервером
@mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass);
// переключаемся на нужную нам базу данных
@mysql_select_db($sdd_db_name);
// делаем выборку из таблицы
mysql_query("SET NAMES utf8");
$domain="";
    
 $rpcuser = 'LOGIN';
 $rpcpassword = 'PASSWORD';
 $rpchost = '127.0.0.1';
 $rpcport = 28332;
?>