<?php

    require_once "../assets/include/conexao.php";

    if ($_POST) {
		
		$stmt = mysqli_stmt_init($conexao);
		
        $nome = $_POST["nome"];
        $quantidade = $_POST["quantidade"];
        $preco_custo = $_POST["preco_custo"];
        $preco_venda = $_POST["preco_venda"];
        $descricao = $_POST["descricao"];

        $sql = "INSERT INTO produtos VALUES (NULL, ?, ?, ?, ?, ?)";
				
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "sssss", $nome, $quantidade, $preco_custo, $preco_venda, $descricao);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $msg = "<div class='alert alert-success'>
                        Produto cadastrado com sucesso!
                    </div>";
        } 
        else {
            $msg = "<div class='alert alert-warning'>
                        Erro ao cadastrar. Tente novamente.
                    </div>";
        }

    } else {
        $msg = "";
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Marajá | CADASTRO</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
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
<body>
    
    <?php
        include_once "../assets/include/nav.html";
    ?>

    <main class="py-5">
        <div class="container">
            <h1 class="mb-4">Cadastrar produto</h1>
            <form action="cadastro.php" method="post" class="mb-4">
                <div class="row gap-3">
                    <div class="col-sm-12 d-flex flex-column gap-4">
                        <div class="form-group">
                            <label class="w-100">
                                <p class="m-0 mb-1">Nome</p>
                                <input type="text" name="nome" class="form-control" placeholder="Insira o nome do produto..." required>
                            </label>
                        </div>

                        <div class="row g-4">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="w-100">
                                        <p class="m-0 mb-1">Quantidade</p>
                                        <input type="number" min="1" name="quantidade" class="form-control" placeholder="Ex.: 99" required>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="w-100">
                                        <p class="m-0 mb-1">Preço de custo</p>
                                        <input type="number" min="0" step=".01" name="preco_custo" class="form-control" placeholder="Ex.: 29.99" required>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="w-100">
                                        <p class="m-0 mb-1">Preço de venda</p>
                                        <input type="number" min="0" step=".01" name="preco_venda" class="form-control" placeholder="Ex.: 29.99" required>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group mt-2">
                        <label class="w-100">
                            <p class="m-0 mb-1">Descrição</p>
                            <textarea name="descricao" class="form-control" style="resize: none; min-height: 150px" placeholder="Insira a descrição do produto..." required></textarea>
                        </label>
                    </div>
                    <div class="d-flex gap-3">
                        <input class="btn btn-success" type="submit" value="Cadastrar">
                        <input class="btn btn-danger" type="reset" value="Limpar">
                    </div>
                </div>
            </form>

            <?php
                echo $msg;
            ?>

        </div>
    </main>
    
  
</body>
</html>