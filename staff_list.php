<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print 'ログインされていません。<br>';
    print '<a href="../staff_login/staff_login.html"> ログイン画面へ </a>';
    exit();
}
else
{
    print $_SESSION['staff_name'];
    print 'さんログイン中<br>';
    print '<br>';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <!-- Custom styles for this template -->
    <link href="../bootstrap/css/signin.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>スタッフ一覧</title>
  </head>
<body>
<div class="container">

<?php

try
{

$dsn='mysql:dbname=shop;host=localhost;charset=utf8'; //DB接続コピペ
$user='root';
$password='123456';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name FROM mst_staff WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null; //DB切断

print '<h1>スタッフ一覧</h1><br>';

print '<form method="post" action="staff_branch.php">';
while(true)
{
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false)
    {
        break;
    }
    print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
    print $rec['name'];
    print '<br>';
}
print '<br>';
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '</form>';
}
catch (Exception $e)
{
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>
    </div> <!-- /container -->

    <script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>