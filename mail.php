<?php
$to = "cma@dadl.dk";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "webmaster@dadl.dk";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?> 
