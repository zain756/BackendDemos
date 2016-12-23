<?php
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
/*
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
*/
$app->get('/hello/{name}', function ( $request,  $response) {
  $name = $request->getAttribute('name');
  $response->getBody()->write("Hello, $name");

  return $response;
});

$app->get('/books', function() {
 include("db_connect.php");
 $query = "select * from library order by book_id";
 $result = $conn->query($query);
 // var_dump($result); 
 while ($row = $result->fetch_assoc()){ 
 	$data[] = $row;
 }
 
 echo json_encode($data);
});


$app->post('/books[/{book_id}]', function($request){

 include("db_connect.php");
 $_method = null;
 
 if (array_key_exists ('_method', $request->getParsedBody())){
  $_method = $request->getParsedBody()['_method'];
  //echo $_method."<br>";
  if ($_method === "put"){
   putmethodHandler($request);
  }
}

  
//$_method = $request->getParsedBodyParam($key, $default = null);

else{
 $query = "INSERT INTO library (book_name,book_isbn,book_category) VALUES (?,?,?)";

 $stmt = $conn->prepare($query);

 $stmt->bind_param("sss",$book_name,$book_isbn,$book_category);

 $book_name = $request->getParsedBody()['book_name'];
 echo $book_name;
 $book_isbn = $request->getParsedBody()['book_isbn'];

 $book_category = $request->getParsedBody()['book_category'];

 $stmt->execute();
}

/*
   $book_name = $request->getParsedBody()['book_name'];
   echo  $book_name."<br>";
   $book_isbn = $request->getParsedBody()['book_isbn'];
   echo  $book_name."<br>";

    $book_category = $request->getParsedBody()['book_category'];
    echo  $book_category."<br>";
 $query = "INSERT INTO library (book_name,book_isbn,book_category) VALUES ('$book_name','$book_isbn','$book_category')";
if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
*/
});


$app->put('/books/{book_id}', function($request){

 require_once('db_connect.php');

 $get_id = $request->getAttribute('book_id');

 $query = "UPDATE library SET book_name = ?, book_isbn = ?, book_category = ? WHERE book_id = $get_id";

 $stmt = $conn->prepare($query);

 $stmt->bind_param("sss",$book_name,$book_isbn,$book_category);

 $book_name = $request->getParsedBody()['book_name'];

 $book_isbn = $request->getParsedBody()['book_isbn'];

 $book_category = $request->getParsedBody()['book_category'];

 $stmt->execute();

});

function putmethodHandler($request){

  include('db_connect.php');

  $get_id = $request->getAttribute('book_id');
  echo $get_id."<br>";
  $query = "UPDATE library SET book_name = ?, book_isbn = ?, book_category = ? WHERE book_id = $get_id";

  $stmt = $conn->prepare($query);

  $stmt->bind_param("sss",$book_name,$book_isbn,$book_category);

  $book_name = $request->getParsedBody()['book_name'];
  echo $book_name."<br>";
  $book_isbn = $request->getParsedBody()['book_isbn'];
  echo $book_isbn."<br>";
  $book_category = $request->getParsedBody()['book_category'];
  echo $book_category."<br>";
  $stmt->execute();

}
/*
$app->delete('/books/{book_id}', function($request){
 //require_once('db_connect.php');
 //$get_id = $request->getAttribute('book_id');
// $query = "DELETE from library WHERE book_id = '$get_id'";
// $result = $conn->query($query);
});
*/



$app->run();
?>