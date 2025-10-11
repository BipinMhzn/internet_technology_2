<?php
class Logger {
    private $logs = [];

    public function __set($key, $value) {
        echo "Adding log: [$key] => $value<br>";
        $this->logs[$key] = $value;
    }

    public function __toString() {
        return "Logs: " . json_encode($this->logs);
    }
}

$logger = new Logger();
$logger->login = "User John logged in";
$logger->upload = "File uploaded successfully";

echo $logger;
?>
