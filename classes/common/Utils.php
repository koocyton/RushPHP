<?php
namespace common;

class Utils
{
    public static function getClientIP()
    {
        if (isset($_SERVER))
        {
        	$realip = $_SERVER["REMOTE_ADDR"];
        }
        else
        {
        	$realip = getenv("REMOTE_ADDR");
        }
        return addslashes($realip);
    }
}