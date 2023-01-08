<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klub wędkowania</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    
    <header>
        <h2>Wędkuj z nami</h2>
    </header>


    <section id="lewy">
        <img src="ryba2.jpg" alt="Szczupak">
    </section>

    <section id="prawy">
        <h3>Ryby spokojnego żeru (białe)</h3>
        <?php
            $c = mysqli_connect("localhost", "root", "", "wedkowanie");

            $q = "SELECT `id`, `nazwa`, `wystepowanie` FROM `ryby` WHERE `styl_zycia` = '2'";

            $result = mysqli_query($c, $q);

            while($r=mysqli_fetch_assoc($result))
            {
                echo $r['id'] . ". " . $r['nazwa'] . ", występuje w: " . $r['wystepowanie'] . "<br>"; 
            }
        ?>
        <ol>
            <li><a href="https://wedkuje.pl" target="_blank">Odwiedź także</a></li>
            <li><a href="http://www.pzw.org.pl/" target="_blank">Polski Związek Wędkarski</a></li>
        </ol>
    </section>


    <footer>
        <p>Stronę wykonał: Ambasador pzw sosnowiecSSSSS</p>
    </footer>

</body>
</html>