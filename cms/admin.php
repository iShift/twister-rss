<?php
session_start();
echo '<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Twister-RSS</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Admin</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
        <h3 class="text-muted">Twister-RSS</h3>
      </div>';


echo '<hr><div class="">
        <h1>Ваши RSS подписки</h1>
       
      
';
require('settings.php');
$sql="SELECT * 
FROM  `rss`";

echo '<table class="table">';
echo '<tr><td>Название RSS</td><td>URL</td><td>Включено</td><td>Последнее обновление</td><td>Частота обновления</td><td>Публиковать от имени</td><td></td><td></td><td></td></tr>';
$result=mysql_query($sql) or die(mysql_error());
		   	while ($row = mysql_fetch_array($result)) {
if ($row['active'] == '1') {
$trclass="success";
$activeTXT='Да';
$activeTXT2='Отключить';
$activeTXT3=0;
$activeTXTClass='btn btn-warning';
} else { 
$trclass="warning";
$activeTXT='Нет';
$activeTXT2='Включить';
$activeTXT3=1;
$activeTXTClass='btn btn-success';
}		   	
echo '<tr class="'.$trclass.'">';		   	
echo '<td>'.$row['name'].'</td>';
echo '<td>'.$row['url'].'</td>';
echo '<td>'.$activeTXT.'</td>';
echo '<td>'.$row['lastupdate'].'</td>';
echo '<td>'.$row['updatetime'].'</td>';
echo '<td>'.$row['account'].'</td>';
echo '<td><a class="'.$activeTXTClass.'" href="edit.php?action=active&id='.$row['id'].'&active='.$activeTXT3.'">'.$activeTXT2.'</a></td>';
//echo '<td><a class="btn btn-primary" href="edit.php?action=edit&id='.$row['id'].'">Изменить</a></td>';
echo '<td><a class="btn btn-danger" href="edit.php?action=del&id='.$row['id'].'">Удалить</a></td>';
echo '</tr>';
unset($trclass);
			   										  } 
echo '</table></div>';
echo '<script>
function hideshow (){
document.getElementById("hide2").style.display="none"
document.getElementById("hide").style.display="block"
}
</script>';
echo '<hr>
<div class="well">
<div align="center" id="hide2"><a class="btn btn-lg btn-primary" onclick="hideshow();">Добавить RSS поток</a></div>
<div id="hide" style="display:none"><form class="navbar-form" action="edit.php" method="post"><div class="form-group">';
echo 'Название RSS: <input class="form-control" name="name" type="text" size="20"> 
	  URL: <input class="form-control" name="url" type="text" size="20"> 
	  Публиковать от имени: <input class="form-control" name="account" type="text" size="20">
	  <!--(Не реализовано) Частота обновления:  <input name="updatetime" type="text" size="20">-->
	  Включен ? <input class="form-control" name="active" type="checkbox" size="20"> ';
echo '<input style="margin-left:20px" class="btn btn-default" type="submit" value="Добавить"></div></div></form></div>';


    
    echo '  <div class="footer">
        <p>&copy; Company 2014</p>
      </div>

    </div> <!-- /container -->



  </body>
</html>';


