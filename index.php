<?php
$status_msg = null; // inicializa como null

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    $to = "seuemail@dominio.com"; // substitua pelo seu e-mail
    $subject = "Mensagem do portfólio de $nome";
    $body = "Nome: $nome\nE-mail: $email\n\nMensagem:\n$mensagem";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $status_msg = "<p style='color:green;'>Mensagem enviada com sucesso!</p>";
    } else {
        $status_msg = "<p style='color:red;'>Erro ao enviar a mensagem. Tente novamente.</p>";
    }

    // Armazena a mensagem de status na sessão
    session_start();
    $_SESSION['status_msg'] = $status_msg;

    // Redireciona para a mesma página para limpar o POST
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Se houver mensagem de status na sessão, exibe e limpa
session_start();
if (isset($_SESSION['status_msg'])) {
    $status_msg = $_SESSION['status_msg'];
    unset($_SESSION['status_msg']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meu Portfólio</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <img id="foto" src="images/FOTO PERFIL.jpg" alt="Foto de perfil">
    <h1 id="nome">Letícia Staudinger</h1>
    <p id="curso">Sistemas de Informação | CIn - UFPE</p>
    <!-- <button id="theme-btn">Alternar Tema</button>  --> <!-- Tirei botão para alternar tema por enquanto -->
    <nav>
      <a href="#sobre">Sobre</a> |
      <a href="#projetos">Projetos</a> |
      <a href="#contato">Contato</a>
    </nav>
  </header>

  <div id="sobre">
    <h2>Sobre mim</h2>
    <p>Me chamo Letícia e sou graduanda em Sistemas de Informação na UFPE. Minha jornada acadêmica começou com meu ingresso
       no curso de Engenharia Eletrônica na UPE, no qual obtive bastante autoconhecimento e aprendizado. Vivi experências como:
       ser de analista, gerente e diretora da Poli Júnior Engenharia e trabalhar na área de projetos elétricos e de  
       mercado livre de energia. Toda a experiência, pessoas, aprendizados e conexões me tornaram quem sou hoje e
       foram base para minha certeza na transição de carreira para a área de tecnologia. </p>
    <p>Hoje, então, estou empenhada em me solidificar nessa área, buscando sempre me conectar e aprender. Atualmente sou facilitadora
       do projeto EnvelheSER e monitora do projeto Programe.py e da disciplina de Sistemas Digitais. </p>
    <p>Acredito que tecnologia é uma ferramenta poderosa para transformar realidades e quero fazer parte dessa transformação.
       Meu objetivo é continuar aprendendo, contribuindo e crescendo junto com pessoas e projetos que compartilhem dessa visão! </p>
  </div>

  <div id="projetos">
  <h2>Projetos</h2>
  <div class="cards">
    <div class="projeto">
      <img src="images/ruptura.png" alt="Projeto 1">
      <h3>Ruptura, a fuga do labirinto</h3>
      <p>Jogo em Python com Pygame, em que o jogador enfrenta desafios para fugir da empresa,
         explorando estratégia e labirintos aleatórios.</p>
    </div>
    <div class="projeto">
      <img src="images/una.png" alt="Projeto 2">
      <h3>Una, de mulheres para mulheres</h3>
      <p>Protótipo de app com pontos/locais na UFPE com itens de saúde íntima para mulheres (doações e coletas), 
        e com informações conteúdos educativos sobre saúde e bem-estar da mulher.</p>
    </div>
  </div>
</div>

  <div id="contato">
    <h2>Contato</h2>
    <ul>
      <li>LinkedIn: <a href="#">https://www.linkedin.com/in/leticiastaudinger/</a></li>
      <li>GitHub: <a href="#">https://github.com/lestrb</a></li>
      <li>E-mail: <a href="mailto:exemplo@email.com">staudinger.leticia@gmail.com</a></li>
    </ul>
  </div>

<!-- Formulário de contato -->
<div id="contato">
  <h2>Se preferir, fale comigo diretamente aqui!</h2>

  <!-- Exibe a mensagem apenas se houver -->
  <?php if ($status_msg !== null) echo $status_msg; ?>

  <form method="POST" action="">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome2" required>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required>

    <label for="mensagem">Mensagem:</label>
    <textarea name="mensagem" id="mensagem" rows="4" required></textarea>

    <button type="submit">Enviar</button>
  </form>
</div>

  <footer>
    <p>&copy; 2025 - Feito por <span id="nome-footer">Letícia Staudinger</span></p>
  </footer>

  <script src="script.js"></script>
  <script src="custom.js"></script>
</body>



</html>