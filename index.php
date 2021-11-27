<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        include 'connection.php';
        $queryall = "SELECT auteurs.naam_auteur, posts.datum, posts.imglink, posts.titel, posts.inhoud, posts.likes, posts.id
        FROM posts
        INNER JOIN auteurs 
        ON posts.auteurid = auteurs.id
        ORDER BY likes DESC";
        $all = $PDO->query($queryall);
        $resultaat = $all->fetchAll(PDO::FETCH_ASSOC);
        $querychefs = "SELECT posts.auteurid, posts.likes, auteurs.naam_auteur
        FROM posts
        INNER JOIN auteurs
        ON posts.auteurid = auteurs.id
        HAVING posts.likes > 10
        ORDER BY likes DESC";
        $chefall = $PDO->query($querychefs);
        $chefsresultaat = $chefall->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="container">
            <div id="header">
                <h1>Foodblog</h1>
                <a href="new_post.php"><button>Nieuwe post</button></a>
            </div>  
            <h3>Populaire chefs</h3>
            <?php foreach ($chefsresultaat as $populair) { ?>
                <div id="chefs">
                    <ul>
                        <li><?= $populair ["naam_auteur"] ?></li>
                    </ul>
                </div>
                <?php
            }
            ?>
                <?php foreach ($resultaat as $post) { ?>
                    <div class="post">
                        <div class="header">
                            <h2><?= $post ["titel"] ?></h2>
                            <img src= <?= $post["imglink"] ?> >
                        </div>
                        <span class="details">Geschreven op:<?= $post ["datum"] ?><b> <?= $post["naam_auteur"] ?> </b></span>
                        <span class="right">
                            <a href="button.php?id=<?= $post["id"];?>">
                                <button type="submit" value="<?php echo $post['id']; ?>" name="likes">
                                    <?php echo $post['likes']; ?> like
                                </button>
                            </a>
                        </span>
                        <p><?= $post ["inhoud"] ?></p>
                    </div>
                    <?php
                }
                ?>
        </div>
    </body>
</html>
