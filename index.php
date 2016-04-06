<div class="show_image">
<form enctype="multipart/form-data" action="" method="POST">

    <div class="in"><input type="hidden" name="MAX_FILE_SIZE" value="1000000" /></div>

    <div class="in"><input type="number" name="rotate" placeholder="Задайте поворот от 0 - 360"/></div>

        <div class="in"><input type="text" name="width" placeholder="Задайте ширину в процентах "/></div>

            <div class="in"><input type="text" name="height" placeholder="Задайте длину в процентах"/></div>

    Отправить этот файл: <input name="image" type="file" />
    <br/>
    <input type="submit" value="Upload Image" />
</form>


<?php
if (!empty($_POST)) {
    $uploaddir = 'images/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    $width = $_POST['width'];
    $height = $_POST['height'];
    $rotate = $_POST['rotate'];
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }

    echo "<div class='print_image'> <img src='$uploadfile' width='$width%' height='$height%';></div>";

}
?>
</div>
<style>
    .show_image {
        margin: 0 auto;
        width: 70%;
    }
    .in > input {
        width: 100%;
        text-align: center;
    }
    img{
        transform: rotate(<?php echo $rotate;?>deg);
        position: absolute;
        margin: 10%;
    }
    .print_image {
        width: 100%;
        height: 100%;
        display: inline-block;
        position: relative;
    }
</style>
