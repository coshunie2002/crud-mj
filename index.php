<?php
include 'conn.php';

// Check if the form is submitted for saving data
if(isset($_POST['save'])) {
    $fname = $_POST['fn'];
    $lname = $_POST['ln'];

    mysqli_query($connection, "INSERT INTO mydb (firstname, lastname) VALUES ('$fname', '$lname')") or die ("Database error:".mysqli_error($connection));

    echo "<script>alert('Saved Successfully!')</script>";
    echo "<script>window.location='index.php'</script>";
}

// Initialize variables for search
$searchKeyword = "";

// Check if the search form is submitted
if(isset($_POST['search'])) {
    $searchKeyword = $_POST['searchKeyword'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>INSERT AND DISPLAY DATA</title>
</head>
<body>
<center>
    <h1>INSERT AND DISPLAY DATA</h1>
    <form method="post">
        <input type="text" name="fn" placeholder="Firstname">
        <input type="text" name="ln" placeholder="Lastname">
        <input type="submit" name="save" value="save">
    </form>

    <!-- Search form -->
    <form method="post">
        <input type="text" name="searchKeyword" placeholder="Search by Firstname or Lastname" value="<?php echo $searchKeyword; ?>">
        <input type="submit" name="search" value="Search">
    </form>

    <?php
    // Perform search query
    $searchQuery = "";
    if(!empty($searchKeyword)) {
        $searchQuery = " WHERE firstname LIKE '%$searchKeyword%' OR lastname LIKE '%$searchKeyword%'";
    }

    // Fetch data from database
    $result = mysqli_query($connection, "SELECT * FROM mydb" . $searchQuery) or die ("database error:".mysqli_error($connection));

    // Display results
    echo "<table>
            <tr>
                <th>ID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th></th>
            </tr>";
    while($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
        $first_name = $row['firstname'];
        $last_name = $row['lastname'];
        echo "<tr>
                <td>$user_id</td>
                <td>$first_name</td>
                <td>$last_name</td>
                <td><a href='delete.php?delete=$user_id'>delete</a> | <a href='edit.php?edit=$user_id'>edit</a></td>
              </tr>";
    }
    echo "</table>";
    ?>

    <style>
        input {
            margin: 5px;
        }
        table, td, th {
          border: 5px solid black;
        }
        td {
            text-align: center;
        }
        table {
          border-collapse: collapse;
          width: 40%;
          margin-top: 30px;
        }
        th {
          height: 70px;
        }
    </style>
</center>
</body>
</html>
