# Unit 4: Form Handling and Data Validation - Examination Questions

## Section A: Very Short Answer Questions [2 marks each]

1. Define GET and POST methods. What are the main differences between them?

2. How do you handle form submissions in PHP? Illustrate with a simple example.

3. What is the purpose of the `$_POST` superglobal array in PHP?

4. Explain the difference between `$_GET` and `$_REQUEST` superglobals.

5. What is form validation? Why is it important?

6. List any four validation techniques used in PHP.

7. What is the purpose of the `htmlspecialchars()` function?

8. How do you preserve user input after form submission?

9. Explain the use of `isset()` and `empty()` functions in form validation.

10. What is the purpose of the `$_FILES` superglobal array?

11. How do you handle checkbox values in PHP?

12. What is the difference between radio buttons and checkboxes in form handling?

13. What is the purpose of the `move_uploaded_file()` function?

14. List the attributes of the `$_FILES` array for uploaded files.

15. How do you send emails using PHP? Mention the function used.

## Section B: Descriptive Answer Questions [10 marks each]

1. How do you handle form submissions in PHP? Illustrate with example. Explain the process of collecting and processing form data using both GET and POST methods.

2. Explain the concept of form validation and sanitization. Discuss different validation techniques (client-side vs server-side) and write a PHP script demonstrating server-side validation for:
   - Email validation
   - Number validation
   - Required field validation
   - String length validation

3. Describe the process of handling different form elements in PHP:
   - Text input and textarea
   - Checkboxes (single and multiple)
   - Radio buttons
   - Select/dropdown lists

   Write a program demonstrating each with proper processing code.

4. Explain the file upload process in PHP. Discuss:
   - HTML form requirements for file upload
   - $_FILES array structure
   - File validation (type, size, extension)
   - Moving uploaded files to destination
   - Error handling

   Write a complete example with security considerations.

5. Discuss the importance of data sanitization and security in form handling. Explain how to prevent:
   - SQL Injection
   - Cross-Site Scripting (XSS)
   - CSRF attacks

   Write code examples demonstrating secure form processing.

6. Explain the `$_SERVER` superglobal array. Discuss its important elements and how they are used in form processing. Write a program to display useful server information.

7. Write a detailed explanation of preserving form data. Create a registration form that:
   - Retains user input on validation failure
   - Displays error messages next to respective fields
   - Clears the form on successful submission

## Section C: Long Answer Questions [15 marks each]

1. Create a complete user registration system with the following features:
   - HTML form with fields: username, email, password, confirm password, gender (radio), interests (checkboxes), country (dropdown)
   - Server-side validation for all fields
   - Password strength validation
   - Email format validation
   - Display error messages for invalid inputs
   - Preserve form data on validation failure
   - Success message on valid submission
   - Proper HTML structure and CSS styling

   Include detailed comments explaining validation logic.

2. Develop a comprehensive file upload system that includes:
   - HTML form for uploading multiple images
   - Validation for:
     - File type (only jpg, png, gif allowed)
     - File size (maximum 2MB per file)
     - Number of files (maximum 5 files)
   - Display uploaded file information
   - Create thumbnails of uploaded images
   - Store file information in an array/session
   - Display all uploaded images in a gallery format
   - Include delete functionality
   - Proper error handling and security measures

   Explain the complete workflow with comments.

3. Create an advanced contact form application with:
   - Form fields: name, email, phone, subject, message
   - Server-side validation and sanitization
   - File attachment option (resume/document)
   - Send email notification using PHP mail() function
   - Store submitted data in a text/CSV file
   - Display success/error messages
   - Use of regular expressions for validation
   - Professional HTML/CSS layout

   Include complete code with detailed documentation.
