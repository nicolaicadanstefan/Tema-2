<?php

//Algoritm vechi

// Salvarea coeficientilor la apasarea butonului de submit
// if (isset($_POST['submit'])) {
//     if ((empty($_POST['coef1']) && ($_POST['coef1'] != 0))) {
//         $error['coef1'] = "Te rog introdu coeficientul 1!";
//     } else if (is_numeric($_POST['coef1'])) {
//         $a = filter_input(INPUT_POST, 'coef1');
//         echo $a;
//     } else {
//         $error['coef1'] = "Te rog sa introduci doar numere!";
//     }
//     if ((empty($_POST['coef2']) && ($_POST['coef2'] != 0))) {
//         $error['coef2'] = "Te rog introdu coeficientul 2!";
//     } else if (is_numeric($_POST['coef2'])) {
//         $b = filter_input(INPUT_POST, 'coef1');
//         echo $b;
//     } else {
//         $error['coef2'] = "Te rog sa introduci doar numere!";
//     }
//     if ((empty($_POST['coef3']) && ($_POST['coef3'] != 0))) {
//         $error['coef3'] = "Te rog introdu coeficientul 3!";
//     } else if (is_numeric($_POST['coef3'])) {
//         $c = filter_input(INPUT_POST, 'coef1');
//         echo $c;
//     } else {
//         $error['coef3'] = "Te rog sa introduci doar numere!";
//     }
//     $radacinile = rezolvareaEcuatiei($a, $b, $c);
// }

//Algoritm imbunatatit

$a = $b = $c = "";
$error = array();
$radacinile = array();
if (isset($_POST['submit'])) {
    if (empty($_POST['coef1']) && ($_POST['coef1'] != 0)) {
        $error['coef1'] = "Va rog introduceti coeficientul 1!";
    } else {
        $a = test_input($_POST['coef1']);
        if (is_numeric($a)) {
            $coef1 = intval($a);
        }
    }
    if (empty($_POST['coef2']) && ($_POST['coef2'] != 0)) {
        $error['coef2'] = "Va rog introduceti coeficientul 2!";
    } else {
        $b = test_input($_POST['coef2']);
        if (is_numeric($b)) {
            $coef2 = intval($b);
        }
    }
    if (empty($_POST['coef3']) && ($_POST['coef3'] != 0)) {
        $error['coef3'] = "Va rog introduceti coeficientul 3!";
    } else {
        $c = test_input($_POST['coef3']);
        if (is_numeric($c)) {
            $coef3 = intval($c);
        }
    }
    $radacinile = rezolvareaEcuatiei($coef1, $coef2, $coef3);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Functia de calculat ecuatia de gradul 2:
function rezolvareaEcuatiei($a, $b, $c)
{
    if ($a == $b && $b == $c && $a == 0) {
        echo "Imposibil de rezolvat!";
    }
    if ($a > 0) {
        // calculam delta:
        $delta = pow($b, 2) - 4 * $a * $c;
        // calculam radacinile:
        if ($delta > 0) {
            $x1 = (-$b + sqrt($delta)) / (2 * $a);
            $x2 = (-$b - sqrt($delta)) / (2 * $a);
            return array($x1, $x2);
        } else if ($delta == 0) {
            $x1 = (-$b + sqrt($delta)) / (2 * $a);
            return array($x1);
        } else if ($delta < 0) {
            $complex = "Radacinile sunt numere complexe";
            return array($complex);
        }
    } else if ($a == 0) {
        $x1 = (-$c) / $b;
        return array($x1);
    } else if ($a < 0) {
        echo "!Coeficientul a > 0!";
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
            <label>a = </label>
            <input type="number" id="input1" placeholder="coeficientul 1" name="coef1" value='<?php echo $_POST['coef1'] ?? ''; ?>' min="0">
            <span class="error" style="color:red"><?php echo $error['coef1']; ?></span>
            <br>
            <label>b = </label>
            <input type="number" id="input2" placeholder="coeficientul 2" name="coef2" value='<?php echo $_POST['coef2'] ?? ''; ?>'>
            <span class="error" style="color:red"><?php echo $error['coef2']; ?></span>
            <br>
            <label>c = </label>
            <input type="number" id="input3" placeholder="coeficientul 3" name="coef3" value='<?php echo $_POST['coef3'] ?? ''; ?>'>
            <span class="error" style="color:red"><?php echo $error['coef3']; ?></span>
            <br>
            <button type="submit" name="submit" value="submit">Calculate</button>
        </form>
        <?php echo "Results:" ?>
        <?php
        if (is_nan(array_sum($radacinile))) {
            for ($i = 0; $i < sizeof($radacinile); $i++) {
                echo "(x" . "$i: " . $radacinile[$i] . " ) ";
            }
        } else {
            echo "Radacinile sunt numere complexe";
        }
        ?>
    </div>

</body>

</html>