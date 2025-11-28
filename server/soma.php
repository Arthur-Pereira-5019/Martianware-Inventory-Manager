<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="inputa">A</label>
        <input type="number" id ="inputA" name="a">

        <label for="inputb">B</label>
        <input type="number" id ="inputB" name="b">

        <input type="submit" value="Somar">
</form>
<?php if(isset($_GET['a'])) {?>
<p>Soma=<?php
    $a = $_GET['a'];
    $b = $_GET['b'];
    echo $a . "</br>";
    echo $b . "</br>";
    echo $a+$b;
    ?><p><?php } ?>
</body>
</html>