<?php
 require_once("model/connection.php");
function getUserIP()
{
    $client  = $_SERVER['HTTP_CLIENT_IP'];
    $forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

if( !empty( $_GET['viewed'] ) && $_GET['viewed'] == 'true' && !empty( $_GET['user'] ) && !empty( $_GET['tokenid'] ) )
{

    $user_ip = getUserIP();
    $reqTime = $_SERVER['REQUEST_TIME'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];	
	
	$userId = $_GET['user'];
	$tokenId = $_GET['tokenid'];
	$sql="select * from UserTokenMapping where Tokenid='".$tokenId."' and Userid='".$userId."'";
	$query=mysql_query($sql);
	if($query)
	{
		if(mysql_num_rows($query)==0)
		{
			$sql="insert into UserTokenMapping values('','$userId','$tokenId')";
			$query=mysql_query($sql);
			if($query)
			{
				$insertId=mysql_insert_id();
			}
		}
		else{
			$data = mysql_fetch_object($query);
			$insertId = $data->Mappingid;
		}
		
		$sql="insert into OpenTokenEvent values('','$insertId','$user_ip','$reqTime','$userAgent')";
		$query=mysql_query($sql);
	}
	
    // load the image
    $image = 'http://diveintojava.com/opentracker/Images/welcome.jpeg';
    
    // getimagesize will return the mimetype for this image
    $imageinfo = getimagesize($image);
    
    $image_mimetype = $imageinfo['mime'];
    
    // tell the browser to expect an image
    header('Content-type: '.$image_mimetype);
    
    // send image as output
     echo file_get_contents($image);
}

?>