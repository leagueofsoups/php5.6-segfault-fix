#!/bin/bash

echo "Zend/tests/bug47353.phpt"
REQUEST_METHOD=GET SCRIPT_FILENAME="/test.php" SCRIPT_NAME="test.php" cgi-fcgi -bind -connect /var/run/php-fpm/listen.sock
exit 0

<?php
echo memory_get_usage(true);

ini_set('memory_limit','40M');
echo ":".ini_get('memory_limit')."\n";
sleep(4);

register_shutdown_function(function() {
    new stdClass;
});
$ary = [];
while (true) {
    echo memory_get_usage()."\n";
    $ary[] = new stdClass;
   echo memory_get_usage(true);
}

?>
