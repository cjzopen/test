<?php
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
// foreach ($_FILES["fileToUpload"]["name"] as $key => $value) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".<br>";
    $uploadOk = 1;
  } else {
    echo "File is not an image.<br>";
    $uploadOk = 0;
  }
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 3145728) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" && $imageFileType != "svg" ) {
    echo "Sorry, only JPG, JPEG, PNG , GIF, SVG files are allowed.<br>";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br/>";
      echo "檔案大小: " . ($_FILES["fileToUpload"]["size"] / 1024)." Kb<br />";
    } else {
      echo "Sorry, there was an error uploading your file.<br>";
    }
  }
// }
// -------------------------------------------------
  $uploadOk = 1;
  $path = realpath('../').$_POST['unc_path'];
  if(!empty($_FILES['uploaded_file'])){
    if(is_dir($path)){
      echo '<br />路徑已存在，沒有新增資料夾<br /><hr>';
    }else{
      mkdir($path);
      echo '<br />你新增了一個資料夾 '.$path.'<br /><hr>';
    }
    $total = count($_FILES['uploaded_file']['name']);
    for($i=0; $i<$total; $i++) {
      $path_file='';
      $path_file = $path . basename( $_FILES['uploaded_file']['name'][$i]);
      $temp = $_FILES['uploaded_file']['tmp_name'][$i];
      $imageFileType = pathinfo($path_file,PATHINFO_EXTENSION);
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" && $imageFileType != "svg" ) {
        echo "Sorry, only JPG, JPEG, PNG , GIF, SVG files are allowed.<br>";
        $uploadOk = 0;
      }
      if (file_exists($path_file)) {
        echo "*你覆蓋了一個同名的檔案<br>";
      }
      if ($_FILES["uploaded_file"]["size"][$i] > 3145728) {
        echo "檔案大小超過 3 Mb<br>";
        $uploadOk = 0;
      }
      if($uploadOk !== 0){
      if(move_uploaded_file($temp, $path_file)) {
        echo "檔案 ".  basename( $_FILES['uploaded_file']['name'][$i]).
        " 上傳成功。<br> File size: " . ($_FILES["uploaded_file"]["size"][$i] / 1024)." Kb<br /><br><br>";
        } else{
          echo "在上傳圖片時發生錯誤，請再嘗試一次<br />";
        }
      }else{
      echo '<br>'.$_FILES['uploaded_file']['name'][$i].' 這個檔案在上傳時被擋下<br>';
      }
    }
  }
  exit;
}
// if (isset($_POST['submitted'])) {
//   if ($_FILES["file"]["error"] > 0){
// 　　echo "Error: " . $_FILES["file"]["error"];
// 　}else{
// 　　echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
// 　　echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
// 　　echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
// 　　echo "暫存名稱: " . $_FILES["file"]["tmp_name"];
// 　　move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);　//移動檔案
// 　}
// }else{
//   echo '';
// }


?>