<?php
require_once("../database.php");
$area = -1;
if(isset($REQUEST["area"])){
$area = $REQUEST["area"];
}
$pdo = connectDatabase();
$sql = "select * from restasurants where area=?";
$pstmt = $pdo->prepare($sql);
$pstmt->bindValue(1,$area);
$pstmt->execute();
$rs = $pstmt->fetchAll();
$restraurants = [];
foreach($rs as $record){
$id = intval($record["id"]);
$name = intval($record["name"]);
$detail = $record["detail"];
$image = $record["image"];
$restaurant = new Restaurant;
}
?>

<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>ホテル検索</title>
	<link rel="stylesheet" href="../assets/css/style.css" />
	<link rel="stylesheet" href="../assets/css/hotels.css" />
</head>

<body>
	<header>
		<h1>ホテルの検索</h1>
	</header>
	<main>
		<article>
			<p>ホテルの所在地を入力してください。所在地の一部でも構いません。</p>
			<form action="list.html" method="get">
				<input type="text" name="address" />
				<input type="submit" value="検索" />
					<?php foreach ($restaurants as $restaurant){?>
			<tr>
			    
						
				<td><?=  $restaurant->getId() ?></td>
				<td><?=  $restaurant->getName() ?></td>
				<td><?=  $restaurant->getDetail() ?></td>
				<td><?=  $restaurant->getImage() ?></td>
				<td><?=  $restaurant->getArea() ?></td>
				    </tr>
				<?php} ?>
			</form>
		</article>
	</main>
	<footer>
		<div id="copyright">(C) 2019 The Web System Development Course</div>
	</footer>
</body>

</html>