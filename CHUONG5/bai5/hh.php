<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="hh.css">
</head>
<body>
    <form method="POST">
        TÍNH TOÁN SỐ HỌC
        <hr size="3">
        <br>
        Số thứ 1: <input type="number" name="so1" required><br><br>
        Số thứ 2: <input type="number" name="so2" required><br><br>
        Kết quả: <input type="text" name="ketqua" readonly 
        value="<?php echo isset($result) ? htmlspecialchars($result) : 'a'; ?>"><br><br>
        <button type="submit" name="action" value="uscln">USCLN</button>
        <button type="submit" name="action" value="bscnn">BSCNN</button>
    </form>
    <?php
        function uscln($a, $b){
            while ($b != 0) {
                $temp = $b;
                $b = $a % $b;
                $a = $temp;
            }
            return $a;
        }
        
        function bscnn($a, $b) {
            return abs($a * $b) / uscln($a, $b);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $so1 = intval($_POST['so1']);
            $so2 = intval($_POST['so2']);
            $action = $_POST['action'];
    
            if ($action === 'uscln') {
                $result = uscln($so1, $so2);
                
            } elseif ($action === 'bscnn') {
                $result = bscnn($so1, $so2);
            }
            return $result; 
        }
    ?>
</body>
</html>