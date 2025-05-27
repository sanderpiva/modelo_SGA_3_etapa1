<?php

    session_start(); 

    // Redireciona se o usuário já estiver logado como aluno
    if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['tipo_usuario'] === 'aluno') {
        // Se já está logado como aluno, pode ir para uma página de dashboard de aluno ou outra página relevante
        // Para este cenário, vamos remover o redirecionamento imediato para que ele possa usar o formulário.
    }

    // Verifica se o logout foi solicitado
    if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
        session_unset(); 
        session_destroy(); 
        
        echo '<!DOCTYPE html>
              <html>
              <head>
                  <title>Saindo...</title>
                  <meta charset="utf-8">
                  <link rel="stylesheet" href="../css/style.css">
              </head>
              <body class="servicos_forms">
                  <div class="form_container">
                      <p>Você foi desconectado com sucesso!</p>
                      <p>Redirecionando para a HomePage...</p>
                  </div>
                  <script>
                      setTimeout(function() {
                          window.location.href = "../index.php";
                      }, 3000); // Redireciona após 3 segundos (3000 milissegundos)
                  </script>
              </body>
              </html>';
        exit(); // Garante que nenhum outro conteúdo da página seja renderizado
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if (isset($_POST['tipo_atividade'])) {
            $tipo_atividade = $_POST['tipo_atividade'];

            if ($tipo_atividade === 'dinamica') {
                header("Location: ../servicos-professor/selecao-dashboard-dinamico.php"); // Verifique este caminho, parece ser uma página de professor para aluno.
                exit();
            } elseif ($tipo_atividade === 'estatica') {
                header("Location: ../servicos-professor/dashboard-alunos-algebrando-estatico.php"); // Verifique este caminho, parece ser uma página de professor para aluno.
                exit();
            } else {
                echo "<p style='color:red;'>Selecione uma opção válida.</p>";
            }
        } else {
            echo "<p style='color:red;'>Por favor, selecione uma opção no seletor.</p>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Aluno</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="servicos_forms">
    
    <div class="form_container">
        <form class="form" method="post" action="">
        
        <h2>Login Aluno</h2>
        
        <select id="tipo_atividade" name="tipo_atividade">
                <option value="">Selecione:</option>
                <option value="dinamica">Atividades Dinâmicas</option>
                <option value="estatica">Atividades Algebrando</option>
                
        </select><br><br>

        <button type="submit">Login</button>
    </form>

    </div>
    <a href="?logout=true">Logout -> HomePage</a>
</body>
<footer>
    <p>Desenvolvido por Juliana e Sander</p>
</footer>

</html>
