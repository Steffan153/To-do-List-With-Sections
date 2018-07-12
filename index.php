<link rel="stylesheet" href="css/sweetalert.css" />
<script src="sweetalert.min.js"></script>
<style>
.swal-button--cancel {background: #26FF26 !important}
.swal-overlay {
  background-color: rgba(86, 92, 112, 0.7);
}
</style>
<script>
function confirmDelete(n,k) {
  swal({
    text: ('Are you sure you want to delete ' + k + '?'),
    icon: 'warning',
    dangerMode: true,
    buttons: ['No', 'Yes']
  }).then((ifYes) => {
     if(ifYes) {
       window.location='delete.php?name=' + n;
     }
  });
}
</script>
<link rel="stylesheet" href="css/css.css" />
Sort By: <br><br><table style="postion: absolute; display: block; border: 2px solid bluem; margin-bottom: 20px" cellspacing=0 cellpadding=20>
<tr>
<td style="border: 2px solid blue"><a href="?sort=all">Show All</a></td>
<td style="border: 2px solid blue"><a href="?sort=vimp">Very Important</a></td>
<td style="border: 2px solid blue"><a href="?sort=imp">Important</a></td>
<td style="border: 2px solid blue"><a href="?sort=med">Medium</a></td>
<td style="border: 2px solid blue"><a href="?sort=nimp">Not Important</a></td>
</tr></table>
<?php
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
ini_set('track_errors', 'On');
if(isset($_COOKIE['tasks'])) {
foreach($_COOKIE['tasks'] as $key => $val) {
if($key == '__lfcc') continue;
else {
$k = $key;
$name = str_replace('_', '+', $key);
$name = str_replace("'", "\'", $name);
$key = str_replace('_', ' ', $key);
$key2 = str_replace('\'', "\'", $key);
$cook = explode('|', $val);
$cook[0]=str_replace("'", "\'", $cook[0]);
if(!isset($_GET['sort']) or $_GET['sort'] == 'all') {

if(preg_match('/Not Important/i', $cook[0])) echo '<button style="background: green" onclick="swal(\'' . $key2 . "', '{$cook[0]}')\">$key - Expires: " . date('Y-m-d - h:i:s A', ($cook[1])-3600) . "</button><button onclick=\"confirmDelete('$name', '$key2')\"><font style='font-size:15px'  color=red>&times;</font></button><br>\n";

elseif(preg_match('/Medium/i', $cook[0])) echo '<button style="background: yellow; color: blue" onclick="swal(\'' . $key2 . "', '{$cook[0]}')\">$key - Expires: " . date('Y-m-d - h:i:s A', ($cook[1])-3600) . "</button><button onclick=\"confirmDelete('$name', '$key2')\"><font style='font-size:15px'  color=red>&times;</font></button><br>\n";

elseif(preg_match('/Very Important/i', $cook[0])) echo '<button style="background: red" onclick="swal(\'' . $key2 . "', '{$cook[0]}')\">$key - Expires: " . date('Y-m-d - h:i:s A', ($cook[1])-3600) . "</button><button onclick=\"confirmDelete('$name', '$key2')\"><font style='font-size:15px'  color=red>&times;</font></button><br>\n";

elseif(preg_match('/Important/i', $cook[0])) echo '<button style="background: orange; color: blue" onclick="swal(\'' . $key2 . "', '{$cook[0]}')\">$key - Expires: " . date('Y-m-d - h:i:s A', ($cook[1])-3600) . "</button><button onclick=\"confirmDelete('$name', '$key2')\"><font style='font-size:15px'  color=red>&times;</font></button><br>\n";
}

elseif($_GET['sort'] == 'nimp') {
  if(preg_match('/Not Important/i', $cook[0]) and !preg_match('/Done/i', $cook[0])) echo '<button style="background: green" onclick="swal(\'' . $key2 . "', '{$cook[0]}')\">$key - Expires: " . date('Y-m-d - h:i:s A', ($cook[1])-3600) . "</button><button onclick=\"confirmDelete('$name', '$key2')\"><font style='font-size:15px'  color=red>&times;</font></button><br>\n";
}

elseif($_GET['sort'] == 'med') {
  if(preg_match('/Medium/i', $cook[0]) and !preg_match('/Done/i', $cook[0])) echo '<button style="background: yellow; color: blue" onclick="swal(\'' . $key2 . "', '{$cook[0]}')\">$key - Expires: " . date('Y-m-d - h:i:s A', ($cook[1])-3600) . "</button><button onclick=\"confirmDelete('$name', '$key2')\"><font style='font-size:15px'  color=red>&times;</font></button><br>\n";
}

elseif($_GET['sort'] == 'vimp') {
  if(preg_match('/Very Important/i', $cook[0]) and !preg_match('/Done/i', $cook[0])) echo '<button style="background: red" onclick="swal(\'' . $key2 . "', '{$cook[0]}')\">$key - Expires: " . date('Y-m-d - h:i:s A', ($cook[1])-3600) . "</button><button onclick=\"confirmDelete('$name', '$key2')\"><font style='font-size:15px'  color=red>&times;</font></button><br>\n";
}

elseif($_GET['sort'] == 'imp') {
  if(preg_match('/Important/i', $cook[0]) and !preg_match('/Very Important/i', $cook[0]) and !preg_match('/Not Important/i', $cook[0]) and !preg_match('/Done/i', $cook[0])) echo '<button style="background: orange; color: blue" onclick="swal(\'' . $key2 . "', '{$cook[0]}')\">$key - Expires: " . date('Y-m-d - h:i:s A', ($cook[1])-3600) . "</button><button onclick=\"confirmDelete('$name', '$key2')\"><font style='font-size:15px'  color=red>&times;</font></button><br>\n";
}
}
}
} else echo 'No tasks found.';
?>
<br><br><br><table style="padding: 7px; border-style: solid; border-width: 4px 4px 4px 4px; color:black; border-color: blue" cellspacing=0 cellpadding=7>
<tr><td><div style="background: red; height: 15px; width: 13px;float:left"></div> &nbsp; Very Important</td></tr>
<tr><td><div style="background: orange; height: 15px; width: 13px;float:left"></div> &nbsp; Important</td></tr>
<tr><td><div style="background: yellow; height: 15px; width: 13px;float:left"></div> &nbsp; Medium</td></tr>
<tr><td><div style="background: green; height: 15px; width: 13px;float:left"></div> &nbsp; Not Important</td></tr>
</table>
<?php
echo '<br><br>';
echo '<a href=delete.php>Delete one</a><br><br><br>';
echo '<a href=add.php>Add one</a><br><br><br>';

include 'footer.php';

?>
