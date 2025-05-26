drop database if exists training;
create database training;
use training;

create table muscles (
    id int auto_increment primary key,
    muscle_group varchar(100) not null
);

create table exercises (
    id int auto_increment primary key,
    muscle_id int not null,
    name varchar(100) not null,
    foreign key (muscle_id) references muscles(id)
);

create table training_schemas (
    id int auto_increment primary key,
    exercise_id int not null,
    trainee varchar(100) not null,
    nr_sets int not null,
    nr_reps int not null,
    foreign key (exercise_id) references exercises(id)
);


insert into muscles (muscle_group) values
('Chest'),
('Shoulders'),
('Biceps'),
('Triceps'),
('Legs'),
('Back');

insert into exercises (muscle_id, name) values
(1, 'Push-ups'),
(1, 'Bench Press'),
(1, 'Dumbbell Flyes'),
(1, 'Incline Bench Press'),

(2, 'Military Press'),
(2, 'Lateral Raises'),
(2, 'Front Raises'),
(2, 'Shoulder Press'),

(3, 'Barbell Curls'),
(3, 'Hammer Curls'),
(3, 'Preacher Curls'),
(3, 'Concentration Curls'),

(4, 'Tricep Pushdowns'),
(4, 'Skull Crushers'),
(4, 'Diamond Push-ups'),
(4, 'Overhead Extensions'),

(5, 'Squats'),
(5, 'Lunges'),
(5, 'Leg Press'),
(5, 'Calf Raises');

(6, 'Deadlifts'),
(6, 'Pull-ups'),
(6, 'Bent-over Rows'),
(6, 'Lat Pulldowns');