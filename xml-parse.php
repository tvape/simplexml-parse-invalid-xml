<?php

$url = 'https://example.com/rss.php';
$dom = new DOMDocument();
libxml_use_internal_errors(true);       // supressing errors
$dom->recover = true;                   // Enables recovery mode, i.e. trying to parse non-well formed documents. @see https://www.php.net/manual/en/class.domdocument.php#domdocument.props.recover
$dom->load($url);
$xml = $dom->saveXML();
$parsedXML = simplexml_load_string($xml);

if ($parsedXML !== false) {
  // do some stuff
  // ...
} else {
  $errors = libxml_get_errors(); // process errors
}
