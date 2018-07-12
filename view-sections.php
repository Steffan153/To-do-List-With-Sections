<link rel="stylesheet" href="css/sweetalert.css" />
<script src="sweetalert.min.js"></script>
<style>
.swal-button--cancel {background: #26FF26 !important}
</style>
<script>
function confirmDelete(n) {
  swal({
    text: ('Are you sure you want to delete ' + n + '?'),
    icon: 'warning',
    dangerMode: true,
    buttons: ['No', 'Yes']
  }).then((ifYes) => {
     if(ifYes) {
       window.location='delete-sections.php?dir=' + n;
     }
  });
}
function addSec() {
  swal({
    content: 'input',
    text: 'Your section name:',
    buttons: true
  }).then((val) => {
    if(val !== '' && val !== null) window.location='add-section.php?dir=' + val;
  });
}
</script>
<link rel="stylesheet" href="css/css.css"/>
<?php
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
  echo "<a href=\"$cDir\">$cDir</a><button onclick=\"confirmDelete('$cDir')\"><font style='font-size:15px'  color=red>&times;</font></button><br><br>\n";
}
?>
<br><br>
<button onclick="addSec()">Add a Section</button>
<?php include 'footer.php'; ?>

