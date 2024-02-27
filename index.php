<!-- un pokedex qui se connecte avec api pokemon info  -->


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Loldex</title>
    </head>
    <body>
        <h1>Le loldex de gua</h1>

        <?php
        $url = "https://ddragon.leagueoflegends.com/cdn/12.6.1/data/fr_FR/champion.json";
        $data = file_get_contents($url);
        print_r($data);

        // nothing working for now
        ?>
    </body>
</html>