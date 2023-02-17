<?php

    require_once "../assets/include/conexao.php";

        if (isset($_POST["nome"])) {

            $codigo = $_POST["codigo"];
            $nome = $_POST["nome"];
            $quantidade = $_POST["quantidade"];
            $preco_custo = $_POST["preco_custo"];
            $preco_venda = $_POST["preco_venda"];
            $descricao = $_POST["descricao"];

            $sql = "UPDATE produtos SET
                    nome=?,
                    quantidade=?,
                    preco_custo=?,
                    preco_venda=?,
                    descricao=? 
                    WHERE cod_produto = ?";
					
			$stmt = mysqli_stmt_init($conexao);
			mysqli_stmt_prepare($stmt, $sql);	
			mysqli_stmt_bind_param($stmt, "siddsi", $nome, $quantidade, $preco_custo, $preco_venda, $descricao, $codigo);
            $update = mysqli_stmt_execute($stmt);

            if ($update) {

                $status = "success";
                $conteudo = "Produto alterado com sucesso. <a class='fs-5' href='atualizacao.php'>Voltar</a>";

            } else {

                $status = "danger";
                $conteudo = "Ocorreu um erro ao alterar. Tente novamente.";

            }

        } else {

            $status = "warning";
            $conteudo = "Selecione um produto para atualização <a class='fs-5' href='atualizacao.php'>aqui</a>.";

        }
        
        $msg = "<div class='alert alert-$status'>
                    $conteudo
                </div>";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Marajá | ATUALIZAÇÃO</title>
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

            <?php

                if (isset($_POST["codigo"]) && empty($_POST["nome"])) {
					
                    $msg = "";
					$codigo = $_POST["codigo"];
					
					$stmt = mysqli_stmt_init($conexao);

                    $select = "SELECT * FROM produtos WHERE cod_produto = ?";
					
					mysqli_stmt_prepare($stmt, $select);
					mysqli_stmt_bind_param($stmt, "s", $codigo);
                    $result = mysqli_stmt_execute($stmt);
			
					mysqli_stmt_store_result($stmt);
					$num_rows = mysqli_stmt_num_rows($stmt);

                    if ($num_rows > 0) {
						
						mysqli_stmt_bind_result($stmt, $cod_produto, $nome_produto, $quantidade, $preco_custo, $preco_venda, $descricao);

                        while (mysqli_stmt_fetch($stmt)) { 

            ?>

            <h1 class="mb-3">Atualizar produto</h1>
            <form action="atualizacao_2.php" method="post" class="mb-4">
                <div class="row">
                    <di class="col-sm-12 d-flex flex-column gap-3">
                        <div class="row g-3">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="w-100">
                                        <p class="m-0 mb-2">Código</p>
                                        <input type="text" name="codigo" class="form-control" readonly value="<?php echo $cod_produto ?>">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="w-100">
                                        <p class="m-0 mb-2">Nome</p>
                                        <input type="text" name="nome" class="form-control" placeholder="Insira o nome do produto..." required value="<?php echo $nome_produto ?>">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="w-100">
                                        <p class="m-0 mb-2">Quantidade</p>
                                        <input type="number" min="0" name="quantidade" class="form-control" placeholder="Ex.: 99" required value="<?php echo $quantidade ?>">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="w-100">
                                        <p class="m-0 mb-2">Preço de custo</p>
                                        <input type="number" min="0" step=".01" name="preco_custo" class="form-control" placeholder="Ex.: 29.99" required value="<?php echo $preco_custo ?>">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="w-100">
                                        <p class="m-0 mb-2">Preço de venda</p>
                                        <input type="number" min="0" step=".01" name="preco_venda" class="form-control" placeholder="Ex.: 29.99" required value="<?php echo $preco_venda ?>">
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group mb-3">
                        <label class="w-100">
                            <p class="m-0 mb-2">Descrição</p>
                            <textarea name="descricao" class="form-control" style="resize: none; min-height: 150px" placeholder="Insira a descrição do produto" required><?php echo $descricao ?></textarea>
                        </label>
                    </div>
                    <div class="d-flex gap-3 align-items-end">
                        <input class="btn btn-primary" type="submit" value="Atualizar">
                        <a href='atualizacao.php'>Voltar</a>
                    </div>
                </div>
            </form>

            <?php

                        }
                    } else {
						
                        $msg = "<div class='alert alert-danger'>
                                    Produto não cadastrado. <a href='atualizacao.php'>Voltar</a>
                                </div>";
								
                    }
                }

             

                echo $msg;
            ?>

        </div>
    </main>
    
  
</body>
</html>