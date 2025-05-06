<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <?php 
            for($i=1;$i<=10;$i++){
                echo"<tr>";
                for($j=1;$j<=10;$j++){
                    $a=$i*$j;
                    echo "<td>$i x $j = $a</td>";
                }
                echo"</tr>";
            }
        ?>
    </table>
</body>
</html>