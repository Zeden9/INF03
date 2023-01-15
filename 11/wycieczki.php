<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>

    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>

    <main>
        <div id="lewy">
            <h2>KONTAKT</h2>
            <a href="mailto:biuro@wycieczki.pl">Napisz do nas</a>
            <p>telefon: 555666777</p>
        </div>

        <div id="srodkowy">
            <h2>GALERIA</h2>
            <!-- Skrypt1 -->
            <?php
                $c = mysqli_connect("localhost", "root", "", "egzamin3");
                $q = "SELECT `nazwaPliku`, `podpis` FROM `zdjecia` ORDER BY `podpis` ASC;";
                $result = mysqli_query($c, $q);

                while($r = mysqli_fetch_row($result)){
                    echo"
                    <img src='$r[0]' alt='$r[1]'>
                    ";
                }

            ?>
        </div>

        <div id="prawy">
            <h2>PROMOCJE</h2>
            <table>
                <tr>
                    <td>Jesień</td>
                    <td>Grupa 4+</td>
                    <td>Grupa 10+</td>
                </tr>
                <tr>
                    <td>5%</td>
                    <td>10%</td>
                    <td>15%</td>
                </tr>
            </table>
        </div>
    </main>

    <section>
        <h2>LISTA WYCIECZEK</h2>
        <!-- Skrypt2 -->
        <?php
            $q2 = "SELECT `id`, `dataWyjazdu`, `cel`, `cena` FROM `wycieczki` WHERE `dostepna` = TRUE";

            $result2 = mysqli_query($c, $q2);

            while($row = mysqli_fetch_row($result2)){
                echo "
                    $row[0]. $row[1], $row[2], cena: $row[3]<br>
                ";
            }
            mysqli_close($c);
        ?>
    </section>

    <footer>
        <p>Stronę wykonał: Scatman John</p>
    </footer>
</body>
</html>