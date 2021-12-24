<?php

$db = mysqli_connect('localhost','root','','h.u.n.tdb');
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 360)){
        session_unset();
        session_destroy(); 
		echo "Час вийшов. Перезайдіть будь ласка.";
	 exit;

    }

$_SESSION['LAST_ACTIVITY'] = time();

$_SESSION['Login'] = $_POST['login'];
$_SESSION['Password'] = $_POST['password'];


?>
<form action = "Open.php", method = "post">
<input type = "text" name ="login" placeholder = "User">
<input type = "text" name ="password" placeholder = "Password">
<input type ="submit" >
</form>
<?php if(!isset ($_POST['login']))
	return;
$login = ["Leo","User","Test"];
//var_dump($_POST);

$query = "SELECT * FROM users WHERE Name = '". $_SESSION['Login']."' AND Password='".$_SESSION['Password']."'";
$result = $db->query($query);
    
    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
           $BAN = $row["BAN"];
         if($BAN == 1){
            echo "BANED";
            header('Location: page.php');
            
            return;

         }
        }
        
        


        $query = "SELECT Moderator From law WHERE Moderator= '". $_SESSION['Login']."' ";
        $result = $db->query($query);
            
            if ($result->num_rows > 0) {
             
                



                header('Location: Main_a.php');  
            } 
            else{
        header('Location: Main.php'); 
            } 
    } 
    else{
        echo "Користувача не иснує або пароль не правельний";
        print_r($_SESSION['Login']);
    
    }
    


// $Sql_admin = mysqli_query($db,"SELECT Moderator From law");
//    $password = [1111,1234,4321];
// $_SESSION['Login'] = $_POST['login'];
// $_SESSION['Password'] = $_POST['password'];

    
  
        // if ($Sql_admin == $_POST['login']){
        //     header('Location: Main_a.php');
        // }










?>