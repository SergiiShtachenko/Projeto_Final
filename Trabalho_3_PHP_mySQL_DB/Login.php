<?php
  //include ('config/init_p.php');
  //include ('database/usersList.php'); 

  
function checkLogin()
{
    include ('config/init_p.php');
    $username = ($_POST['user']);
    $password = ($_POST['password']);
    
    //testar se recebe
    echo $username;
    echo $password;
    //liga BD
    $stmt = $dblink->prepare('SELECT (email, palavrapasse) FROM utilizador WHERE email='$username' AND palavrapasse='$password');');
    
    $stmt->execute();

    return $stmt->fetchAll(); 
    //compara com BD
    while($row = $stmt->fetch()){
        $userPass = array($row['email'], $row['palavrapasse']);

        echo $userPass[0];
        echo $userPass[1];
        if ($userPass[0]==$username || $userPass[1]==$password){
            echo "Utilizador ou Palavra-Passe já conhecidas";
        }
        return true;        
    }
    
   
}    

   
checkLogin();   
//header("Location: index.php"); 
?>