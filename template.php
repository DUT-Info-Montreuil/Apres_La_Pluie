<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>okay</title>
</head>
<body>
    <header>
        
        <?php
            $controleur = new Controleur;
            $controleur->menu();
        ?>
    </header>

    <main>
        <?php
            global $affichage;
            echo $affichage;
        ?>
    </main>
    

    <footer>
        <p>Apres la pluie copyright</p>
    </footer>
</body>
</html>