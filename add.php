<link rel="stylesheet" href="css.css" />
<?php
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('track_errors', 'On');
if(isset($_POST['expire'])) $expire = $_POST['expire'];
if(isset($_POST['priority'])) $priority = $_POST['priority'];
if(isset($_POST['mhwm'])) $mhwm = $_POST['mhwm'];
if(isset($_POST['taskName'])) $tasNam = $_POST['taskName'];
if(isset($_POST['task'])) {
$task = $_POST['task'];

$tasNam = str_replace(' ', '+', $tasNam);
    if($mhwm == 'mins')$expiry = $expire * 60;
elseif($mhwm == 'hrs' )$expiry = ($expire * 60) * 60;
elseif($mhwm == 'days')$expiry = (($expire * 60) * 60) * 24;
elseif($mhwm == 'wks' )$expiry = ((($expire * 60) * 60) * 24) * 7;
else                   $expiry = ((($expire * 60) * 60) * 24) * 30;
$expiry = time()+$expiry;
	if($priority == 'low')    setcookie('tasks[' . $tasNam . ']', "$task - Not Important|$expiry", $expiry);
elseif($priority == 'medium') setcookie('tasks[' . $tasNam . ']', "$task - Medium|$expiry", $expiry);
elseif($priority == 'high')   setcookie('tasks[' . $tasNam . ']', "$task - Important|$expiry", $expiry);
else						  setcookie('tasks[' . $tasNam . ']', "$task - Very Important|$expiry", $expiry);
if(isset($_COOKIE['tasks'][$tasNam])) echo '<span class="text">Task created sucsessfully! </span><a href="index.php">View tasks</a> <a href="delete.php">Delete a task</a>';
else echo '<span class="text">Task created sucsessfully! </span><a href="index.php">View tasks</a> <a href="delete.php">Delete a task</a>';
header('Location: index.php');
} else {
echo<<<HTML
<form method=post>
<span class='text'>Task Name: </span><input name="taskName" spellcheck="true" size=10><br>
<span class='text'>Task Description: </span><input name="task" spellcheck="true" size=20><br>
<span class='text'>Expires in: </span><input type="number" id="expire" name="expire" size=5> 
<select name="mhwm">
<option value="mins" selected>Minutes</option>
<option value="hrs">Hours</option>
<option value="days">Days</option>
<option value="wks">Weeks</option>
<option value="mns">Months</option>
</select><br>
Priority: 
<select name="priority">
<option value="low">Not Important</option>
<option value="medium">Medium</option>
<option value="high">Important</option>
<option value="vhigh">Very Important</option>
</select>
<br><br>
<input type=submit value=Add><input type=reset value="Clear & Reset Values">
</form>
HTML;
}
include 'footer.php';
?>
