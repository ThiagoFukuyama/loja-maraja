
<?php

	require_once "../assets/include/conexao.php";
	
	$stmt = mysqli_stmt_init($conexao);
	
	if ($_POST) {
		
		$nome = "%" . $_POST["nome"] . "%";
		
		$sql = "SELECT * FROM produtos WHERE nome LIKE ?";
		
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "s", $nome);
		
	} else {
		
		$sql = "SELECT * FROM produtos";	
		
		mysqli_stmt_prepare($stmt, $sql);
		
	}
	
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $cod_produto, $nome_produto, $quantidade, $preco_custo, $preco_venda, $descricao);
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Marajá | PESQUISA</title>
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
        <div class="container-lg">
            <h1 class="mb-3">Pesquisar por produto</h1>
            <form action="pesquisa.php" method="post">
                <div class="row">
                    <div class="col-lg-8 d-flex flex-column gap-3">
                        <div class="form-group">
                            <label class="w-100">
                                <input type="text" name="nome" class="form-control" placeholder="Insira o nome do produto...">
                            </label>
                        </div>
                        <div class="d-flex gap-3">
                            <input class="btn btn-success" type="submit" value="Pesquisar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
		
		<div class="container-lg table-responsive mt-5">
			<table class="table table-hover">
				<thead class="text-secondary" style="background-color: #E6F3F8">
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Quantidade</th>
						<th>Preço de custo</th>
						<th>Preço de venda</th>
						<th>Descrição</th>
					</tr>
				</thead>
				<tbody>
				
					<?php
						while (mysqli_stmt_fetch($stmt)) {
					?>
				
					<tr>
						<td><?php echo $cod_produto ?></td>
						<td><?php echo $nome_produto ?></td>
						<td><?php echo $quantidade ?></td>
						<td>R$ <?php echo $preco_custo ?></td>
						<td>R$ <?php echo $preco_venda ?></td>
						<td><?php echo $descricao ?></td>
					</tr>
					
					<?php } ?>
					
				</tbody>
			</table>
		</div>
    </main>
    
  
</body>
</html>