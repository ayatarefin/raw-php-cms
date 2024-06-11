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
                    ?>
                    <h1 class="page-header">
                        Genre Manager
                    </h1>
                    <div class="col-xs-6">
                        <!-- Edit field -->
                        <form action="#" method="post">
                            <!--edit option -->
                            <?php
                            if (isset($_GET['update'])) {
                                $genre_id = $_GET['update'];
                                // Retrieve the genres from the database
                                $query = "SELECT * FROM genres WHERE genre_id ={$genre_id}";
                                $show_genre = mysqli_query($connection, $query);
                                // Display the genres in the table
                                while ($row = mysqli_fetch_assoc($show_genre)) {
                                    $genre_id = $row['genre_id'];
                                    $genre_name = $row['genre_name'];
                            ?>
                                    <div class="form-group">
                                        <label for="genre-title">Update Genre</label>
                                        <input value="<?php if (isset($genre_name)) {
                                                            echo $genre_name;
                                                        } ?>" name="genre_title" type="text" class="form-control">
                                    </div>
                                    <?php
                                    if (isset($_POST['update'])) {
                                        $update_genre_name = $_POST['genre_title'];
                                        $query = "UPDATE genres SET genre_name='{$update_genre_name}' WHERE genre_id ={$genre_id}";
                                        $update_query = mysqli_query($connection, $query);
                                        if (!$update_query) {
                                            die("QUERY FAILED" . mysqli_error($connection));
                                        }
                                        header("location: genres.php");
                                    }
                                    ?>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="update" value="Update Genre">
                                    </div>
                            <?php  }
                            } ?>
                        </form>
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
                                echo "</tr>";
                            }
                            ?>



                            <!--delete option -->
                            <?php
                            if (isset($_GET['delete'])) {
                                $movie_genre_id = $_GET['delete'];
                                $query = "DELETE FROM genres WHERE genre_id={$movie_genre_id}";
                                $delete_query = mysqli_query($connection, $query);
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