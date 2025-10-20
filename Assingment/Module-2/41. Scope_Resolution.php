<?php
class InstanceTracker {
    // Static property to hold the count of instances
    private static $instanceCount = 0;

    // Constructor increments the instance count
    public function __construct() {
        self::$instanceCount++; // Using scope resolution operator
    }

    // Static method to get the current instance count
    public static function getInstanceCount() {
        return self::$instanceCount; // Using scope resolution operator
    }
}

// Create some instances
$obj1 = new InstanceTracker();
$obj2 = new InstanceTracker();
$obj3 = new InstanceTracker();
$obj4 = new InstanceTracker();

// Access static method using scope resolution operator
echo "Total instances created: " . InstanceTracker::getInstanceCount();
?>