<?php

/*

chunk_split — Split a string into smaller chunks
chunk_split(string $string, int $length = 76, string $separator = "\r\n"): string


string
The string to be chunked.

length
The chunk length.

separator
The line ending sequence.

*/

// Original string
$string = '1234';

// Split the string into chunks of two characters, separated by a colon
$chunkedString = substr(chunk_split($string, 2, ':'), 0, -1);

// Display the result
echo "Original String: $string\n";
echo "Formatted String: $chunkedString\n";
