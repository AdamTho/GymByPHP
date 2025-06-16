<?php
session_start();
require_once 'dbconnection.php';

if (!empty($_SESSION['schedule'])) {
    try {
        $pdo->beginTransaction();
        
        foreach ($_SESSION['schedule'] as $exerciseId => $exercise) {
            $stmt = $pdo->prepare("INSERT INTO training_schemas (exercise_id, trainee, nr_sets, nr_reps) VALUES (?, 'user', ?, ?)");
            $stmt->execute([$exerciseId, $exercise['sets'], $exercise['reps']]);
        }
        
        $pdo->commit();
        
        header("Location: view_schedule.php");
        exit();
        
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Error saving schedule: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}