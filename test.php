<?
exec("php -S localhost:8080 > php-server.log 2>&1 & echo $! >> php-server.pid");
sleep(1);
$pid = (int)file_get_contents("php-server.pid");
$contents = file_get_contents("http://127.0.0.1:8080/hello.php");
assert($contents=="Hello World\n");
posix_kill($pid, 15);
?>