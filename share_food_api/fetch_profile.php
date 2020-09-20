
<?php require 'db_connect_host_credentials.php';


if (!$link = @mysql_connect($host_name, $db_user_name, $db_user_password)) {

    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db($db_name, $link)) {
    echo 'Could not select database';
    exit;
}
        
       date_default_timezone_set("Asia/Kolkata");



$phone_number_val        = isset($_GET['phonenumber']) ? "'".$_GET['phonenumber']."'" : 0;


$sql = "SELECT  username,email,phonenumber FROM HFLogin WHERE phonenumber = '".$phone_number_val."';";


$product_type_result = mysql_query($sql,$link);

$response_array = array();

 while ($row = mysql_fetch_assoc($product_type_result)) {


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


 
mysql_free_result($product_type_result);

?>