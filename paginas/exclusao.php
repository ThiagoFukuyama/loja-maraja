<?php

    require_once "../assets/include/conexao.php";

    if (isset($_POST["codigo"])) {
        
        $codigo = $_POST["codigo"];

        $sql = "SELECT * FROM produtos WHERE cod_produto = '$codigo'";

        $result = mysqli_query($conexao, $sql);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {

            $delete = "DELETE FROM produtos WHERE cod_produto = '$codigo'";
            $result_delete = mysqli_query($conexao, $delete);

            if ($result_delete) {

                $status = "success";
                $conteudo = "Produto excluído com sucesso.";

            } else {

                $status = "warning";
                $conteudo = "Ocorreu um erro ao excluir o produto. Tente novamente.";

            }

        } else {

            $status = "danger";
            $conteudo = "Produto não cadastrado";

        }   

        $msg = "<div class='alert alert-$status'>
                    $conteudo
                </div>";

    } else {
        $msg = "";
    }

    $select = "SELECT * FROM produtos";
    $select_result = mysqli_query($conexao, $select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Marajá | EXCLUSÃO</title>
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
            <h1 class="mb-3">Exclusão de produto</h1>
            <p class="text-danger mb-2">Aviso: esta ação é irreversível</p>
            <form action="exclusao.php" method="post" class="mb-4">
                <div class="row g-4">
                    <div class="col-sm-6 d-flex flex-column gap-3">
                        <div class="form-group">
                            <label class="w-100">
                                <input type="text" name="codigo" class="form-control" placeholder="Insira o código do produto..." autocomplete="off" required>
                            </label>
                        </div>
                        <div class="d-flex gap-3">
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalExcluir">Excluir</button>
                        </div>

                        <div class="modal" style="--bs-modal-width: 600px" id="modalExcluir" role="dialog" aria-labelledby="modalExcluir" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h4 class="modal-title text-danger mb-2">Deseja realmente excluir este produto?</h4>
                                        <p class="mb-4">O produto será deletado <strong>permanentemente</strong></p>
                                        <div class="d-flex justify-content-end gap-2">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <input type="submit" class="btn btn-danger" value="Excluir">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <?php
                echo $msg;
            ?>

            <div class="row mt-5">
                <div class="col-lg-6 table-responsive">
                    <table class="table table-hover">
                        <thead class="text-secondary" style="background-color: #E6F3F8">
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($linha = mysqli_fetch_array($select_result)) {
                            ?>
                            <tr>
                                <td><strong><?php echo $linha["cod_produto"] ?></strong></td>
                                <td><?php echo $linha["nome"] ?></td>
                            </tr>
                
                            <?php } ?>
                
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </main>
    
  
</body>
</html>