<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">
	<title>P6 - PHP One</title>
</head>

<?php
$data = file_get_contents("./assets/emoji.json");
$jsonData = json_decode($data, true);
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
?>

<body>

	<form method="get">
		<button type="submit" name="page" value="<?= $page - 1 <= 0 ? 1 : $page - 1 ?>" <?= $page <= 1 ? "disabled" : NULL ?>>Précédent</button>
		<button type="submit" name="page" value="<?= $page + 1 >= 5 ? 5 : $page + 1 ?>" <?= $page >= 5 ? "disabled" : NULL ?>>Suivant</button>
	</form>

	<div id="info">
		<p id="info-pages">Page: <?= $page; ?> / 5</p>
		<p id="info-legal"><a href="./legal">Mentions légales</a></p>
	</div>

	<div id="emoji-display-container">
		<div id="emoji-display">

			<?php
			$index = 0;
			foreach ($jsonData as $key => $value) {
				if ($index < 256 * $page && $index >= 256 * ($page - 1)) {
					$emoji = $value["code_decimal"];
					echo "<p class='emoji'>$emoji</p>";
				}
				$index++;
			}
			?>

		</div>
	</div>

</body>

</html>