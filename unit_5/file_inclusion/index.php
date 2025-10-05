<?php
// Include header (optional)
include "header.php";

// Require configuration (essential)
require "config.php";
?>

<h2>Home Page</h2>
<p>Welcome to <?php echo $siteName; ?>.</p>
<p><?php echo $welcomeMessage; ?></p>
<p>Created by: <?php echo $author; ?></p>

<?php
// Include footer (optional)
include "footer.php";
?>
