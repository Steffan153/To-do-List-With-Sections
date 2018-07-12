<link rel="stylesheet" href="css/css.css" />
<?php
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('track_errors', 'On');
if(isset($_GET['name'])) {
$name = $_GET['name'];

$name  = str_replace(' ', '+', $name);
$name2 = str_replace('+', '_', $name);
setcookie('tasks[' . $name2 . ']', '', time()-6048000000000);
setcookie('tasks[' . $name . ']', '', time()-6048000000000);
if(!isset($_COOKIE['tasks'][$name])) echo '<span class="text">Deleted sucessfully. </span><a href="index.php">View tasks</a>';
else echo '<span class="text">Deleted sucessfully. </span><a href="index.php">View tasks</a>';
header('Location: index.php');

} else {
?>
<?php
if(isset($_COOKIE['tasks'])) {
echo '<form method=GET>';
echo '<span class=\'text\'>Name of Task:</span>
<select name=name>';
foreach($_COOKIE['tasks'] as $name => $val) {
  $name2 = str_replace('_', ' ', $name);
  $name = str_replace('_', '+', $name);
  echo '<option value="' . $name . '">' . $name2 . '</option>' . "\n";
}
echo '</select>';
echo '<br><br>
<input type=submit value=Delete><input type=reset value="Reset Values">
</form>';
} else echo 'No tasks found.';
?>

<?php }
include 'footer.php'; ?>
