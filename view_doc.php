<?php
$docs = mysqli_query($con, "SELECT * FROM documents WHERE case_id = $case_id");

while ($doc = mysqli_fetch_assoc($docs)) {
  echo "<div>";
  echo "<strong>" . htmlspecialchars($doc['title'] ?: $doc['file_name']) . "</strong><br>";
  echo htmlspecialchars($doc['description']) . "<br>";
  echo "<a href='" . $doc['file_path'] . "' download>📥 Download</a> | ";
  echo "<a href='delete_document.php?id=" . $doc['id'] . "' onclick='return confirm(\"Delete this document?\")'>❌ Delete</a>";
  echo "</div><hr>";
}
?>
