<?php 
require_once('conexao.php');



//verificar se preencheu o nome e senha

if(isset($_POST['nome']) || isset($_POST['senha'])) {

    if(strlen($_POST['nome']) == 0) {
        echo "<div class='alert alert-danger' role='alert'> Preencha seu nome </div>";
    } else if(strlen($_POST['senha']) == 0) {
        echo "<div class='alert alert-danger' role='alert'> Preencha sua senha </div>";
    } else {

        $nome = $conexao->real_escape_string($_POST['nome']);
        $senha = $conexao->real_escape_string($_POST['senha']);


        // verificar se existe cadastro
        
        $sql_code = "SELECT * FROM usuarios WHERE nome = '$nome' AND  senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuarios = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuarios['id'];
            $_SESSION['nome'] = $usuarios['nome'];

            header("Location: painel.php");

        } else {
            echo "<div class='alert alert-danger' role='alert'> Nome de usuário ou senha incorretos </div>";
        }

    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estilo.css">
     
<body class="text-bg-primary p-3">
     <form action="index.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Nome de usuário</label>
     	<input type="text" name="nome" placeholder="Nome de usuário"><br>

     	<label>Senha</label>
     	<input type="password" name="senha" placeholder="Senha"><br>

     	<button type="submit" class="btn btn-success">Entrar</button>
          <a href="cadastro.php" class="ca">Criar conta</a>
     </form>
</body>
</html>