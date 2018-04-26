<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

//Get all Product
$app->get('/api/product',function(Request $request,Response $response){
    $sql = "SELECT * FROM product"; // ?sql
    try{
        //Get DB Object
        $db = new db();
        // connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $product = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($product);
    } catch(PDOException $e){
        echo '{"error":"text":'.$e->getMessage().'}';
    }
}
//GET Single Product
$app->get('/api/product/{id}', function()Request $request, Response $response){
    $id = $request ->getAttribute('id');
    $sql = "SELECT * FROM /product WHERE id = $id";
    try {
        $db = new db();
        $db = $db->connect();

         $stmt =$db->query($sql);

        $/product = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($customer);
    }catch(PDOException $e){
        echo'{"error":{"text":}'.$e->getMessage().'}';
    }
});
//000000
?>