<?php
 
if(isset($_GET['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    //$email_to = "strongside32@gmail.com";
    $email_to = "statemachinetech@gmail.com";
 
    $email_subject = "Email From Strong Side Volleyball Website";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_GET['name']) ||        
 
        !isset($_GET['email']) ||
 
        !isset($_GET['message'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $name = $_GET['name']; // required    
 
    $email_from = $_GET['email']; // required
 
    $phone = $_GET['phone']; // not required
 
    $message = $_GET['message']; // required
    
    $purpose = $_GET['purpose']; // not required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
 	$purposes = array("general"=>"General information request", "appointment"=>"Clinic appointment request", "imafreeagent"=>"Free agent submission", "needafreeagent"=>"Team in need of a free agent");
	
	$translated_purpose = $purposes[$purpose];     
 
    $email_message .= "First Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($phone)."\n";
 
    $email_message .= "Purpose: ".clean_string($translated_purpose)."\n";
    
    $email_message .= "Comments: ".clean_string($message)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>