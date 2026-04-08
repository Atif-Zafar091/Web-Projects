<?php
include 'db.php';
$case_id = $_GET['case_id'];
$result = mysqli_query($con, "SELECT * FROM hearings WHERE case_id = $case_id ORDER BY date ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Hearings</title>
  <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
</head>
<body>
  <div class=\"container mt-5\">
    <h2>Hearings for Case ID <?= $case_id ?></h2>
    <a href=\"add_hearing_form.php?case_id=<?= $case_id ?>\" class=\"btn btn-success mb-3\">Add Hearing</a>

    <table class=\"table table-bordered\">
      <tr>
        <th>Date</th>
        <th>Location</th>
        <th>Notes</th>
        <th>Actions</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?= $row['date'] ?></td>
          <td><?= $row['location'] ?></td>
          <td><?= $row['notes'] ?></td>
          <td>
            <a class=\"btn btn-warning btn-sm\" href=\"edit_hearing.php?id=<?= $row['hearing_id'] ?>\">Edit</a>
            <a class=\"btn btn-danger btn-sm\" href=\"delete_hearing.php?id=<?= $row['hearing_id'] ?>&case_id=<?= $case_id ?>\" onclick=\"return confirm('Delete hearing?')\">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>
