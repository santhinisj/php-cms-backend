<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM educational
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Educational Details has been deleted' );
  
  header( 'Location: educational.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM educational
  ORDER BY year DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Education</h2>

<table>
  <tr>
    
    <th align="center">ID</th>
    <th align="center">Credential</th>
    <th align="center">Institution</th>
    <th align="center">Year</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['credential']; ?></td>
      <td align="center"><?php echo $record['institution']; ?></td>
      <td align="center"><?php echo $record['year']; ?></td>
      <td align="center"><a href="educational_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="educational.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this education?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="educational_add.php"><i class="fas fa-plus-square"></i> Add Education</a></p>


<?php

include( 'includes/footer.php' );

?>