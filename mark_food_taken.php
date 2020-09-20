<?php require 'db_connect_host_credentials.php';

header( 'Access-Control-Allow-Origin: *' );

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}

date_default_timezone_set( 'Asia/Kolkata' );
$date = date( 'Y/m/d h:i:s', time() );

$jsonInput = file_get_contents( 'php://input' );
$decoded = json_decode( $jsonInput, TRUE );

$uniqueid_val          = isset( $decoded['uniqueid'] ) ? ''.$decoded['name'].'' : 1;

$sql = 'UPDATE HFProduct SET istaken =  1 WHERE uniqueid = '.$uniqueid_val.';';

if ( mysqli_query( $conn, $sql ) ) {
    echo '{';
    echo '"status_code" : 200,';
    echo '"status_message" : "Item marked given."';
    echo '}';

} else {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "Failed to update item status."';
    echo '}';

}
mysqli_close( $conn );
?>