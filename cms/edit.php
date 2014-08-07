<?php
session_start();
require('settings.php');
if ($_SESSION['login'] ==='true') { 
//header('Location: http://'.$domain.'/cms/admin.php');
}else {
header('Location: http://'.$domain.'/cms/index.php');	
die ();
}

$active = $_POST['active'];
if (empty($active)) { 
$active = $_GET['active'];
}
echo $active;
if ($active === "on") $active = 1;
echo $active;
$account = $_POST['account'];

$action = $_POST['action'];
if (empty($action)) { 
$action = $_GET['action'];
}


$id = $_POST['id'];
if (empty($id)) { 
$id = $_GET['id'];
}

$name = $_POST['name'];
$url = $_POST['url'];
$updatetime = $_POST['updatetime'];

if (!empty($url)) {
if (empty($action)) {
// add
$sql = "INSERT INTO `rss` (`name`, `url`, `active`, `lastupdate`, `updatetime`, `account`) VALUES ('$name','$url','$active','$lastupdate','$updatetime', '$account')";	
$result=mysql_query($sql) or die(mysql_error());
header('Location: http://'.$domain.'/cms/admin.php');
}	
}elseif ($action == 'edit') {
	// edit
	//$sql="UPDATE `rss` SET `name`='$name',`url`='$url',`active`='$active',`updatetime`='$updatetime' WHERE `id`='$id'";
	//$result=mysql_query($sql) or die(mysql_error());
//header('Location: http://'.$domain.'/cms/admin.php');
}elseif ($action == 'del') {
	// del
	$sql="DELETE FROM `rss` WHERE `id`='$id'";
	$result=mysql_query($sql) or die(mysql_error());
	header('Location: http://'.$domain.'/cms/admin.php');
}elseif ($action == 'active') {
$sql="UPDATE `rss` SET `active`='$active' WHERE `id`='$id'";
	$result=mysql_query($sql) or die(mysql_error());
	header('Location: http://'.$domain.'/cms/admin.php');
}