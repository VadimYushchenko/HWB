<?php
/**
 * Created by PhpStorm.
 * User: vadimyushchenko
 * Date: 4/17/14
 * Time: 9:36 PM
 */


getPosts($_GET["category"]);



function getPosts($category){

$options  = array (
    'http' =>
        array (
            'ignore_errors' => true,
        ),
);

$context  = stream_context_create( $options );

    $url = "https://public-api.wordpress.com/rest/v1/sites/hwb.uk.com%2Fblog%2F/posts/?number=2&pretty=1&order=DESC&order_by=modified&category={$category}";


$response = file_get_contents(
    $url,
    false,
    $context
);


echo  $response;
}
//$response = json_decode( $response );
//echo $response;