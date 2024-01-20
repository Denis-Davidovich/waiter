<?php

function handler () {
    $resp =  'Hello, World!';
    return [
        'statusCode' => 200,
        'body' => json_encode($resp),
    ];
}
