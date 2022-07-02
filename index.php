

<html>
<script>
if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}</script>
<style>
html{padding:80 260 80 280;}
form{display:inline-block;}
*{font-size:16pt;line-height:48px;}</style>
<?php

if($_GET['view']!=''){echo '<html><title>'.$_GET['view'].'</title><style>iframe{width:100%;height:100%;border:0;}</style><iframe src="html/'.$_GET['view'].'.html"></iframe></html>'; die();}

echo "MS Word<br>";
foreach (glob("*.*") as $filename) {
if(substr($filename,-5)=='.docx'){
    echo "<a href=\"$filename\">$filename</a>　" . ceil(filesize($filename)/1024) . "KB<br>";
}
}
?>
<title>My Documents</title><?php
echo "<br><hr><br>HTML<br>";
foreach (glob("html/*.*") as $filename) {
$filename=substr($filename,5,strlen($filename)-5);
if(substr($filename,-5)=='.html'){
    $fns=substr($filename,0,strlen($filename)-5);
    echo "<a href=\"html/$filename\">$filename</a>　" . ceil(filesize("html/".$filename)/1024) . "KB　　";
    echo "<form action=\"index.php?view=".$fns."\" method='post'><input type=\"submit\" value=\"View in Web for PC\"></form><br>";

}
}

echo "<br><hr><br>Others<br>";
foreach (glob("*.*") as $filename) {
if(substr($filename,-5)!='.html' && substr($filename,-5)!='.docx'){
    echo "<a href=\"$filename\">$filename</a>　" . ceil(filesize($filename)/1024) . "KB<br>";
}
}

echo "<br><hr><br>";




$target_dir = "./";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$e_flag = 0;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($target_file == "./"){
// no file selected.
    $e_flag = 1;
}
else if (file_exists($target_file)) {
// file existed.
  $e_flag = 2;
}



if ($e_flag != 0) {
  echo "Error Code: ".$e_flag."<br><br>";
// if everything is ok, try to upload file
}
else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
  }
else {
    echo "Error occured...";
  }
}
?>
<form action method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
  <input type="submit" value="Upload Image" name="submit">
</form>
</html>

<?php
?>