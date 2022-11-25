<?php 
/* 
 * This is - PayPal and database configuration -  
*/ 
  
// PayPal configuration 
define('PAYPAL_ID', 'sb-l2gvw10532253@business.example.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'https://fitmodus.thozhilmunaivor.com/user/paypal_success.php'); 
define('PAYPAL_CANCEL_URL', 'https://fitmodus.thozhilmunaivor.com/user/paypal_cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'https://fitmodus.thozhilmunaivor.com/user/paypal_ipn.php'); 
define('PAYPAL_CURRENCY', 'USD'); 

// Database configuration 
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'thozhilm_fitmodu'); 
define('DB_PASSWORD', 'Zahid@536'); 
define('DB_NAME', 'thozhilm_fit'); 

// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");

// [ b_boy@gmail.com ]

