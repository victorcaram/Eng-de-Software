<?php

$servername = "mysql.dcc.ufmg.br";
$username = "victor.caram";
$password = "1234zaq";
$dbname = "victorcaram";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
}

extract($_POST);

if($funcao === "post"){ 
  $sql = "INSERT INTO questoes (enunciado, a, b, c, dica, resposta, dificuldade) 
          VALUES ('$enunciado', '$a', '$b', '$c', '$dica', '$resposta', '$dificuldade')";

  if ($conn->query($sql) === TRUE) {
      echo "Nova questao cadastrada!";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
};
if($funcao === "get"){
  $sql = "SELECT * FROM `questoes` WHERE 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
     while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $jsonArray = array(); 
        $jsonArray[] = $row;
        echo json_encode($jsonArray) , "<br>";
    }
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
};
$conn->close();
?>