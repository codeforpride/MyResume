<?php
if (isset($_POST['send'])) {
require "gump.class.php";
$gump = new GUMP();
$_POST = $gump->sanitize($_POST); 

$gump->validation_rules(array(
	'name'   => 'required|max_len,30|min_len,2',
	'email'  => 'required|valid_email',
	'country' => 'required',
	'subject' => 'required|max_len,1000|min_len,3',
	
));
$gump->filter_rules(array(
	'name' => 'trim|sanitize_string',
	'email' => 'trim|sanitize_email',
	));
$validated_data = $gump->run($_POST);

if($validated_data === false) {
	?>
	<center><h2><font color="white" > <?php echo $gump->get_readable_errors(true); ?> </font></h2></center>
	<?php 
	include ('contact.php');
}
else {
	$name = $validated_data['name'];
    $email_from = $validated_data['email'];
    $country = $validated_data['country'];
    $subject = $validated_data['subject'];
    $ToEmail = 'resumetemplate@admin.com'; 
    $EmailSubject = 'Site contact form'; 
    $mailheader = "From: " .$email_from. " \r\n"; 
    $mailheader .= "Reply-To: ".$email_from." \r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $MESSAGE_BODY = "Name: " .$name. " "; 
    $MESSAGE_BODY .= "Email: ". $email_from . " ";
    $MESSAGE_BODY .= "country: " .$country . " "; 
    $MESSAGE_BODY .= "Comment: " .$subject . " "; 
    $sendmailtoadmin = mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader);
    $usersuject = 'Thank you for contacting Sitename';
    $mailheader1 = "From: " .$ToEmail. "\r\n"; 
    $mailheader1 .= "Reply-To: " .$ToEmail. "\r\n"; 
    $mailheader1 .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $MESSAGE_BODY1 = "Thank you for leaving message on my website.We will contact you asap " ; 
    $sendmailtouser = mail($email_from, $usersuject, $MESSAGE_BODY1, $mailheader1);
    if(!$sendmailtoadmin && !$sendmailtouser) {
    	echo "<script>alert('Error occured! Please try to send again ' ); </script>";
    	include ('contact.php');
    }
    else {
    	echo "<script>alert('Thanks for your responce. Admin will reply you soon ' );
        window.location.href='contact.php'; </script>";
    }
}
}
else {
	header("location: contact.php");
}
?>