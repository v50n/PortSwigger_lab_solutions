<?PHP 
echo "Hello";
// file_get_contents('/web-serveur/ch13/index.php');
$index = file_get_contents('http://challenge01.root-me.org/web-serveur/ch13/');
echo "\n content file";
echo $index;
?>
