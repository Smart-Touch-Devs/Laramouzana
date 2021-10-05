<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/confirm.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<div class="center" >

	<div class="content">
		<div class="header">
			<h2>Message de confirmation</h2>

		</div>
		<label for="click" class="fas fa-check"></label>
		<p>{{ $text }}</p>
		<div class="line"></div>
		<label for="click" class="close-btn">Laramouzana.com</label>
	</div>
</body>

</html>
