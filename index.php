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

        $ch = curl_init();

        $url = "https://ddragon.leagueoflegends.com/cdn/14.3.1/data/fr_FR/champion.json";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Désactiver la vérification du certificat SSL (à des fins de débogage uniquement)
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($ch);

        if ($e = curl_error($ch)) {
            echo $e;
        } else {
            $decoded = json_decode($resp);
            print_r($decoded);
        }


        curl_close($ch);

        ?>
    </body>
</html>