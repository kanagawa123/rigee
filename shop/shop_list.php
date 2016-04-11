<?php


print "<font color='red' size=8 >Rigee</font>";
print "<font color='green' size=4 >Bicycle Shop</font>";
print '<br />';
session_start();
session_regenerate_id(true);
if (isset($_SESSION['member_login']) == false)
{
	print 'ようこそゲスト様　';
	print '<a href="member_login.html">会員ログイン</a><br />';
	print '<br />';
}
else
{
	print 'ようこそ';
	print $_SESSION['member_name'];
	print ' 様　';
	print '<a href="member_logout.php">ログアウト</a><br />';
	print '<br />';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ユビーネット</title>
</head>
<body bgcolor="99ffff">
<body>

<?php

try
{

$dsn = 'mysql:dbname=rigee;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT code,name,price FROM mst_product WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$dbh = null;

print '商品一覧<br /><br />';
//ggg
while (true)
{
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($rec == false)
	{
		break;
	}
	print '<a href="shop_product.php?procode='.$rec['code'].'">';
	print '<img src="../rigee-bicycle/gazou/'.$pro_gazou_name.'">';
	print '</a>';
	print '<br />';
}

print '<br />';
print '<a href="shop_cartlook.php">カートを見る</a><br />';

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>

</body>
</html>
