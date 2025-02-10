<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>Koło szachowe gambit piona</h2>
    </header>
    <main>
        <section id="lewy">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1.png">kwerenda1</a></li>
                <li><a href="kw2.png">kwerenda2</a></li>
                <li><a href="kw3.png">kwerenda3</a></li>
                <li><a href="kw4.png">kwerenda4</a></li>
            </ul>
            <img src="logo.png" alt="Logo koła szachowego">
        </section>
        <section id="prawy">
            <h3>Najlepsi gracze naszego koła</h3>
            <table>
                <thead>
                    <tr>
                        <th>Pozycja</th>
                        <th>Pseudonim</th>
                        <th>Tytuł</th>
                        <th>Ranking</th>
                        <th>Klasa</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Wypełnione przez Skrypt 1 
                    SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC;
                    SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;
                    UPDATE zawodnicy SET klasa='5A' WHERE klasa='4A';
                    SELECT pseudonim, data_zdobycia, DATEDIFF(CURRENT_DATE, data_zdobycia) AS 'dni' FROM zawodnicy WHERE tytul != '';
                    
                    Logo 320px na 320px logo.png 
                    Dwa pliki plansza i pionki musilismy wysiac tło nałożyć na siebie wykadrować wyskalować i nałożyć jedno na drugie
                    
                    PHP CSS 
                    Header z h2
                    Aside z listą ul z przekierowaniami do ss z sql
                    Section h4 "Najlepszi gracze naszego koła" pod tabelka(PHP) i paragraf
                    Fotter Strone wykonał 
                    
                    jeszcze tu macie php kod 
                    -->
                            <?php
                                $conn=mysqli_connect('localhost', 'root', '', 'szachy');
                                $zapytanie="SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC";
                                $wynik=mysqli_query($conn,$zapytanie);
                                $position = 1;
                    
                                if(mysqli_num_rows($wynik)>0) {
                                    echo "<table>";
                                    echo "<tr><th>Pozycja</th><th>Pseudonim</th><th>Tytuł</th><th>Ranking</th><th>Klasa</th></tr>";
                                    while($row=mysqli_fetch_row($wynik)) {
                                        echo"<tr><td>$position</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                                        $position++;
                                    }
                                    echo "</table>";
                                }
                                mysqli_close($conn);
                            ?>
                </tbody>
            </table>
            <form method="post" action="skrypt2.php">
                <button type="submit">Losuj nową parę graczy</button>
            </form>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: TW-egzaminator</p>
    </footer>
</body>
</html>