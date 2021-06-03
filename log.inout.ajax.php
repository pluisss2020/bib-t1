<?php
include_once("libreria/config.php");
session_start();
if ( !isset($_SESSION['username']) && !isset($_SESSION['userid']) ){
    if ( $idcnx = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) ){
             
        //if ( @mysql_select_db(DB_NAME,$idcnx) ){
       //LOGIN
	   if (isset($_POST['login_username'])){    
            $sql = 'SELECT user,passwd,id,rol FROM personas WHERE user="' . $_POST['login_username']. '" && passwd="' . md5($_POST['login_userpass']) . '" LIMIT 1';
            //echo $sql;
			if ( $res = mysqli_query($idcnx,$sql) ){	
                if ( mysqli_num_rows($res) == 1 ){
                        
                    $user = mysqli_fetch_array($res);
                         
                    $_SESSION['username']   = $user['user'];
                    $_SESSION['userid'] = $user['id'];
					$_SESSION['rol'] = $user['rol'];
					echo 1;
                    //echo $user['rol'];     
                }
                else
                    echo 0;
            }
            else
                echo 0;
                 
        //}
		

		
	//REGISTRO
	   if (isset($_POST['rec_username'])){    
            $sql = 'insert into personas (user,passwd,email,rol) 
			   values("' . $_POST['rec_username']. 
			      '","' . md5($_POST['rec_userpass']) .
				  '","' . $_POST['rec_email'] .
				  '","estudiante")';
            @mysqli_query($idcnx,$sql);
                
            echo 1;
                 
        }
		
		
             
        mysqli_close($idcnx);
    }
    else
        echo 0;
}
else{
    echo 0;
    }
	}
	
?>