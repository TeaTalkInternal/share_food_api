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

$phone_number_val        = isset( $data['phonenumber'] ) ? "'".$data['phonenumber']."'" : 0;

$selectsql = 'SELECT  phonenumber FROM HFLogin WHERE phonenumber = '.$phone_number_val.';';

$product_type_result = mysqli_query( $conn, $selectsql );

$num_rows = mysqli_num_rows( $product_type_result );

if ( $num_rows <= 0 ) {

    echo '{';
    echo '"status_code" : 400,';

    echo '"status_message" : "Phone number doesnt exist."';
    echo '}';

} else {

    echo '{';
    echo '"status_code" : 200,';

    echo '"status_message" : "Phone number exist."';
    echo '}';

}

mysqli_close( $conn );

?>