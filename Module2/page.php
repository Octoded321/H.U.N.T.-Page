<?php
$db = mysqli_connect('localhost','root','','h.u.n.tdb');
session_start();


if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 360)){
        session_unset();
        session_destroy(); 
		echo "Час вийшов. Перезайдіть будь ласка.";
	 exit;

    }
    $id = $_SESSION['ID'][strlen($_SESSION['ID'])-1];
    $sql = "SELECT * FROM pages WHERE id = $id";

    $Result = mysqli_query($db,$sql);
    
    $pages = mysqli_fetch_all($Result,MYSQLI_ASSOC);
    $_SESSION['Title'] = $pages[0]['title'];
     $_SESSION['Img'] = $pages[0]['img'];
    $_SESSION['S_D'] = $pages[0]['s_dicripthion'];
    $_SESSION['Teg'] = $pages[0]['teg'];
     $_SESSION['F_D'] = $pages[0]['f_disctpthion'];
    
echo $_SESSION['ID'][strlen($_SESSION['ID'])-1];
?>
<html style='background:#975E5E'>

<h1  style = ' display: flex;justify-content: center; font-size:36'> <?=$_SESSION['Title']?> </h1><br>
<body>
<div style=' display: flex; width: 300px;   top: 100px; left:100px; border: 1px solid black; justify-content: center; flex-direction: column;'><?=$_SESSION['Teg']?> <br>
<img src='<?=$_SESSION['Img'] ?>' style='width:150px; height:150px;'>
<?=$_SESSION['S_D']?><br>
</div>
<div style=' display: flex; width: 300px; justify-content: center; flex-direction: column; flex-grow:1;'>
<label ><?=$_SESSION['F_D']?></label>
<form action = "Main.php", method = "post">
<input type ="submit" name ="Tomain" value ="Назад до головної сторінки">
</form>