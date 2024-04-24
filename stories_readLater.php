<?php
require_once 'Story.php'; // Adjust the path as needed

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if story_id is provided
    if (isset($_POST['story_id'])) {
        $story_id = $_POST['story_id'];

        // Update the read_later column for the specified story_id
        try {
            $story = Story::findById($story_id);
            if ($story) {
                $story->addToReadLater(); // Add story to read later list
                // Optionally, you can redirect the user to a confirmation page
                header("Location: index.php");
                exit();
            } else {
                // Handle case where story is not found
                echo "Story not found.";
            }
        } catch (Exception $ex) {
            // Handle exceptions
            echo "Error: " . $ex->getMessage();
        }
    } else {
        // Handle case where story_id is not provided
        echo "Story ID not provided.";
    }
} else {
    // Handle case where request method is not POST
    echo "Invalid request method.";
}
?>
