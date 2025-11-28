<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Minha página HTML!
    <?php
    echo "<br> "."Echo supremo! <br>";
    $nome="Romulo Beninca";
    echo $nome. "<br>"
    ?>
    <?php 
    $a=5;
    $b=7;
    echo "<p>".$a+$b. "</p>";
    $vetor = array(20, 19, 22, 19, 23);
    for($posicao = 0; $posicao < 5; $posicao++) {
        echo $vetor[$posicao] . '<br>';
    }
    $vetor3[0] = 6.5;
    $vetor3[2] = 4.5;
    $vetor3[3] = 6.7;
    $vetor3[4] = 32.5;
    $vetor3[5] = 99.5;
    foreach($vetor3 as $v) {
        echo $v;
    }
    echo "$GET".$_GET['nome']."<br>";
    //echo "SERVER". var_dump ($_SERVER)
    ?>
    
</body>
</html>