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
				$output[]=$row;
			}
		}
	}
	
	$userarray = array();
	foreach ($output as $event) {
	    $mapid = $event->Mappingid;
	    $user = $event->Userid;
	    
	    $sql="select * from OpenTokenEvent where Mappingid='".$mapid."'";
		$query=mysql_query($sql);
		if($query)
		{
			if(mysql_num_rows($query)>0)
			{
				$outerarray=array();
				while($row=mysql_fetch_object($query))
				{
					$outerarray[] = array(
					array('UserIp' => $row->Userip),
        				array('RequestTime' => $row->Reqtime),
        				array('UserAgent' => $row->Useragent)
        				);
				}
			}
		}
		$userarray[] = array($user => $outerarray);
	}
	echo json_encode(array($tokenId => $userarray));
}


?>



