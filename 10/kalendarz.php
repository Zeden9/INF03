<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <div id="pierwszy">
            <img src="logo1.png" alt="Mój kalendarz">
        </div>

        <div id="drugi">
            <h1>KALENDARZ</h1>
            <!-- skrypt1 -->
            <?php
                $c = mysqli_connect("localhost", "root", "", "egzamin5");
                $q = "SELECT `miesiac`, `rok` FROM `zadania` WHERE `dataZadania` = '2020-07-01'";

                $result = mysqli_query($c, $q);

                while($r = mysqli_fetch_assoc($result)){
                    echo "miesiąc: " . $r['miesiac'] . ", rok: ". $r['rok'];
                }
            ?>

        </div>
    </header>
    

    <main>

    <!-- Bloki kalendarzowe, skrypt2 -->
        <?php
            $q = "SELECT `dataZadania`, `wpis` FROM `zadania` WHERE `miesiac` = 'Lipiec'";

            $result = mysqli_query($c, $q);

            while($r = mysqli_fetch_row($result)){
                echo "
                    <div class='dzien'>
                        <h5>$r[0]</h5>
                        <p>$r[1]</p>
                    </div>
                ";
            }
            mysqli_close($c);
        ?>

    </main>


    <footer>
        <form action="#" method="post">
            <label for="wpis">Dodaj wpis:</label>
            <input type="text" name="wpis" id="wpis">
            <button type="submit">DODAJ</button>
        </form>
        <?php
            if(!empty($_POST['wpis'])){
                $c = mysqli_connect("localhost", "root", "", "egzamin5");
                $wpis = $_POST['wpis'];
                $q = "UPDATE `zadania` SET `wpis`='$wpis' WHERE `dataZadania` = '2020-07-13'";

                mysqli_query($c, $q);
                mysqli_close($c);

            }
        ?>
        <p>Stronę wykonał: MC Hammer</p>

        <a href="logo1.png" download="">arek</a>
    </footer>

</body>
</html>