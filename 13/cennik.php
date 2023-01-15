<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokoje</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="banera1">
        <h2>WYNAJEM POKOI</h2>
    </div>

    <nav>
        <div id="menu1">
            <a href="index.html">POKOJE</a>
        </div>
        <div id="menu2">
            <a href="cennik.php">CENNIK</a>
        </div>
        <div id="menu3">
            <a href="kalkulator.html">KALKULATOR</a>
        </div>
    </nav>

    <div id="banera2"></div>

    <main>
        <div id="lewy"></div>
        <div id="srodkowy">
            <h1>Cennik</h1>
            <table>
                <!-- skrypt -->
                <?php
                
                $c = mysqli_connect("localhost", "root", "", "wynajem");
                $q = "SELECT * FROM `pokoje`";
                $result = mysqli_query($c, $q);

                while($r = mysqli_fetch_row($result)){
                    echo" 
                        <tr>
                            <td>$r[0]</td>
                            <td>$r[1]</td>
                            <td>$r[2]</td>
                        </tr>
                    ";
                }
                
                ?>
            </table>
        </div>
        <div id="prawy"></div>
    </main>

    <footer>
        <p>Stronę opracował: Skaner</p>
    </footer>
    
</body>
</html>