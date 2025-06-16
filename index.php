<?php
session_start(); 

include 'functions.php';
require_once 'dbconnection.php';


if (!isset($_SESSION['schedule'])) {
    $_SESSION['schedule'] = [];
}

$muscledata = getMuscles();
$muscleId = isset($_GET['muscle_id']) ? (int)$_GET['muscle_id'] : 0;
$muscleExercises = $muscleId > 0 ? getExercisesByMuscle($muscleId) : [];

if (isset($_POST['add_exercise'])) {
    $exerciseId = $_POST['exercise_id'];
    $sets = $_POST['sets'];
    $reps = $_POST['reps'];
    $exerciseName = $_POST['exercise_name'];
    
    if (!isset($_SESSION['schedule'][$exerciseId])) {
        $_SESSION['schedule'][$exerciseId] = [
            'name' => $exerciseName,
            'sets' => $sets,
            'reps' => $reps
        ];
    }
}

if (isset($_POST['remove_exercise'])) {
    $exerciseId = $_POST['exercise_id'];
    unset($_SESSION['schedule'][$exerciseId]);
}
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
    <header>
        <h1 class="title">GymByPHP</h1>
        <h1 class="sub">I am your new teacher, I will help you get bigger and stronger by going to the gym</h1>
        <h2 class="begin">Choose what you want to improve</h2>
    </header>

    <div class="main-container">
        <div class="exercises-column">
            <form method="get" class="muscle-select-form">
                <select name="muscle_id" autofocus>
                    <option value="">Choose muscle</option>
                    <?php foreach ($muscledata as $muscle): ?>
                        <option value="<?= $muscle['id'] ?>" <?= ($muscleId == $muscle['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($muscle['muscle_group']) ?>
                        </option>
                    <?php endforeach ?>                   
                </select>
                <input type="submit" value="Show Exercises">
            </form>

            <div class="exercise-list">
                <?php if ($muscleId > 0): ?>
                    <?php foreach ($muscleExercises as $exercise): ?>
                        <div class="exercise-item">
                            <span><?= htmlspecialchars($exercise['name']) ?></span>
                            <?php if (!isset($_SESSION['schedule'][$exercise['id']])): ?>
                                <form method="post" class="exercise-controls">
                                    <input type="hidden" name="exercise_id" value="<?= $exercise['id'] ?>">
                                    <input type="hidden" name="exercise_name" value="<?= $exercise['name'] ?>">
                                    <input type="number" name="sets" placeholder="Sets" required min="1" max="10">
                                    <input type="number" name="reps" placeholder="Reps" required min="1" max="100">
                                    <button type="submit" name="add_exercise" class="add-btn">Add</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php elseif (isset($_GET['muscle_id'])): ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="schedule-column">
            <?php if (!empty($_SESSION['schedule'])): ?>
                <div class="exercise-list">
                    <?php foreach ($_SESSION['schedule'] as $id => $exercise): ?>
                        <div class="exercise-item">
                            <span><?= htmlspecialchars($exercise['name']) ?> - <?= $exercise['sets'] ?> sets × <?= $exercise['reps'] ?> reps</span>
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="exercise_id" value="<?= $id ?>">
                                <button type="submit" name="remove_exercise" class="remove-btn">Remove</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
                <form action="schedule.php" method="post">
                    <button type="submit" class="save-schedule">Save Schedule</button>
                </form>
            <?php else: ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>