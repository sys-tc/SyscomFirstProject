<?php

//ページング
$maxArticlesPerPage = 5;
$page = 1;

//値が存在するかつ、正の整数
if (isset($_GET['p']) && preg_match('/^[1-9][0-9]*$/', $_GET['p']))	{
	$page = $_GET['p'];
}

$offset = ($page - 1) * $maxArticlesPerPage;

//データベース接続処理
try {
	//データベースハンドル
	//array(PDO::ATTR_EMULATE_PREPARES=>false)はSQLインジェクション対策
	$dbh = new PDO('mysql:host=localhost;dbname=sample;charset=utf8','root','', array(PDO::ATTR_EMULATE_PREPARES=>false));
} catch(PDOException $e) {
	var_dump($e->getMessage());
	exit;
}
//DBから画面に表示する分の記事の情報を取得
	$sql = "select id, article from articles limit ? offset ?";
	$stmt = ($dbh->prepare($sql));
	//?(プレースホルダー)に動的に値を設定する。
	$stmt->execute(array($maxArticlesPerPage, $offset));
	//取得した項目を配列で取得する。
	$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// 合計記事数、ページ数を算出する。
	$totalArticles = $dbh->query("select count(id) from articles")->fetchColumn();
	$totalPages = ceil($totalArticles / $maxArticlesPerPage);
	//echo $totalPages;
	//var_dump($articles);

	//表示中の記事件数表示
	$from = $offset + 1;
	$to = $offset + $maxArticlesPerPage;
	if ($to > $totalArticles) {
		$to = $totalArticles;
	}
?>

<!DOCTYPE>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<tittle>ページング機能実装</tittle>
</head>
<body>
	<h1>記事一覧</h1>
	<p><?php echo $from ?>～<?php echo $to ?>件を表示/全<?php echo $totalArticles ?>件中</p>
	<ul>
		<?php foreach ($articles as $article) : ?>
			<!-- 	htmlspecialcharsはHTMLで特別な意味を持つ文言に対応する為の関数*! -->
			<li><?php echo htmlspecialchars($article['article'], ENT_QUOTES, 'UTF-8') ?></li>
		<?php endforeach?>
	</ul>
	<!-- HTMLで意味のある文言を使用する場合は実体参照を使用する。 -->
	<?php if ($page > 1) : ?>
		<a href="?p=<?php echo ($page - 1) ?>">&lt;</a>
	<?php endif ?>
	<?php for ($i = 1; $i <= $totalPages; $i++) : ?>
		<?php if ($i == $page) : ?>
			<strong><a href="?p=<?php echo $i ?>"><?php echo $i ?></a></strong>
		<?php else : ?>
			<a href="?p=<?php echo $i ?>"><?php echo $i ?></a>
		<?php endif ?>
	<?php endfor ?>
	<?php if ($page < $totalPages) : ?>
		<a href="?p=<?php echo ($page + 1) ?>">&gt;</a>
	<?php endif ?>
</body>
</html>