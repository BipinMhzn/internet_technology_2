# OOP Comparison: Java vs PHP

## Quick Reference Cheatsheet

---

## 1. Class and Object

| Concept | Java | PHP |
|---------|------|-----|
| Define class | `class Car { }` | `class Car { }` |
| Create object | `Car c = new Car();` | `$c = new Car();` |
| Access property | `c.brand` | `$c->brand` |
| Call method | `c.start()` | `$c->start()` |
| this keyword | `this.brand` | `$this->brand` |

### Example:
```java
// Java
Car car = new Car();
car.brand = "Toyota";
car.start();
```

```php
// PHP
$car = new Car();
$car->brand = "Toyota";
$car->start();
```

---

## 2. Constructor

| Concept | Java | PHP |
|---------|------|-----|
| Constructor | `public ClassName()` | `public function __construct()` |
| With parameters | `public Car(String b)` | `public function __construct($b)` |

### Example:
```java
// Java
class Car {
    public String brand;
    public Car(String brand) {
        this.brand = brand;
    }
}
Car c = new Car("Toyota");
```

```php
// PHP
class Car {
    public $brand;
    public function __construct($brand) {
        $this->brand = $brand;
    }
}
$c = new Car("Toyota");
```

---

## 3. Access Modifiers

| Modifier | Java | PHP | Access Level |
|----------|------|-----|--------------|
| Public | `public String name;` | `public $name;` | Everywhere |
| Private | `private int age;` | `private $age;` | Same class only |
| Protected | `protected String addr;` | `protected $addr;` | Class + children |

---

## 4. Inheritance

| Concept | Java | PHP |
|---------|------|-----|
| Extend class | `extends Parent` | `extends Parent` |
| Call parent constructor | `super(args)` | `parent::__construct($args)` |
| Call parent method | `super.method()` | `parent::method()` |
| Override annotation | `@Override` | Not available |

### Example:
```java
// Java
class Student extends Person {
    public Student(String name) {
        super(name);  // Call parent constructor
    }

    @Override
    public String introduce() {
        return super.introduce() + " I am a student.";
    }
}
```

```php
// PHP
class Student extends Person {
    public function __construct($name) {
        parent::__construct($name);  // Call parent constructor
    }

    public function introduce() {
        return parent::introduce() . " I am a student.";
    }
}
```

---

## 5. Abstract Class

| Concept | Java | PHP |
|---------|------|-----|
| Abstract class | `abstract class Shape` | `abstract class Shape` |
| Abstract method | `public abstract double area();` | `abstract public function area();` |

### Example:
```java
// Java
abstract class Shape {
    public abstract double calculateArea();
}

class Circle extends Shape {
    @Override
    public double calculateArea() {
        return 3.14 * r * r;
    }
}
```

```php
// PHP
abstract class Shape {
    abstract public function calculateArea();
}

class Circle extends Shape {
    public function calculateArea() {
        return 3.14 * $this->r * $this->r;
    }
}
```

---

## 6. Interface

| Concept | Java | PHP |
|---------|------|-----|
| Define interface | `interface Printable` | `interface Printable` |
| Implement | `implements Printable` | `implements Printable` |
| Multiple interfaces | `implements A, B` | `implements A, B` |

### Example:
```java
// Java
interface Payable {
    double calculatePay();
}

class Employee implements Payable {
    @Override
    public double calculatePay() {
        return 50000;
    }
}
```

```php
// PHP
interface Payable {
    public function calculatePay();
}

class Employee implements Payable {
    public function calculatePay() {
        return 50000;
    }
}
```

---

## 7. Static Members

| Concept | Java | PHP |
|---------|------|-----|
| Static property | `static int count;` | `static $count;` |
| Static method | `public static void show()` | `public static function show()` |
| Access static | `ClassName.count` | `ClassName::$count` |
| Inside class | `ClassName.count` or just `count` | `self::$count` |

---

## 8. Key Differences Summary

| Feature | Java | PHP |
|---------|------|-----|
| Type declaration | Required | Optional |
| Variable prefix | None | `$` required |
| Property access | `.` (dot) | `->` (arrow) |
| Static access | `.` (dot) | `::` (double colon) |
| Parent reference | `super` | `parent::` |
| Self reference | `this` | `$this` |
| Method overloading | Supported | Not supported |
| File naming | Must match class name | Any name |
| Compilation | Compiled to bytecode | Interpreted |

---

## 9. Quick Syntax Conversion Guide

When converting Java to PHP, remember:
1. Add `$` before all variables
2. Change `.` to `->` for object access
3. Change `super` to `parent::`
4. Change constructor name to `__construct`
5. Remove type declarations (or make them optional)
6. Use `self::` instead of class name for static inside class

---

*Created for Uniglobe College - Internet Technology II - Unit 7*
