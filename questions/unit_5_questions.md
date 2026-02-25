# Unit 5: File Handling, Sessions, and Error Handling - Examination Questions

## Section A: Very Short Answer Questions [2 marks each]

1. List different types of file opening modes used in file handling in PHP.

2. What is the purpose of the `fopen()` function? Explain its syntax.

3. Differentiate between `fwrite()` and `file_put_contents()` functions.

4. What is the purpose of the `fclose()` function in PHP?

5. Explain the difference between `include` and `require` statements.

6. What happens when you use `require_once` instead of `require`?

7. What are sessions in PHP? Why are they used?

8. What is the purpose of `session_start()` function?

9. Differentiate between sessions and cookies.

10. How do you destroy a session in PHP?

11. What is the default lifetime of a session in PHP?

12. Define error handling in PHP. Why is it important?

13. What are the different error levels in PHP? List any four.

14. Explain the purpose of try-catch blocks in PHP.

15. What is the difference between die() and exit() functions?

## Section B: Descriptive Answer Questions [10 marks each]

1. Explain the concept of file handling in PHP. Discuss different file operations (reading, writing, appending) with examples. Also explain file opening modes and their purposes.

2. Describe file permissions and security considerations in PHP. Discuss:
   - Understanding file permissions (read, write, execute)
   - Checking file permissions using PHP functions
   - Security risks and best practices
   - Handling file upload security

3. Explain the difference between include, include_once, require, and require_once statements. When should you use each? Write examples demonstrating their usage and behavior on file not found errors.

4. Discuss session management in PHP. Explain:
   - Starting a session
   - Storing and retrieving session variables
   - Session configuration
   - Session security considerations
   - Destroying sessions

   Write a program demonstrating session usage.

5. Explain cookie management in PHP. Compare sessions and cookies, listing advantages and disadvantages of each. Write a program to create, read, update, and delete cookies.

6. Describe the implementation of session-based authentication and authorization in PHP. Include code examples showing:
   - User login system
   - Session creation on successful login
   - Protecting pages with session checks
   - Logout functionality
   - Remember me feature using cookies

7. Explain error handling in PHP. Discuss:
   - Different types of errors (Parse, Fatal, Warning, Notice)
   - Error reporting levels
   - try-catch blocks and exception handling
   - Custom error handlers
   - Logging errors to files

   Provide examples for each concept.

## Section C: Long Answer Questions [15 marks each]

1. Develop a comprehensive session-based authentication system that includes:
   - User registration (store credentials in file/array)
   - Login page with validation
   - Session creation on successful login
   - Protected dashboard page (accessible only after login)
   - User profile page showing session information
   - Role-based access control (admin, user)
   - Remember me functionality using cookies
   - Logout functionality
   - Session timeout implementation
   - Prevent session hijacking and fixation
   - Display appropriate error messages

   Include complete code with security considerations.

