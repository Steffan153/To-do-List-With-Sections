<link rel="stylesheet" href="css.css"/>
<?php
if(isset($_GET['dir'])) {
$dir = $_GET['dir'];

function deleteDir($dir) {
system("rm -rf " . escapeshellarg($dir));
}
deleteDir($dir);
/*if(!is_dir($dir)) echo 'Section deleted sucessfully! <br><br><br><a href="view-sections.php">View Sections</a>';
else echo 'Error';*/
header('Location: view-sections.php');

} else {
echo<<<HTML
<form method=GET>
Section to delete: <br><br>
<select name=dir>
HTML;

$dir = "./";
$GLOBLALS['files'] = array();
// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			if((filetype($dir . $file) == 'dir') && ($file !== '.' and $file !== '..')) {
            	$GLOBLALS['files'][] = $file;
			}
        }
        closedir($dh);
    }
}
sort($GLOBLALS['files']);
foreach($GLOBLALS['files'] as $cDir) {
  echo "<option value=\"$cDir\">$cDir</option>\n";
}
echo<<<HTML
</select>
<br><br>
<input type=submit value=Submit><input type=reset value="Reset Values">
</form>
HTML;
}
include 'footer.php';
?>
