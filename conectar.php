<?php
// Defina suas credenciais do Supabase
$supabase_url =   process.env.SUPABASE_URL;
$supabase_key = process.env.SUPABASE_ANON_KEY; 
// Dados a serem enviados para o Supabase
$dados = array(
    "nome" => "João",
    "email" => "joao@example.com",
    "data" => "2025-06-25",
    "hora" => "10:00",
    "servico" => "Unhas de gel"
);

// Configurar a requisição POST
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $supabase_url . "/rest/v1/marcacoes");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados)); // Enviar os dados como JSON

// Configurar cabeçalhos
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer " . $supabase_key,
    "Content-Type: application/json",
    "Prefer: return=representation"  // opcional, para retornar o dado inserido
));

// Executar a requisição
$resposta = curl_exec($ch);
curl_close($ch);

// Verificar a resposta
if ($resposta === false) {
    die("Erro ao conectar com o Supabase");
}

$resposta_json = json_decode($resposta, true);

if (isset($resposta_json['erro'])) {
    echo "Erro: " . $resposta_json['erro'];
} else {
    echo "Dados inseridos com sucesso!";
}
?>
