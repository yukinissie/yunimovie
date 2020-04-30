<?php

shell_exec('/usr/local/bin/php /var/www/html/test/converter/convert.php &');
header('Location: complete.php');