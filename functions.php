<?php 

require_once 'dbconnection.php';

function getMuscles():array 
{
    global $pdo;
    
    $muscles = [];

    $stmt = $pdo->prepare("SELECT * FROM muscles");
    $stmt->execute();
    $muscles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $muscles;
}

function getExercisesByMuscle(int $muscle_id):array 
{
    global $pdo;
    
    $exercises = [];

    $stmt = $pdo->prepare("SELECT * FROM exercises WHERE muscle_id = :id");
    $stmt->execute(['id' => $muscle_id]);
    $exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $exercises;
}

function getSchema(string $trainee):array 
{
    global $pdo;
    
    $schema = [];

    $stmt = $pdo->prepare("SELECT * FROM traing_schemas WHERE trainee = ':trainee'");
    $stmt->execute(['trainee' => $trainee]);
    $schema = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $schema;
}