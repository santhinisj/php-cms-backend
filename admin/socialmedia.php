<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM socialmedia
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Social Media has been deleted' );
  
  header( 'Location: socialmedia.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM socialmedia
  ORDER BY name DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Social Media Links</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Url</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['name']; ?></td>
      <td align="center"><?php echo $record['url']; ?></td>
      <td align="center"><a href="socialmedia_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="socialmedia.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this social media?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="socialmedia_add.php"><i class="fas fa-plus-square"></i> Add Social Media</a></p>


<?php

include( 'includes/footer.php' );

?>