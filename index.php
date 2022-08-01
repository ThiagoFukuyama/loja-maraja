<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Marajá | HOME</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body class="home">

    <nav class="navbar navbar-dark text-white navbar-expand-sm bg-success p-2">
        <div class="container-lg align-items-center">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Marajá</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
                <ul class="nav navbar-nav gap-3 py-2">
                    <li class="nav-item"><a href="index.php" class="nav-link"><i class="bi bi-house-fill"></i>Home</a></li>
                    <li class="nav-item"><a href="paginas/cadastro.php" class="nav-link"><i class="bi bi-arrow-right"></i>Cadastro</a></li>
                    <li class="nav-item"><a href="paginas/pesquisa.php" class="nav-link"><i class="bi bi-search"></i>Pesquisa</a></li>
                    <li class="nav-item"><a href="paginas/atualizacao.php" class="nav-link"><i class="bi bi-arrow-clockwise"></i>Atualização</a></li>
                    <li class="nav-item"><a href="paginas/exclusao.php" class="nav-link"><i class="bi bi-trash"></i>Exclusão</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5 d-flex align-items-center">
        <div class="container-lg d-flex justify-content-center">
             <div class="box bg-light text-center p-5">
                <h1 class="mb-2">Sistema de produtos</h1>
                <p class="mb-4 text-muted">
                    <em>Desenvolvido por <a href="http://thiagofukuyama.epizy.com" target="_blank" class="link-success">Thiago Fukuyama Marcilli</a></em>
                </p>
                <hr class="mb-4 m-auto">
                <p class="m-0 mb-3">
                    Projeto de final de bimestre do 3° ano do curso
                    ETIM Informática para Internet da ETEC Francisco Garcia, 2022.
                </p>
                <p class="m-0">
                    Sistema codificado em PHP para gerenciamento de informações de produtos,
                    utilizando-se de MySQL para armazenamento no banco de dados. 
                    Site construído a partir de HTML, CSS e Bootstrap.
                </p>
            </div>
        </div>
    </main>
</body>
</html>