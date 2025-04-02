<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <style>
        td {
            width: 20px;
            height: 20px;

        }
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .gop{
            display: flex;
            justify-content: center;
            justify-items: center;
            height: 100vh;
        }
    </style>
    <div class="gop">
        <table>
            <?php
            for ($i = 1; $i <= 8; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= 8; $j++) {
                    if (($i + $j) % 2 == 0) {
                        echo "<td style='background: black';></td>";
                    } else {
                        echo "<td></td>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>