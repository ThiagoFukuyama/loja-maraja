<?php

    require_once "../assets/include/conexao.php";
	require_once "../vendor/autoload.php";

    $html = "<table cellpadding='3' style='font-family: sans-serif'>
				<thead>
					<tr style='background-color: black;color: white'>
						<th>Código</th>
						<th>Nome</th>
						<th>Quantidade</th>
						<th>Preço de Custo</th>
						<th>Preço de Venda</th>
					</tr>
				</thead>
				<tbody>";
		
				$sql = "SELECT * FROM produtos";
				$resultado = mysqli_query($conexao, $sql);
				
				while ($row_transacoes = mysqli_fetch_assoc($resultado)) {
					$html .= "<tr><td>$row_transacoes[cod_produto]</td>";
					$html .= "<td>$row_transacoes[nome]</td>";
					$html .= "<td>$row_transacoes[quantidade]</td>";
					$html .= "<td>R$$row_transacoes[preco_custo]</td>";
					$html .= "<td>R$$row_transacoes[preco_venda]</td></tr>";
				}

				$html .= "</tbody>";
			$html .= "</table>";
		
		
		use Dompdf\Dompdf;
		
		$dompdf = new Dompdf();
		
		$dompdf->loadHtml("<h1 style='font-family: sans-serif'>Relatório de Produtos</h1>" . $html);
		
		$dompdf->setPaper('A4', 'landscape');

		$dompdf->render();
		
		$dompdf->stream(
			"Relatório - Loja Marajá",
			array(
				"Attachment" => false
			)
		);
		
?>