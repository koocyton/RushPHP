<?php
namespace common;

class Utils
{
    public static function getClientIP()
    {
        if (isset($_SERVER["REMOTE_ADDR"]))
        {
        	$realip = $_SERVER["REMOTE_ADDR"];
        }
        else
        {
        	$realip = getenv("REMOTE_ADDR");
        }
        return addslashes($realip);
    }

	public static function sha256($string, $key="")
	{
		return hash("sha256", $string . $key);
	}
	
	public static function location($url)
	{
		header("location:" . $url);
		exit;
	}
}