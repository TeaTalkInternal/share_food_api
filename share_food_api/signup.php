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

$username_val             = $data['username'];
$email_val             = $data['email'];
$phone_number_val        = $data['phonenumber'];

$selectsql = "SELECT  username,email,phonenumber FROM HFLogin WHERE phonenumber = '".$phone_number_val."';";

echo $selectsql;

$product_type_result = mysqli_query( $conn, $selectsql );

$num_rows = mysqli_num_rows( $product_type_result );

if ( $num_rows <= 0 ) {

    $sqls = "INSERT INTO HFLogin (username, email,phonenumber)
 VALUES ('$username_val','$email_val','$phone_number_val');";

    if ( mysqli_query( $conn, $sqls ) ) {

        $profileArr = array( 'email'=>$email_val, 'phonenumber'=>$phone_number_val, 'username'=>$username_val );

        echo '{';
        echo '"status_code" : 200,';

        echo '"status_message" : "Successfuly Signed-Up",';
        echo '"profile" :'.json_encode( $profileArr );
        echo '}';

    } else {

        echo '{';
        echo '"status_code" : 400,';
        echo '"status_message" : "Failed to Signup. These credentials already exist."';
        echo '}';

    }

} else {

    //lets update  the existing email with phone number

    $updatesql = "UPDATE HFLogin SET email =  '".$email_val."' WHERE phonenumber = '".$phone_number_val."';";

    if ( mysqli_query( $conn, $updatesql ) ) {

        $profileArr1 = array( 'email'=>$email_val, 'phonenumber'=>$phone_number_val, 'username'=>$username_val );

        echo '{';
        echo '"status_code" : 200,';

        echo '"status_message" : "Successfuly Signed-Up",';
        echo '"profile" :'.json_encode( $profileArr1 );
        echo '}';

    } else {
        echo '{';
        echo '"status_code" : 400,';
        echo '"status_message" : "Failed to Signup. Please check your email and password."';
        echo '}';

    }

}

mysqli_close( $conn );

?>