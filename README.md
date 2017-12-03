# "XorEncrypt" 
 XorEncrypt is a little php class that uses
 the XOR logic gate to encrypt and decrypt string
 Created by Steve Nosse @Bigking237
 How to use ?
 Exemple Code : 

<?php
	require ('path/to/XorEncrypt.php');
	$string = "my_string";

	$key = "my special key"; // the encryptionkey

	$enc = new XorEncrypt;
	$encrypted_string = $enc->encrypt($string, $key); //encrypt the given string
	$decrypted_string = $enc->decrypt($encrypted_string, $key); // decrypt the encrypted string

	echo $encrypted_string.'\n';
	echo $decrypted_string.'\n';
?>
