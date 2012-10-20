<?php
/**
 * @file   Utils.php
 * @author koocyton <koocyton@gmail.com>
 *
 * @package       Utils
 * @subpackage    common
 */

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

	public static function sha256($string, $key="&23$Err^f9gG%H")
	{
		return hash("sha256", $string . $key);
	}
}