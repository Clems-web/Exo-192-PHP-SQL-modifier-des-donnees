<?php
/**
 * 1. Le dossier SQL contient l'export de ma table user.
 * 2. Trouvez comment importer cette table dans une des bases de données que vous avez créées, si vous le souhaitez vous pouvez en créer une nouvelle pour cet exercice.
 * 3. Assurez vous que les données soient bien présentes dans la table.
 * 4. Créez votre objet de connexion à la base de données comme nous l'avons vu
 * 5. Insérez un nouvel utilisateur dans la base de données user
 * 6. Modifiez cet utilisateur directement après avoir envoyé les données ( on imagine que vous vous êtes trompé )
 */

// TODO Votre code ici.

try {
    $server = "localhost";
    $db = "exo_192";
    $user = "root";
    $password = "";

    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*$sql = "
    INSERT INTO exo_192.user(nom, prenom, rue, numero, code_postal, ville, pays, mail)
    VALUES ('Jeff', 'Tuche', 'Rue des frites', '15', 59840, 'Fourmies', 'France', 'Tuche.Jeff@gmail.com')
";*/
    $nom = "Patrick";
    $id = 4;

    $sql = $pdo->prepare("UPDATE user SET nom = :nom WHERE id = :id");
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':id', $id);

    $sql->execute();
    echo "ok";
}
catch (PDOException $exception) {
    echo $exception->getMessage();
}



/**
 * Théorie
 * --------
 * Pour obtenir l'ID du dernier élément inséré en base de données, vous pouvez utiliser la méthode: $bdd->lastInsertId()
 *
 * $result = $bdd->execute();
 * if($result) {
 *     $id = $bdd->lastInsertId();
 * }
 */