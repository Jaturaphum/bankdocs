<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money888</title>

    <link rel="stylesheet" href="style_index.css">
</head>

<body>
    <h3>ฝากเงิน</h3>
    <?php

    $name = $_GET["name"];

    echo "ยอดจำนวนเงินฝาก : " . "$name" . "  บาท" . "<br>";
    ?>
    <?php
    echo "วันที่ " .date("d/m/Y") . "<br>";
    echo "เวลา " . date("H:i:sa") ."<br>";
?>
    <meta charset="utf-8">
    <title>รายการฝากเงิน</title>
    <?php
    echo '<script type="text/javascript">';
    echo ' alert("ฝากเงินสำเร็จ")';  //not showing an alert box.
    echo '</script>';
    ?>
<menuitem><a style = "background-color: white" href="index.php">กลับหน้าหลัก</a></menuitem>

</body>

</html>