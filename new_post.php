<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container">
            <div id="header">
                <h1>Nieuwe post</h1>
                <a href="index.php"><button>Alle posts</button></a>
            </div>
            <?php
            include 'connection.php';

            if (isset($_POST["submit"])) {
                $submit = $_POST["submit"];
                $titel = $_POST["titel"];
                $imglink = $_POST["imglink"];
                $inhoud = $_POST["inhoud"];
                $auteur = $_POST["auteurs"];
                if ($auteur == "Mounir Toub") {
                    $id = 1;
                }
                if ($auteur == "Miljuschka") {
                    $id = 2;
                }
                if ($auteur == "Wim Ballieu") {
                    $id = 3;
                }
                $query = "INSERT INTO posts (`titel`,`imglink`,`inhoud`, `auteurid`)
                VALUES (\"$titel\", \"$imglink\", \"$inhoud\", $id)";
                $query2 = "INSERT INTO auteurs(`naam_auteur`)
                VALUES (\"$auteur\")";
                $PDO->query($query);
            } else {
                ?>
            <form action="new_post.php" method="post">
            Titel:<br/> <input type="text" name="titel"><br/><br/>
            Auteur:<br/>
            <select name="auteurs" id="auteur">
                <option value="Mounir Toub">Mounir Toub</option>
                <option value="Miljuschka">Miljuschka</option>
                <option value="Wim Ballieu">Wim Ballieu</option>
            </select> <br/><br/>
            URL afbeelding:<br/> <input type="text" name="imglink"><br/><br/>
            Inhoud:<br/> <textarea name="inhoud" rows="10" cols="100"></textarea>
            <br/><br/>
            <input type="submit" name="submit" value="Publiceer">
            </form>
                <?php
            }
            ?>
    </body>
</html>