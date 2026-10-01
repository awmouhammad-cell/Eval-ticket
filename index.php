<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="code" id ="code" placeholder="Code">
        <button type="submit">Valider</button>
    </form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticket";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        if (isset($_POST["code"])) {

            $code = $_POST["code"];

            if ($code == 0) {
                echo "Le code zéro est un cas particulier !";
            }
            elseif ($code >= 1 && $code <= 999) {

                $sql = "SELECT * FROM articles WHERE code = $code";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $row = $result->fetch_assoc();

                    echo "Le code " . $code . " est correct. L'information correspondante est : " . $row["article"] . ".";
                }
            }
            
            else {
                echo "Le code est incorrect, trop grand !";
            }

        }

    ?>
</body>
</html>