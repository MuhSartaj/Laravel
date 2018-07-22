<?php
//print_r(system('php artisan migrate'));
//echo shell_exec('php artisan migrate');
$output = shell_exec('php artisan migrate');
echo "<pre>$output</pre>";
?>