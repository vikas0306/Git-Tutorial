<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<!--
		Use the link for set the opnessle path in local system.
	 https://stackoverflow.com/questions/17272809/openssl-pkey-export-and-cannot-get-key-from-parameter-1 -->
	<?php
	// Create a private/public key pair
	  $config = array(
	      "digest_alg" => "sha512",
	      "private_key_bits" => 2048,
	      "private_key_type" => OPENSSL_KEYTYPE_RSA,
	  );
	  $resource = openssl_pkey_new($config);

	  // Extract private key from the pair
	  openssl_pkey_export($resource, $private_key);

	  // Extract public key from the pair
	  $key_details = openssl_pkey_get_details($resource);
	  $public_key = $key_details["key"];

	  $keys = array('private' => $private_key, 'public' => $public_key);
	  
	  echo "<pre>"; echo $keys['public']."<br>";

	  echo "<pre>"; echo $keys['private'];
?>
</body>
</html>