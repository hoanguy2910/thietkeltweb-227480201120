<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table{
            border-collapse: collapse;
            border: 1px solid black;
            width: 200px;
            height: 200px;
        }
    </style>

    <table>
        <?php 
            for($i=1;$i<=8;$i++){
                echo"<tr>";
                for($j=1;$j<=8;$j++){
                    if(($i+$j)%2==0){
                        echo"<td style='background: black';></td>";
                    }else{
                        echo"<td style='background: white';></td>";
                    }
                }
                echo"</tr>";
            }
        ?>
    </table>
</body>
</html>