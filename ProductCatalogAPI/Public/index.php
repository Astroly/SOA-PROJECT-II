<?php
use\Psr\Http\Message\ServerRequestInterface as Request ;
use\Psr\Http\Message\ResponseInterface as Response ;

require '../vender/autoload.php' ;

$app = new \Slim\App ;
$app->get('/productID'/{productID'}',function (Request $request, Response $response) {
    $productID = $request->getAttribute('productID') ;
    $response->getBody()->write("Hello, $productID'") ;

    return $response ;
});

// Customer Route
require '../src/router/Product.php' ;
require '../src/Config/db.php' ;



$app->run() ;
?>