<?php
require_once("model/connection.php");
if( !empty( $_GET['tokenid'] ))
{
$tokenId = $_GET['tokenid'];
$output=array();
$sql="select * from UserTokenMapping where Tokenid='".$tokenId."'";
	$query=mysql_query($sql);
	if($query)
	{
		if(mysql_num_rows($query)>0)
		{
			while($row=mysql_fetch_object($query))
			{
			//echo $row->Mappingid;
				$output[]=$row->Mappingid;
			}
		}
	}
	
	$begin = new DateTime( '2017-10-28 13:00:00' );
	$end = new DateTime( '2017-10-28 21:00:00' );
	
	$interval = DateInterval::createFromDateString('3600 seconds');//1 hour interval
	$period = new DatePeriod($begin, $interval, $end);
	echo "Below is the stats for <b>One Hour</b> time interval on date <b>28-10-2017</b> <br>";
	echo "<b>Time Interval</b>";
	echo str_repeat("&nbsp;", 18); 
	echo "<b>Count(unique opens) per token</b> <br>";
	foreach ( $period as $dt )
	{
	  $d1 =  $dt->format( "H:i:s" )."\r\n";
	  $timestamp = strtotime($d1) + 60*60;
	  $d2 = date('H:i:s', $timestamp);
	  echo $d1." to \n";
	  echo $d2."\n";
	  $count = 0;
	  	foreach ($output as $mapid) {
			$sql="select * from OpenTokenEvent where Mappingid='".$mapid."' ORDER BY Reqtime ASC LIMIT 1";
			$query=mysql_query($sql);
			if($query)
			{
				if(mysql_num_rows($query)>0)
				{
					while($row=mysql_fetch_object($query))
					{
						$requestedtime = date('H:i:s', $row->Reqtime);
						if((strtotime($requestedtime) > strtotime($d1))&&(strtotime($requestedtime) < strtotime($d2)))
						{
								$count++;
						}
					}
				}
			}
		}
		echo str_repeat("&nbsp;", 18); 
		echo $count."<br>";
	}
}
?>