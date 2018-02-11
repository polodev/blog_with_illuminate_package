<?php 


$email = 'polodev10@gmailcom';
echo preg_match("/.+@.+\..+/", $email) ? "hello" : "no hello";
