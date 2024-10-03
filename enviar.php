<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);

    // Conteúdo do arquivo de texto
    $conteudo = "Nome: " . $nome . "\nEmail: " . $email;

    // Nome do arquivo
    $arquivo = "dados.txt";

    // Gravar conteúdo no arquivo
    if (file_put_contents($arquivo, $conteudo)) {
        echo "Arquivo criado com sucesso! 🎉<br><br>";
        echo nl2br($conteudo);
        echo "<br><br><a href='index.html'>Voltar ao formulário</a>";
    } else {
        echo "Erro ao criar o arquivo. 😢";
    }
} else {
    echo "Método de envio inválido. 😐";
}
?>
