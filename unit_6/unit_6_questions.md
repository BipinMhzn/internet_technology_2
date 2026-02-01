# Unit 6: Working with Database - Examination Questions

## Section A: Very Short Answer Questions [2 marks each]

1. Write a PHP code snippet to fetch records from a MySQL database.

2. What is a Database Management System (DBMS)? List its advantages.

3. What is MySQL? Mention any four features of MySQL.

4. Explain the purpose of MySQLi extension in PHP.

5. What is the difference between MySQLi and PDO?

6. Write the syntax to connect PHP with a MySQL database using MySQLi.

7. What are CRUD operations? Explain briefly.

8. What is the purpose of `mysqli_connect()` function?

9. How do you check if database connection is successful?

10. What is SQL injection? How can you prevent it?

11. Explain the use of prepared statements in PHP.

12. What is the purpose of `mysqli_query()` function?

13. Differentiate between `mysqli_fetch_assoc()` and `mysqli_fetch_array()`.

14. What is a transaction in database? Why is it used?

15. How do you close a database connection in PHP?

## Section B: Descriptive Answer Questions [10 marks each]

1. Define Database Management System. Write a PHP script to perform CRUD (Create, Read, Update, Delete) operations on a MySQL database. Include examples of each operation.

2. Explain the process of connecting PHP with MySQL database. Discuss:
   - Connection methods (MySQLi procedural, MySQLi object-oriented, PDO)
   - Connection parameters
   - Error handling during connection
   - Closing connections

   Write examples for each method.

3. Describe how to perform SELECT, INSERT, UPDATE, and DELETE operations in MySQL using PHP. Write a complete program demonstrating all operations with a student database.

4. Explain the concept of prepared statements in PHP. Discuss their advantages over regular queries. Write a program demonstrating:
   - Prepared statement with SELECT query
   - Prepared statement with INSERT query
   - Using bind parameters
   - Preventing SQL injection

5. Discuss transaction management in PHP and MySQL. Explain:
   - ACID properties
   - BEGIN, COMMIT, and ROLLBACK
   - When to use transactions
   - Error handling in transactions

   Write a program demonstrating transaction usage.

6. Create a complete user registration and login system using PHP and MySQL that includes:
   - Database table structure
   - Registration form with validation
   - Storing user data in database
   - Password hashing using `password_hash()`
   - Login form with authentication
   - Verifying password using `password_verify()`
   - Session management after login

7. Explain error handling in database operations. Discuss:
   - Connection errors
   - Query errors
   - Using `mysqli_error()` and `mysqli_errno()`
   - Try-catch with exceptions
   - Displaying user-friendly error messages
   - Logging database errors

   Provide examples for each scenario.

## Section C: Long Answer Questions [15 marks each]

1. Design and implement a complete Student Management System with the following features:
   - Database design with appropriate tables (students, courses, enrollments)
   - Insert student records with form validation
   - Display all students in a formatted HTML table
   - Search students by name or roll number
   - Update student information
   - Delete student records with confirmation
   - Display student enrollment details
   - Calculate and display statistics (total students, course-wise count)
   - Implement pagination for student list
   - Use prepared statements for all operations
   - Include proper error handling
   - Session-based admin authentication

   Provide complete code with database schema and explanations.

2. Create a comprehensive E-commerce Product Management System that includes:
   - Database tables: products, categories, orders, customers
   - Admin panel features:
     - Add new products with image upload
     - Update product details
     - Delete products
     - Manage categories
     - View all orders
   - User features:
     - Browse products by category
     - Search products
     - Add to cart (using sessions)
     - Place order (insert into database)
     - View order history
   - Use of prepared statements
   - Transaction management for order processing
   - Proper error handling
   - Image upload and validation
   - Security measures (SQL injection prevention)

   Include database schema, complete PHP code, and detailed documentation.

3. Develop an advanced Blog Management System with:
   - Database structure: users, posts, categories, comments
   - User authentication system (registration, login, logout)
   - Password hashing and verification
   - Role-based access (admin, author, reader)
   - Admin features:
     - Manage users
     - Approve/delete posts and comments
     - Manage categories
   - Author features:
     - Create, edit, delete own posts
     - Assign categories to posts
     - View post statistics
   - Reader features:
     - View all posts
     - Filter by category
     - Search posts
     - Add comments
   - Features:
     - Pagination
     - Post count per category
     - Recent posts
     - Popular posts
   - Use prepared statements throughout
   - Implement transactions where necessary
   - Complete error handling
   - Security best practices

   Provide database schema, complete code with comments, and user guide.
