<link rel="stylesheet" href="css.css"/>
<?php
if(isset($_GET['dir'])) {
$dir = $_GET['dir'];

function makeDir($dir) {
mkdir($dir);
}
makeDir($dir);

function copyFile($old, $new) {
copy($old, $new);
}

# copyFile('delete-section.php', $dir . '/delete-section.php');
copyFile('add.php', $dir . '/add.php');
copyFile('delete.php', $dir . '/delete.php');
copyFile('css.css', $dir . '/css.css');
copyFile('view-sections.php', $dir . '/view-sections.php');
copyFile('add-section.php', $dir . '/add-section.php');
copyFile('delete-sections.php', $dir . '/delete-sections.php');
copyFile('index.php', $dir . '/index.php');
copyFile('mark-as-done.php', $dir . '/mark-as-done.php');
copyFile('footer.php', $dir . '/footer.php');
copyFile('sweetalert.min.js', $dir . '/sweetalert.min.js');
copyFile('sweetalert.css', $dir . '/sweetalert.css');

header('Location: view-sections.php');

} else {
echo<<<HTML
<form method=GET>
New Section: <input name="dir" size=10><br><br>
<input type="submit" value="Submit"><input type="reset" value="Reset Values">
</form>
HTML;
}
include 'footer.php';
?>
