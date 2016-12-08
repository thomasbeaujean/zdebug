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
    if ($data instanceof \Doctrine\ORM\QueryBuilder) {
        $sql = $data->getQuery()->getSQL();
        $sql = str_replace(',', "\n,", $sql);
        $sql = str_replace('FROM', "\nFROM", $sql);
        $sql = str_replace('INNER', "\nINNER", $sql);
        $sql = str_replace('LEFT', "\nLEFT", $sql);
        $sql = str_replace('WHERE', "\nWHERE", $sql);
        $sql = str_replace('AND', "\nAND", $sql);
        $data = [
            'sql' => $sql,
            'parameters' => $data->getQuery()->getParameters(),
        ];
    }

    $data = print_r($data, true);

    file_put_contents('/var/www/zdebug/log/log.txt', $data."\n", FILE_APPEND);
}
