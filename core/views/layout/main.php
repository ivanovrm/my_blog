<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" href=""><?php /*подключать файлы циклом*/?>
</head>
<body>
    <h2>Привет</h2>
    <?php include $this->basePath . $tplName . '.php'; ?>
</body>
</html>
