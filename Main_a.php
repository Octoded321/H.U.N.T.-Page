<?php  
$db = mysqli_connect('localhost','root','','h.u.n.tdb');

if(mysqli_connect_errno())
{
    echo 'Помилка підулючення ('. mysqli_connect_errno().'):'. mysqli_connect_error();
    exit();
}
function get_categories(){

    global $db;

$sql = "SELECT * FROM categories";







$Result = mysqli_query($db,$sql);
$categories =   mysqli_fetch_all($Result,MYSQLI_ASSOC);

return $categories;

}
function get_page(){

    global $db;

$sql = "SELECT * FROM pages";

$Result = mysqli_query($db,$sql);

$pages = mysqli_fetch_all($Result,MYSQLI_ASSOC);

return $pages;
}


function get_posts(){

    global $db;

$sql = "SELECT * FROM posts";

$Result = mysqli_query($db,$sql);

$posts = mysqli_fetch_all($Result,MYSQLI_ASSOC);

return $posts;
}

$pages = get_page();
$categories = get_categories();
$posts = get_posts()
//var_dump($categories);
// background-image: url(back.jpg);
?>



<html style='background:#975E5E; '>
<head>
<label style = ' display: flex;justify-content: center; font-size:36'>H.U.N.T._ADMIN</label><br>
</head>
<div style=' display: flex;  background:gray;    flex-wrap: nowrap; justify-content: center;'>
<input type ="submit" value ="Map" >
<input type ="submit" value ="Agence" >
<input type ="submit" value ="Monsters" >
<input type ="submit" value ="Weapons" >
<input type ="submit" value ="Abilites" >
<input type ="submit" value ="History" >
<form action = "Edit.php", method = "post">
<input type ="submit" value ="EDIT" >
</form>
<form action = "ToBAN.php", method = "post">
<input type ="submit" value ="BAN - UNBAN" >
</form>
</div>

<?php   foreach($posts as $post):?>
<div class="container" style='display: flex;     flex-wrap: nowrap; justify-content: center;'>
<img src="<?=$post['img'] ?>" style='width:150px; height:150px;'>

    <div id="img" style=' display: flex; width: 300px;   top: 100px; left:100px; border: 1px solid black; justify-content: center; flex-direction: column;'>
    <label style = 'border: 1px solid black;'><?=$post['title'] ?><br>
        <div style=' display: flex; width: 300px; justify-content: center; flex-direction: column; flex-grow:1;' > 
        <label ><?=$post['s_dicripthion'] ?></label><br>
        <input type ="submit" value ="Деталніше"  style=' display: flex; '>

        </div>
    </div>
</div>

<div style=' display: flex;     flex-wrap: nowrap; justify-content: center;  height: 100px; '>
        <div style=' display: flex; width: 300px;   top: 100px; left:100px; border: 1px solid black; justify-content: center; flex-direction: column;'>
        <label >Коментари</label><br>
            <input type = "text" name ="s_discribe" placeholder = "Short Discribe" >
            <label >Список коментариев</label><br>
        </div>
</div>
<?php endforeach;?>