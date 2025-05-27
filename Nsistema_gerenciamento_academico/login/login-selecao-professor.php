<?php

    session_start(); 

    // Redireciona se o usuário já estiver logado como professor
    if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['tipo_usuario'] === 'professor') {
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
        
        if (isset($_POST['tipo_calculo'])) {
            $tipo_calculo = $_POST['tipo_calculo'];

            if ($tipo_calculo === 'servicos') {
                header("Location: ../servicos-professor/pagina-servicos-professor.php");
                exit();
            } elseif ($tipo_calculo === 'resultados') {
                header("Location: ../servicos-professor/pagina-resultados-alunos-algebrando-estatico.php");
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
    <title>Login Professor</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="servicos_forms">
    
    <div class="form_container">
        <form class="form" method="post" action="">
        
        <h2>Login Professor</h2>
        
        <select id="tipo_calculo" name="tipo_calculo">
                <option value="">Selecione:</option>
                <option value="servicos">Acessar servicos</option>
                <option value="resultados">Resultados prova matemática modelo</option>
                
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