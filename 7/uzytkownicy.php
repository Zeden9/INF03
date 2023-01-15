<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <div id="lewy">
            <h2>Nasze osiedle</h2>
        </div>
        <div id="prawy">
            <!-- skrypt1 -->
            <?php
                $c = mysqli_connect("localhost", "root", "", "portal");
                $q = "SELECT count(*) FROM `dane`";

                $result = mysqli_query($c, $q);
                while($r = mysqli_fetch_row($result)){
                    echo "Liczba użytkowników na portalu: $r[0]";
                }
                mysqli_close($c)
            ?>

        </div>
    </header>
    

    <main>
        <div id="lewy">
            <h3>Logowanie</h3>
            <form action="#" method="post">
                <label for="login">Login</label><br>
                <input type="text" name="login" id="login"><br>

                <label for="haslo">haslo</label><br>
                <input type="password" name="haslo" id="haslo">

                <button type="submit">Zaloguj</button>
            </form>
        </div>

        <div id="prawy">
            <h3>Wizytówka</h3>
            <div id="wizytowka">
                <!-- skrypt2 -->
                <?php
                    if(!empty($_POST['login']) && !empty($_POST['haslo'])){
                        $login = $_POST['login'];
                        $haslo = $_POST['haslo'];

                        $c = mysqli_connect("localhost", "root", "", "portal");
                        $q = "SELECT `haslo` FROM `uzytkownicy` WHERE `login`='$login'";
                        $result = mysqli_query($c, $q); 


                        if($r = mysqli_fetch_assoc($result)){  #Jeżeli login się zgadza
                    
                            $hashlo = sha1($haslo);
                            if($hashlo == $r['haslo']){        #Jeżeli hasło się zgadza
                                
                                
                                
                                $q = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM `uzytkownicy` JOIN dane ON dane.id = uzytkownicy.id WHERE uzytkownicy.login = '$login'";
                                $result = mysqli_query($c, $q);

                                while($r = mysqli_fetch_row($result)){
                                    $wiek = date("Y") - $r[1];
                                    echo"
                                    <img src='$r[4]' alt='osoba'>
                                    <h4>$r[0] ($wiek)</h4>
                                    <p>hobby: $r[3]</p>
                                    <h1><img src='icon-on.png'> $r[2]</h1>    
                                    <a href='dane.html'><button>Więcej informacji</button></a>
                                    ";
                                }


                            }
                            else{                              #Jeżeli hasło się nie zgadza
                                echo "Hasło nieprawidłowe";
                            }
                        }
                        else{                                  #Jeżeli login się nie zgadza
                            echo "login nie istnieje";
                        }

                     
                    }
                     
                ?>
            </div>
        </div>
    </main>


    <footer>
        Stronę wykonał: dj czebany jarnuch
    </footer>
</body>
</html>