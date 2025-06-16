<?php
session_start(); 
require_once 'dbconnection.php';
require_once 'functions.php';

// Handle creating new schedule
if (isset($_POST['new_schedule'])) {
    clearsesion();
    header('Location: index.php');
    exit();
}

// Get schedule from session
$schedule = $_SESSION['schedule'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Workout Schedule - GymByPHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Your Workout Schedule</h1>
        
        <?php if (!empty($schedule)): ?>
            <div class="exercise-list">
                <?php foreach ($schedule as $exercise): ?>
                    <div class="exercise-item">
                        <?= htmlspecialchars($exercise['name']) ?> - 
                        <?= $exercise['sets'] ?> sets × 
                        <?= $exercise['reps'] ?> reps
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="no-exercises">No saved schedule found.</p>
        <?php endif; ?>

        <div style="margin-top: 20px;">
            <form method="post">
                <button type="submit" name="new_schedule" class="save-schedule">Create New Schedule</button>
            </form>
        </div>
    </div>
</body>
</html>