<?php

//include_once '/var/www/zdebug/zdebug.php';

function zdebug($data)
{
    if ($data === '') {
        $data = '[EMPTY STRING]';
    }
    if ($data === ' ') {
        $data = '[ONE SPACE]';
    }
    if ($data === null) {
        $data = '[NULL]';
    }
    if ($data === true) {
        $data = '[true]';
    }
    if ($data === false) {
        $data = '[false]';
    }

    $data = print_r($data, true);

    file_put_contents('/var/www/zdebug/log/log.txt', $data."\n", FILE_APPEND);
}
