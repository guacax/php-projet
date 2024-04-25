<?php
include ('./skeleton/header.php');

$url = "https://ddragon.leagueoflegends.com/cdn/14.5.1/data/fr_FR/item.json";

$response = file_get_contents($url);

$dataDecoded = json_decode($response, true);

$data = $dataDecoded['data'];
if (isset($_GET['id'])) {
	$itemId = $_GET['id'];

	foreach ($data as $itemKey => $item) {
		if ($itemId == $itemKey) {
			?>
			<link rel="stylesheet" href="./css/detail_item.css">
			<title><?= $item['name'] ?></title>
			</head>

			<body>
				<a href="items.php">Liste des items</a><br>
				<p>Item Name: <?= $item['name'] ?></p><br>
				<p>Bonus: <?= $item['description'] ?></p><br>
				<?php
					if ($item['plaintext'] !== '') {
						?>
						<p>Description: <?= $item['plaintext'] ?></p><br>
						<?php
					}
				?>
				<p>Prix : <?= $item['gold']['base'] ?> golds</p><br>
				<img src="https://ddragon.leagueoflegends.com/cdn/14.5.1/img/item/<?= $itemId ?>.png"> <br>
				<?php
				if (isset($item['into'])) {
					echo "<p>Peut se transformer en :</p>";
					echo "<div class='intoFrom'>";
					foreach ($item['into'] as $intoItemId) {
						?>
						<a href="detail_item.php?id=<?= $intoItemId ?>">
							<div class="transform">
								<p><?= $data[$intoItemId]['name'] ?></p><br>
								<img src="https://ddragon.leagueoflegends.com/cdn/14.5.1/img/item/<?= $intoItemId ?>.png">
							</div>
						</a>
						<?php
					}
					echo "</div>";
				}
				if (isset($item['from'])) {
					echo "<p>Peut s'obtenir avec ces items :</p>";
					echo "<div class='intoFrom'>";
					foreach ($item['from'] as $fromItemId) {
						?>
						<a href="detail_item.php?id=<?= $fromItemId ?>">
							<div class="transform">
								<p><?= $data[$fromItemId]['name'] ?></p><br>
								<img src="https://ddragon.leagueoflegends.com/cdn/14.5.1/img/item/<?= $fromItemId ?>.png">
							</div>
						</a>
						<?php
					}
					echo "</div>";
				}
		}
	}
} else {
	echo "Item ID not provided.";
}

include ('./skeleton/footer.php');
?>