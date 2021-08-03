<?php
session_start();
include('db_conn.php');


// thêm mới tài khoản 
if(isset($_POST['registerbtn']))
{
    $names = $_POST['songname'];
    $imge = $_POST['img'];
    $mp3 = $_POST['mp3'];
    $price = $_POST['price'];
    $lyric = $_POST['lyric'];


    $query = "INSERT INTO `song`(`song_name`, `song_img`, `song_mp3`, `song_price`, `song_lyric`) VALUES 
    ('$names','$imge','$mp3','$price','$lyric')";
    $query_run = mysqli_query($conn,$query);
    if($query_run)
    {
        $_SESSION['success'] = "Song is Added";// save
        header('location: product.php');
    }
    else
    {
        $_SESSION['status'] = "Song not Added";
        header('product: product.php');
    }
}

// kêt thúc thêm mới tài khoản

// suar taif khaoanf

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $fullname = $_POST['edit_fullname'];
    $pass = $_POST['edit_password'];
    $roles = $_POST['edit_roles'];


    $query = "UPDATE song set username = '$username', name = '$fullname', password = '$pass', role = '$roles' WHERE id = '$id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        $query_run = $_SESSION['success'] = "Your data is update";
        header("Location: product.php");
    }
    else
    {
        $query_run = $_SESSION['status'] = "Your data not update";
        header('Location: product.php');
    }
}


if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE  FROM song WHERE song_id = '$id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        $query_run = $_SESSION['success'] = "Your data is delete";
        header("Location: product.php");
    }
    else
    {
        $query_run = $_SESSION['status'] = "Your data not delete";
        header('Location: product.php');
    }

}

?>