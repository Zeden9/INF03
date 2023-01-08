<?php

    $c = mysqli_connect("localhost", "root", "", "dane");

    $tytul = $_POST['tytul'];
    $gatunek = $_POST['gatunek'];
    $produkcja = $_POST['produkcja'];
    $ocena = $_POST['ocena'];
    
    $q = "INSERT INTO `filmy` (`gatunki_id`, `tytul`, `rok`, `ocena`) VALUES ($gatunek, '$tytul', $produkcja, $ocena)";

    mysqli_query($c, $q);

    echo"<p>Film '$tytul' został dodany do bazy</p>";
    mysqli_close($c);

?>