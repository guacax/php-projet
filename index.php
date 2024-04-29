<?php include ('./skeleton/header.php') ?>

    <link rel="stylesheet" href="./css/index.css">
    <title>Loldex</title>
</head>

<body>
    <h1>Le loldex de gua</h1>
    <h2><a href="items.php" >Items</a></h2>

    <?php
    $url = "https://ddragon.leagueoflegends.com/cdn/14.8.1/data/fr_FR/champion.json";

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
        $filteredChampions = $data;
    }

    ?>

    <form id="searchForm" method="get" action="">
        <input type="text" id="searchInput" name="search" placeholder="<?= $searchTerm ?>">
        <button type="submit" value="Rechercher un champion"><img src="./assets/search.svg" alt="search"></button>
        <?php
        if (!empty($searchTerm)) {
            ?><a href="./"><img src="./assets/close.svg"></a>
        <?php } ?>
    </form>


    <main>
        <?php
        foreach ($filteredChampions as $champions => $champion) {
            ?>

            <a href="detail_champion.php?id=<?= $champion['id'] ?>">
                <?php
                $image = $champion['image']; ?>
                <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/loading/<?= $champion['id'] ?>_0.jpg">
                <?php echo "<h2>" . $champion['name'] . "</h2>"; ?>
            </a>
            <?php
        }
        ?>
    </main>
    <script>
        $(document).ready(function () {
            $('#searchForm').on('submit', function (event) {
                event.preventDefault();

                var searchTerm = $('#searchInput').val();

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
    <?php include ('./skeleton/footer.php') ?>