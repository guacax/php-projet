<?php
    include('./skeleton/header.php');
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
    ]
    */
?>
    <link rel="stylesheet" href="./css/items.css"/>
    <title>Items</title>
</head>
    <body>
        <?php
        $url = "https://ddragon.leagueoflegends.com/cdn/14.5.1/data/fr_FR/item.json";

        $response = file_get_contents($url);

        $dataDecoded = json_decode($response, true);

        $data = $dataDecoded['data'];?>
        <?php

        function findOrigin($idItem, $data) {
            $rtn = [];
            foreach ($data as $itemKey => $item) {
                if (isset($item['into'])) {
                    if (in_array($idItem, $item['into'])) {
                        $rtn[$itemKey] = $item;
                    }
                }
            }
            return $rtn;
        }

        foreach ($data as $itemKey => $item){
        ?>
            <div class="item">
                <span class="basicInfo">
                    <?php
                    echo $item['name'] . "<br>";
                    ?>
                    <img src="https://ddragon.leagueoflegends.com/cdn/14.5.1/img/item/<?=$itemKey?>.png"> <br>
                </span>
                <div class="moreInfo"> <!-- Utilisation de la classe "dots" -->
                    <?php
                    if (isset($item['into'])) {
                        $intos = $item['into'];
                        echo count($intos) . "<br>";

                        foreach ($intos as $intoKey => $into) {
                            echo "Peux évo en : " . $data[$into]['name'] . "<br>";
                            ?>
                            <img src="https://ddragon.leagueoflegends.com/cdn/14.5.1/img/item/<?=$into?>.png"> <br>
                            <?php
                        }
                    } else {
                        echo "Pas d'évo possible <br>";
                    }
                    foreach (findOrigin($itemKey, $data) as $itemUpgradeKey => $upgradeitem) {
                        echo "Peux être obtenu à partir de : " . $upgradeitem['name'] . "<br>";
                        ?>
                        <img src="https://ddragon.leagueoflegends.com/cdn/14.5.1/img/item/<?=$itemUpgradeKey?>.png"> <br>
                        <?php
                    }
                    
                    
                    
                    echo "<br>";
                    ?>
                </div>
                <button class="btn">Voir plus</button> <!-- Utilisation de la classe "myBtn" -->
            </div>
        <?php
        }

        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            
            $(document).ready(function(){
                $(".moreInfo").hide();
                $(document).on('click',".btn",function(){
                    var moreLessButton=$(".moreInfo").is(":visible")?'Voir plus':'Voir moins';
                    $(this).text(moreLessButton);
                    $(this).siblings(".moreInfo").toggle();
                })
            });

        </script>
        <?php

    include('./skeleton/footer.php');

?>