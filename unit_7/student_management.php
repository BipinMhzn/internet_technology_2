<?php
// Base class
class Person {
    protected $name;
    protected $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getInfo() {
        return "Name: {$this->name}, Email: {$this->email}";
    }
}

// Derived class
class Student extends Person {
    private $studentId;
    private $course;
    private static $studentCount = 0; // static property

    public function __construct($name, $email, $studentId, $course) {
        parent::__construct($name, $email); // call parent constructor
        $this->studentId = $studentId;
        $this->course = $course;
        self::$studentCount++; // increment count
    }

    public function getStudentDetails() {
        return $this->getInfo() . ", Student ID: {$this->studentId}, Course: {$this->course}";
    }

    public static function getTotalStudents() {
        return self::$studentCount;
    }

    // Example of magic method
    public function __toString() {
        return $this->getStudentDetails();
    }
}

// Object creation
$student1 = new Student("John Doe", "john@example.com", "STU1001", "Web Development");
$student2 = new Student("Emma Smith", "emma@example.com", "STU1002", "Database Systems");

// Display
echo $student1 . "<br>";
echo $student2 . "<br>";

echo "Total Students: " . Student::getTotalStudents();
?>
