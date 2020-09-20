<?php require 'db_connect_host_credentials.php';

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}

date_default_timezone_set( 'Asia/Kolkata' );


$data = json_decode(file_get_contents('php://input'), true);

$phone_number_val        = isset( $data['phonenumber'] ) ? "'".$data['phonenumber']."'" : 0;

$sql = "SELECT name,
itemname,
uniqueid,
reportedabuse,
phonenumber,
email,
description,
istaken,
uploaddate,
address,
lat,
lng,
is_regular,
 mon,
tue,
wed,
thur,
fri,
sat,
sun,
is_needy
         FROM HFFoodItem where phonenumber = ".$phone_number_val.' and istaken = 0;';
         

$product_type_result = mysqli_query( $conn, $sql );

if ( !$product_type_result ) {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "No ProductType results found in our server."';
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
        'email' => $row['email'],
        'description' => $row['description'],
        'istaken' => $row['istaken'],
        'uploaddate' => $row['uploaddate'],
        'address' => $row['address'],
        'lat' => $row['lat'],
        'lng' => $row['lng'],
        'is_regular' => $row['is_regular'],
        'mon' => $row['mon'],
        'tue' => $row['tue'],
        'wed' => $row['wed'],
        'thur' => $row['thur'],
        'fri' => $row['fri'],
        'sat' => $row['sat'],
        'sun' => $row['sun'],
        'is_needy' => $row['is_needy']
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