<?php

if(isset($_POST['disp'])==true) //参照
{
    if(isset($_POST['staffcode'])==false)
    {
        header('Location:staff_ng.php');
        exit();
    }
    $staff_code=$_POST['staffcode'];
    header('Location:staff_disp.php?staffcode='.$staff_code);
    exit();
}

if(isset($_POST['add'])==true) //追加
{
    header('Location:staff_add.php');
    exit();
}

if(isset($_POST['edit'])==true) //編集
{
    if(isset($_POST['staffcode'])==false)
    {
        header('Location:staff_ng.php');
        exit();
    }
    $staff_code=$_POST['staffcode'];
    header('Location:staff_edit.php?staffcode='.$staff_code);
    exit();
}

if(isset($_POST['delete'])==true) //削除
{
    if(isset($_POST['staffcode'])==false)
    {
        header('Location:staff_ng.php');
        exit();
    }
    $staff_code=$_POST['staffcode'];
    header('Location:staff_delete.php?staffcode='.$staff_code);
    exit();
}

?>

</body>
</html>