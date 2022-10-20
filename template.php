<!DOCTYPE html>
<html style="height: 100%;">
<head>
	<meta charset="utf-8">
	<meta name="viewport"content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
	<title>okay</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    

</head>
<body style="min-height: 100%; margin:0; padding:0; background-color: rgba(5,28,36,255);">
    <div class="" >
        <header>
            <nav class="navbar navbar-expand-sm" style="background-color : rgba(4,187,255,255);">
                <?php
                    $controleur = new Controleur;
                    $controleur->menu();
                ?>
            </nav>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>