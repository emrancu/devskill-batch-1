<?php

$students = [
    [
        'name' => 'John',
        'age' => 20,
        'subjects' => ['Math', 'Science', 'English'],
    ],
    [
        'name' => 'Alice',
        'age' => 18,
        'subjects' => ['History', 'English'],
    ],
    [
        'name' => 'Bob',
        'age' => 19,
        'subjects' => ['Art', 'Music'],
    ],
];


function mostFavoriteSubject(array $students): string
{
     $subjects = [];
     foreach ($students as $student){
         foreach ($student['subjects'] as $subject){
            if(!isset($subjects[$subject])){
                $subjects[$subject] = 1;
            }else{
                $subjects[$subject] += 1;
            }
          }
     }

   $subjects = array_flip($subjects);

   return end($subjects);
}

$finalResult = [];

$finalResult['favorite_subject']  = mostFavoriteSubject($students);


$finalResult['students_with_favourite_subject']  = array_filter($students, function ($student) use($finalResult){
    if(in_array($finalResult['favorite_subject'], $student['subjects'])){
      return true;
    }
});

echo json_encode($finalResult);