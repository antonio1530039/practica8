<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php include "view/header.php"; ?>
	<hr>
	<section>
	<?php
	$controllerT = new MVC();

	$controllerT->enlacePaginasController();
	?>
	</section>
	<?php include "view/footer.php"; ?>
</body>
  	<!-- SELECT2 -->
    <link href="view/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <script src="view/assets/js/jquery-2.1.4.min.js"></script>
    <script src="view/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="view/assets/pages/jquery.form-advanced.init.js"></script>
</html>