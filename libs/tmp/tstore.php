<?php
date_default_timezone_set("Asia/Seoul");

$handle = fopen("tstore.txt", "rb");

if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle, 4096);
        if (preg_match("/^(.+)\t(.+)\t(.+)\t(.+)\t(.+)$/", $buffer, $matchs))
        {
        	$rp = json_decode($matchs[5]);//echo $matchs[5]."\n";
        	$tid_info = explode("_", $rp->tid);
        	// print_r($tid_info);echo "\n"; 
        	echo date("Y-m-d", $matchs[4]) . " / " . $rp->date . " / " . $tid_info[2] . " / " . date("Y-m-d H:i:s", floor($tid_info[2]/1000)) . "\n  ";// . $matchs[5] . "\n";
        	// echo date("Y-m-d H:i:s", floor($tid_info[2]/1000));echo "\n";
        }
    }
    fclose($handle);
}