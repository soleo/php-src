--TEST--
Bug #37595 (mcrypt_generic calculates data length in wrong way)
--SKIPIF--
<?php if (!extension_loaded("mcrypt")) print "skip"; ?>
--FILE--
<?php

$cipher_alg = MCRYPT_BLOWFISH;
$skey = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
$key='';
foreach($skey as $t) {
	    $key .= chr($t);
		}
 
$sstr = array(1,2,3,4,5,6,7,8);
$iv='';
foreach($sstr as $s) {
    $iv .= chr($s);
}
 
$str = "12345678";
 
$td = mcrypt_module_open(MCRYPT_BLOWFISH,'',MCRYPT_MODE_CBC,'');
 
$data = Array(
	'12345678',
	'123456789',
	"\x001234567",
	'',
	'1234567812345678',
	'12345678123456789'
	);

foreach ($data as $val) {
	mcrypt_generic_init($td, $key, $iv);
	$enc = mcrypt_generic($td, $val);
	
	mcrypt_generic_deinit($td);
	
	mcrypt_generic_init($td, $key, $iv);
	var_dump($dec = @mdecrypt_generic($td, $enc));
}

mcrypt_module_close($td);

echo "Done\n";
?>
--EXPECTF--	
Deprecated: Function mcrypt_module_open() is deprecated in %s%ebug37595.php on line 18

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 30

Deprecated: Function mcrypt_generic() is deprecated in %s%ebug37595.php on line 31

Deprecated: Function mcrypt_generic_deinit() is deprecated in %s%ebug37595.php on line 33

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 35
string(8) "12345678"

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 30

Deprecated: Function mcrypt_generic() is deprecated in %s%ebug37595.php on line 31

Deprecated: Function mcrypt_generic_deinit() is deprecated in %s%ebug37595.php on line 33

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 35
string(16) "123456789       "

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 30

Deprecated: Function mcrypt_generic() is deprecated in %s%ebug37595.php on line 31

Deprecated: Function mcrypt_generic_deinit() is deprecated in %s%ebug37595.php on line 33

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 35
string(8) " 1234567"

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 30

Deprecated: Function mcrypt_generic() is deprecated in %s%ebug37595.php on line 31

Warning: mcrypt_generic(): An empty string was passed in %s%ebug37595.php on line 31

Deprecated: Function mcrypt_generic_deinit() is deprecated in %s%ebug37595.php on line 33

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 35
bool(false)

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 30

Deprecated: Function mcrypt_generic() is deprecated in %s%ebug37595.php on line 31

Deprecated: Function mcrypt_generic_deinit() is deprecated in %s%ebug37595.php on line 33

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 35
string(16) "1234567812345678"

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 30

Deprecated: Function mcrypt_generic() is deprecated in %s%ebug37595.php on line 31

Deprecated: Function mcrypt_generic_deinit() is deprecated in %s%ebug37595.php on line 33

Deprecated: Function mcrypt_generic_init() is deprecated in %s%ebug37595.php on line 35
string(24) "12345678123456789       "

Deprecated: Function mcrypt_module_close() is deprecated in %s%ebug37595.php on line 39
Done
