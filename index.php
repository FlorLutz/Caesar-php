<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: rgba(0, 0, 0, 0.1);
        }
        header {
            background-image: url("img/background.png");
            height: 250px;
        }
        .card {
            height: calc(100vh - 250px);
            background-color: white;
            border-radius: 8px;
            margin-top: -24px;
            margin-left: 8px;
            margin-right: 8px;
            padding: 16px
        }
    </style>
</head>
<body>
    <header></header>
        <div class="card">
    <?php
        if(isset($_GET['encrypt'])) {
            echo '<p>Zu verschlüsseln: ' . $_GET['encrypt'] . '</p>';
            $array = str_split($_GET['encrypt']);
            // $resultArray = [];
            echo '<span>Verschlüsselung: </span>';
            foreach($array as $char) {
                echo toAlpha(toNumber($char) -1 + 1);
            };
        }
        if(isset($_GET['decrypt'])) {
            echo '<p>Zu entschlüsseln: ' . $_GET['decrypt'] . '</p>';
            $array = str_split($_GET['decrypt']);
            // $resultArray = [];
            echo '<span>Entschlüsselung: </span>';
            foreach($array as $char) {
                echo toAlpha(toNumber($char) -1 - 1);
            };
        }
    ?>
            <form>
                <p>Text verschlüsseln</p>
                <input name="encrypt"></input>
                <button type="submit">Verschlüsseln</button>
            </form>
            <form action="">
                <p>Text entschlüsseln</p>
                <input name="decrypt"></input>
                <button type="submit">Entschlüsseln</button>
            </form>
        </div>
</body>
</html>

<?php
function toNumber($dest)
{
    if ($dest)
        return ord(strtolower($dest)) - 96;
    else
        return 0;
}
function toAlpha($data){
    $alphabet =   array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    $alpha_flip = array_flip($alphabet);
    if($data <= 25){
      return $alphabet[$data];
    }
    elseif($data > 25){
      $dividend = ($data + 1);
      $alpha = '';
      $modulo;
      while ($dividend > 0){
        $modulo = ($dividend - 1) % 26;
        $alpha = $alphabet[$modulo] . $alpha;
        $dividend = floor((($dividend - $modulo) / 26));
      } 
      return $alpha;
    }
}
?>