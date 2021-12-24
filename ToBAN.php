

<?php 
$User = $_POST["User_name"];
echo $User;
$db = mysqli_connect('localhost','root','','h.u.n.tdb');
if(isset($_POST['Ban'])){
    
    $sql = "UPDATE  users SET BAN = 1 WHERE users.Name = '$User'";
    $db->query($sql);
    


}
if(isset($_POST['UnBan'])){
    $sql = "UPDATE  users SET BAN = 0 WHERE users.Name = '$User'";
    $db->query($sql);
    
}

var_dump($_POST['User_name']);
?>
<html style='background:#975E5E'>
<h1  style = ' display: flex;justify-content: center; font-size:36'> Ban or Unban form </h1><br>
<body>
<form action = "", method = "post">
<div style=' display: flex; width: 300px;    border: 1px solid black; justify-content: center; '> Name of the user<br>
<input type = "text" name ="User_name" placeholder = ""><br>
</div>

<input type ="submit" name = "Ban" value ="Забанити"  style=' display: flex; '>
<input type ="submit" name = "UnBan" value ="Розбанити"  style=' display: flex; '>-->
</form>
<form action = "Main.php", method = "post">
<input type ="submit" name = "Back" value ="Повернутись до головної сторінки"  style=' display: flex; '>
</form>
