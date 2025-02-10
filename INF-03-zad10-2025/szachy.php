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
        <section id="left-block">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1.png">kwerenda1</a></li>
                <li><a href="kw2.png">kwerenda2</a></li>
                <li><a href="kw3.png">kwerenda3</a></li>
                <li><a href="kw4.png">kwerenda4</a></li>
            </ul>
            <img src="logo.png" alt="Logo koła szachowego">
        </section>
        <section id="right-block">
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
                            <?php
                                $conn=mysqli_connect('localhost', 'root', '', 'szachy');
                                $zapytanie="SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC";
                                $wynik=mysqli_query($conn,$zapytanie);
                                $position = 1;
                    
                                if(mysqli_num_rows($wynik)>0) {
                                    while($row=mysqli_fetch_row($wynik)) {
                                        echo"<tr><td>$position</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                                        $position++;
                                    }
                                    
                                }
                                mysqli_close($conn);
                            ?>
                </tbody>
            </table>
            <form method="post" action="">
					<button type="submit" name = "submit" >Losuj nową parę graczy</button>
					<?php
						if (isset($_POST["submit"]))
						{
							$conn=mysqli_connect('localhost', 'root', '', 'szachy');
							$zapytanie="SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
							$wynik=mysqli_query($conn,$zapytanie);
							 echo "<h4>";
							while($row=mysqli_fetch_row($wynik))
							{
								echo "<span> $row[0] $row[1] </span>";
							}
							 
							 echo "</h4>";
							 mysqli_close($conn);
						}							
					?>
			</form>
			<p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: TW-egzaminator</p>
    </footer>
</body>
</html>