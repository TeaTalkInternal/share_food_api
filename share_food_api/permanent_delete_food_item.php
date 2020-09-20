<?php require 'db_connect_host_credentials.php';

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}

date_default_timezone_set( 'Asia/Kolkata' );
$date = date( 'Y/m/d h:i:s', time() );

$data = json_decode(file_get_contents('php://input'), true);

$uniqueid_val        = isset( $data['uniqueid'] ) ? ''.$data['uniqueid'].'' : 0;

$deletesql = 'SELECT filename FROM HFFoodImages where uniqueid = '.$uniqueid_val.';';

$product_type_result = mysqli_query( $conn, $deletesql );

if ( !$product_type_result ) {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "No ProductType results found in our server."';
    echo '}';
    exit;
}

$row = mysqli_fetch_assoc( $product_type_result );

$delete_food_sql = 'DELETE FROM  HFFoodItem where uniqueid = '.$uniqueid_val.';';

mysqli_query( $conn, $delete_food_sql );

$delete_image_sql .=  'DELETE FROM  HFFoodImages where uniqueid = '.$uniqueid_val.';';

if ( mysqli_query( $conn, $delete_image_sql ) ) {

    unlink( 'uploads/'.$row['filename'] );

    echo '{';
    echo '"status_code" : 200,';

    echo '"status_message" : "Deleted food item permanently."';
    echo '}';

} else {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "Failed delete item"';
    echo '}';

}

mysqli_close( $conn );
?>