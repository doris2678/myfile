<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳檔案機制
 * 3.取得檔案資源
 * 4.取得檔案內容
 * 5.建立SQL語法
 * 6.寫入資料庫
 * 7.結束檔案
 */
include_once "db2.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文字檔案匯入</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">文字檔案匯入練習</h1>
<!---建立檔案上傳機制--->
<form action="?" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file">
    <input type="submit" value="上傳">
</form>


<!----讀出匯入完成的資料----->
<style>
#vote {
    width: 70%;
    margin: 30px auto;
    border-collapse: collapse;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    background: #fff;
}
#vote th, #vote td {
    border: 1px solid #ccc;
    padding: 10px 16px;
    text-align: center;
}
#vote th {
    background: #f5f5f5;
    font-weight: bold;
    color: #333;
}
#vote tr:nth-child(even) {
    background: #fafafa;
}
</style>

<?php
//"\xEF\xBB\xBF"
if(!empty($_FILES['file']['tmp_name'])){
    move_uploaded_file($_FILES['file']['tmp_name'], './'.$_FILES['file']['name']);
    $file=fopen("./".$_FILES['file']['name'], "r") or die("無法開啟檔案");
    $cols=fgetcsv($file);
    //echo "<table id='vote'>";
    //echo "<tr>";
    foreach($cols as $key=>$value){
        $cols[$key]=str_replace("\xEF\xBB\xBF","",$value);
      //  echo "<th>".$value."</th>";
    }
    //echo "</tr>";
    while(!feof($file)){
        $data=fgetcsv($file);
        if(!empty($data)){
       /*      echo "<tr>";
            foreach($data as $key=>$value){
                echo "<td>".$value."</td>";
            }
            echo "</tr>"; */
            $save=array_combine($cols,$data);
            $Vote->save($save);
        }
        //print_r($cols);
        //print_r($data);
    }

    //echo "</table>";
    echo "匯入完成";

}

?>

<form action="?" method="post" style="display:flex;flex-wrap:wrap;justify-content:space-around;width:60%;margin:30px auto;">

<div style="width:33%;">
    <label for="省市">省市</label>

    <select name="省市" id="省市">
        <?php 
        echo "<option value=''>請選擇</option>";
        $rows=q("SELECT `省市代碼` FROM `p16` group by `省市代碼`");
        foreach($rows as $row){
            echo "<option value='".$row['省市代碼']."'>".$row['省市代碼']."</option>";
        }   

?>
    </select>
    
</div>
<div style="width:33%;">
    <label for="縣市">縣市</label>
    <select name="縣市" id="縣市">
        <?php 
        echo "<option value=''>請選擇</option>";
        $rows=q("SELECT `縣市代碼` FROM `p16` group by `縣市代碼`");
        foreach($rows as $row){
            echo "<option value='".$row['縣市代碼']."'>".$row['縣市代碼']."</option>";
        }   

?>
    </select>
</div>
<div style="width:33%;">
    <label for="鄉鎮">鄉鎮</label>
    <select name="鄉鎮" id="鄉鎮">
        <?php 
        $rows=q("SELECT `鄉鎮市區代碼` FROM `p16` group by `鄉鎮市區代碼`");
        echo "<option value=''>請選擇</option>";
        foreach($rows as $row){
            echo "<option value='".$row['鄉鎮市區代碼']."'>".$row['鄉鎮市區代碼']."</option>";
        }   

        ?>
    </select>
</div>

<div style='width:100%;text-align:center;'>
    <input type="submit" value="查詢">
</div>
</form>
<?php
if(!empty($_POST)){
    $where=[];
    foreach($_POST as $key=>$value){
        if(!empty($value)){
            switch($key){
                case "省市":
                    $where['省市代碼']=$value;
                break;
                case "縣市":
                    $where['縣市代碼']=$value;
                break;
                case "鄉鎮":
                    $where['鄉鎮市區代碼']=$value;
                break;
            }
        }
    }
    $rows=$Vote->all($where);
    echo "<h3 style='text-align:center;'>查詢結果</h3>";
    echo "<p style='text-align:center;'>共有".count($rows)."筆資料</p>";

    $fp=fopen("export.csv","w");
    fwrite($fp,"\xEF\xBB\xBF"); //寫入BOM
    
    //輸出欄位名稱
    fputcsv($fp,array_keys($rows[0]));
    //輸出內容
    foreach($rows as $row){
        fputcsv($fp,$row);
    }
    fclose($fp);

    echo "<a href='export.csv' style='display:block;text-align:center;' download>匯出CSV</a>";
    echo "<table id='vote'>";
    echo "<tr>";
    //取出第一筆資料的欄位名稱
    foreach(array_keys($rows[0]) as $key){
        echo "<th>".$key."</th>";
    }
    echo "</tr>";
    foreach($rows as $row){
        echo "<tr>";
        foreach($row as $key=>$value){
            echo "<td>".$value."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

?>

</body>
</html>