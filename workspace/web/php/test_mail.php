<?php
// The message
$message = "It was a success!  Hooray!\nHoorizzle Fo shizzle!";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send
mail('statemachinetech@gmail.com', 'Test Email!', $message);
?>