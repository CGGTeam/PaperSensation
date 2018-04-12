
<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://use.typekit.net/gij1vpi.css">
        <link href="Style/main.css" rel="stylesheet" type="text/css">

        <!-- Adobe TypeKit fonts -->
        <link rel="stylesheet" href="https://use.typekit.net/gij1vpi.css">
    </head>
    <body class="">
    <div class="sHeader sHeaderLogin">
        <table class="headerTable">
            <tr>
                <td class="d1">
                    <span class="hCieName">PaperSensation</span>
                </td>
                <td class="d2">
                    <span class="hCentre"><?php if (isset($GLOBALS["titrePage"])) {
                            echo $GLOBALS["titrePage"];
                        } ?></span>
                </td>
                <td class="d3">
                    <?php
                        $utilisateur = null;
                        if (isset($_SESSION["utilisateurCourant"])) {
                            $utilisateur = $_SESSION["utilisateurCourant"];
                        }
                        if (!$utilisateur) {
                            ?>
                            Connexion
                            <?php
                        } else if (!isset($utilisateur->etatAdmin)) {
                            ?>
                            <span class="hDroite">Annuler</span>
                            <?php
                        } else if ($utilisateur->etatAdmin) {
                            ?>
                            <!--menu admin-->
                            Admin
                            <?php
                        } else {
                            ?>
                            <!--menu utilisateur-->
                            utilisateur
                            <?php
                        }
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="sContenuPage">