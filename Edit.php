<?php
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 360)){
    session_unset();
    session_destroy(); 
    echo "Час вийшов. Перезайдіть будь ласка.";
 exit;

}

$db = mysqli_connect('localhost','root','','h.u.n.tdb');

 function Add_to_Table(){
      $Title = $_POST['news_name'];
      $Img =$_POST['img'];
      $S_D = $_POST['s_discribe'];
      $F_D = $_POST['f_discribe'];
      $Teg = $_POST['teg'];


 global $db;    
 $sql = "INSERT INTO pages (id, title, img, s_dicripthion, teg, f_disctpthion) VALUES (NULL,'$Title', '$Img', '$S_D','$Teg', '$F_D')";


if (mysqli_query($db,$sql)){
    echo "New reord edit";
   
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}



return ;
 }
 if(isset($_POST['restart'])){
    session_destroy(); 
 }

if(isset($_POST["save"])){
//  $Title = $_POST["news_name"];
//  $Img =$_POST["img"];
//  $S_D = $_POST["s_discribe"];
//  $F_D = $_POST["f_discribe"];
 
 if(($_POST['teg']=='M')){
    $Teg = "M";
    }
    if(($_POST['teg']=='W')){
        $Teg = "W";
        }
        if(($_POST['teg']=='S')){
            $Teg = "S";
            }
            if(($_POST['teg']=='N')){
                $Teg = "N";
                }
 $_SESSION['Title'] = $_POST['news_name'];
 $_SESSION['Img'] = $_POST['img'];
 $_SESSION['S_D'] = $_POST['s_discribe'];
 $_SESSION['Teg'] = $Teg;
 $_SESSION['F_D'] = $_POST['f_discribe'];
 Add_to_Table();
 header('Location: page.php'); 
}

?>
<html style='background:#975E5E'>
<head style = 'display: flex;justify-content: center;   border: 1px solid black;'>
<label style = 'display: flex;justify-content: center;  font-size:36; '> ADD and EDIT </label><br>
<form action = "", method = "post">
<input type = "text" name ="news_name" placeholder = "" style = ' display: flex;justify-content: center;  border: 1px solid black;  '><br>
</head>
<div style = ' display: flex;justify-content: center;  border: 1px solid black; flex-direction: column; '>
<div style = ' display: flex;justify-content: center;  border: 1px solid green;  height: 200px; '>Add image(URL) <br>
<input type = "text" name ="img" placeholder = "URL" style = ' display: flex;justify-content: center; border: 1px solid black;height: 200px; '><br>
</div><br>
<div style = ' display: flex;justify-content: center;  border: 1px solid yelow; height: 200px; '><br>
Short discription <br>
<input type = "text" name ="s_discribe" placeholder = "Short Discribe" style = ' display: flex;justify-content: center; border: 1px solid black;height: 200px; '><br>
<input type ="radio" name = "teg" value ="M" >M
<input type ="radio" name =  "teg" value ="W" >W
<input type ="radio" name = "teg" value ="S" >S
<input type ="radio" name = "teg" value ="N" >N<br>
</div><br>
<div style = ' display: flex;justify-content: center; border: 1px solid red; height: 200px; '>
Full Discription<br>
<input type = "text" name ="f_discribe" placeholder = "Full Discribe" style = ' display: flex;justify-content: center; border: 1px solid black;  '><br>
<input type ="submit" name ="save" value ="Save" style = 'display: flex;'><br>
<input type ="submit" name ="restart" value ="РЕЕЕЕЕ" style = 'display: flex;'><br>
</div>
</div>
</div>
<?php 
var_dump($_SESSION);
;
?>



