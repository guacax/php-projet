<link rel="stylesheet" href="./css/detail_champion.css">

<?php

include ('./skeleton/header.php');

$championId = $_GET['id'];

$url = "https://ddragon.leagueoflegends.com/cdn/14.5.1/data/fr_FR/champion/$championId.json";

$response = file_get_contents($url);

$data_decode = json_decode($response, true);

$data = $data_decode['data'];

//print_r($data);

$championDetails = $data[$championId];

echo "<title>" . $championDetails['name'] . "</title>"

    ?>
</head>

<body>
    <h2><a href="index.php">index</a></h2>
    <header>
        <div class="info">
            <?php
            $image = $championDetails['image'];
            ?>
            <h1><?= $championDetails['name'] ?></h1>
            <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= $championDetails['id'] ?>_0.jpg">
            <?php
            echo "<h2>" . $championDetails['title'] . "</h2>";
            ?>
            <img src="./assets/divider.svg">
        </div>

    </header>
    <?php
    echo "Lore: " . $championDetails['lore'] . "<br>";
    echo "Nb Skins: " . count($championDetails['skins']) . "<br>";


    $skins = $championDetails['skins'];

    $spells = $championDetails['spells'];

    foreach ($spells as $spellKey => $spell) {
        ?>
        <img src="https://ddragon.leagueoflegends.com/cdn/14.5.1/img/spell/<?= $spell['id'] ?>.png">
        <br>
        <?php
        echo "Nom: " . $spell['name'] . "<br>";
        echo "Description: " . $spell['description'] . "<br>";
    }
    ?>

    <p>Passive: <img
            src="https://ddragon.leagueoflegends.com/cdn/14.5.1/img/passive/<?= $championDetails['passive']['image']['full'] ?>">
    </p>

    <div class="swiper mySwiper2">
        <div class="swiper-wrapper">
            <?php
            foreach ($skins as $skinKey => $skin) {
                ?>
                <div class="swiper-slide">
                    <img
                        src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= $championDetails['id'] ?>_<?= $skin['num'] ?>.jpg">
                </div>
                <?php
            }
            ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <div thumbsSlider="" class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            foreach ($skins as $skinKey => $skin) {
                ?>
                <div class="swiper-slide">
                    <img
                        src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?= $championDetails['id'] ?>_<?= $skin['num'] ?>.jpg">
                    <?php
                    if ($skin['name'] == 'default') {
                        ?>
                        <h3><span>Défaut</span></h3>
                    <?php
                    } else {
                        ?>
                        <h3><span><?= $skin['name'] ?></span></h3>
                        <?php
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
            keyboard: {
                enabled: true,
            }
        });

        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
    <?php
    /*
        Info pour les skin :
            url type : https://ddragon.leagueoflegends.com/cdn/img/champion/splash/Aatrox_2.jpg
            faire un for each avec la length de l'array et c'est avec le [num] que l'on affiche chaque skin diff (cf vi avec ces 11 skin et dernier num à 29 (pas tt les skin actuel tho)

        Info pour les spells :
            url type : https://ddragon.leagueoflegends.com/cdn/12.6.1/img/spell/AatroxW.png
            changement de spell pour afficher : q,w,e,r

        Info pour les loading :
            url type : https://ddragon.leagueoflegends.com/cdn/img/champion/loading/Aatrox_0.jpg
            changement de loading comme pour les skins
    */

    /*

    Array (
        [Aatrox] => Array (
            [id] => Aatrox
            [key] => 266
            [name] => Aatrox
            [title] => Épée des Darkin
            [image] => Array (
                [full] => Aatrox.png
                [sprite] => champion0.png
                [group] => champion
                [x] => 0
                [y] => 0
                [w] => 48
                [h] => 48
            )
            [skins] => Array (
                [0] => Array (
                    [id] => 266000
                    [num] => 0
                    [name] => default
                    [chromas] =>
                )
                [1] => Array (
                    [id] => 266001
                    [num] => 1
                    [name] => Aatrox justicier
                    [chromas] =>
                )
                [2] => Array (
                    [id] => 266002
                    [num] => 2
                    [name] => Mecha Aatrox
                    [chromas] => 1
                )
                [3] => Array (
                    [id] => 266003
                    [num] => 3
                    [name] => Aatrox chasseur marin
                    [chromas] =>
                )
                [4] => Array (
                    [id] => 266007
                    [num] => 7
                    [name] => Aatrox lune de sang
                    [chromas] =>
                )
                [5] => Array (
                    [id] => 266008
                    [num] => 8
                    [name] => Aatrox lune de sang prestige
                    [chromas] =>
                )
                [6] => Array (
                    [id] => 266009
                    [num] => 9
                    [name] => Aatrox héros de guerre
                    [chromas] => 1
                )
                [7] => Array (
                    [id] => 266011
                    [num] => 11
                    [name] => Aatrox de l'Odyssée
                    [chromas] => 1
                )
                [8] => Array (
                    [id] => 266020
                    [num] => 20
                    [name] => Aatrox lune de sang prestige (2022)
                    [chromas] =>
                )
            )
            [lore] => Autrefois, Aatrox et ses frères étaient honorés pour avoir défendu Shurima contre le Néant. Mais ils finirent par devenir une menace plus grande encore pour Runeterra : la ruse et la sorcellerie furent employées pour les battre. Cependant, après des siècles d'emprisonnement, Aatrox fut le premier à retrouver sa liberté, en corrompant et transformant les mortels assez stupides pour tenter de s'emparer de l'arme magique qui contenait son essence. Désormais en possession d'un corps qu'il a approximativement transformé pour rappeler son ancienne forme, il arpente Runeterra en cherchant à assouvir sa vengeance apocalyptique.
            [blurb] => Autrefois, Aatrox et ses frères étaient honorés pour avoir défendu Shurima contre le Néant. Mais ils finirent par devenir une menace plus grande encore pour Runeterra : la ruse et la sorcellerie furent employées pour les battre. Cependant, après des...
            [allytips] => Array (
                [0] => Utilisez Ruée obscure tout en lançant Épée des Darkin pour augmenter vos chances de toucher l'ennemi.
                [1] => Facilitez Épée des Darkin avec des compétences de contrôle de foule, telles que Chaînes infernales, ou avec les effets immobilisants de vos alliés.
                [2] => Lancez Fossoyeur des mondes quand vous êtes certain de pouvoir forcer le combat.
            )
            [enemytips] => Array (
                [0] => Les attaques d'Aatrox sont prévisibles. Profitez-en pour esquiver ses zones d'impact.
                [1] => Il est plus facile de fuir les Chaînes infernales d'Aatrox en courant vers un côté ou vers Aatrox.
                [2] => Quand Aatrox utilise son ultime, gardez vos distances pour l'empêcher de revenir à la vie.
            )
            [tags] => Array (
                [0] => Fighter
                [1] => Tank
            )
            [partype] => Puits de sang
            [info] => Array (
                [attack] => 8
                [defense] => 4
                [magic] => 3
                [difficulty] => 4
            )
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
                [attackspeed] => 0.651
            )
            [spells] => Array (
                [0] => Array (
                    [id] => AatroxQ
                    [name] => Épée des Darkin
                    [description] => Aatrox abat son épée devant lui, infligeant des dégâts physiques. Il peut frapper jusqu'à 3 fois et chaque coup a une zone d'effet différente.
                    [tooltip] => Aatrox abat son épée, infligeant {{ qdamage }} pts de dégâts physiques. Si l'ennemi est touché par le tranchant, il est brièvement projeté dans les airs et subit {{ qedgedamage }} pts de dégâts à la place. Cette compétence peut être réactivée deux fois, chaque coup changeant de forme et infligeant 25% de dégâts de plus que la précédente.
                    [leveltip] => Array (
                        [label] => Array (
                            [0] => Délai de récupération
                            [1] => Dégâts
                            [2] => Ratio de dégâts d'attaque totaux
                        )
                        [effect] => Array (
                            [0] => {{ cooldown }} -> {{ cooldownNL }}
                            [1] => {{ qbasedamage }} -> {{ qbasedamageNL }}
                            [2] => {{ qtotaladratio*100.000000 }}% -> {{ qtotaladrationl*100.000000 }}%
                        )
                    )
                    [maxrank] => 5
                    [cooldown] => Array (
                        [0] => 14
                        [1] => 12
                        [2] => 10
                        [3] => 8
                        [4] => 6
                    )
                    [cooldownBurn] => 14/12/10/8/6
                    [cost] => Array (
                        [0] => 0
                        [1] => 0
                        [2] => 0
                        [3] => 0
                        [4] => 0
                    )
                    [costBurn] => 0
                    [datavalues] => Array
                    (

                    )
                    [effect] => Array (
                        [0] =>
                        [1] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [2] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [3] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [4] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                            )
                        [5] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [6] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [7] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [8] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [9] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [10] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                    )
                    [effectBurn] => Array (
                        [0] =>
                        [1] => 0
                        [2] => 0
                        [3] => 0
                        [4] => 0
                        [5] => 0
                        [6] => 0
                        [7] => 0
                        [8] => 0
                        [9] => 0
                        [10] => 0
                    )
                    [vars] => Array (

                    )
                    [costType] => Pas de coût
                    [maxammo] => -1
                    [range] => Array (
                        [0] => 25000
                        [1] => 25000
                        [2] => 25000
                        [3] => 25000
                        [4] => 25000
                    )
                    [rangeBurn] => 25000
                    [image] => Array (
                        [full] => AatroxQ.png
                        [sprite] => spell0.png
                        [group] => spell
                        [x] => 288
                        [y] => 48
                        [w] => 48
                        [h] => 48
                    )
                    [resource] => Pas de coût
                )
                [1] => Array (
                    [id] => AatroxW
                    [name] => Chaînes infernales
                    [description] => Aatrox frappe le sol, blessant le premier ennemi touché. Les champions et les grands monstres doivent vite quitter la zone d'effet sous peine d'être ramenés de force au point d'impact et de subir à nouveau les dégâts.
                    [tooltip] => Aatrox lance une chaîne, ralentissant le premier ennemi touché de {{ wslowpercentage*-100 }}% pendant {{ wslowduration }} sec et infligeant {{ wdamage }} pts de dégâts physiques. Les champions et les grands monstres de la jungle doivent quitter la zone d'effet dans les {{ wslowduration }} sec sous peine d'être ramenés de force au point d'impact et de subir à nouveau les dégâts.
                    [leveltip] => Array (
                        [label] => Array (
                            [0] => Délai de récupération
                            [1] => Dégâts
                        )
                        [effect] => Array (
                            [0] => {{ cooldown }} -> {{ cooldownNL }}
                            [1] => {{ wbasedamage }} -> {{ wbasedamageNL }}
                        )
                    )
                    [maxrank] => 5
                    [cooldown] => Array (
                        [0] => 20
                        [1] => 18.5
                        [2] => 17
                        [3] => 15.5
                        [4] => 14
                    )
                    [cooldownBurn] => 20/18.5/17/15.5/14
                    [cost] => Array (
                        [0] => 0
                        [1] => 0
                        [2] => 0
                        [3] => 0
                        [4] => 0
                    )
                    [costBurn] => 0
                    [datavalues] => Array (

                    )
                    [effect] => Array (
                        [0] =>
                        [1] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [2] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [3] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [4] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [5] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [6] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [7] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [8] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [9] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [10] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                    )
                    [effectBurn] => Array (
                        [0] =>
                        [1] => 0
                        [2] => 0
                        [3] => 0
                        [4] => 0
                        [5] => 0
                        [6] => 0
                        [7] => 0
                        [8] => 0
                        [9] => 0
                        [10] => 0
                    )
                    [vars] => Array (

                    )
                    [costType] => Pas de coût
                    [maxammo] => -1
                    [range] => Array (
                        [0] => 825
                        [1] => 825
                        [2] => 825
                        [3] => 825
                        [4] => 825
                    )
                    [rangeBurn] => 825
                    [image] => Array (
                        [full] => AatroxW.png
                        [sprite] => spell0.png
                        [group] => spell
                        [x] => 336
                        [y] => 48
                        [w] => 48
                        [h] => 48
                    )
                    [resource] => Pas de coût
                )
                [2] => Array (
                    [id] => AatroxE
                    [name] => Ruée obscure
                    [description] => Passivement, Aatrox se soigne quand il blesse des champions ennemis. À l'activation, il se rue dans une direction.
                    [tooltip] => Passive : Aatrox gagne +{{ espellvamp }}% d'omnivampirisme contre les champions. Ce bonus augmente à +{{ espellvampempowered }}% d'omnivampirisme pendant Fossoyeur des mondes. Active : Aatrox se rue dans une direction. Il peut utiliser cette compétence tout en lançant ses autres compétences.
                    [leveltip] => Array (
                        [label] => Array (
                            [0] => Délai de récupération
                            [1] => % de soins
                            [2] => Pourcentage des soins pendant Fossoyeur des mondes
                        )
                        [effect] => Array (
                            [0] => {{ cooldown }} -> {{ cooldownNL }}
                            [1] => {{ espellvamp }}% -> {{ espellvampNL }}%
                            [2] => {{ espellvampempowered }}% -> {{ espellvampempoweredNL }}%
                        )
                    )
                    [maxrank] => 5
                    [cooldown] => Array (
                        [0] => 9
                        [1] => 8
                        [2] => 7
                        [3] => 6
                        [4] => 5
                    )
                    [cooldownBurn] => 9/8/7/6/5
                    [cost] => Array (
                        [0] => 0
                        [1] => 0
                        [2] => 0
                        [3] => 0
                        [4] => 0
                    )
                    [costBurn] => 0
                    [datavalues] => Array (

                    )
                    [effect] => Array (
                        [0] =>
                        [1] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [2] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [3] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [4] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [5] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [6] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [7] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [8] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [9] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                        [10] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                        )
                    )
                    [effectBurn] => Array (
                        [0] =>
                        [1] => 0
                        [2] => 0
                        [3] => 0
                        [4] => 0
                        [5] => 0
                        [6] => 0
                        [7] => 0
                        [8] => 0
                        [9] => 0
                        [10] => 0
                    )
                    [vars] => Array (

                    )
                    [costType] => Pas de coût
                    [maxammo] => 1
                    [range] => Array (
                        [0] => 25000
                        [1] => 25000
                        [2] => 25000
                        [3] => 25000
                        [4] => 25000
                    )
                    [rangeBurn] => 25000
                    [image] => Array (
                        [full] => AatroxE.png
                        [sprite] => spell0.png
                        [group] => spell
                        [x] => 384
                        [y] => 48
                        [w] => 48
                        [h] => 48
                    )
                    [resource] => Pas de coût
                )
                [3] => Array (
                    [id] => AatroxR
                    [name] => Fossoyeur des mondes
                    [description] => Aatrox libère sa forme démoniaque, effrayant les sbires ennemis proches et augmentant ses dégâts d'attaque, ses soins et sa vitesse de déplacement. La durée est prolongée s'il participe à l'élimination d'un champion ennemi.
                    [tooltip] => Aatrox révèle sa vraie forme démoniaque, effrayant les sbires proches pendant {{ rminionfearduration }} sec et gagnant +{{ rmovementspeedbonus*100 }}% de vitesse de déplacement (ce bonus diminue en {{ rduration }} sec). Il gagne aussi +{{ rtotaladamp*100 }}% de dégâts d'attaque et augmente ses soins personnels de {{ rhealingamp*100 }}% pendant la durée. Participer à l'élimination d'un champion prolonge la durée de cet effet de {{ rextension }} sec et réinitialise le bonus en vitesse de déplacement.
                    [leveltip] => Array (
                        [label] => Array (
                            [0] => Total du bonus en dégâts d'attaque
                            [1] => Augmentation des soins
                            [2] => Vitesse de déplacement
                            [3] => Délai de récupération
                        )
                        [effect] => Array (
                            [0] => {{ rtotaladamp*100.000000 }}% -> {{ rtotaladampnl*100.000000 }}%
                            [1] => {{ rhealingamp*100.000000 }}% -> {{ rhealingampnl*100.000000 }}%
                            [2] => {{ rmovementspeedbonus*100.000000 }}% -> {{ rmovementspeedbonusnl*100.000000 }}%
                            [3] => {{ cooldown }} -> {{ cooldownNL }}
                        )
                    )
                    [maxrank] => 3
                    [cooldown] => Array (
                        [0] => 120
                        [1] => 100
                        [2] => 80
                    )
                    [cooldownBurn] => 120/100/80
                    [cost] => Array (
                        [0] => 0
                        [1] => 0
                        [2] => 0
                    )
                    [costBurn] => 0
                    [datavalues] => Array (

                    )
                    [effect] => Array (
                        [0] =>
                        [1] => Array (
                            [0] => 0
                            [1] => 0
                            [2] => 0
                            )
                            [2] => Array (
                                [0] => 0
                                [1] => 0
                                [2] => 0
                            )
                            [3] => Array (
                                [0] => 0
                                [1] => 0
                                [2] => 0
                            )
                            [4] => Array (
                                [0] => 0
                                [1] => 0
                                [2] => 0
                            )
                            [5] => Array (
                                [0] => 0
                                [1] => 0
                                [2] => 0
                            )
                            [6] => Array (
                                [0] => 0
                                [1] => 0
                                [2] => 0
                            )
                            [7] => Array (
                                [0] => 0
                                [1] => 0
                                [2] => 0
                            )
                            [8] => Array (
                                [0] => 0
                                [1] => 0
                                [2] => 0
                            )
                            [9] => Array (
                                [0] => 0
                                [1] => 0
                                [2] => 0
                            )
                            [10] => Array (
                                [0] => 0
                                [1] => 0
                                [2] => 0
                            )
                        )
                        [effectBurn] => Array (
                            [0] =>
                            [1] => 0
                            [2] => 0
                            [3] => 0
                            [4] => 0
                            [5] => 0
                            [6] => 0
                            [7] => 0
                            [8] => 0
                            [9] => 0
                            [10] => 0
                        )
                        [vars] => Array (

                        )
                        [costType] => Pas de coût
                        [maxammo] => -1
                        [range] => Array (
                            [0] => 25000
                            [1] => 25000
                            [2] => 25000
                        )
                        [rangeBurn] => 25000
                        [image] => Array (
                            [full] => AatroxR.png
                            [sprite] => spell0.png
                            [group] => spell
                            [x] => 432
                            [y] => 48
                            [w] => 48
                            [h] => 48
                        )
                        [resource] => Pas de coût
                    )
                )
                [passive] => Array (
                    [name] => Posture du massacreur
                    [description] => Régulièrement, la prochaine attaque de base d'Aatrox inflige des dégâts physiques supplémentaires et le soigne, selon un pourcentage des PV max de la cible.
                    [image] => Array (
                        [full] => Aatrox_Passive.png
                        [sprite] => passive0.png
                        [group] => passive
                        [x] => 0
                        [y] => 0
                        [w] => 48
                        [h] => 48
                    )
                )
                [recommended] => Array (

                )
            )
        )
    ID: Aatrox

    */

    include ('./skeleton/footer.php');
    ?>