<link rel="stylesheet" href="./css/index.css">
<h1>Le loldex de gua</h1>
<title>Loldex</title>

<h2><a href="items.php" target="_blank">Items</a></h2>

<?php include('./skeleton/header.php') ?>


    <?php
    $url = "https://ddragon.leagueoflegends.com/cdn/14.5.1/data/fr_FR/champion.json";

    $response = file_get_contents($url);

    $data_decode = json_decode($response, true);

    $data = $data_decode['data'];


    /*
     ( [Aatrox] => Array
        ( [version] => 12.6.1
        [id] => Aatrox
        [key] => 266
        [name] => Aatrox
        [title] => Épée des Darkin
        [blurb] => Autrefois, Aatrox et ses frères étaient honorés pour avoir défendu Shurima contre le Néant. Mais ils finirent par devenir une menace plus grande encore pour Runeterra : la ruse et la sorcellerie furent employées pour les battre. Cependant, après des...
        [info] => Array (
            [attack] => 8 [defense] => 4
            [magic] => 3
            [difficulty] => 4 )
        [image] => Array (
            [full] => Aatrox.png
            [sprite] => champion0.png
            [group] => champion
            [x] => 0
            [y] => 0
            [w] => 48
            [h] => 48 )
        [tags] => Array (
            [0] => Fighter
            [1] => Tank )
        [partype] => Puits de sang
        [stats] => Array (
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
            [attackspeed] => 0.651 )
            )
        */
    ?>

    <main>
        <?php
        foreach($data as $champions => $champion)
        {
            ?> <div><?php
            echo $champion['name'] . "<br>";
            echo $champion['title'] . "<br>";
            echo $champion['blurb'] . "<br>";
            $image = $champion['image']; ?>
            <img src="https://ddragon.leagueoflegends.com/cdn/14.5.1/img/champion/<?=$champion['id']?>.png"> <br>
            <p><a href="detail_champion.php?id=<?=$champion['id']?>" target="_blank">Voir plus</a></p>
            </div>
        <?php
        }
        ?>

    </main>

<?php include('./skeleton/footer.php') ?>