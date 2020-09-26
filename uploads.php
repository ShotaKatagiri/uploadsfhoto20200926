<?php

const IMGS_PATH = 'images/';

if (!empty($_FILES)) {
    if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
        $name = $_FILES['userfile']['name'];
        $name = mb_convert_encoding($name, 'cp932', 'utf8');
        $temp = $_FILES['userfile']['tmp_name'];
        $result = move_uploaded_file($temp, IMGS_PATH . $name);
        if ($result == true) {

            $message = 'ファイルをアップロードしました。';
        } else {
            $message = 'ファイルの移動に失敗しました。';
        }
    } elseif ($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE) {
        $message = 'ファイルがアップロードされませんでした。';
    } else {
        $message = 'ファイルのアップロードに失敗しました。';
    }
}



?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>アップロードテスト</title>
</head>

<body>
<h1>アップロードテスト</h1>
<?php if (isset($message)):?>
<p><?=$message?></p>
<?php endif;?>

<form action="" method="post" enctype="multipart/form-data">
    <p>ファイル：<input type="file" name="userfile"></p>
    <p><input type="submit" value="送信"></p>
</form>


</body>

</html>