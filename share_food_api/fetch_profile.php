
<?php require 'db_connect_host_credentials.php';

header( 'Access-Control-Allow-Origin: *' );

$conn = mysqli_connect( $host_name, $db_user_name, $db_user_password, $db_name );

if ( !$conn ) {
    echo 'Could not connect to mysql';
    exit;
}
     
date_default_timezone_set("Asia/Kolkata");

$data = json_decode(file_get_contents('php://input'), true);


$phone_number_val = isset( $data['phonenumber'] ) ? "".$data['phonenumber']."" : 0;

$sql = "SELECT  username,email,phonenumber FROM HFLogin WHERE phonenumber = '".$phone_number_val."';";



$product_type_result = mysqli_query($conn,$sql);

$response_array = array();

 while ($row = mysqli_fetch_assoc($product_type_result)) {


$tmpBusArray = array(
 'email' => $row['email'],
 'phonenumber' => $row['phonenumber'],
 'username' => $row['username']
     );
$response_array = $tmpBusArray;
    
  }

  $results_count = count($response_array);



   if ($results_count>0) {
            echo "{";
            echo '"status_code" : 200,';
           
            echo '"status_message" : "Successfuly fetched Phone Number",';
            echo '"profile" :'.json_encode($response_array);
            echo "}";
            
        } else {
            
            echo "{";
            echo '"status_code" : 400,';
            echo '"status_message" : "FAiled to fetch Phone Number."';
            echo "}";
            
        }


 
mysqli_free_result($product_type_result);
mysqli_close( $conn );

?>