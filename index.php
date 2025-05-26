<?php
include 'functions.php';
require_once 'dbconnection.php';

$muscledata = getMuscles();

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymByPHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="title">GymByPHP</h1>
    <h1 class="sub">I am your new teacher, I will help you get bigger and stronger by going to the gym</h1>
    <h2 class="begin">Choose what you want to improve</h2>

    <div class="container">
        <form method="get">
            <select name="muscle_group">
                <option value="">Choose muscle</option>

                <?php foreach ($muscledata as $muscle): ?>

                    <option value="<?= $muscle['id'] ?>"><?= htmlspecialchars($muscle['muscle_group']) ?></option>
                
                <?php endforeach ?>
                    
            </select>
            <input type="submit" value="Show Exercises">
        </form>

        <?php
// if (isset($_POST['muscle_group']) && !empty($_POST['muscle_group'])) {
//     $selected_muscle = $_POST['muscle_group'];

//     // $stmt = $pdo->prepare("SELECT * FROM muscles WHERE muscle_group = :group");
//     // $stmt->execute(['group' => $selected_muscle]);
//     // $muscledata = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    

//     // $stmt = $pdo->prepare("SELECT * FROM exercises WHERE muscle_id = :id");
//     // $stmt->execute(['id' => $muscledata[0]['id']]);
//     // $muscle_exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     $muscle_exercises = getExercisesByMuscle($muscledata[0]['id']);

//     $schema = getSchema('bit_academy');

//     if (!empty($muscle_exercises)) {
//         echo '<div class="exercise-list">';
//         echo "<h2>{$selected_muscle} Exercises</h2>";
//         foreach ($muscle_exercises as $exercise) {
//         echo "<div class='exercise-item'>{$exercise['name']} {$exercise['sets']} {$exercise['reps']}</div>";
//         }
//         echo '</div>';
//     }
// }
        ?>
    </div>
</body>
</html>