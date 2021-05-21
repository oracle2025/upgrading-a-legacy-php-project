<?
exec("php -S localhost:8080 > php-server.log 2>&1 & echo $! >> php-server.pid");

$pid = (int)file_get_contents("php-server.pid");

$contents = file_get_contents("http://127.0.0.1:8080/hello.php");

echo "Contents: ".$contents."\n";
echo "PID: ".$pid."\n";

posix_kill($pid, 15);
?>