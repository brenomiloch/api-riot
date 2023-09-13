<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Obter o nome do invocador do formulário
    $invocador = $_GET["invocador"];

    // Substituir espaços por "?"
    $invocador = str_replace("+", "%20", $invocador);

    // Agora você pode usar $invocador na sua URL da API
    $url = "https://br1.api.riotgames.com/lol/summoner/v4/summoners/by-name/" . urlencode($invocador) . "?api_key=RGAPI-afc69fe5-269a-4077-9e96-0f9376a0bd77";

    // Realizar a solicitação à API e processar a resposta como no exemplo anterior
    $response = file_get_contents($url);
    if ($response === false) {
        die("Não foi possível obter os dados da API.");
    }

    $data = json_decode($response, true);


// Agora você pode acessar os dados da API
$id = $data["id"];
$accountId = $data["accountId"];
$puuid = $data["puuid"];
$name = $data["name"];
$profileIconId = $data["profileIconId"];
$revisionDate = $data["revisionDate"];
$summonerLevel = $data["summonerLevel"];

$icon = "https://ddragon.leagueoflegends.com/cdn/13.18.1/img/profileicon/$profileIconId.png";

$champion ="https://br1.api.riotgames.com/lol/champion-mastery/v4/champion-masteries/by-puuid/$puuid";

// Exiba os dados na página


} else {
    echo "O formulário deve ser submetido via método GET.";
}
?>
<?php echo "ID: $id<br>"; ?>
<?php echo "Account ID: $accountId<br>";?>
<?php echo "Puuid: $puuid<br>";?>
<?php echo "Nome: $name<br>";?>
<?php echo "Data de Revisão: $revisionDate<br>";?>
<?php echo "Nível do Invocador: $summonerLevel<br>";?>
<img src="<?php echo $icon; ?>" alt="Imagem do Perfil">