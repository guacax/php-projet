<?php

//page pour les items
//
//url data : https://ddragon.leagueoflegends.com/cdn/14.5.1/data/fr_FR/item.json
//
/*item type :
    [1001] => Array (
        [name] => Bottes
        [description] => +25 vitesse de déplacement
        [colloq] => ;Boots of Speed;bottes de vitesse
        [plaintext] => Augmente légèrement la vitesse de déplacement.
        [into] => Array (
            [0] => 3005
            [1] => 3047
            [2] => 3117
            [3] => 3006
            [4] => 3009
            [5] => 3020
            [6] => 3111
            [7] => 3158
        )
        [image] => Array (
            [full] => 1001.png
            [sprite] => item0.png
            [group] => item
            [x] => 0
            [y] => 0
            [w] => 48
            [h] => 48
        )
        [gold] => Array (
            [base] => 300
        [purchasable] => 1
        [total] => 300
        [sell] => 210
        )
        [tags] => Array (
            [0] => Boots
        )
        [maps] => Array (
            [11] => 1
        [12] => 1
        [21] => 1
        [22] =>
        [30] =>
        )
        [stats] => Array (
            [FlatMovementSpeedMod] => 25
        )
    */
//
//les into c'est pour savoir quel build possible avec l'item
//
//url img : https://ddragon.leagueoflegends.com/cdn/14.5.1/img/item/1001.png

    $url = "https://ddragon.leagueoflegends.com/cdn/14.5.1/data/fr_FR/item.json";

    $response = file_get_contents($url);

    $dataDecoded = json_decode($response, true);

    $data = $dataDecoded['data'];

//  print_r($data);

//    print_r($data);

    foreach ($data as $itemKey => $item){
        echo $item['name'] . "<br>";
//        echo $itemKey;
        if (isset($item['into'])) {
            $intos = $item['into'];
            echo count($intos) . "<br>";
            foreach ($intos as $intoKey => $into) {
                echo "Peux évo en : " . $data[$into]['name'] . "<br>";

            }
        } else {
            echo "Pas d'évo possible <br>";
        }

        echo "<br>";
    }

?>