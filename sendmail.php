<?php
 require_once("model/connection.php");
if(isset( $_POST['email'] ))
{

	$sql=sprintf("SELECT Tokenid from EmailToken ORDER BY Tokenid DESC LIMIT 1 ");
	$query=mysql_query($sql,$link);
	$biggestid=0;
	$smallestid=0;
	if($query)
	{
		if(mysql_num_rows($query)!=0)
		{
		    $biggestid = mysql_fetch_object($query)->Tokenid;
		}
	}

	$sql=sprintf("SELECT Tokenid from EmailToken ORDER BY Tokenid ASC LIMIT 1 ");
	$query=mysql_query($sql,$link);
	if($query)
	{
		if(mysql_num_rows($query)!=0)
		{
		    $smallestid = mysql_fetch_object($query)->Tokenid;
		}
	}
	
	$randomId = mt_rand($smallestid, $biggestid);
	$sql="select * from EmailToken where Tokenid=$randomId";
	$query=mysql_query($sql);
	if($query)
	{
		if(mysql_num_rows($query)!=0)
		{
		    $data = mysql_fetch_object($query);
		    $tokenid = $data->Tokenid;
		    $template = $data->EmailTemplate;
		}
	}
	
	
$to = $_POST['email'];
$imgTracker = "http://diveintojava.com/opentracker/tracker.php?viewed=true&user=".urlencode( $to )."&tokenid=".$tokenid;
$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: Lorem Ipsum <noreplyloremipsum@mail.com>' . "\r\n";
		$subject = "welcome!!!!";
		$message = $template."<br>";
		$message .= 'Thank you for viewing the mail <br>';
		$message .= "If you have any queries, Please mail us at loremipsum@mail.com <br>";		
		$message .= "<img src='".$imgTracker."' width='70' height='80' border='0' />";

		mail($to, $subject, $message, $headers);
		echo "Email has been sent to this mail id <b>$to</b> <br>There is a delay of 1 min in receiving mail. Sry for the inconvenience caused.";
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8" />
	<title>Open Tracker</title>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
</head>
<body>
</body>