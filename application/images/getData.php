<?php 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'phpmyadmin', 
    'pass' => '123456789', 
    'db'   => 'TestingForm' 
); 
 
// DB table to use 
$table = 'Book'; 
 
// Table's primary key 
$primaryKey = 'id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 

$columns = array( 
    array( 'db' => 'id', 'dt' => 0 ), 
    array( 'db' => 'image_name','dt' => 1 ), 
    array( 'db' => 'author','dt' => 2 ), 
    array( 'db' => 'title','dt' => 3 ), 
    array( 'db' => 'description','dt' => 4 ), 
    array( 'db' => 'label', 'dt' => 5),
    array( 'db' => 'id', 'dt' => 6),array( 'db' => 'labelid', 'dt' => 7),array( 'db' => 'authorid', 'dt' => 8)
); 
 

// Include SQL query processing class 
require 'ssp.class.php'; 

// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);
