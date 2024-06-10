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
                        $gen_title = $_POST['genre_title'];

                        if ($gen_title == "" || empty($gen_title)) {
                            echo "this field should not be empty";
                        } else {
                            $query = "INSERT INTO genres(genre_name)";
                            $query .= "VALUE('{$gen_title}";
                            $create_genre_query = mysqli_query($connection, $query);
                            if (!$create_genre_query) {
                                die('QUERY FAILED' . mysqli_error($connection));
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
                    </div>
                    <!-- add table -->

                    <?php

                    $query = "SELECT * FROM genres";
                    $genre_list_sidebar = mysqli_query($connection, $query);
                    ?>
                    <div class="col-xs-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Genre Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($genre_list_sidebar)) {
                                    $genre_id = $row['genre_id'];
                                    $genre_name = $row['genre_name'];
                                    echo " <tr>";
                                    echo "<td>
                                    <a href='#'>$genre_id</a>
                                    </td>";
                                    echo " <td>
                                    <a href='#'>$genre_name</a>
                                    </td>";
                                } ?>
                                </tr>
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