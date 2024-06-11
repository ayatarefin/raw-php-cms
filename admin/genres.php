<?php include "includes/admin-header.php" ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin-nav.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row col-lg-12">
                <div class="col-lg-6">
                    <?php
                    if (isset($_POST['submit'])) {
                        // Ensure the genre title is set and trim any extra whitespace
                        $gen_title = trim($_POST['genre_title']);

                        // Check if the genre title is empty after trimming
                        if (empty($gen_title)) {
                            echo "This field should not be empty";
                        } else {
                            // Sanitize the input to prevent SQL injection
                            $gen_title = mysqli_real_escape_string($connection, $gen_title);

                            // Correct the SQL query by adding the missing closing quote and parentheses
                            $query = "INSERT INTO genres (genre_name) VALUE ('{$gen_title}')";

                            // Execute the query and handle any errors
                            $create_genre_query = mysqli_query($connection, $query);

                            if (!$create_genre_query) {
                                die('QUERY FAILED: ' . mysqli_error($connection));
                            } else {
                                echo "Genre added successfully!";
                            }
                        }
                    }
                    ?>
                    <h1 class="page-header">
                        Genre Manager
                    </h1>
                    <div class="col-xs-6">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="genre-title">Add Genre</label>
                                <input name="genre_title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Genre">
                            </div>
                        </form>

                        <!-- Edit field -->
                    </div>

                    <!-- add table -->
                    <div class="col-xs-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Genre Title</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                                <?php
                                // Retrieve the genres from the database
                                $query = "SELECT * FROM genres";
                                $genre_list_sidebar = mysqli_query($connection, $query);

                                // Check for query errors
                                if (!$genre_list_sidebar) {
                                    die('QUERY FAILED: ' . mysqli_error($connection));
                                }

                                // Display the genres in the table
                                while ($row = mysqli_fetch_assoc($genre_list_sidebar)) {
                                    $genre_id = $row['genre_id'];
                                    $genre_name = $row['genre_name'];
                                    echo "<tr>";
                                    echo "<td>$genre_id</td>";
                                    echo "<td>$genre_name</td>";
                                    echo "<td><a href='genres.php?delete={$genre_id}'>Delete</a></td>";
                                    echo "<td><a href='update-genres.php?update={$genre_id}'>Update</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                                <!--delete option -->
                                <?php
                                if(isset($_GET['delete'])){
                                    $movie_genre_id = $_GET['delete'];
                                    $query="DELETE FROM genres WHERE genre_id={$movie_genre_id}";
                                    $delete_query= mysqli_query($connection,$query);
                                    header("location: genres.php");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    </ol>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/admin-footer.php" ?>