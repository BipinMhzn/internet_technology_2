<?php
/**
 * COMBINED OOP EXAMPLE: Library Management System
 * ================================================
 * This example demonstrates all 4 pillars of OOP:
 * 1. ENCAPSULATION - Private properties with getters/setters
 * 2. INHERITANCE - LibraryMember -> Student, Faculty
 * 3. POLYMORPHISM - Different borrowing limits for different members
 * 4. ABSTRACTION - Abstract class and interface
 */

// ==================== ABSTRACTION: Interface ====================
interface Borrowable {
    public function borrowItem($item);
    public function returnItem($item);
    public function getBorrowedItems();
}

// ==================== ABSTRACTION: Abstract Class ====================
abstract class LibraryItem {
    // ENCAPSULATION: Private properties
    private $id;
    private $title;
    private $isAvailable;
    protected $category;

    public function __construct($id, $title) {
        $this->id = $id;
        $this->title = $title;
        $this->isAvailable = true;
    }

    // Getters (ENCAPSULATION)
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function isAvailable() {
        return $this->isAvailable;
    }

    public function getCategory() {
        return $this->category;
    }

    // Setters with validation (ENCAPSULATION)
    public function setAvailable($status) {
        $this->isAvailable = (bool) $status;
    }

    // Concrete method
    public function getBasicInfo() {
        $status = $this->isAvailable ? "Available" : "Borrowed";
        return "ID: {$this->id} | {$this->title} | Status: {$status}";
    }

    // Abstract methods - must be implemented by child classes
    abstract public function getItemType();
    abstract public function getBorrowDuration();
    abstract public function getLateFee();
}

// ==================== INHERITANCE: Book extends LibraryItem ====================
class Book extends LibraryItem {
    private $author;
    private $isbn;
    private $pages;

    public function __construct($id, $title, $author, $isbn, $pages) {
        parent::__construct($id, $title);
        $this->author = $author;
        $this->isbn = $isbn;
        $this->pages = $pages;
        $this->category = "Book";
    }

    // POLYMORPHISM: Different implementation
    public function getItemType() {
        return "Book";
    }

    public function getBorrowDuration() {
        return 14; // 14 days for books
    }

    public function getLateFee() {
        return 5; // Rs. 5 per day
    }

    public function getFullInfo() {
        return $this->getBasicInfo() . " | Author: {$this->author} | ISBN: {$this->isbn}";
    }
}

// ==================== INHERITANCE: Magazine extends LibraryItem ====================
class Magazine extends LibraryItem {
    private $issueNumber;
    private $publishDate;

    public function __construct($id, $title, $issueNumber, $publishDate) {
        parent::__construct($id, $title);
        $this->issueNumber = $issueNumber;
        $this->publishDate = $publishDate;
        $this->category = "Magazine";
    }

    // POLYMORPHISM: Different implementation
    public function getItemType() {
        return "Magazine";
    }

    public function getBorrowDuration() {
        return 7; // 7 days for magazines
    }

    public function getLateFee() {
        return 2; // Rs. 2 per day
    }

    public function getFullInfo() {
        return $this->getBasicInfo() . " | Issue: {$this->issueNumber} | Date: {$this->publishDate}";
    }
}

// ==================== INHERITANCE: DVD extends LibraryItem ====================
class DVD extends LibraryItem {
    private $director;
    private $duration;

    public function __construct($id, $title, $director, $duration) {
        parent::__construct($id, $title);
        $this->director = $director;
        $this->duration = $duration;
        $this->category = "DVD";
    }

    // POLYMORPHISM: Different implementation
    public function getItemType() {
        return "DVD";
    }

    public function getBorrowDuration() {
        return 3; // 3 days for DVDs
    }

    public function getLateFee() {
        return 10; // Rs. 10 per day
    }

    public function getFullInfo() {
        return $this->getBasicInfo() . " | Director: {$this->director} | Duration: {$this->duration} mins";
    }
}

// ==================== ABSTRACTION: Abstract Member Class ====================
abstract class LibraryMember implements Borrowable {
    // ENCAPSULATION: Private properties
    private $memberId;
    private $name;
    private $email;
    private $borrowedItems = [];
    protected $memberType;

    public function __construct($memberId, $name, $email) {
        $this->memberId = $memberId;
        $this->name = $name;
        $this->email = $email;
    }

    // Getters (ENCAPSULATION)
    public function getMemberId() {
        return $this->memberId;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMemberType() {
        return $this->memberType;
    }

    // POLYMORPHISM: Abstract method - different limits for different members
    abstract public function getMaxBorrowLimit();

    // Implementing Borrowable interface
    public function borrowItem($item) {
        if (!$item->isAvailable()) {
            return "Sorry, '{$item->getTitle()}' is not available.";
        }

        if (count($this->borrowedItems) >= $this->getMaxBorrowLimit()) {
            return "Sorry, {$this->name} has reached the borrowing limit of {$this->getMaxBorrowLimit()} items.";
        }

        $this->borrowedItems[] = $item;
        $item->setAvailable(false);
        return "{$this->name} borrowed '{$item->getTitle()}'. Return within {$item->getBorrowDuration()} days.";
    }

    public function returnItem($item) {
        $key = array_search($item, $this->borrowedItems);
        if ($key !== false) {
            unset($this->borrowedItems[$key]);
            $this->borrowedItems = array_values($this->borrowedItems);
            $item->setAvailable(true);
            return "{$this->name} returned '{$item->getTitle()}'.";
        }
        return "This item was not borrowed by {$this->name}.";
    }

    public function getBorrowedItems() {
        return $this->borrowedItems;
    }

    public function getMemberInfo() {
        $itemCount = count($this->borrowedItems);
        return "ID: {$this->memberId} | {$this->name} | Type: {$this->memberType} | Borrowed: {$itemCount}/{$this->getMaxBorrowLimit()}";
    }
}

// ==================== INHERITANCE & POLYMORPHISM: Student Member ====================
class StudentMember extends LibraryMember {
    private $course;
    private $semester;

    public function __construct($memberId, $name, $email, $course, $semester) {
        parent::__construct($memberId, $name, $email);
        $this->course = $course;
        $this->semester = $semester;
        $this->memberType = "Student";
    }

    // POLYMORPHISM: Students can borrow max 3 items
    public function getMaxBorrowLimit() {
        return 3;
    }

    public function getStudentInfo() {
        return $this->getMemberInfo() . " | Course: {$this->course} | Semester: {$this->semester}";
    }
}

// ==================== INHERITANCE & POLYMORPHISM: Faculty Member ====================
class FacultyMember extends LibraryMember {
    private $department;
    private $designation;

    public function __construct($memberId, $name, $email, $department, $designation) {
        parent::__construct($memberId, $name, $email);
        $this->department = $department;
        $this->designation = $designation;
        $this->memberType = "Faculty";
    }

    // POLYMORPHISM: Faculty can borrow max 10 items
    public function getMaxBorrowLimit() {
        return 10;
    }

    public function getFacultyInfo() {
        return $this->getMemberInfo() . " | Dept: {$this->department} | Designation: {$this->designation}";
    }
}

// ==================== DEMONSTRATION ====================
echo "<h1>Library Management System</h1>";
echo "<h2>Demonstrating All 4 Pillars of OOP</h2>";

// Create Library Items
echo "<h3>1. Library Items (Abstraction + Inheritance)</h3>";

$book1 = new Book("B001", "PHP & MySQL", "Larry Ullman", "978-0321833891", 712);
$book2 = new Book("B002", "Clean Code", "Robert Martin", "978-0132350884", 464);
$magazine1 = new Magazine("M001", "Tech Today", "Issue 45", "2024-01");
$dvd1 = new DVD("D001", "The Social Network", "David Fincher", 121);

$items = [$book1, $book2, $magazine1, $dvd1];

echo "<table border='1' cellpadding='8'>";
echo "<tr><th>Type</th><th>Details</th><th>Borrow Duration</th><th>Late Fee/Day</th></tr>";

foreach ($items as $item) {
    echo "<tr>";
    echo "<td>{$item->getItemType()}</td>";
    echo "<td>{$item->getBasicInfo()}</td>";
    echo "<td>{$item->getBorrowDuration()} days</td>";
    echo "<td>Rs. {$item->getLateFee()}</td>";
    echo "</tr>";
}
echo "</table>";

// Create Members
echo "<h3>2. Library Members (Inheritance + Polymorphism)</h3>";

$student1 = new StudentMember("STU001", "Ram Sharma", "ram@email.com", "BIT", 3);
$student2 = new StudentMember("STU002", "Sita Devi", "sita@email.com", "BCA", 5);
$faculty1 = new FacultyMember("FAC001", "Dr. Krishna Prasad", "krishna@email.com", "IT", "Professor");

echo "<table border='1' cellpadding='8'>";
echo "<tr><th>Member Type</th><th>Details</th><th>Max Borrow Limit</th></tr>";
echo "<tr><td>Student</td><td>{$student1->getStudentInfo()}</td><td>{$student1->getMaxBorrowLimit()} items</td></tr>";
echo "<tr><td>Student</td><td>{$student2->getStudentInfo()}</td><td>{$student2->getMaxBorrowLimit()} items</td></tr>";
echo "<tr><td>Faculty</td><td>{$faculty1->getFacultyInfo()}</td><td>{$faculty1->getMaxBorrowLimit()} items</td></tr>";
echo "</table>";

// Borrowing Demo
echo "<h3>3. Borrowing System (Encapsulation + Polymorphism)</h3>";

echo "<h4>Student Borrowing:</h4>";
echo "<p>" . $student1->borrowItem($book1) . "</p>";
echo "<p>" . $student1->borrowItem($magazine1) . "</p>";
echo "<p>" . $student1->borrowItem($dvd1) . "</p>";
echo "<p>" . $student1->borrowItem($book2) . "</p>"; // Should fail - limit reached

echo "<h4>Faculty Borrowing:</h4>";
echo "<p>" . $faculty1->borrowItem($book2) . "</p>";

// Try to borrow already borrowed item
echo "<h4>Trying to Borrow Already Borrowed Item:</h4>";
echo "<p>" . $student2->borrowItem($book1) . "</p>"; // Should fail - not available

// Return Item
echo "<h4>Returning Items:</h4>";
echo "<p>" . $student1->returnItem($book1) . "</p>";

// Now student2 can borrow
echo "<h4>After Return - Another Student Can Borrow:</h4>";
echo "<p>" . $student2->borrowItem($book1) . "</p>";

// Summary
echo "<hr>";
echo "<h2>Summary: 4 Pillars Demonstrated</h2>";

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Pillar</th><th>Implementation in This Example</th></tr>";

echo "<tr>";
echo "<td><strong>1. ENCAPSULATION</strong></td>";
echo "<td>
    <ul>
        <li>Private properties: \$memberId, \$name, \$borrowedItems in LibraryMember</li>
        <li>Getters/Setters: getName(), setAvailable()</li>
        <li>Data validation and controlled access</li>
    </ul>
</td>";
echo "</tr>";

echo "<tr>";
echo "<td><strong>2. INHERITANCE</strong></td>";
echo "<td>
    <ul>
        <li>Book, Magazine, DVD extend LibraryItem</li>
        <li>StudentMember, FacultyMember extend LibraryMember</li>
        <li>Child classes inherit properties and methods from parents</li>
    </ul>
</td>";
echo "</tr>";

echo "<tr>";
echo "<td><strong>3. POLYMORPHISM</strong></td>";
echo "<td>
    <ul>
        <li>getItemType(), getBorrowDuration(), getLateFee() behave differently for Book, Magazine, DVD</li>
        <li>getMaxBorrowLimit() returns 3 for Student, 10 for Faculty</li>
        <li>Same method name, different behavior based on class</li>
    </ul>
</td>";
echo "</tr>";

echo "<tr>";
echo "<td><strong>4. ABSTRACTION</strong></td>";
echo "<td>
    <ul>
        <li>Abstract class: LibraryItem, LibraryMember (cannot be instantiated)</li>
        <li>Interface: Borrowable (defines contract for borrowItem, returnItem)</li>
        <li>Hides complex implementation, shows only necessary features</li>
    </ul>
</td>";
echo "</tr>";

echo "</table>";
?>
