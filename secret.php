<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Codes d'accès au serveur central de la NASA</title>
</head>
<body>
<?php
    if (isset($_POST["passwd"]) && $_POST["passwd"] == "kangourou") {
        ?>
        <h1>Voici les codes d'accès :</h1>
        <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>
        <p>
            Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes
            d'accès sont changés toutes les semaines.<br />
            La NASA vous remercie de votre visite.
        </p>
        <?php
    } else {
        header("Location: form.php?err=ko");
    }
?>
</body>
</html>