
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $email_verivicar=$_POST['email'];
        $senhavdd=&$_POST["senhas"];
    $HOST='localhost: 3307';
    $user='root';
    $pass="";
    $database='tecnsmile';

    $conecta= mysqli_connect($HOST,$user,$pass,$database) or die ("nao foi possivel conctar");
    mysqli_select_db($conecta,$database) or die("nao foi poossivel");
    $sql="SELECT * FROM clientes WHERE email=? and senha=? ";
    if($smtm=$conecta->prepare($sql)){
        $smtm->bind_param("ss",$email_verivicar,$senhavdd);
        $smtm->execute();
        $result=$smtm->get_result();
        if($result->num_rows>0){
            echo"login";
            header("location: ../paginasmileprincipal.html");
            exit();
            
        }else{
            echo"<script> window.alert('não encotramos seu cadrasto!')</script>";
            header("location: pagina-1.html");
            
            exit();
            
        }
    }

   }?>
