<?php require 'db_connect_host_credentials.php';

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}


date_default_timezone_set( 'Asia/Kolkata' );


$sql = "SELECT name,
itemname,
uniqueid,
reportedabuse,
phonenumber,
alternate_phonenumber,
email,
description,
istaken,
isbooked,
pickat_date,
pickby_date,
address,
lat,
lng ,
serves_count,
ispending,
image_name,
food_type,
expiry_date  FROM HFFoodItem;";

$product_type_result = mysqli_query( $conn, $sql );

if ( !$product_type_result ) {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "No food items found in our server."';
    echo '}';
    exit;
}

$response_array = array();

while ( $row = mysqli_fetch_assoc( $product_type_result ) ) {

    $tmpBusArray = array(

        'name' => $row['name'],
        'itemname' => $row['itemname'],
        'uniqueid' => $row['uniqueid'],
        'reportedabuse' => $row['reportedabuse'],
        'phonenumber' => $row['phonenumber'],
        'alternate_phonenumber' => $row['alternate_phonenumber'],
        'email' => $row['email'],
        'description' => $row['description'],
        'istaken' => $row['istaken'],
        'isbooked' => $row['isbooked'],
        'pickat_date' => $row['pickat_date'],
        'pickby_date' => $row['pickby_date'],
        'address' => $row['address'],
        'lat' => $row['lat'],
        'lng' => $row['lng'],
        'serves_count' => $row['serves_count'],
        'ispending' => $row['ispending'],
        'image_name' => $row['image_name'],
        'food_type' => $row['food_type'],
        'expiry_date' => $row['expiry_date']
    );

    $response_array[] = $tmpBusArray;

}

$results_count = count( $response_array );

echo '{';
echo '"status_code" : 200,';
echo '"count" : '.$results_count.',';
echo '"status_message" : "successfully fetched data",';

if ( count( $response_array ) >= 0 ) {

    echo '"food_items" :'.json_encode( $response_array );

    echo '}';

}

mysqli_free_result( $product_type_result );
mysqli_close( $conn );
?>