<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_POST['credential'])) {

  if ($_POST['credential']) {

    $query = 'INSERT INTO educational (
        credential,
        institution,
        year
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['credential']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['institution']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['year']) . '"
      )';
    mysqli_query($connect, $query);

    set_message('Education has been added');
  }

  header('Location: educational.php');
  die();
}

include('includes/header.php');

?>

<h2>Add Education</h2>

<form method="post">

  <label for="title">Credential:</label>
  <input type="text" name="credential" id="credential">

  <br>

  <label for="content">Institution:</label>
  <textarea type="text" name="institution" id="institution" rows="10"></textarea>

  
  <br>

  <label for="url">Year:</label>
  <input type="text" name="year" id="year">

  <br>

  <input type="submit" value="Add Education">

</form>

<p><a href="educational.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include('includes/footer.php');

?>