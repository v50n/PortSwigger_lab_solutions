<?PHP 
echo "Hello";
// file_get_contents('/web-serveur/ch13/index.php');
$file = file_get_contents('http://challenge01.root-me.org/web-serveur/ch13/config.php');
echo "\n content file";
echo $file;
?>
