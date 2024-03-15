<?php include('./skeleton/header.php') ?>

<link rel="stylesheet" href="./css/index.css">
<h1>Le loldex de gua</h1>
<title>Loldex</title>

<h2><a href="items.php" target="_blank">Items</a></h2>

<?php
$url = "https://ddragon.leagueoflegends.com/cdn/14.5.1/data/fr_FR/champion.json";

$response = file_get_contents($url);

$data_decode = json_decode($response, true);

$data = $data_decode['data'];


$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$filteredChampions = [];

if (!empty($searchTerm)) {
    foreach ($data as $champion) {
        if (stripos($champion['name'], $searchTerm) !== false) {
            $filteredChampions[] = $champion;
        }
    }
} else {
    // Si aucune recherche n'est effectuée, afficher tous les champions
    $filteredChampions = $data;
}

/*
    [Aatrox] => Array
    (
        [version] => 12.6.1
        [id] => Aatrox
        [key] => 266
        [name] => Aatrox
        [title] => Épée des Darkin
        [blurb] => Autrefois, Aatrox et ses frères étaient honorés pour avoir défendu Shurima contre le Néant. Mais ils finirent par devenir une menace plus grande encore pour Runeterra : la ruse et la sorcellerie furent employées pour les battre. Cependant, après des...
        [info] => Array
        (
            [attack] => 8 [defense] => 4
            [magic] => 3
            [difficulty] => 4
        )
        [image] => Array
        (
            [full] => Aatrox.png
            [sprite] => champion0.png
            [group] => champion
            [x] => 0
            [y] => 0
            [w] => 48
            [h] => 48
        )
        [tags] => Array
        (
            [0] => Fighter
            [1] => Tank
        )
        [partype] => Puits de sang
        [stats] => Array
        (
            [hp] => 580
            [hpperlevel] => 90
            [mp] => 0
            [mpperlevel] => 0
            [movespeed] => 345
            [armor] => 38
            [armorperlevel] => 3.25
            [spellblock] => 32
            [spellblockperlevel] => 1.25
            [attackrange] => 175
            [hpregen] => 3
            [hpregenperlevel] => 1
            [mpregen] => 0
            [mpregenperlevel] => 0
            [crit] => 0
            [critperlevel] => 0
            [attackdamage] => 60
            [attackdamageperlevel] => 5
            [attackspeedperlevel] => 2.5
            [attackspeed] => 0.651
        )
    )
*/
?>

<form id="searchForm" method="get" action="">
    <input type="text" id="searchInput" name="search" placeholder="<?=$searchTerm?>">
    <button type="submit" value="Rechercher un champion"><img src="./assets/search.svg" alt="search"></button>
    <?php
    if (!empty($searchTerm)) {
        ?><a href="./"><img src="./assets/close.svg"></a>
    <?php } ?>
</form>


<main>
    <?php
        foreach($filteredChampions as $champions => $champion)
        {
            ?> 
            
                <a href="detail_champion.php?id=<?=$champion['id']?>" target="_blank">
                    <?php
                    // echo $champion['blurb'] . "<br>";
                    $image = $champion['image']; ?>
                    <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/loading/<?=$champion['id']?>_0.jpg">
                    <?php echo "<h2>" . $champion['name'] .  "</h2>";?>
                </a>
            <?php
        }
    ?>
</main>
<script>
    $(document).ready(function () {
        $('#searchForm').on('submit', function (event) {
            // Empêcher le comportement par défaut du formulaire
            event.preventDefault();

            // Récupérer le terme de recherche
            var searchTerm = $('#searchInput').val();

            // Effectuer une requête AJAX pour filtrer les champions
            $.ajax({
                url: 'index.php',
                method: 'GET',
                data: { search: searchTerm },
                success: function (response) {
                    $('#championList').html(response);
                }
            });
        });
    });
</script>
<?php include('./skeleton/footer.php') ?>