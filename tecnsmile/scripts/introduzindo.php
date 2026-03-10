<link rel="stylesheet" href="smile.css">
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $senha=$_POST["senha"];
    $HOST='localhost: 3307 ';
    $user='root';
    $pass="";
    $database='tecnsmile';

    $conecta= mysqli_connect($HOST,$user,$pass,$database) or die ("nao foi possivel conctar");
    mysqli_select_db($conecta,$database) or die("nao foi poossivel");
    
    $smtm=$conecta->prepare("INSERT INTO clientes (nome,email,senha)VALUES('$nome','$email','$senha')");

    $smtm->execute();
    $sql="SELECT * FROM clientes WHERE email=? or senha=? ";
    if($smtm=$conecta->prepare($sql)){
        $smtm->bind_param("ss",$email,$senha);
            $smtm->execute();
            $result=$smtm->get_result();
            if($result->num_rows<0){
                $smtm=$conecta->prepare("INSERT INTO clientes (nome,email,senha)VALUES('$nome','$email','$senha')");

                $smtm->execute();
                
                header("location: ../paginasmileprincipal.html");
                exit();}else{
                    print('<p>voce ja tem um cadrasto</p>');
                    echo"<br>";
                    echo"<a href='../pagina-1.html'><button type='button'  id='sejabemvindo'>volte ao site de login</button></a>";
                }
    
    

            }}?>
