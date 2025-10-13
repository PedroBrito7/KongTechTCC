<?php
include_once('config.php');

// Verificar se o formulário foi enviado
if (isset($_POST['submit'])) {
    // Verifique se os dados necessários foram enviados
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';

    // Verificar se todos os campos foram preenchidos
    if ($nome && $email && $senha && $telefone) {
        // Evitar SQL Injection: Use prepared statements
        $stmt = $conexao->prepare("INSERT INTO kongdados(nome, email, senha, telefone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $senha, $telefone);
        
        // Execute a consulta
        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar!";
        }
        
        // Fechar a declaração
        $stmt->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KongTech</title>
  <link rel="icon" href="fivecon.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
         /* Estilo do Rodapé */
         .footer {
            background-color: #348bea; /* Cor única azul */
            color: #efefef; /* Cor do texto claro */
            padding: 40px 0; /* Espaçamento interno */
        }

        /* Ícones de Redes Sociais */
        .footer .social-icons a {
            color: #efefef;
            margin: 0 10px; /* Ajustado para reduzir o espaçamento */
            font-size: 24px;
            transition: color 0.3s, transform 0.3s ease-in-out;
            text-decoration: none;
        }

        .footer .social-icons a:hover {
            color: #ffffff; /* Cor de destaque ao passar o mouse */
            transform: scale(1.2); /* Aumenta o ícone */
        }

        /* Link para Documentação */
        .footer .documentation-link {
            color: #efefef;
            font-size: 18px;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid #efefef;
            border-radius: 25px;
            transition: background-color 0.3s, color 0.3s, transform 0.3s ease-in-out;
            display: inline-block;
            margin-top: 10px; /* Ajustado o espaçamento */
        }

        .footer .documentation-link:hover {
            background-color: #efefef;
            color: #348bea;
            transform: translateY(-5px); /* Efeito de elevação */
        }

        /* Texto do Rodapé */
        .footer .footer-text {
            margin-top: 30px;
            font-size: 14px;
            border-top: 1px solid #ffffff; /* Linha divisória fina */
            padding-top: 20px;
        }

        /* Estilo da área de páginas institucionais */
        .institutional-links {
            padding: 30px 0; /* Menos espaçamento para ficar mais compacto */
        }

        .institutional-links h5 {
            font-size: 22px;
            color: #efefef;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .institutional-links a {
            color: #efefef;
            font-size: 16px;
            text-decoration: none;
            transition: color 0.3s, background-color 0.3s, transform 0.3s ease-in-out;
            display: block;
            margin: 10px 0;
            padding: 5px 15px;
            border-radius: 5px;
        }

        .institutional-links a:hover {
            color: #ffffff;
            background-color: #348bea;
            transform: translateX(5px); /* Efeito de deslocamento */
        }

        /* Estilo da área de Contatos */
        .contact-info {
            background-color: #348bea;
            color: #efefef;
            padding: 30px 0;
            text-align: center;
        }

        .contact-info .contact-item {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .contact-info i {
            margin-right: 10px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .footer .social-icons {
                text-align: center;
                margin-bottom: 20px;
            }

            .footer .documentation-link {
                text-align: center;
                display: block;
                margin-top: 0;
            }

            .institutional-links a {
                display: block;
                margin: 10px 0;
            }

            .contact-info {
                padding: 20px 0;
            }
        }
       .dropdown-item {
      font-size: 18px; /* Aumenta o tamanho dos itens do dropdown */
    }

    /* Estilo da barra de pesquisa para ficar em linha reta e centralizada */
    .navbar-search {
      flex-grow: 1; /* Faz a barra de pesquisa crescer e ocupar espaço */
      display: flex;
      justify-content: center; /* Centraliza horizontalmente */
    }

    .navbar-search input {
      width: 70%; /* Define a largura da barra de pesquisa */
    }

    .cor-principal{
        
        color: #348bea;
    }

    .bg-principal{
        background-color: #348bea;
    }

    .cor-principal-2{
        background-color: #efefef;
        color: #efefef;
    }

    .navbar-icons {
      display: flex;
      align-items: center;
    }
    .navbar-icons a {
      margin-left: 20px; /* Espaçamento entre os ícones */
      color: #348bea; /* Cor dos ícones */
      font-size: 2.5rem; /* Aumenta o tamanho dos ícones */
      padding: 10px;
    }
    .navbar-icons a:hover {
      color: #efefef; /* Muda a cor dos ícones ao passar o mouse */
    }
    .navbar-icons i {
      transition: color 0.3s; /* Suaviza a mudança de cor ao passar o mouse */
     
    }



        .product-page {
            margin-top: 30px;
        }

        .breadcrumb {
            background: none;
            padding: 10px 0;
            font-size: 14px;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
            padding: 0 5px;
            color: #6c757d;
        }

        /* Estilo da imagem com efeito de zoom */
        .product-image img {
            width: 100%;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s ease; /* Transição suave para o zoom */
        }

        .product-image:hover img {
            transform: scale(1.2); /* Efeito de zoom */
        }

        .product-details h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .price-box {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-top: 15px;
        }

        .price-box h2 {
            font-size: 30px;
            color: #348bea;
            margin-bottom: 10px;
        }

        .buy-btn {
            background-color: #28a745;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            padding: 15px;
            transition: 0.3s ease;
            width: 100%;
            border: none; /* Remover a borda preta */
        }

        .buy-btn:hover {
            background-color: #218838;
        }

        .shipping {
            margin-top: 20px;
        }

        .shipping input {
            width: 70%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            margin-right: 10px;
        }

        .shipping button {
            background-color: #348bea;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .shipping-result {
            margin-top: 10px;
            font-size: 14px;
            color: #6c757d;
        }


        .related-products {
            margin-top: 40px;
        }

        .related-product {
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #fff;
            text-align: center;
            padding: 10px;
            transition: box-shadow 0.3s;
        }

        .related-product:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .related-product img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }


        .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        display: none;
    }

    .dropdown-submenu:hover .dropdown-menu {
        display: block;
    }

    .dropdown-submenu {
        position: relative;
    }

    .coupon-section {
            margin-top: 30px;
        }

        /* Estilo do preço com desconto */
        .preco-com-desconto {
            font-size: 24px;
            color: #348bea;
            font-weight: bold;}


            .product-description {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .description-header {
            font-weight: bold;
            color: #348bea;
        }

        .toggle-description {
            cursor: pointer;
            color: #007bff;
        }

        .navbar {
            
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Adiciona sombra */
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            background-color: #348bea;
            color: white;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .form-footer a {
            color: #348bea;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
        .dropdown-item {
      font-size: 18px; /* Aumenta o tamanho dos itens do dropdown */
    }

    /* Estilo da barra de pesquisa para ficar em linha reta e centralizada */
    .navbar-search {
      flex-grow: 1; /* Faz a barra de pesquisa crescer e ocupar espaço */
      display: flex;
      justify-content: center; /* Centraliza horizontalmente */
    }

    .navbar-search input {
      width: 70%; /* Define a largura da barra de pesquisa */
    }

    .cor-principal{
        background-color: #348bea;
        color: #348bea;
    }

    .cor-principal-2{
        background-color: #efefef;
        color: #efefef;
    }

    .navbar-icons {
      display: flex;
      align-items: center;
    }
    .navbar-icons a {
      margin-left: 20px; /* Espaçamento entre os ícones */
      color: #348bea; /* Cor dos ícones */
      font-size: 2.5rem; /* Aumenta o tamanho dos ícones */
      padding: 10px;
    }
    .navbar-icons a:hover {
      color: #efefef; /* Muda a cor dos ícones ao passar o mouse */
    }
    .navbar-icons i {
      transition: color 0.3s; /* Suaviza a mudança de cor ao passar o mouse */
     
    }

    </style>
</head>
<body style="background-color: #efefef;">

    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-toggler" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <a href="index.html"><img src="logo-kong-tech.png" alt="Logo" class="img-fluid m-2" style="max-height: 35px"></a>
  
        <div class="collapse navbar-collapse" id="nav-toggler">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  
    <!-- Primeiro dropdown (Iphones) -->
  <li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Apple</a>
    <div class="dropdown-menu">
        <!-- Outros modelos de iPhones -->
        <a href="pagina-iphone-1.html" class="dropdown-item">iPhones</a>
        <a href="pagina-macbook.html" class="dropdown-item">Mac</a>
        <a href="pagina-apple-watch.html" class="dropdown-item">Watch</a>
  
        <a href="pagina-acessorios-apple.html" class="dropdown-item">Acessórios</a>
    </div>
  </li>
  
                <!-- Segundo dropdown (Samsung) -->
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Android</a>
        <div class="dropdown-menu">
            <!-- Outros modelos de iPhones -->
            <a href="pagina-samsung.html" class="dropdown-item">Samsung</a>
            <a href="pagina-motorola.html" class="dropdown-item">Motorola</a>
            <a href="pagina-xiaomi.html" class="dropdown-item">Xiaomi</a>
  
            <a href="pagina-android-1.html" class="dropdown-item">Androids</a>
        </div>
      </li>
  
            <!-- Terceiro dropdown -->
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Mais produtos</a>
              <div class="dropdown-menu">
                <a href="pagina-notebook.html" class="dropdown-item">Notebooks</a>
                <a href="pagina-tv.html" class="dropdown-item">TV´s</a>
                <a href="pagina-som.html" class="dropdown-item">Áudio</a>
                <a href="pagina-game.html" class="dropdown-item">Gaming</a>
              </div>
            </li>
  
          </ul>
  
          <!-- Formulário de busca centralizado -->
          <form class="navbar-search" role="Pesquisar">
            <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
              <i style=" margin-left: 15px; margin-top: 10px; " class="fas fa-search"></i> 
            </button>
          </form>
  
           <!-- Ícones do lado direito: Carrinho e Login -->
           <div class="navbar-icons">
              <a href="carrinho.html" class="nav-link" title="Carrinho">
                <i class="fas fa-shopping-cart"></i>
              </a>
              <a href="loginecadastro2.php" class="nav-link" title="Login">
                <i class="fas fa-user"></i>
              </a>
            </div>
    
  
        </div>
      </div>
    </nav>
  
    <br>
     
    <div style="margin-left: 550px; border: 3px solid #348bea;" class="form-container">

    <img src="logo-kong-tech.png" style="width: 125px;">

    <br><br>

        <form method="post" action="loginecadastro2.php" >

            

            <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>

            
            <input type="email" id="email" name="email" placeholder="Digite seu email" required>

           
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>


            
            <input type="text" id="telefone" name="telefone"  placeholder="Digite seu telefone" required maxlength="11">

    
            <button type="submit" name="submit" id="submit">Cadastrar</button>
        </form>

        <div class="form-footer">
            <p>Já tem uma conta? <a href="login.html">Fazer Login</a></p>
        </div>
    </div>

      <br>
<!-- Rodapé -->
<footer class="footer text-center">
    <div class="container">
        <div class="row align-items-center">
            <!-- Ícones de Redes Sociais -->
            <div class="col-12 col-md-4 social-icons text-center">
                <a href="https://www.facebook.com" target="_blank" class="fab fa-facebook"></a>
                <a href="https://www.instagram.com" target="_blank" class="fab fa-instagram"></a>
                <a href="https://www.linkedin.com" target="_blank" class="fab fa-linkedin"></a>
            </div>
            
            <!-- Texto do Rodapé -->
            <div class="col-12 col-md-4 ">
                <p>&copy; 2024 KongTech. Todos os direitos reservados.</p>
            </div>
            <br>
 <br>
            <div style="margin-top: 50px;" class="col-12 col-md-4 ">
                <p>&copy; Site da desenvolvedora</p>
                <a href="aresdev.html"><img src="logotipoares.png" style="max-width: 80px;"></a>
            </div>
            
            <!-- Link para Documentação (à direita) -->
            <div style="margin-left: 450px;" class="col-12 col-md-4 text-center text-md-right">
                <a href="documentacao.pdf" class="documentation-link">Documentação <i class="fas fa-book"></i></a>
            </div>
        </div>
  
        <!-- Linha Divisória -->
        <hr style="border-color: #ffffff; margin-top: 40px;">
  
        <!-- Área de Contatos (ajustada) -->
        <div class="contact-info">
            <h5>Informações de Contato</h5><br>
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 contact-item">
                    <i class="fas fa-map-marker-alt"></i> R. Bueno Brandão, 74 - Guarulhos (SP)   
                 </div>
                <div class="col-12 col-md-4 contact-item">
                    <i class="fas fa-phone-alt"></i> (11) 98820-2529
                </div>
                <div class="col-12 col-md-4 contact-item">
                    <i class="fas fa-envelope"></i> kongtechsuporte@gmail.com
                </div>
                <div class="col-12 col-md-4 institutional-links text-center">
                  <a href="institucionalmae.html"><i class="fas fa-building"></i> Páginas Institucionais</a>
              </div>
            </div>
        </div>
       
  </footer>











</body>
</html>
