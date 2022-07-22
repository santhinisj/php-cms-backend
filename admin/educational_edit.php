<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: projects.php' );
  die();
  
}

if( isset( $_POST['credential'] ) )
{
  
  if( $_POST['credential'])
  {
    
    $query = 'UPDATE educational SET
      credential = "'.mysqli_real_escape_string( $connect, $_POST['credential'] ).'",
      institution = "'.mysqli_real_escape_string( $connect, $_POST['institution'] ).'",
      year = "'.mysqli_real_escape_string( $connect, $_POST['year'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been updated' );
    
  }

  header( 'Location: educational.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM educational
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: educational.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Project</h2>

<form method="post">
  
  <label for="title">Credential:</label>
  <input type="text" name="credential" id="credential" value="<?php echo htmlentities( $record['credential'] ); ?>">
    
  <br>
  
  <label for="content">Institution:</label>
  <textarea type="text" name="institution" id="institution" rows="5"><?php echo htmlentities( $record['institution'] ); ?></textarea>
  
  <br>
  
  <label for="url">Year:</label>
  <input type="text" name="year" id="year" value="<?php echo htmlentities( $record['year'] ); ?>">
  
  <br>
  
  <input type="submit" value="Edit Education">
  
</form>

<p><a href="educational.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>