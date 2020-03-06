<?php
require_once ROOT . '/Views/header.php';
require_once ROOT . '/Views/nav.php';
?>
<div id="content" class="row justify-content-center margeTop border">
    <div class="container-fluid col-md-6">
        <div class="raw">
            <form method="post">
                <select name="month">
                    <?php
                    //affichage de liste des mois
                    foreach ($yearMonths as $monthsNumber => $yearMonth):
                        ?>
                        <option value="<?= $monthsNumber + 1 ?>" <?php if (!empty($_POST['month'])) {
                        if ($_POST['month'] == $monthsNumber + 1) {
                            echo "selected";
                        } else {
                            echo '';
                        }
                    } ?> ?><?= $yearMonth ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="year">
<?php
//affichage de la liste des années
for ($year = $currentYear; $year <= $NextYear; $year ++):
    ?>
                        <option value="<?= $year ?>" <?= ($selectedYear == $year) ? 'selected' : '' ?>><?= $year ?></option>
                    <?php endfor; ?>
                </select>
                <input type="submit" />
            </form>
            <h2><?php if (!empty($_POST['month'])) {
                        echo $yearMonths[$_POST['month'] - 1];
                    } else {
                        echo"";
                    } ?> <?= $selectedYear ?></h2>
            <table class="table table-bordered">
                <thead class="bg-sandybrown text-white">
                        <?php
                        //affichage de l'entête du tableau avec les jours de la semaine contenu dans la table $weekDays
                        foreach ($weekDays as $weekDay):
                            ?>
                    <th><?= $weekDay ?></th>
                        <?php endforeach; ?>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        //bloucle initialisé à true
                        $loop = true;
                        //compteur de cellule(s)
                        $cell = 1;
                        //compteur de jour(s)
                        $day = 1;
                        //nombre de cellules requises pour le tableau
                        $requiredCells = $daysinMont + $firstDayinMonthinWeek - 1;
                        while ($loop) {
                            //si le jour ne commence pas un lundi ou si le nombre de cellules est supérieur au nombre de jours dans le mois, on fait des cellules vides
                            if ($firstDayinMonthinWeek > $cell || $cell > $requiredCells) {
                                ?>
                                <td class="bg-light"></td>
                                <?php
                            }
                            //sinon on écrit le numéro du jour dans la cellule
                            else {
                                ?>
                                <td class="bg-bisque"><?= $day ?></td>
                                <?php
                                $day++;
                            }
                            if ($cell % 7 == 0) {  //si le nombre de cellules est divisible par 7 (corresponodant au nb de jour de la semaine), 7, 14, 21, 28
                                //si le nombre de cellule est supérieur au nombre de cellules requises, on arrête la boucleet on fait une nouvelle ligne
                                if ($cell >= $requiredCells) {
                                    break;
                                }
                                ?>
                            </tr><tr>
        <?php
    }
    //on incrémente le nombre de cellules
    $cell++;
}
?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once 'footer.php';

