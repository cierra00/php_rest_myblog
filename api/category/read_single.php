<?php

#headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../config/Database.php';
include_once '../../models/Category.php';

//Instantiate DB & Connect

$database = new Database();
$db = $database->connect();


//Instantiate Blog Category
$category = new Category($db);


#get ID from URL
$category->id = isset($_GET['id']) ? $_GET['id'] : die();

#Get Category 
$category->read_single();

#create array
$post_arr = array(
    'id'=> $category->id,
    'name'=> $category->name,
    
);

print_r(json_encode($post_arr));

?>