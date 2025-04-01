<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select>
        <?php 
            $hientai=Date("Y");
            for($year=1900;$year<=$hientai;$year++){
               echo" <option>$year</option>";
            }
        ?>
    </select>
</body>
</html>