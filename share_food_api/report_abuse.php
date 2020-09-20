<?php require 'db_connect_host_credentials.php';

header( 'Access-Control-Allow-Origin: *' );

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}

date_default_timezone_set( 'Asia/Kolkata' );
$date = date( 'Y/m/d h:i:s', time() );


$data = json_decode(file_get_contents('php://input'), true);

$uniqueid_val          = isset( $data['uniqueid'] ) ? ''.$data['uniqueid'].'' : 1;

$sql = 'UPDATE HFFoodItem SET reportedabuse =  1 WHERE uniqueid = '.$uniqueid_val.';';

//echo $sql;

if ( mysqli_query( $conn, $sql ) ) {
    echo '{';
    echo '"status_code" : 200,';
    echo '"status_message" : "Item marked as abusing content."';
    echo '}';

} else {

    echo '{';
    echo '"status_code" : 400,';
    echo '"status_message" : "Failed to update item status."';
    echo '}';

}
mysqli_close( $conn );
?>