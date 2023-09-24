<?php

class Student {

    public function __construct(
        public readonly string $name,
        private  int $age,
        public readonly array $subjects
    ) {
    }

    public function updateAge($age): int
    {
       $this->age += $age;

       return $this->age;
    }

}


$student = new Student('Hasan', 23, ['English']);


echo $student->updateAge(2);