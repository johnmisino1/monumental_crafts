<?php

require "functions.php";

if($_POST) 
{
    try
    {
	$name = "";
	$regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/"; 
	$email = $_POST["email"];
	$errors = 0;
		
	echo "<b>";
		
	if(!preg_match($regex, $email ))
	{
	    $error = "Invalid email address entered";
	    $errors = 1;
	}
	
	if($errors == 1) 
	{
	    echo $error;
	}
	else
	{
	    $values = array ("name","email", "company", "message");
	    $required = array("name","email", "message");
			
	    $from_name = "Support";
	    $from_email = "support@monumentalcrafts.net";			
			
	    $reply_to_name = "Webmaster";
	    $reply_to_email = "webmaster@monumentalcrafts.net";			
			
            $to_email = getFileText("../text/contact/email.txt");

	    $email_subject = $_POST["subject"];
	    $email_content = "";
			
	    foreach($values as $key => $value)
	    {
		if(in_array($value,$required))
		{
		    if( empty($_POST[$value]) ) 
		    { 
			$error = "PLEASE FILL IN REQUIRED FIELDS"; 
                        $errors = 1;
                        break;
		    }				
		}

		if($value == "name")
		{
		    $name = $_POST[$value];	
		}

		$email_content .= ucfirst($value) . ": $_POST[$value]\n\n";
	    }

            if($errors == 0)
            {			
	        $headers = "From: $from_name <$from_email> \r\n" .
			  	    "Reply-To: $reply_to_name <$reply_to_email> \r\n" .
				    "X-Mailer: PHP/" . phpversion();

                if(@mail($to_email, $email_subject, $email_content, $headers)) 
	        {
		    echo "Message sent!"; 
	        } 
	        else 
	        {
		    echo "ERROR!";
	        }
            }
            else
            {
                echo $error;
            }
	}
    }
    catch(Exception $e)
    {
	echo "ERROR! " . $e->getMessage();
    }
	
    echo "</b>";
}
?>							
