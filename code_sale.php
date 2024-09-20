<?PHP 
echo "Hello";
echo "start get content";
// file_get_contents('/web-serveur/ch13/index.php');
$file = file_get_contents('http://challenge01.root-me.org/web-serveur/ch13/index.php');
echo $file;
echo "end get content";
?>
