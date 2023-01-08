<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header></header>

    <section id="lewy">

        <img src="Avatar.png" alt="Użytkownik forum">
        <!-- skrypt1             -->
        <?php
            $c = mysqli_connect("localhost", "root", "", "forumpsy");

            $q = "SELECT `nick`, `postow`, pytania.pytanie FROM `konta` JOIN pytania ON pytania.konta_id=konta.id WHERE pytania.id = 1";

            $result = mysqli_query($c, $q);

            while($r=mysqli_fetch_assoc($result))
            {
                echo "<h4>Użytkownik: " . $r['nick'] . "</h4>";
                echo "<p>" . $r['postow'] . " postów na forum</p>";
                echo "<p>" . $r['pytanie'] . "</p>";
                
            }

        ?>
        <video src="video.mp4" loop controls></video>

    </section>

    <section id="prawy">

        <form action="index.php" method="post">
            <textarea name="odpowiedz" id="odpowiedz" cols="40" rows="4"></textarea><br>
            <button type="submit">Dodaj odpowiedź</button>
            <!-- skrypt2 -->
            <?php
                $odpowiedz = $_POST['odpowiedz'];
                if($odpowiedz != null)
                {
                    $q = "INSERT INTO odpowiedzi (`Pytania_id`, `konta_id`, `odpowiedz`) VALUES (1, 5,'$odpowiedz')";
                    mysqli_query($c, $q);
                }          
            ?>
        </form>
        <h2>Odpowiedzi na pytanie</h2>
        <ol>
            <?php

                $q = "SELECT odpowiedzi.id, `odpowiedz`, konta.nick FROM `odpowiedzi` JOIN konta ON odpowiedzi.konta_id = konta.id WHERE odpowiedzi.Pytania_id=1";

                $result = mysqli_query($c, $q);

                while($r=mysqli_fetch_assoc($result))
                {
                    echo "<li>" . $r['odpowiedz'] . " <i>" . $r['nick'] . "</i></li><hr>";
                }

                mysqli_close($c)
            ?>
            
        </ol>

    </section>

    <footer>
        <p>Autor: ruchał ci starą, <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a></p>
    </footer>

</body>
</html>