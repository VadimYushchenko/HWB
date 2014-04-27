<?php
/**
 * Created by PhpStorm.
 * User: vadimyushchenko
 * Date: 4/17/14
 * Time: 9:36 PM
 */

$options  = array (
    'http' =>
        array (
            'ignore_errors' => true,
        ),
);

$context  = stream_context_create( $options );
$response = file_get_contents(
    'https://public-api.wordpress.com/rest/v1/sites/hwb.uk.com%2Fblog%2F/posts/?number=2&pretty=1',
    false,
    $context
);
$response = json_decode( $response );
