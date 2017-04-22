<?php
require_once('dbcrud.php');
//変数の初期値入力

$dbGoodsId = '更新のIDが表示されます';
$dbGoodsName = '更新の値が表示されます';
$Price = '更新の値が表示されます';

$dbGoods = new dbcrud();
//更新処理
if(isset($_POST['submitUpdate'])){
	$dbGoods->UpdateGoods();
}
//更新用フォーム要素の表示
if(isset($_POST['update'])){
	//更新対象の値を取得
	$dbGoodsId   = $_POST['id'];
	$dbGoodsName = $dbGoods->GoodsNameForUpdate($_POST['id']);
	$Price     = $dbGoods->PriceForUpdate($_POST['id']);
}
//削除処理
if(isset($_POST['delete'])){
	$dbGoods->DeleteGoods($_POST['id']);
}
//新規登録処理
if(isset($_POST['submitEntry'])){
	$dbGoods->InsertGoods();
}
//テーブルデータの一覧表示
$data = $dbGoods->SelectGoodsAll();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>title</title>
<script type="text/javascript">
function CheckDelete(){
    return confirm("削除してもよろしいですか？");
}
</script>
</head>
<body>
<h1>CRUD</h1>
<h3>新規登録</h3>
<form action="" method="post">
<label>カラム1<input type='text' name='GoodsID' size="30" required></label>
<label>カラム2<input type='text' name='GoodsName' size="30" required></label>
<label>カラム3<input type='text' name='Price' size="30" required></label>
<input type='submit' name='submitEntry' value=' 　新規登録　 '>
</form>

<div>
<?php echo $data;?>
</div>

<h2>update</h2>

<form action="" method="post">
<p>GoodsID: <?php echo $dbGoodsId;?></p>
<input type="hidden" name="GoodsID" value="<?php echo $dbGoodsId;?>" />
<label>カラム2:<input type='text' name='GoodsName'
 size="30" value="<?php echo $dbGoodsName;?>" required></label>
<label>カラム3:<input type='text' name='Price'
 size="30" value="<?php echo $Price;?>" required></label>
<input type='submit' name='submitUpdate' value=' 　更新　 '>
</form>

</body>
</html>