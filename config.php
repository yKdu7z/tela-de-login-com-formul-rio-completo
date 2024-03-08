<?php 
 //conexao com banco de dados
 $host ='localhost';
 $usuario ='root';
 $senha ='';
 $database ='formulario-teste';
 

 $conn = new mysqli($host,$usuario,$senha,$database,);
 
 if($conn->error) {
    die("Failed to connect to the database" . $msqli->error);
}