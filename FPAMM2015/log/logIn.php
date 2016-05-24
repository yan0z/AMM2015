<!DOCTYPE html>
<html>

<?php include ('../master/header.php');?>
<?php include ('../master/top_menu.php');?>
<?php include ('../sql/settings.php');?>

<?php
    session_start();
    $error = false;
    if(isset($_POST['goLogin']))
    {
        $_SESSION['logged'] = false;
        $user = $_POST['username'];
        $pass = md5($_POST['password']);
        $mysqli = new mysqli();
        $mysqli ->connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        
        if($mysqli->connect_errno!= 0)
        {
        //Error
        $idErrore= $mysqli->connect_errno;
        $msg= $mysqli->connect_error;
        error_log("Errore durante la connessione al server $idErrore: $msg", 0);
        echo"Errore durante la connessione $msg";
        }
        else
        {
            //No error
        }
        
        if(trim($user) == '' || trim($pass) == '')
        { 
            $error = true;
            $_SESSION['logged'] = false;
        } 

        $query ="select * from utenti where username='$user' AND password='$pass'" ;
        $res = $mysqli->query($query);

        if($res->num_rows == 1)
        {
            $array = mysqli_fetch_array($res);
            $_SESSION['username']  = $array['username'];
            $_SESSION['livello']= $array['livello'];
            $_SESSION['logged']= true;
            $mysqli->close(); 
            header("Location: ../master/master.php");
        }
        else
        {
            $error = true;
            $_SESSION['logged'] = false; 
        }
    }
?>

<body> 
    <div id="content">
        <?php include('../master/sideDx.php');?>
        <div id="contentx">
            <div class="box">
            <h1>Accesso</h1>
            <?php if($error): ?>
            <div class="login-error"> Errore, riprova </div>
            <?php endif;?>
                <form style="margin:20px 0 20px 0;" method="post" action="logIn.php">
                    <label for="username">Username</label> <input type="text" name="username" id="username"/>
                    <label for="password">Password </label><input type="password" name="password" id="password" />
                    <input type="submit" value="Login" name="goLogin"/>
                </form>
            </div>            
        </div>
    </div>
    <?php include('../master/footer.php');?>
</body>
</html>
