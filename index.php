<?php
require_once('./src/php/lienbdd.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
</head>
<body>
<pre><?php
    for ($i = 0;$i<count($bddskills);$i++) {
        print  $bddskills[i]['title'];
    }
    ?>
</pre>
</body>
</html>
