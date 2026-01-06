<?php
/**
 * INHERITANCE in PHP
 * ==================
 * Inheritance allows a class (child/derived) to inherit properties and methods
 * from another class (parent/base). It promotes code reusability.
 *
 * Key Concepts:
 * - extends keyword: Used to inherit from a parent class
 * - parent:: keyword: Used to call parent class methods
 * - protected: Properties/methods accessible in parent and child classes
 * - Method overriding: Child can redefine parent's methods
 */

// Parent Class (Base Class)
class Person {
    protected $name;
    protected $age;
    protected $address;

    public function __construct($name, $age, $address = "") {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function introduce() {
        return "Hello, I am {$this->name}, {$this->age} years old.";
    }

    public function getDetails() {
        return "Name: {$this->name}, Age: {$this->age}, Address: {$this->address}";
    }
}

// Child Class 1: Student inherits from Person
class Student extends Person {
    private $studentId;
    private $grade;
    private $school;

    public function __construct($name, $age, $studentId, $grade, $school) {
        // Call parent constructor
        parent::__construct($name, $age);
        $this->studentId = $studentId;
        $this->grade = $grade;
        $this->school = $school;
    }

    // New method specific to Student
    public function getStudentId() {
        return $this->studentId;
    }

    public function getGrade() {
        return $this->grade;
    }

    // Override parent's introduce method
    public function introduce() {
        return "Hello, I am {$this->name}, a student of grade {$this->grade} at {$this->school}.";
    }

    // Override getDetails to include student-specific info
    public function getDetails() {
        return parent::getDetails() . ", Student ID: {$this->studentId}, Grade: {$this->grade}, School: {$this->school}";
    }

    public function study($subject) {
        return "{$this->name} is studying {$subject}.";
    }
}

// Child Class 2: Teacher inherits from Person
class Teacher extends Person {
    private $employeeId;
    private $subject;
    private $salary;

    public function __construct($name, $age, $employeeId, $subject, $salary) {
        parent::__construct($name, $age);
        $this->employeeId = $employeeId;
        $this->subject = $subject;
        $this->salary = $salary;
    }

    // Override introduce method
    public function introduce() {
        return "Hello, I am {$this->name}, a {$this->subject} teacher.";
    }

    // Override getDetails
    public function getDetails() {
        return parent::getDetails() . ", Employee ID: {$this->employeeId}, Subject: {$this->subject}";
    }

    public function teach() {
        return "{$this->name} is teaching {$this->subject}.";
    }

    public function getSalary() {
        return $this->salary;
    }
}

// Child Class 3: Employee inherits from Person
class Employee extends Person {
    private $employeeId;
    private $department;
    private $position;

    public function __construct($name, $age, $address, $employeeId, $department, $position) {
        parent::__construct($name, $age, $address);
        $this->employeeId = $employeeId;
        $this->department = $department;
        $this->position = $position;
    }

    public function introduce() {
        return "Hello, I am {$this->name}, working as {$this->position} in {$this->department} department.";
    }

    public function getDetails() {
        return parent::getDetails() . ", Employee ID: {$this->employeeId}, Department: {$this->department}, Position: {$this->position}";
    }

    public function work() {
        return "{$this->name} is working in the {$this->department} department.";
    }
}

// ==================== DEMONSTRATION ====================
echo "<h1>INHERITANCE Example</h1>";

// Create objects
$person = new Person("Hari Bahadur", 45, "Kathmandu");
$student = new Student("Sita Sharma", 18, "STU001", 12, "Uniglobe College");
$teacher = new Teacher("Krishna Prasad", 35, "TCH001", "Computer Science", 50000);
$employee = new Employee("Gita Devi", 28, "Pokhara", "EMP001", "IT", "Software Developer");

echo "<h2>1. Person (Parent Class)</h2>";
echo "<p><strong>Introduce:</strong> " . $person->introduce() . "</p>";
echo "<p><strong>Details:</strong> " . $person->getDetails() . "</p>";

echo "<h2>2. Student (Child of Person)</h2>";
echo "<p><strong>Introduce:</strong> " . $student->introduce() . "</p>";
echo "<p><strong>Details:</strong> " . $student->getDetails() . "</p>";
echo "<p><strong>Action:</strong> " . $student->study("PHP Programming") . "</p>";

echo "<h2>3. Teacher (Child of Person)</h2>";
echo "<p><strong>Introduce:</strong> " . $teacher->introduce() . "</p>";
echo "<p><strong>Details:</strong> " . $teacher->getDetails() . "</p>";
echo "<p><strong>Action:</strong> " . $teacher->teach() . "</p>";

echo "<h2>4. Employee (Child of Person)</h2>";
echo "<p><strong>Introduce:</strong> " . $employee->introduce() . "</p>";
echo "<p><strong>Details:</strong> " . $employee->getDetails() . "</p>";
echo "<p><strong>Action:</strong> " . $employee->work() . "</p>";

echo "<hr>";
echo "<h2>Inheritance Hierarchy</h2>";
echo "<pre>";
echo "        Person (Parent)\n";
echo "       /    |    \\\n";
echo "      /     |     \\\n";
echo "  Student Teacher Employee\n";
echo "  (Child)  (Child)  (Child)\n";
echo "</pre>";

echo "<h2>Key Points:</h2>";
echo "<ul>";
echo "<li><strong>extends:</strong> Used to create child class from parent</li>";
echo "<li><strong>parent::</strong> Used to call parent class constructor/methods</li>";
echo "<li><strong>protected:</strong> Properties accessible in child classes</li>";
echo "<li><strong>Method Override:</strong> Child can redefine parent's methods</li>";
echo "<li><strong>Code Reuse:</strong> Common properties/methods defined once in parent</li>";
echo "</ul>";
?>
