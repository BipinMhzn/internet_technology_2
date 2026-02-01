# Unit 7: Advanced PHP Concepts - Examination Questions

## Section A: Very Short Answer Questions [2 marks each]

1. Explain the concept of object-oriented programming (OOP) in PHP.

2. What is a class in PHP? How do you define it?

3. Differentiate between a class and an object.

4. What are properties and methods in a class?

5. Explain the purpose of the `$this` keyword in PHP.

6. What is a constructor in PHP? Write its syntax.

7. Define encapsulation in OOP. How is it achieved in PHP?

8. What are access modifiers in PHP? List them.

9. Explain the concept of inheritance in PHP.

10. What is the purpose of the `extends` keyword?

11. Define polymorphism with an example.

12. What are static properties and methods? How do you access them?

13. Explain the difference between `self::` and `$this->`.

14. What are magic methods in PHP? List any four.

15. What is the purpose of the `__construct()` and `__destruct()` methods?

## Section B: Descriptive Answer Questions [10 marks each]

1. Explain the concept of object-oriented programming in PHP. Discuss the advantages of using OOP over procedural programming. Write a program demonstrating basic OOP concepts.

2. Describe classes and objects in PHP. Explain:
   - Class declaration
   - Object creation and instantiation
   - Properties and methods
   - Accessing class members
   - The `$this` keyword

   Write a complete example with a real-world scenario.

3. Discuss access modifiers (public, private, protected) in PHP. Explain their purpose and usage with examples. Also explain the concept of encapsulation and how access modifiers help achieve it.

4. Explain inheritance in PHP. Discuss:
   - Single inheritance
   - The `extends` keyword
   - Method overriding
   - The `parent::` keyword
   - Calling parent constructors

   Write a program demonstrating inheritance with a parent class and child class.

5. Describe polymorphism in PHP. Explain method overriding and method overloading. Write a program demonstrating polymorphic behavior in PHP.

6. Explain static properties and methods in PHP. Discuss:
   - Declaration of static members
   - Accessing static members using `::`
   - Difference between static and non-static members
   - Use cases for static members
   - The `self::` keyword

   Provide examples demonstrating static members.

7. Discuss magic methods in PHP. Explain the following magic methods with examples:
   - `__construct()` and `__destruct()`
   - `__get()` and `__set()`
   - `__toString()`
   - `__call()`
   - `__clone()`

   Write a program demonstrating at least four magic methods.

## Section C: Long Answer Questions [15 marks each]

1. Discuss the principles of object-oriented programming in PHP, focusing on encapsulation and inheritance. Write a program to demonstrate these principles.

   Create a complete banking system that includes:
   - A base `Account` class with properties (accountNumber, holderName, balance)
   - Methods for deposit, withdraw, and getBalance
   - Encapsulation using private properties and public methods
   - A `SavingsAccount` class extending `Account`
   - Add interest calculation method
   - A `CurrentAccount` class extending `Account`
   - Add overdraft limit functionality
   - Demonstrate polymorphism with a method to display account details
   - Use constructors and destructors
   - Include proper validation and error handling

2. Create a comprehensive Library Management System using OOP principles:
   - Classes: `Book`, `Member`, `Library`, `Transaction`
   - `Book` class with properties: ISBN, title, author, available copies
   - `Member` class with properties: memberID, name, borrowedBooks array
   - `Library` class to manage books and members
   - Methods for:
     - Adding books
     - Registering members
     - Issuing books to members
     - Returning books
     - Searching books
     - Displaying member borrowing history
   - Implement inheritance (e.g., StudentMember and FacultyMember extending Member)
   - Use encapsulation with private/protected properties
   - Use static properties for tracking total books/members
   - Implement magic methods (`__toString()`, `__construct()`)
   - Include error handling for invalid operations

3. Develop an E-commerce Shopping System using advanced OOP concepts:
   - Abstract class `Product` with common properties (id, name, price, quantity)
   - Concrete classes: `Electronics`, `Clothing`, `Books` extending `Product`
   - Each subclass with specific properties (warranty for Electronics, size for Clothing, etc.)
   - `ShoppingCart` class with methods:
     - Add/remove products
     - Calculate total
     - Apply discount
   - `Customer` class with properties: name, email, cart
   - `Order` class to process orders
   - Interface `Payable` with method `processPayment()`
   - Different payment classes implementing `Payable` (CreditCard, PayPal, CashOnDelivery)
   - Use of:
     - Inheritance and polymorphism
     - Encapsulation with getters/setters
     - Static methods for tax calculation
     - Magic methods (`__toString()`, `__clone()`)
     - Type hinting
   - Complete workflow from product selection to order placement