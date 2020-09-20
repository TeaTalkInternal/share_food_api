<?php require 'db_connect_host_credentials.php';

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}

date_default_timezone_set( 'Asia/Kolkata' );
$date = date( 'Y/m/d h:i:s', time() );

$jsonInput = file_get_contents( 'php://input' );
$decoded = json_decode( $jsonInput, TRUE );

$product_id_val        = $decoded['uniqueid'];

$sql = 'UPDATE HFFoodItem SET isTaken =  1 WHERE uniqueid = '.$product_id_val.';';

if ( mysqli_query( $conn, $sql ) ) {

    echo '{';
    echo '"status_code" : 200,';
    echo '"status_message" : "Marked food item is taken away."';
    echo '}';

} else {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "Failed to update item status."';
    echo '}';

}
mysqli_close( $conn );
?>