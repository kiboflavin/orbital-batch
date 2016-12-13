
# PHP Chase Paymentech Orbital Batch XML library

```php

$cust = array(
	'ccAccountNum'		=> '341134113411347',
	'ccExp'				=> '0120',
	'avsAddress1'		=> '123 Fake Street',
    'avsAddress2'       => 'Hammock District',
	'avsCity'			=> 'Springfield',
	'avsState'			=> 'MA',
	'avsZip'			=> '01101',
    'amount'            => '1000'
);

$request = new \OrbitalBatch\Request(
	'gh-test',
	ORBITAL_USERNAME, 
	ORBITAL_INDTYPE,
	ORBITAL_BIN,
	ORBITAL_MERCHANT_ID,
	ORBITAL_TERMINAL_ID
);

$request->auth_capture($cust);

$xml = $request->createBatch();

file_put_contents($request->fileID. '.xml', $xml);
```
