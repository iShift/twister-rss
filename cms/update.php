<?php
require("settings.php");
$sql="SELECT * 
FROM  `rss` 
WHERE `active`='1'";
$result=mysql_query($sql) or die(mysql_error());
		   	while ($row = mysql_fetch_array($result)) {
		   	$account=$row['account'];
		   	$url=$row['url'];
		   	$id=$row['id'];
		   	
		   	echo $account;
		   	echo $url;
		   	echo $id;
		   		$actual_link = "http://".$domain."/cms/loader.php?id=".$id;
		   		$a = file_get_contents($actual_link);
		   		echo '<br>';
		   		echo($a);
		   		//if ($a !== "Cannot read rss or it is up to date"){
		   //			$datetime=date("d / F / Y ").date('H:i:s');
			 //  		$sql="UPDATE `rss` SET `lastupdate`='$datetime' WHERE `id`='$id'";
			   //		echo $sql;
			   	//	$result=mysql_query($sql) or die(mysql_error());
		   		//}else {echo "olo";}
		   		echo '<br>';
		   	}
		   	
		   	// open
?>