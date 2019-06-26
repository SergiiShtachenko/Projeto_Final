<?php
    include ('config/init.php');

    
        
    $username = $_POST['user'];
    $password = $_POST['password'];
    global $dblink;
    global $carinho;

    $stmt = $dblink->prepare("SELECT guid, email, palavrapasse, cliente, permissao FROM utilizador WHERE email=?");
    //$stmt->bind_param('ss', $username, $password);
    $stmt->execute(array($username));
    
    while($row = $stmt->fetch()){
        //$userPass [] = $row['email'];
        if(md5($password) == $row['palavrapasse']){
            $_SESSION['username'] = $username;
            $_SESSION['userID'] = $row['guid'];
            $_SESSION['idCliente'] = $row['cliente'];
            $_SESSION['role'] = $row['permissao'];
            redirect($_SESSION['role']);                
            print_r ($_SESSION);
            echo 'Success! Username:'.$username;
            echo ' Password:'.$password;
            echo ' MD5Password:'.md5($password);
            break;
        }else{
            echo "Login Inválido";             
        };           
    }   
    
    function redirect($userRole){
        //$location='produto_list_cl.php';
        if ($userRole == 1){
            $location='clientsList.php';
        }else{
            if($userRole==0){
                $location='produto_list_cl.php';
            }else{
                $location='index.php';
            }
        }
        header("Location: $location");
    }     
?>