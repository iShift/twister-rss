<?php
session_start();
require('language.php');
require('settings.php');
if ($_SESSION['login'] ==='true') { 
//header('Location: http://'.$domain.'/cms/admin.php');
}else {
header('Location: http://'.$domain.'/cms/index.php');	
die ();
}

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
        <h1>'.$Lang_rsssubscribes.'</h1>
       
      
';

$sql="SELECT * 
FROM  `rss`";

echo '<table class="table">';
echo '<tr><td>'.$Lang_table_title_Rss_Name.'</td><td>URL</td><td>'.$Lang_table_title_On.'</td><td>'.$Lang_table_title_Last_Feed_Update.'</td><td>'.$Lang_table_title_refres_rate.'</td><td>'.$Lang_table_title_Publish_from.'</td><td></td><td></td><td></td></tr>';
$result=mysql_query($sql) or die(mysql_error());
		   	while ($row = mysql_fetch_array($result)) {
if ($row['active'] == '1') {
$trclass="success";
$activeTXT=$Lang_table_yes;
$activeTXT2=$Lang_table_off;
$activeTXT3=0;
$activeTXTClass='btn btn-warning';
} else { 
$trclass="warning";
$activeTXT=$Lang_table_no;
$activeTXT2=$Lang_table_on;
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
//echo '<td><a class="btn btn-primary" href="edit.php?action=edit&id='.$row['id'].'">'.$Lang_table_change.'</a></td>';
echo '<td><a class="btn btn-danger" href="edit.php?action=del&id='.$row['id'].'">'.$Lang_table_del.'</a></td>';
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
<div align="center" id="hide2"><a class="btn btn-lg btn-primary" onclick="hideshow();">'.$Lang_table_add_rss_feed.'</a></div>
<div id="hide" style="display:none"><form class="navbar-form" action="edit.php" method="post"><div class="form-group">';
echo $Lang_table_add_rss_name.': <input class="form-control" name="name" type="text" size="20"> 
	  URL: <input class="form-control" name="url" type="text" size="20"> 
	  '.$Lang_table_title_Publish_from.': <input class="form-control" name="account" type="text" size="20">
	  <!--(Не реализовано) Частота обновления:  <input name="updatetime" type="text" size="20">-->
	  '.$Lang_table_add_rss_on.' ? <input class="form-control" name="active" type="checkbox" size="20"> ';
echo '<input style="margin-left:20px" class="btn btn-default" type="submit" value="'.$Lang_table_add_rss_add.'"></div></div></form></div>';


    
    echo '  <div class="footer">
        <p>&copy; Company 2014</p>
      </div>

    </div> <!-- /container -->



  </body>
</html>';


