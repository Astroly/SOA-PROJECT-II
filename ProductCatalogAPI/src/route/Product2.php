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

//Add Products
$app->post('/api/product/add',function(Request $request, Response $response) {
    $name = $request->getParam('name') ;
    $tel = $request->getParam('name') ;
    $email = $request->getParam('email') ;
    $address = $request->getParam('address') ;

    $sql ="INSERT INTO product_contact (name,tel,email,address,) VALUE (:name,:tel,:email,:address)" ;
    try {
        //get DB object
        $db = new db() ;
        //connect
        $db = $db->connect() ;

        $stmt = $db->prepare($sql) ;

        $stmt->bindParam(':name',    $name') ;
        $stmt->bindParam(':tel',     $tel') ;
        $stmt->bindParam(':email',    $email') ;
        $stmt->bindParam(':address',    $address') ;

        $stmt->execute() ;
        echo '{"notice: {"text": "Product Add"}' ;

    } catch(PDOExcaption $e) {
            echo '{"error":{"text": '.$e->getMessage().'}' ;
    }
}

//Update Products
$app->put('/api/product/update/{id}',function(Request $request, Response $response) {
    $id = $request->getAttribute('id') ;
    $name = $request->getParam('name') ;
    $tel = $request->getParam('tel') ;
    $email = $request->getParam('email') ;
    $address = $request->getParam('address') ;

    $sql = "UPDATE product_contact SET
            name = :name,
            tel = :tel,
            email = :email,
            address = address,
            WHERE id = $id" ;
    try{
        //Get DB Object
        $db = new db() ;
        // Connect
        $db = $db->connect() ;

        $stmt = $db->prepare($sql) ;

        $stmt->bindParam(':name',   $name) ;
        $srmr->bindParam(':tel',  $tel) ;
        $srmr->bindParam(':email',  $email) ;
        $srmr->bindParam(':address',  $address) ;

        $stmt->execute() ;
        echo '{"notice": {"text": "Product Update"}' ;

    } catch(PODExution $e) {
        echo '{"error": {"text": '.$e->getMessage().'}' ;
    }
}
});

?>