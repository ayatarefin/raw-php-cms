<?php
function addGenre()
{
    global $connection;

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
}

function showGenreInTable()
{
    global $connection;
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
}   


function updateGenre(){
    global $connection;
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
    }

}

    function deleteGenre(){
        global $connection;
        if (isset($_GET['delete'])) {
            $movie_genre_id = $_GET['delete'];
            $query = "DELETE FROM genres WHERE genre_id={$movie_genre_id}";
            $delete_query = mysqli_query($connection, $query);
            header("location: genres.php");
        }
    }

    ?>