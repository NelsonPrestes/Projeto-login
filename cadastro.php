<?php
require_once('conexao.php');

//Metodo Post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];


//Verefica se preencheu o nome

if(isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['nome']) == 0) {
        echo "Preencha seu nome";
    } else if(strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    } else if(strlen($_POST['senha']) == 0) 
        echo "Preencha sua senha"; {
}
}

// Verificar cadastro

$result = $conexao->query("SELECT COUNT(*) FROM usuarios WHERE nome = '{$nome}' and email = '{$email}'");
$row = $result->fetch_row();
if ($row[0] > 0) {
    
    header('Location: cadastro.php');
    
    exit;



} else if ($row[0] == 0 )  {
      $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
  
}












  // Insere os dados na tabela
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

// Verefica a inserção de dados
  if ($conexao->query($sql) === TRUE) {
    echo "<div class='alert alert-success' role='alert'> Registrado com sucesso! </div>";
  } else {
    echo "<div class='alert alert-danger' role='alert'> Erro ao inserir registro! </div>". $conexao->error;
  }
}









?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilo.css">


  <title>Cadastro</title>
</head>
<body class="text-bg-primary p-3">

<h2>Criar cadastro</h2>

  <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

  <label>Nome de usuário</label>
  <input type="text" name="nome" placeholder="Nome de usuário" required><br>
  
  <label>E-mail</label>
  <input type="email" name="email" placeholder="E-mail" required><br>
  


  <label>Criar senha</label>
  <input type="password" name="senha" id="senha" placeholder="Senha (deve conter letras e números)"maxlength="8" >




      <button type="submit" class="btn btn-primary">Cadastrar</button>

  <a href="index.php" class="ca">já tem uma conta?</a>

</form>




</body>
</html>



