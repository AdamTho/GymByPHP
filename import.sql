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
    sets int not null,
    reps int not null,
    foreign key (muscle_id) references muscles(id)
);

insert into muscles (muscle_group) values
('Chest'),
('Shoulders'),
('Biceps'),
('Triceps'),
('Legs'),
('Back');

insert into exercises (muscle_id, name, sets, reps) values
(1, 'Push-ups', 3, 15),
(1, 'Bench Press', 4, 10),
(1, 'Dumbbell Flyes', 3, 12),
(1, 'Incline Bench Press', 3, 10),

(2, 'Military Press', 3, 12),
(2, 'Lateral Raises', 3, 15),
(2, 'Front Raises', 3, 12),
(2, 'Shoulder Press', 4, 10),

(3, 'Barbell Curls', 3, 12),
(3, 'Hammer Curls', 3, 12),
(3, 'Preacher Curls', 3, 10),
(3, 'Concentration Curls', 3, 12),

(4, 'Tricep Pushdowns', 3, 15),
(4, 'Skull Crushers', 3, 12),
(4, 'Diamond Push-ups', 3, 12),
(4, 'Overhead Extensions', 3, 12),

(5, 'Squats', 4, 12),
(5, 'Lunges', 3, 10),
(5, 'Leg Press', 3, 15),
(5, 'Calf Raises', 4, 20);

