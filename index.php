<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/styles.css">
	<title>P6 - PHP One</title>
</head>

<?php
$data = file_get_contents("./assets/emoji.json");
$jsonData = json_decode($data, true);

// var_dump($jsonData);
?>

<body>
	<div id="emoji-display-container">
		<div id="emoji-display">
			<?php
			$index = 0;
			$page = 2;
			foreach ($jsonData as $key => $value) {
				if ($index >= 256 * $page) return;
				$emoji = $value["code_decimal"];

				echo "<p class='emoji'>$emoji</p>";

				$index++;
			}
			?>
		</div>
	</div>

</body>

</html>