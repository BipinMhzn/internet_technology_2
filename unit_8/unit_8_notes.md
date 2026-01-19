# Unit 8: PHP Framework

**Duration:** 6 Hours

## Learning Objectives
- Understand the concepts of models, views, and controllers, and how they interact within the MVC architecture
- Learn about the benefits of using a framework for web development
- Explore popular PHP frameworks such as Laravel, Symfony, and CodeIgniter
- Learn about common features provided by PHP frameworks: routing, templating, authentication, authorization, and ORM
- Gain practical experience in setting up and using a PHP framework

---

## 8.1 MVC Model (Model-View-Controller)

### Introduction to MVC

MVC is an **architectural pattern** that separates an application into three main logical components:

| Component | Responsibility | Example |
|-----------|---------------|---------|
| **Model** | Data and business logic | User.php, Product.php |
| **View** | Presentation layer (UI) | login.blade.php, dashboard.php |
| **Controller** | Intermediary between Model and View | UserController.php, AuthController.php |

---

### Why Use MVC?

1. **Separation of Concerns** - Each component has a specific responsibility
2. **Maintainability** - Easy to update and modify code
3. **Scalability** - Easy to add new features
4. **Testability** - Components can be tested independently
5. **Multiple Views** - Same data can be displayed in different ways
6. **Team Collaboration** - Different developers can work on different components

---

### MVC Components in Detail

#### 1. MODEL (Data Layer)

The Model represents the data structure and business logic of the application.

**Responsibilities:**
- Database operations (CRUD - Create, Read, Update, Delete)
- Data validation
- Business rules implementation
- Data transformation
- Interacts directly with the database

**Example Model Functions:**
```php
class User {
    public function getUser($id) {
        // Fetch user from database
    }

    public function createUser($data) {
        // Validate data
        // Insert into database
    }

    public function updateUser($id, $data) {
        // Validate data
        // Update database
    }

    public function deleteUser($id) {
        // Delete from database
    }

    private function validateUserData($data) {
        // Business logic validation
    }
}
```

**Real-world Examples:**
- User model: handles user data, authentication
- Product model: manages product information, stock
- Order model: processes orders, calculates totals

---

#### 2. VIEW (Presentation Layer)

The View handles the user interface and displays data from the model.

**Responsibilities:**
- Rendering HTML/CSS
- Displaying data received from controller
- Handling user interface elements
- Template management
- Sending user input to controller

**Example View:**
```php
<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="/login" method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
```

**View Best Practices:**
- Keep views simple and clean
- Use template engines (Blade, Twig, Smarty)
- Avoid database queries in views
- Use helper functions for formatting
- Don't put business logic in views

---

#### 3. CONTROLLER (Application Logic Layer)

The Controller acts as an intermediary between Model and View.

**Responsibilities:**
- Receive user input from View
- Validate and process input
- Call appropriate Model methods
- Pass data to View
- Handle routing and navigation

**Example Controller:**
```php
class UserController {

    public function login() {
        // GET request - show login form
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('login');
        }

        // POST request - process login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Call Model to verify credentials
            $userModel = new User();
            $user = $userModel->authenticate($email, $password);

            if ($user) {
                // Login successful
                session_start();
                $_SESSION['user_id'] = $user['id'];
                return redirect('/dashboard');
            } else {
                // Login failed
                return view('login', ['error' => 'Invalid credentials']);
            }
        }
    }

    public function dashboard() {
        // Check if user is logged in
        session_start();
        if (!isset($_SESSION['user_id'])) {
            return redirect('/login');
        }

        // Get user data from Model
        $userModel = new User();
        $user = $userModel->getUser($_SESSION['user_id']);

        // Pass data to View
        return view('dashboard', ['user' => $user]);
    }
}
```

---

### MVC Request Flow

```
1. USER INTERACTION
   ↓
2. VIEW (sends request)
   ↓
3. CONTROLLER (receives request)
   ↓
4. CONTROLLER (validates input)
   ↓
5. MODEL (database operations)
   ↓
6. MODEL (returns data)
   ↓
7. CONTROLLER (prepares data)
   ↓
8. VIEW (displays data)
   ↓
9. USER SEES RESULT
```

---

### Example: Complete MVC Flow for User Login

**Request:** `POST /login` with username and password

**1. View (login.php):**
```html
<form action="/login" method="POST">
    <input type="text" name="username" required>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
```

**2. Controller (AuthController.php):**
```php
class AuthController {
    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate input
        if (empty($username) || empty($password)) {
            return view('login', ['error' => 'All fields required']);
        }

        // Call Model
        $userModel = new User();
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            session_start();
            $_SESSION['user'] = $user;
            return redirect('/dashboard');
        } else {
            // Login failed
            return view('login', ['error' => 'Invalid credentials']);
        }
    }
}
```

**3. Model (User.php):**
```php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findByUsername($username) {
        $query = "SELECT * FROM users WHERE username = ?";
        return $this->db->query($query, [$username])->fetch();
    }
}
```

**4. View (dashboard.php):**
```html
<h2>Welcome, <?php echo $_SESSION['user']['username']; ?>!</h2>
<p>You are successfully logged in.</p>
<a href="/logout">Logout</a>
```

---

### Advantages of MVC

| Advantage | Description |
|-----------|-------------|
| **Code Organization** | Clean and organized code structure |
| **Multiple Developers** | Different developers can work on Model, View, Controller simultaneously |
| **Reusability** | Models and Controllers can be reused across the application |
| **Easy Testing** | Unit testing is easier with separated components |
| **SEO Friendly** | Better URL structure possible |
| **Parallel Development** | Team can work on different components at the same time |
| **Maintenance** | Easier to locate and fix bugs |
| **Flexibility** | Easy to change one component without affecting others |

---

### Disadvantages of MVC

1. **Complexity** - Increased complexity for small applications
2. **Learning Curve** - Requires understanding of the pattern
3. **More Files** - More files to manage compared to simple scripts
4. **Overhead** - Can be overkill for simple projects
5. **Initial Setup Time** - Takes time to set up structure

**When to Use MVC:**
- Medium to large applications
- Team projects
- Applications that will grow over time
- When maintainability is important

**When NOT to Use MVC:**
- Very small, simple scripts
- One-time use applications
- Rapid prototypes

---

## 8.2 Benefits of Using PHP Framework

### What is a PHP Framework?

A PHP framework is a **platform** that provides a basic structure for streamlining web application development. It provides:
- Pre-built libraries for common tasks
- Standard architecture (usually MVC)
- Tools and utilities
- Security features
- Community support

**Think of it as:**
- A template for building houses (you don't start from scratch)
- A toolkit with ready-made components
- A set of rules and best practices

---

### Key Benefits

#### 1. Faster Development

**Without Framework:**
```php
// Write authentication from scratch
// Write database connection code
// Write validation logic
// Write security measures
// Write routing system
// ...and so on
```

**With Framework:**
```php
// Authentication ready
Route::post('/login', [AuthController::class, 'login']);

// Database abstraction ready
$users = User::all();

// Validation built-in
$request->validate([
    'email' => 'required|email',
    'password' => 'required|min:8'
]);
```

**Benefits:**
- Pre-built modules and libraries
- Ready-to-use components
- Less code to write from scratch
- Built-in functions for common tasks
- Rapid prototyping capabilities

**Time Savings:**
- Authentication: Save ~10-15 hours
- Routing: Save ~5-8 hours
- Database abstraction: Save ~8-10 hours
- Form validation: Save ~3-5 hours
- Security features: Save ~15-20 hours

---

#### 2. Code Reusability

**DRY Principle:** Don't Repeat Yourself

**Example:**
```php
// Without Framework - Repeat authentication code everywhere
function requireLogin() {
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}

// With Framework - Use middleware once
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::get('/settings', [SettingsController::class, 'edit']);
});
```

**Benefits:**
- Reusable components across projects
- Shared libraries and helpers
- Template inheritance
- Component-based architecture

---

#### 3. Better Code Organization

**Without Framework:**
```
project/
├── login.php
├── register.php
├── dashboard.php
├── functions.php
├── db_config.php
├── header.php
├── footer.php
└── ...scattered files
```

**With Framework (Laravel):**
```
project/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
├── resources/
│   └── views/
├── routes/
│   └── web.php
├── database/
│   └── migrations/
└── config/
```

**Benefits:**
- MVC architecture enforced
- Structured file system
- Naming conventions
- Clear separation of concerns
- Easier to navigate codebase

---

#### 4. Security

**Common Vulnerabilities Protected:**

| Vulnerability | Framework Protection |
|--------------|---------------------|
| **SQL Injection** | Prepared statements, ORM |
| **XSS (Cross-Site Scripting)** | Auto-escaping in templates |
| **CSRF (Cross-Site Request Forgery)** | CSRF token generation |
| **Session Hijacking** | Secure session handling |
| **Password Storage** | Built-in hashing (bcrypt) |

**Example - SQL Injection Prevention:**

**Vulnerable Code (Plain PHP):**
```php
$username = $_POST['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
// SQL Injection possible: username = "admin' OR '1'='1"
```

**Framework Protection (Laravel):**
```php
$user = User::where('username', $username)->first();
// Automatically uses prepared statements - safe!
```

**Example - CSRF Protection:**

**Without Framework:**
```html
<!-- Have to implement CSRF tokens manually -->
<form method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo generateToken(); ?>">
    <!-- form fields -->
</form>
```

**With Framework (Laravel):**
```html
<!-- CSRF protection automatic -->
<form method="POST">
    @csrf
    <!-- form fields -->
</form>
```

---

#### 5. Scalability

Frameworks make it easier to scale applications as they grow.

**Example:**
```php
// Easy to add new features without breaking existing code

// Add new route
Route::get('/api/products', [ProductController::class, 'index']);

// Add new model
php artisan make:model Product

// Add new controller
php artisan make:controller ProductController
```

**Scalability Features:**
- Modular architecture
- Support for large applications
- Performance optimization tools
- Caching mechanisms
- Queue systems for background jobs
- Load balancing support

---

#### 6. Maintainability

**Clean Code Benefits:**
```php
// Framework encourages clean, readable code

// Clear naming
class UserController extends Controller {
    public function store(Request $request) {
        // Clear what this does
    }
}

// Consistent structure
resources/views/users/
├── index.blade.php
├── show.blade.php
├── create.blade.php
└── edit.blade.php
```

**Benefits:**
- Consistent coding standards
- Easy bug fixes
- Comprehensive documentation
- Community support
- New developers can understand code quickly

---

#### 7. Community Support

**Large Developer Communities:**

| Framework | Community Size | Resources |
|-----------|---------------|-----------|
| **Laravel** | 70,000+ GitHub stars | Laracasts, Forums, Discord |
| **Symfony** | 28,000+ GitHub stars | SymfonyCasts, Slack |
| **CodeIgniter** | 18,000+ GitHub stars | Forums, Documentation |

**Available Resources:**
- Official documentation
- Video tutorials (Laracasts, YouTube)
- Forums and discussion groups
- Stack Overflow answers
- Third-party packages/plugins
- Regular updates and bug fixes
- Conference talks and meetups

---

#### 8. Testing Support

**Built-in Testing Tools:**

```php
// Laravel Testing Example
class UserTest extends TestCase {
    public function test_user_can_login() {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
    }
}
```

**Testing Features:**
- PHPUnit integration
- Test automation
- Unit testing support
- Feature testing
- Database testing with seeders
- HTTP testing
- Browser testing (Laravel Dusk)

---

#### 9. Database Abstraction (ORM)

**ORM:** Object-Relational Mapping

**Without ORM (Plain SQL):**
```php
$query = "SELECT * FROM users WHERE age > 18";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name'];
}
```

**With ORM (Eloquent - Laravel):**
```php
$users = User::where('age', '>', 18)->get();
foreach ($users as $user) {
    echo $user->name;
}
```

**Benefits:**
- Write database queries using objects
- Database-agnostic code (easy to switch databases)
- Query builder for complex queries
- Migration system for database version control
- Seeders for test data
- Automatic relationship handling

**Example - Relationships:**
```php
// One-to-Many relationship
class User extends Model {
    public function posts() {
        return $this->hasMany(Post::class);
    }
}

// Get user's posts
$user = User::find(1);
$posts = $user->posts;  // Automatic join!
```

---

#### 10. Routing System

**Clean, RESTful URLs:**

**Without Framework:**
```php
// Messy URL handling
if ($_GET['page'] == 'users' && isset($_GET['id'])) {
    // Show user
} elseif ($_GET['page'] == 'users' && $_GET['action'] == 'edit') {
    // Edit user
}
```

**With Framework:**
```php
// Clean routes
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
```

**Features:**
- Clean URLs
- RESTful routing
- Route parameters
- Named routes
- Route grouping
- Middleware support

---

#### 11. Templating Engine

**Separation of PHP and HTML:**

**Plain PHP (Messy):**
```php
<?php if (count($users) > 0): ?>
    <ul>
    <?php foreach ($users as $user): ?>
        <li><?php echo htmlspecialchars($user->name); ?></li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No users found</p>
<?php endif; ?>
```

**Blade (Laravel) - Clean:**
```blade
@if($users->count() > 0)
    <ul>
    @foreach($users as $user)
        <li>{{ $user->name }}</li>
    @endforeach
    </ul>
@else
    <p>No users found</p>
@endif
```

**Features:**
- Template inheritance
- Components and partials
- Cleaner syntax
- Automatic escaping for security
- Better performance with caching

---

#### 12. Performance

**Optimization Features:**
- **Caching:** Route caching, view caching, query caching
- **Query Optimization:** Eager loading, lazy loading
- **Asset Compilation:** Minification, compilation
- **CDN Integration:** Easy asset delivery
- **Opcode Caching:** Built-in support

**Example - Eager Loading (N+1 Problem Solution):**

**Without Eager Loading (Inefficient):**
```php
$users = User::all();
foreach ($users as $user) {
    echo $user->posts;  // New query for each user!
}
// Total queries: 1 + N (where N = number of users)
```

**With Eager Loading (Efficient):**
```php
$users = User::with('posts')->get();
foreach ($users as $user) {
    echo $user->posts;  // Already loaded!
}
// Total queries: 2 only!
```

---

### Comparison: Framework vs Plain PHP

| Aspect | Plain PHP | PHP Framework |
|--------|-----------|---------------|
| **Development Speed** | Slow (write everything) | Fast (use pre-built) |
| **Code Organization** | Developer-dependent | Structured (MVC) |
| **Security** | Manual implementation | Built-in features |
| **Maintenance** | Difficult | Easy |
| **Team Collaboration** | Challenging | Standardized |
| **Learning Curve** | Low | Medium to High |
| **Performance** | Can be optimized | Optimized by default |
| **Community Support** | Limited | Extensive |
| **Best For** | Small scripts, learning | Medium-large apps |

---

### When to Use a Framework

**✅ Use Framework When:**
- Building medium to large applications
- Working in a team
- Need rapid development
- Require built-in security
- Long-term maintenance expected
- Professional/commercial project
- Need scalability

**❌ Avoid Framework When:**
- Very small, simple projects (1-2 pages)
- Learning basic PHP concepts
- Extreme performance requirements (rare cases)
- Very limited hosting resources
- Single-use scripts

---

## 8.3 Getting Started with PHP Framework

### Popular PHP Frameworks

#### 1. Laravel

**Overview:**
- Most popular PHP framework (70,000+ GitHub stars)
- Elegant syntax and developer-friendly
- Comprehensive documentation
- Large, active community

**Key Features:**
- **Eloquent ORM** - Beautiful database abstraction
- **Blade Templating** - Clean template syntax
- **Artisan CLI** - Powerful command-line tool
- **Built-in Authentication** - User auth out of the box
- **Job Queues** - Background job processing
- **Real-time** - WebSocket support via Laravel Echo

**Best For:**
- Medium to large web applications
- API development
- Modern web applications
- Rapid application development

**Pros:**
- Excellent documentation
- Large ecosystem (packages)
- Easy to learn
- Active community
- Regular updates

**Cons:**
- Can be heavy for simple projects
- Requires understanding of OOP

---

#### 2. Symfony

**Overview:**
- Enterprise-level framework (28,000+ GitHub stars)
- Highly flexible and modular
- Reusable PHP components used by many frameworks (including Laravel)

**Key Features:**
- **Twig Templating** - Flexible template engine
- **Doctrine ORM** - Powerful database abstraction
- **Symfony Console** - CLI component
- **Bundle System** - Highly modular
- **High Performance** - Built for speed

**Best For:**
- Complex, large-scale enterprise applications
- Projects requiring high flexibility
- Long-term, maintainable projects

**Pros:**
- Very flexible
- Best practices enforced
- Excellent for large teams
- Component-based (use what you need)

**Cons:**
- Steeper learning curve
- More configuration needed
- Can be complex for beginners

---

#### 3. CodeIgniter

**Overview:**
- Lightweight framework (18,000+ GitHub stars)
- Easy to learn
- Minimal configuration required

**Key Features:**
- **Small Footprint** - Only 2MB download
- **Simple Documentation** - Easy to understand
- **Nearly Zero Configuration** - Works out of the box
- **Built-in Security** - XSS filtering, CSRF protection
- **Form Validation** - Easy form handling

**Best For:**
- Small to medium applications
- Beginners learning frameworks
- Shared hosting environments
- Projects with strict performance requirements

**Pros:**
- Very easy to learn
- Lightweight and fast
- Good documentation
- Flexible (not strict MVC)

**Cons:**
- Less modern features
- Smaller community than Laravel
- Fewer third-party packages

---

### Comparison of Popular Frameworks

| Feature | Laravel | Symfony | CodeIgniter |
|---------|---------|---------|-------------|
| **Popularity** | ★★★★★ | ★★★★☆ | ★★★☆☆ |
| **Learning Curve** | Medium | Hard | Easy |
| **Performance** | Good | Excellent | Excellent |
| **Documentation** | Excellent | Excellent | Good |
| **Community** | Very Large | Large | Medium |
| **ORM** | Eloquent | Doctrine | Query Builder |
| **Templating** | Blade | Twig | PHP |
| **Best For** | General Web Apps | Enterprise | Small-Medium Apps |

---

### Getting Started with Laravel

#### System Requirements

- **PHP:** >= 8.0
- **Composer:** Dependency manager
- **Database:** MySQL/PostgreSQL/SQLite
- **Web Server:** Apache/Nginx
- **PHP Extensions:**
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML
  - Ctype
  - JSON
  - BCMath

---

#### Installation Steps

**Step 1: Install Composer**

Download from: https://getcomposer.org

Verify installation:
```bash
composer --version
```

**Step 2: Install Laravel**

**Option A - Via Composer:**
```bash
composer create-project laravel/laravel my-project
```

**Option B - Via Laravel Installer:**
```bash
# Install Laravel installer globally
composer global require laravel/installer

# Create new project
laravel new my-project
```

**Step 3: Navigate to Project**
```bash
cd my-project
```

**Step 4: Configure Environment**

Copy `.env.example` to `.env`:
```bash
cp .env.example .env
```

Generate application key:
```bash
php artisan key:generate
```

**Step 5: Configure Database**

Edit `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

**Step 6: Start Development Server**
```bash
php artisan serve
```

Access at: http://localhost:8000

---

### Laravel Directory Structure

```
my-project/
├── app/                    # Application core
│   ├── Http/
│   │   ├── Controllers/    # Controllers
│   │   ├── Middleware/     # HTTP middleware
│   │   └── Requests/       # Form requests
│   ├── Models/             # Eloquent models
│   └── Providers/          # Service providers
│
├── bootstrap/              # Framework bootstrap
│
├── config/                 # Configuration files
│   ├── app.php
│   ├── database.php
│   └── ...
│
├── database/
│   ├── migrations/         # Database migrations
│   ├── seeders/           # Database seeders
│   └── factories/         # Model factories
│
├── public/                 # Publicly accessible
│   ├── index.php          # Entry point
│   ├── css/
│   ├── js/
│   └── images/
│
├── resources/
│   ├── views/             # Blade templates
│   ├── css/               # Raw CSS
│   └── js/                # Raw JavaScript
│
├── routes/
│   ├── web.php            # Web routes
│   ├── api.php            # API routes
│   └── console.php        # Console routes
│
├── storage/               # Logs, cache, uploads
│   ├── app/
│   ├── framework/
│   └── logs/
│
├── tests/                 # Automated tests
│
├── vendor/                # Composer dependencies
│
├── .env                   # Environment variables
├── artisan                # Artisan CLI
├── composer.json          # Composer dependencies
└── package.json           # NPM dependencies
```

---

### Basic Laravel Concepts

#### 1. Routing

Define routes in `routes/web.php`:

```php
use App\Http\Controllers\UserController;

// Basic route
Route::get('/welcome', function () {
    return view('welcome');
});

// Route with parameter
Route::get('/users/{id}', [UserController::class, 'show']);

// Multiple HTTP methods
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Route group with middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'show']);
});

// Named routes
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// Redirect
Route::redirect('/old-page', '/new-page');
```

---

#### 2. Controllers

Create controller:
```bash
php artisan make:controller UserController
```

Example controller (`app/Http/Controllers/UserController.php`):
```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show single user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Show create form
    public function create()
    {
        return view('users.create');
    }

    // Store new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    // Delete user
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
```

---

#### 3. Models (Eloquent ORM)

Create model:
```bash
php artisan make:model User
```

Example model (`app/Models/User.php`):
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Table name (optional if follows convention)
    protected $table = 'users';

    // Mass assignable attributes
    protected $fillable = ['name', 'email', 'password'];

    // Hidden attributes (for JSON)
    protected $hidden = ['password', 'remember_token'];

    // Relationships
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Accessors (modify data when reading)
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    // Mutators (modify data when writing)
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
```

**Using Models:**
```php
// Retrieve all records
$users = User::all();

// Find by ID
$user = User::find(1);
$user = User::findOrFail(1); // Throws exception if not found

// Query with conditions
$users = User::where('active', 1)->get();
$user = User::where('email', 'john@example.com')->first();

// Create new record
User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => 'password123'
]);

// Update record
$user = User::find(1);
$user->update(['name' => 'Jane Doe']);

// Delete record
$user = User::find(1);
$user->delete();

// With relationships
$user = User::with('posts')->find(1);
$posts = $user->posts; // Already loaded, no extra query
```

---

#### 4. Views (Blade Templating)

Create view in `resources/views/`

**Layout (`resources/views/layouts/app.blade.php`):**
```blade
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('users.index') }}">Users</a>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
```

**Page View (`resources/views/users/index.blade.php`):**
```blade
@extends('layouts.app')

@section('title', 'Users List')

@section('content')
    <h2>Users</h2>

    <a href="{{ route('users.create') }}" class="btn">Add New User</a>

    @if($users->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}">View</a>
                            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}"
                                  method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No users found.</p>
    @endif
@endsection
```

**Blade Directives:**
- `{{ $variable }}` - Echo (with XSS protection)
- `{!! $html !!}` - Echo raw HTML
- `@if`, `@elseif`, `@else`, `@endif` - Conditionals
- `@foreach`, `@endforeach` - Loops
- `@for`, `@while` - Other loops
- `@extends` - Extend layout
- `@section`, `@yield` - Sections
- `@include` - Include partial
- `@csrf` - CSRF token
- `@method` - HTTP method spoofing

---

#### 5. Migrations

Create migration:
```bash
php artisan make:migration create_users_table
```

Example migration (`database/migrations/xxxx_create_users_table.php`):
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    // Run migration
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps(); // created_at, updated_at
        });
    }

    // Rollback migration
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
```

**Migration Commands:**
```bash
# Run migrations
php artisan migrate

# Rollback last migration
php artisan migrate:rollback

# Rollback all migrations
php artisan migrate:reset

# Rollback and re-run all migrations
php artisan migrate:refresh

# Drop all tables and re-run migrations
php artisan migrate:fresh
```

---

### Common Framework Features

#### 1. ORM (Object-Relational Mapping)

**Eloquent (Laravel):**
```php
// Simple query
$users = User::where('age', '>', 18)->get();

// Relationships
$user = User::with('posts', 'comments')->find(1);

// Aggregates
$count = User::count();
$avg = Product::avg('price');
```

**Doctrine (Symfony):**
```php
$users = $entityManager
    ->getRepository(User::class)
    ->findBy(['age' => 18]);
```

**Benefits:**
- Database abstraction
- Relationships automatic
- No SQL needed (most times)
- Easy database switching

---

#### 2. Authentication

**Laravel Built-in Auth:**

Install Laravel Breeze (starter kit):
```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

This creates:
- Login/Register pages
- Password reset
- Email verification
- User dashboard
- Profile management

**Protecting Routes:**
```php
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
```

**In Controller:**
```php
public function __construct()
{
    $this->middleware('auth');
}
```

---

#### 3. Validation

**Laravel Validation:**
```php
$validated = $request->validate([
    'name' => 'required|max:255',
    'email' => 'required|email|unique:users',
    'password' => 'required|min:8|confirmed',
    'age' => 'required|integer|min:18',
    'website' => 'nullable|url'
]);
```

**Display Errors in View:**
```blade
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

---

### Best Practices

1. **Follow Framework Conventions**
   - Use naming conventions
   - Follow directory structure
   - Use framework features

2. **Use Version Control (Git)**
   - Commit frequently
   - Write meaningful commit messages
   - Use `.gitignore` properly

3. **Write Tests**
   - Unit tests for models
   - Feature tests for controllers
   - Test critical functionality

4. **Document Your Code**
   - Write clear comments
   - Use PHPDoc blocks
   - Keep README updated

5. **Use Environment Variables**
   - Never commit `.env` file
   - Use `.env.example` as template
   - Different configs for dev/production

6. **Keep Framework Updated**
   - Regular security updates
   - Follow upgrade guides
   - Test before updating production

7. **Use Dependency Injection**
   - Don't use `new` keyword in controllers
   - Use type-hinting
   - Let framework resolve dependencies

8. **Follow PSR Standards**
   - PSR-1: Basic coding standard
   - PSR-2: Coding style guide
   - PSR-4: Autoloading standard

9. **Optimize for Production**
   - Route caching: `php artisan route:cache`
   - Config caching: `php artisan config:cache`
   - View caching: `php artisan view:cache`
   - Use queue for slow tasks

10. **Security**
    - Always validate input
    - Use CSRF protection
    - Hash passwords
    - Sanitize output
    - Use HTTPS in production

---

## Learning Resources

### Official Documentation

- **Laravel:** https://laravel.com/docs
- **Symfony:** https://symfony.com/doc
- **CodeIgniter:** https://codeigniter.com/user_guide

### Tutorial Platforms

**Laravel:**
- Laracasts (laracasts.com) - Premium video tutorials
- Laravel Daily (laraveldaily.com) - Free tips
- Laravel News (laravel-news.com) - Updates and tutorials

**General PHP:**
- PHP: The Right Way (phptherightway.com)
- FreeCodeCamp
- YouTube (Traversy Media, The Net Ninja)
- Udemy courses

### Community

- **Laravel Forums:** https://laracasts.com/discuss
- **Stack Overflow:** Tagged questions
- **Reddit:** r/laravel, r/PHP
- **Discord:** Laravel Discord server
- **Twitter:** #Laravel, #Symfony, #PHP

---

## Practical Exercises

### Exercise 1: Installation and Setup
1. Install Composer on your system
2. Install Laravel using Composer
3. Create a new Laravel project named "my-blog"
4. Start the development server
5. Access the welcome page in browser

---

### Exercise 2: Basic Routing and Views
1. Create routes for:
   - Home page (`/`)
   - About page (`/about`)
   - Contact page (`/contact`)
2. Create Blade views for each route
3. Create a layout file with navigation
4. Extend layout in all views
5. Test all routes in browser

---

### Exercise 3: Simple CRUD Application
1. Create a "posts" table migration with:
   - id, title, content, created_at, updated_at
2. Run the migration
3. Create Post model
4. Create PostController with methods:
   - index (list all posts)
   - create (show create form)
   - store (save new post)
   - show (display single post)
   - edit (show edit form)
   - update (save edited post)
   - destroy (delete post)
5. Create Blade views for all operations
6. Test complete CRUD functionality

---

### Exercise 4: Authentication System
1. Install Laravel Breeze
2. Run migrations
3. Test user registration
4. Test user login
5. Protect dashboard route with auth middleware
6. Add logout functionality
7. Test the complete flow

---

### Exercise 5: Database Relationships
1. Create two models: User and Post
2. Define relationship:
   - User has many Posts
   - Post belongs to User
3. Modify posts table to include user_id
4. Create posts that belong to users
5. Display posts with author information
6. Display user profile with their posts

---

## Summary

### Key Takeaways

1. **MVC Architecture**
   - Separates application into Model, View, Controller
   - Better organization and maintainability
   - Each component has specific responsibility

2. **Framework Benefits**
   - Faster development with pre-built components
   - Better security with built-in protections
   - Code reusability and organization
   - Large community support

3. **Popular Frameworks**
   - **Laravel** - Most popular, great for general apps
   - **Symfony** - Enterprise-level, highly flexible
   - **CodeIgniter** - Lightweight, easy to learn

4. **Common Features**
   - **ORM** - Database abstraction
   - **Routing** - Clean URL mapping
   - **Templating** - Separation of logic and presentation
   - **Authentication** - Built-in user management
   - **Validation** - Form data validation

5. **Getting Started**
   - Install Composer
   - Choose a framework
   - Follow installation guide
   - Learn basic concepts
   - Practice with simple projects

6. **Best Practices**
   - Follow framework conventions
   - Use version control
   - Write tests
   - Keep framework updated
   - Optimize for production

---

## Exam Preparation

### Important Topics

1. ✅ MVC architecture components and flow
2. ✅ Benefits of using PHP frameworks
3. ✅ Comparison of Laravel, Symfony, CodeIgniter
4. ✅ Laravel routing and controllers
5. ✅ Eloquent ORM basics
6. ✅ Blade templating syntax
7. ✅ Database migrations
8. ✅ Authentication and authorization

### Expected Questions

1. **Explain MVC architecture with a diagram showing the request flow.**

2. **What are the key benefits of using a PHP framework?**

3. **Compare Laravel, Symfony, and CodeIgniter frameworks.**

4. **How does routing work in Laravel? Provide examples.**

5. **What is Eloquent ORM and how does it differ from writing raw SQL?**

6. **Explain Blade templating engine with examples.**

7. **How would you implement user authentication in Laravel?**

8. **What is middleware in frameworks and how is it used?**

9. **Explain database migrations and their advantages.**

10. **How do you perform CRUD operations in Laravel?**

### Practical Skills to Master

- ✅ Install and configure Laravel
- ✅ Create routes and controllers
- ✅ Create and use Eloquent models
- ✅ Build views using Blade templates
- ✅ Implement complete CRUD operations
- ✅ Work with database migrations
- ✅ Implement user authentication
- ✅ Use ORM for database operations
- ✅ Handle form validation
- ✅ Work with relationships (one-to-many, many-to-many)

---

## Additional Resources

### Video Tutorials
- Laracasts Laravel From Scratch series
- Traversy Media Laravel Crash Course (YouTube)
- CodeWithAndrea Laravel Tutorials

### Books
- "Laravel: Up & Running" by Matt Stauffer
- "Laravel Testing Decoded" by Jeffrey Way
- "Domain-Driven Laravel" by Colin DeCarlo

### Practice Projects
1. Blog application with posts and comments
2. Task management system
3. E-commerce product catalog
4. Social media clone
5. API development with Laravel Sanctum

---

**End of Unit 8 Notes**
