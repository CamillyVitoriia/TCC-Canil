<?php
header("Location: ../agradecimentopets.html");
// Conexão com o banco de dados (ajuste as configurações conforme necessário)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canilosasco";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$ocupacao = $_POST['Ocupacao'];
$renda = $_POST['Renda'];
$portao_muro = $_POST['PossuiPortaoOuMuro'];
$pet_local = $_POST['PetDentroOuForaDeCasa'];
$tipo_imovel = $_POST['TipoDeImovel'];
$tipo_propriedade = $_POST['TipoDePropriedade'];
$protecao_janelas = $_POST['ProtecaoEmJanelasSacadas'];
$outros_pets = $_POST['TemOutrosPets'];
$tem_crianca = $_POST['TemCriancaNaCasa'];

echo("'$ocupacao', '$renda', '$portao_muro', '$pet_local', '$tipo_imovel', '$tipo_propriedade', '$protecao_janelas', '$outros_pets', $tem_crianca");

// Insira os dados na tabela do banco de dados
$sql = "INSERT INTO questionarioadocao (Ocupacao, Renda, PossuiPortaoOuMuro, PetDentroOuForaDeCasa, TipoDeImovel, TipoDePropriedade, ProtecaoEmJanelasSacadas, TemOutrosPets, TemCriancaNaCasa)
        VALUES ('$ocupacao', '$renda', '$portao_muro', '$pet_local', '$tipo_imovel', '$tipo_propriedade', '$protecao_janelas', '$outros_pets', '$tem_crianca')";

if ($conn->query($sql) === TRUE) {
    echo "Dados do formulário inseridos com sucesso.";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

// Feche a conexão com o banco de dados
$conn->close();
?>
