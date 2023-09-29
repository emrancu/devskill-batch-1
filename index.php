<?php


class Parents {

    protected string $fatherName;

     public function setFatherName(string $name): void
     {
         $this->fatherName = $name;
     }

    protected function getFatherName(): string
    {
       return $this->fatherName ;
    }
}


class Student extends Parents {

    public function __construct(
        public readonly string $name,
        private  int $age,
        public readonly array $subjects
    ) {
    }

    public function father(): string
    {
        return $this->getFatherName();
    }
    protected function updateAge($age): int
    {
       $this->age += $age;

       return $this->age;
    }

}


$student = new Student('Hasan', 23, ['English']);

$student->setFatherName("Hasan");

echo $student->father();