/**
 * INHERITANCE in Java
 * ===================
 * Compare with: ../4_inheritance.php
 *
 * Inheritance = Child class inherits from parent class
 */

// Parent Class
class Person {
    protected String name;
    protected int age;
    protected String address;

    public Person(String name, int age, String address) {
        this.name = name;
        this.age = age;
        this.address = address;
    }

    public String getName() {
        return this.name;
    }

    public int getAge() {
        return this.age;
    }

    public String introduce() {
        return "Hello, I am " + name + ", " + age + " years old.";
    }

    public String getDetails() {
        return "Name: " + name + ", Age: " + age + ", Address: " + address;
    }
}

// Child Class: Student extends Person
class Student extends Person {
    private String studentId;
    private int grade;
    private String school;

    public Student(String name, int age, String studentId, int grade, String school) {
        // Call parent constructor using super()
        super(name, age, "");
        this.studentId = studentId;
        this.grade = grade;
        this.school = school;
    }

    public String getStudentId() {
        return this.studentId;
    }

    // Override parent's method
    @Override
    public String introduce() {
        return "Hello, I am " + name + ", a student of grade " + grade + " at " + school + ".";
    }

    // Override getDetails
    @Override
    public String getDetails() {
        return super.getDetails() + ", Student ID: " + studentId + ", Grade: " + grade;
    }

    public String study(String subject) {
        return name + " is studying " + subject + ".";
    }
}

// Child Class: Teacher extends Person
class Teacher extends Person {
    private String employeeId;
    private String subject;
    private double salary;

    public Teacher(String name, int age, String employeeId, String subject, double salary) {
        super(name, age, "");
        this.employeeId = employeeId;
        this.subject = subject;
        this.salary = salary;
    }

    @Override
    public String introduce() {
        return "Hello, I am " + name + ", a " + subject + " teacher.";
    }

    @Override
    public String getDetails() {
        return super.getDetails() + ", Employee ID: " + employeeId + ", Subject: " + subject;
    }

    public String teach() {
        return name + " is teaching " + subject + ".";
    }
}

public class Inheritance {
    public static void main(String[] args) {
        System.out.println("=== INHERITANCE IN JAVA ===\n");

        Person person = new Person("Hari Bahadur", 45, "Kathmandu");
        Student student = new Student("Sita Sharma", 18, "STU001", 12, "Uniglobe College");
        Teacher teacher = new Teacher("Krishna Prasad", 35, "TCH001", "Computer Science", 50000);

        System.out.println("--- Person (Parent) ---");
        System.out.println("Introduce: " + person.introduce());
        System.out.println("Details: " + person.getDetails());

        System.out.println("\n--- Student (Child) ---");
        System.out.println("Introduce: " + student.introduce());
        System.out.println("Details: " + student.getDetails());
        System.out.println("Action: " + student.study("PHP Programming"));

        System.out.println("\n--- Teacher (Child) ---");
        System.out.println("Introduce: " + teacher.introduce());
        System.out.println("Details: " + teacher.getDetails());
        System.out.println("Action: " + teacher.teach());
    }
}

/*
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                       INHERITANCE: JAVA vs PHP                               ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Feature              │ Java                      │ PHP                       ║
 * ╠══════════════════════╪═══════════════════════════╪═══════════════════════════╣
 * ║ Extend class         │ class Student extends Person │ class Student extends Person ║
 * ║ Call parent construct│ super(name, age);         │ parent::__construct($name)║
 * ║ Call parent method   │ super.getDetails()        │ parent::getDetails()      ║
 * ║ Override annotation  │ @Override (recommended)   │ Not available             ║
 * ║ Protected access     │ protected String name;    │ protected $name;          ║
 * ║ Multiple inheritance │ Not supported (use interface)│ Not supported           ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Key Difference: Java uses super(), PHP uses parent::                         ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */
