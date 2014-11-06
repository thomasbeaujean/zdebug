<?php

//include '/var/www/zdebug/zdebug.php';
function zdebug($data)
{
	file_put_contents('/var/www/zdebug/log/log.txt',print_r($data,true),FILE_APPEND);
}
