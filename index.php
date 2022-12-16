<?php

$error = array();
// Salvarea coeficientilor la apasarea butonului de submit
if (isset($_POST['submit'])) {
    if (empty($_POST['coef1'])) {
        $error['coef1'] = "Te rog introdu coeficientul 1!";
    } else {
        $a = $_POST['coef1'];
        // echo $a;
    }
    if (empty($_POST['coef2'])) {
        $error['coef2'] = "Te rog introdu coeficientul 2!";
    } else {
        $b = $_POST['coef2'];
        // echo $b;
    }
    if (empty($_POST['coef3'])) {
        $error['coef3'] = "Te rog introdu coeficientul 3!";
    } else {
        $c = $_POST['coef3'];
        // echo $c;
    }
    $radacinile = rezolvareaEcuatiei($a, $b, $c);
}

// Functia de calculat ecuatia de gradul 2:
function rezolvareaEcuatiei($a, $b, $c)
{
    // calculam delta:
    $delta = pow($b, 2) - 4 * $a * $c;

    // calculam radacinile:
    if ($delta > 0) {
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        $x2 = (-$b - sqrt($delta)) / (2 * $a);
        return array($x1, $x2);
    } else if ($delta == 0) {
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        return $x1;
    } else {
        return "Radacinile sunt numere complexe";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div>
        <!-- Form cu coeficientii ecuatiei -->
        <form method="post" action=<?php echo $_SERVER["PHP_SELF"]; ?> id="my-form">
            <label>Coeficientul 1:</label>
            <input type="number" id="input1" name="coef1" value='<?php echo $_POST['coef1'] ?? ''; ?>' min="0">
            <span class="error" style="color:red"><?php echo $error['coef1']; ?></span>
            <br>
            <label>Coeficientul 2:</label>
            <input type="number" id="input2" name="coef2" value='<?php echo $_POST['coef2'] ?? ''; ?>' min="0">
            <span class="error" style="color:red"><?php echo $error['coef2']; ?></span>
            <br>
            <label>Coeficientul 3:</label>
            <input type="number" id="input3" name="coef3" value='<?php echo $_POST['coef3'] ?? ''; ?>' min="0">
            <span class="error" style="color:red"><?php echo $error['coef3']; ?></span>
            <br>
            <button type="submit" name="submit" value="submit">Calculate</button>
        </form>
        <?php echo "Results:" ?>
        <?php print_r($radacinile) ?>
    </div>

</body>

</html>