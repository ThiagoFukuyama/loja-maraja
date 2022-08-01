<?php

    require_once "../assets/include/conexao.php";

    $select = "SELECT * FROM produtos";
    $select_result = mysqli_query($conexao, $select);
    
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
            <h1 class="mb-3">Atualização de produto</h1>
            <form action="atualizacao_2.php" method="post">
                <div class="row">
                    <div class="col-sm-6 d-flex flex-column gap-3">
                        <div class="form-group">
                            <label class="w-100">
                                <input type="text" name="codigo" class="form-control" placeholder="Insira o código do produto..." required>
                            </label>
                        </div>
                        <div class="d-flex gap-3">
                            <input class="btn btn-primary" type="submit" value="Atualizar">
                        </div>
                    </div>
                </div>
            </form>

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