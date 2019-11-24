<?php
    //  require_once('../admin/common/config.php'); 

    //  $name = $_POST['name'];
    //  $phone = $_POST['phone'];
    //  $email = $_POST['email'];
    //  $services = $_POST['services'];
    //  $strsql = "INSERT INTO service VALUES('null', '$name', '$phone', '$email', '$services', '')";

    // if(mysqli_query($link,$strsql)){
    //     echo "Thank you for contacting us – we will get back to you soon!";
    // }else{
    //     echo mysqli_error($link);
    // }
    //mysqli_close($link);
?>
<?php
     require_once('../admin/common/config.php'); 
    
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $services = $_POST['services'];
     //$servicenam = $_POST['service_name'];

     $strsql  = "INSERT INTO `service` (`name`, `phone`, `email`, `services`,`created_at`) VALUES ( '{$name}', '{$phone}', '{$email}', '{$services}',now())";
    
    if(mysqli_query($link,$strsql)){
     // $username = "er.robin2013@gmail.com";
     // $hash = "423fe3180c270c4ed98f31e4ec6f76aaab9a5b7ea6eef367f6feb094479da0aa";
        $username = "wethinkstudio22@gmail.com";
	    $hash = "a96a1af767feba4faf4a77aba615e3bea67f4029ec38caa6c86df2918c3396ba";

        // Config variables. Consult http://api.textlocal.in/docs for more info.
        $test = "0";

        // Data for text message. This is the text message data.
        $sender = "LAVEND"; // This is who the message appears to be from.
        //$numbers =  $_POST['phone']; // A single number or a comma-seperated list of numbers
        $numbers = "917504893195"; 
        //$message = "We are testing the message";

        $message = "Hello Wethink,%n %nYou have received a new lead as%nName: " . $_POST['name'] . "%nPhone: " . $_POST['phone'] . "%nEmail: " . $_POST['email'] . "%nServices Interested: " . $_POST['services'] . "%nThank You";

        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);
        
        //echo($result);
        //echo "Done";
        echo "Thank you for contacting us – we will get back to you soon!";
    }else{
        echo mysqli_error($link);
    }
    //mysqli_close($link);
?>
