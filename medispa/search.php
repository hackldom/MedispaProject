<head>
    <style>
      p {
        font-weight: bold;
        font-size: 16px;

      }
    </style>
</head>
<?php
require_once('connect.php');
$output = '';
if(isset($_POST['search'])) {
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^a-z]#i", "", $searchq);

  $query = mysqli_query($dbc, "SELECT * FROM newclient WHERE first_name LIKE '%$searchq%' OR last_name LIKE '%$searchq%'") or die("Could not search!");
  $count = mysqli_num_rows($query) ;

  if ($count == 0) {
    $output = "There was no search result!";
      }
    else{
      while ($row = mysqli_fetch_array($query)){
          $fname = $row['first_name'];
          $lname = $row['last_name'];
		  include_once('includes/session.php');
  test_login();
  include_once('connect.php');
  $id = $row['id'];

          $output .= '<div>'.$fname.' '.$lname.'  </div>';

      }
    }
  }
print("<p>There were $count results:</p>");
print("$output");

?>
