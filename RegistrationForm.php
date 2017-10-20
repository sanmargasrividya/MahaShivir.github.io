<?php
    phpinfo();
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$noOfParticipents = $_POST['NumberofParticipants'];

//Validate first
$to = 'info@siddhasanmarga.com';
	$subject = 'Sanmarga Supramental Healing';
	$msg = "<html>
	 <head>
	 <title>Title of email</title>
	 </head>	
	 <body>";
	 
$tableHead = 
	 "<table cellspacing=\"4\" cellpadding=\"4\" border=\"1\" align=\"center\">	
		<tr>
		<td align=\"center\">Name</td>
		<td align=\"center\">Location</td>
		<td align=\"center\">Email</td>
		<td align=\"center\">Phone Number</td>
		</tr>";
	
	for( $i = 0; $i<$noOfParticipents; $i++ ) {		
		$tableData = $tableHead +
			"<td align=\"center\">".$_POST['name'][i]."</td>
			<td align=\"center\">".$_POST['location'][i]."</td>
			<td align=\"center\">".$_POST['email'][i]."</td>
			<td align=\"center\">".$_POST['phonenumber'][i]."</td>
			</tr>"	;
	}
	
	$msg = $msg + $tableHead +"</table>
	</body>
	</html>";

    /*if(empty($_POST['name'][i])) 
	{
	    echo "Name is mandatory!";
	    exit;
	}
	if(empty($_POST['location'][i])){
		echo "Location is mandatory!";
	    exit;
	}	
	if(empty($_POST['phonenumber'][i])){
		 echo "Bad email value!";
	    exit;
	}
	if(IsInjected(empty($_POST['email'][i])))
	{
	    echo "Bad email value!";
	    exit;
	}
	*/
	
      
	  // Make sure to escape quotes

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: siddhasanmarga.org <info@siddhasanmarga.org>' . "\r\n";

mail($to, $subject, $msg, $headers);

   
/*$email_from = 'sindhurabandaru@gmail.com';//<== update the email address
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user $name.\n".
    "Here is the message:\n".// $message".
    
$to = "sindhurabandaru@gmail.com";//<== update the email address
$headers = "From: $sindhurabandaru@gmail.com \r\n";
$headers .= "Reply-To: $sindhurabandaru@gmail.com \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
//header('Location: thank-you.html');
 */
// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>
