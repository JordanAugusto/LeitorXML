<?php 

// Transformando arquivo XML em Objeto
$xml = simplexml_load_file("xml/".$_GET['arquivo']);


// Escrevendo informaçoes do XML
echo "<h1>Informações da Nota Fiscal</h1>";
echo 'Chave de Acesso: ' . str_replace("NFe", "", $xml->NFe->infNFe['Id']) . '<br>';
echo 'Tipo de Operação: ' . $xml->NFe->infNFe->ide->natOp . '<br>';
echo 'Nota Fiscal: ' . $xml->NFe->infNFe->ide->nNF . '<br>';
echo 'Série: ' . $xml->NFe->infNFe->ide->serie . '<br>';
echo 'Data de Emissão: ' . date('d/m/Y', strtotime($xml->NFe->infNFe->ide->dhEmi)) . '<br>';
echo 'Frete Por Conta: ' . $xml->NFe->infNFe->transp->modFrete . '<br>';


echo "<h3>Emitente</h3>";
echo 'CNPJ Emitente: ' . $xml->NFe->infNFe->emit->CNPJ . '<br>';
echo 'Emitente: ' . $xml->NFe->infNFe->emit->xNome . '<br>';
echo 'Endereço: ' . $xml->NFe->infNFe->emit->enderEmit->xLgr . ', ' . $xml->NFe->infNFe->emit->enderEmit->nro . ',' . $xml->NFe->infNFe->emit->enderEmit->xMun . ',' . $xml->NFe->infNFe->emit->enderEmit->UF . '<br>';

echo "<h3>Destinatário</h3>";
echo 'CNPJ Destinatario: ' . $xml->NFe->infNFe->dest->CNPJ . '<br>';
echo 'Destinatario: ' . $xml->NFe->infNFe->dest->xNome . '<br>';
echo 'Endereço: ' . $xml->NFe->dest->enderDest->xLgr . ', ' . $xml->NFe->infNFe->dest->enderDest->nro . ',' .$xml->NFe->infNFe->dest->enderDest->xMun .','. $xml->NFe->infNFe->dest->enderDest->UF . '<br>';

echo "<h3>Dados Do Produtos</h3>";
echo "<table cellspacing='4' cellpadding='4' border='1'>";
echo "<tr>";
echo "<td><b>#</b></td>";
echo "<td><b>CFOP</b></td>";
echo "<td><b>Produto</b></td>";
echo "<td><b>Volume</b></td>";
echo "<td><b>Valor da Nota</b></td>";
echo "<td><b>Peso Bruto</b></td>";
echo "</tr>";
foreach($xml->NFe->infNFe->det as $item) {
	echo "<tr>";
	echo "<td>#{$item['nItem']}</td>";
	echo "<td>{$item->prod->CFOP}</td>";
	echo "<td>{$item->prod->xProd}</td>";
	echo "<td>{$item->prod->qCom}</td>";
	echo "<td>{$item->prod->vProd}</td>";
}
    echo "<td>{$xml->NFe->infNFe->transp->vol->pesoB}</td>";
	echo "</tr>";
echo "</table>";

echo "<h3>Dados Do Tranportador</h3>";
echo "<table cellspacing='4' cellpadding='4' border='1'>";
echo "<tr>";
echo "<td><b>#</b></td>";
echo "<td><b>CNPJ</b></td>";
echo "<td><b>Nome</b></td>";
echo "<td><b>Endereço</b></td>";
echo "<td><b>Municipio</b></td>";
echo "<td><b>UF</b></td>";
echo "</tr>";

    echo "<td>#</td>";
	echo "<td>{$xml->NFe->infNFe->transp->transporta->CNPJ}</td>";
	echo "<td>{$xml->NFe->infNFe->transp->transporta->xNome}</td>";
	echo "<td>{$xml->NFe->infNFe->transp->transporta->xEnder}</td>";
	echo "<td>{$xml->NFe->infNFe->transp->transporta->xMun}</td>";
	echo "<td>{$xml->NFe->infNFe->transp->transporta->UF}</td>";
	echo "</tr>";

echo "</table>";

echo "<h3>Placas</h3>";
	echo "<td>{$xml->NFe->infNFe->transp->veicTransp->placa}</td><br>";
	echo "<td>{$xml->NFe->infNFe->transp->reboque->placa}</td><br>";
	
echo "<h3>Informações Complementares</h3>";
	echo "<td>{$xml->NFe->infNFe->infAdic->infCpl}</td>";

echo "<br>";

echo "<a href='lista.php'>Ir para lista de arquivos.</a><br />";
echo "<a href='index.php'>Ir para envio de arquivos.</a><br />";
/*echo 'Data de Atualização: ' . $xml->data_atualizacao . '<br>';
// Percorre todos os registros de vendas
foreach($xml->venda as $registro) {
	echo 'Código da Venda: ' . $registro->cod_venda . '<br>';
	echo 'Cliente: ' . $registro->cliente . '<br>';
	echo 'Email: ' . $registro->email . '<br>';

        // Percorre todos os itens da venda
	foreach($registro->itens->item as $item):
		echo 'Código do Produto: ' . $item->cod_produto . '<br>';
		echo 'Quantidade: ' . $item->qtde . '<br>';
		echo 'Descrição do Produto: ' . $item->descricao . '<br>';
	endforeach;

	echo '<hr>';
}*/
