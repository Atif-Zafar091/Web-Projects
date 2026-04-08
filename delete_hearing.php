<?php
include 'db.php';

$hearing_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($hearing_id > 0) {
    $sql = "DELETE FROM hearings WHERE hearing_id = $hearing_id";

    if (mysqli_query($con, $sql)) {
        echo "<script>
            alert('✅ Hearing deleted successfully!');
            window.location.href = 'add_hearing_form.php';
        </script>";
    } else {
        echo "<script>
            alert(' Error deleting hearing.');
            window.location.href = 'add_hearing_form.php';
        </script>";
    }
} 
?>
