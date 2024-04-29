<?php
include ('./skeleton/header.php');

?>
<link rel="stylesheet" href="./css/items.css" />
<title>Items</title>
</head>

<body>
    <a href="./index.php">Champions</a>
    <?php
    $url = "https://ddragon.leagueoflegends.com/cdn/14.8.1/data/fr_FR/item.json";

    $response = file_get_contents($url);

    $dataDecoded = json_decode($response, true);

    $data = $dataDecoded['data'];
    ?>

    <?php
    $displayedItems = array();
    $groupedItems = array();

    foreach ($data as $itemKey => $item) {
        $itemName = $item['name'];
        if (!isset($groupedItems[$itemName])) {
            $groupedItems[$itemName] = array();
        }
        $groupedItems[$itemName][] = array(
            'id' => $itemKey,
            'item' => $item
        );
    }
    ?>
    <main>
        <?php
        foreach ($groupedItems as $itemName => $items) {
            $evolutionDisplayed = false;
            ?>
            <div class="item">
                <span class="basicInfo">
                    <img
                        src="https://ddragon.leagueoflegends.com/cdn/14.8.1/img/item/<?= $groupedItems[$itemName][0]['id'] ?>.png">
                    <p><?= $itemName ?></p>
                    <a href="detail_item.php?id=<?= $groupedItems[$itemName][0]['id'] ?>"><button class="btn">Voir
                            plus</button></a>
                </span>
            </div>
            <?php
        }
        ?>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".moreInfo").hide();
            $(document).on('click', ".btn", function (e) {
                var itemID = $(this).attr('href').split('=')[1];
                window.location.href = "detail_item.php?id=" + itemID;
                return false; // Prevent the default action of the button
            });
        });
    </script>

    <?php

    include ('./skeleton/footer.php');

    ?>