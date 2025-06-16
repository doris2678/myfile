<?php
$upload_dir="./upload_files/";
for ($i=0; $i <=2 ; $i++) { 
  if (($_FILES["myfile"]["name"][$i]) != "") {
     $upload_file = $upload_dir.$_FILES["myfile"]["name"][$i];
     move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$upload_file);
     echo "檔案名稱:".$_FILES["myfile"]["tmp_name"][$i]."<br>";    
  }
    
}


?>