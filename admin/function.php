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


function updateGenre()
{
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

function deleteGenre()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $movie_genre_id = $_GET['delete'];
        $query = "DELETE FROM genres WHERE genre_id={$movie_genre_id}";
        $delete_query = mysqli_query($connection, $query);
        header("location: genres.php");
    }
}


// Blogs releted

function showBlogsInTable()
{
    global $connection;
    // Retrieve the genres from the database
    $query = "SELECT * FROM blogs";
    $blogs_list = mysqli_query($connection, $query);

    // Check for query errors
    if (!$blogs_list) {
        die('QUERY FAILED: ' . mysqli_error($connection));
    }

    // Display the genres in the table
    while ($row = mysqli_fetch_assoc($blogs_list)) {
        $blogs_id = $row['blog_id'];
        $blogs_title = $row['blog_title'];
        $blogs_author = $row['blog_author'];
        $blogs_content = $row['blog_content'];
        $blogs_tags = $row['blog_tags'];
        $blogs_status = $row['blog_status'];
        $blogs_image = $row['blog_image'];
        $comment_count = $row['blog_comment_count'];
        $blog_date = $row['blog_date'];
        echo "<tr>";
        echo "<td>$blogs_id</td>";
        echo "<td>$blogs_title</td>";
        echo "<td>$blogs_author</td>";
        echo "<td><img width='100' src='../images/$blogs_image' alt='image'></td>";
        echo "<td>$blogs_tags</td>";
        echo "<td>$comment_count</td>";
        echo "<td>$blogs_status</td>";
        echo "<td>$blog_date</td>";
        echo "<td><a href='blog-table.php?delete={$blogs_id}'>Delete</a></td>";
        echo "<td><a href='blog-table.php?source=update_blog&b_id={$blogs_id}'>Update</a></td>";
        echo "</tr>";
    }
}

function confirmQuery($result)
{
    global $connection;
    if (!$result) {
        die('QUERY FAILED: ' . mysqli_error($connection));
    } else {
        echo "Blogs added successfully!";
    }
}
function addBlog()
{
    global $connection;

    if (isset($_POST['create_blog'])) {
        $blog_title = $_POST['blog_title'];
        $blog_author = $_POST['blog_author'];
        $blog_genre_id = $_POST['blog_genre_id'];
        $blog_status = $_POST['blog_status'];
        $blog_image = $_FILES['blog_image']['name'];
        $blog_image_temp = $_FILES['blog_image']['tmp_name'];
        $blog_tags = $_POST['blog_tags'];
        $blog_content = $_POST['blog_content'];
        $blog_date = date('d-m-y');
        $blog_comment_count = 4;

        move_uploaded_file($blog_image_temp, "../images/$blog_image");

        // Correct the SQL query by adding the missing closing quote and parentheses
        $query = "INSERT INTO blogs (blog_genre_id, blog_title, blog_author, blog_image, blog_content, blog_tags, blog_date, blog_comment_count, blog_status) VALUES ({$blog_genre_id},'{$blog_title}','{$blog_author}','{$blog_image}','{$blog_content}','{$blog_tags}',now(),'{$blog_comment_count}','{$blog_status}')";

        // Execute the query and handle any errors
        $create_blog_query = mysqli_query($connection, $query);

        confirmQuery($create_blog_query);
    }
}
function deleteBlog()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $movie_blog_id = $_GET['delete'];
        $query = "DELETE FROM blogs WHERE blog_id={$movie_blog_id}";
        $delete_query = mysqli_query($connection, $query);
        header("location: blog-table.php");
    }
}

function updateBlog()
{
    global $connection;
    if (isset($_GET['b_id'])) {
        $the_blog_id = $_GET['b_id'];
        // Retrieve the genres from the database
        $query = "SELECT * FROM blogs WHERE blog_id ={$the_blog_id}";
        $show_blogs_by_id = mysqli_query($connection, $query);
        // Display the genres in the table
        while ($row = mysqli_fetch_assoc($show_blogs_by_id)) {
            $blogs_genre_id = $row['blog_genre_id'];
            $blogs_title = $row['blog_title'];
            $blogs_author = $row['blog_author'];
            $blogs_content = $row['blog_content'];
            $blogs_tags = $row['blog_tags'];
            $blogs_status = $row['blog_status'];
            $blogs_image = $row['blog_image'];
        ?>
                        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="genre-title">Update Genre</label>
                    <input value="<?php echo $blogs_genre_id; ?>" name="blog_genre_id" type="text" class="form-control" id="blogs-genre-title">
                </div>
                <div class="form-group col-md-6">
                    <label for="blog-title">Update Title</label>
                    <input value="<?php echo $blogs_title; ?>" name="blog_title" type="text" class="form-control" id="blog-title">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="blog-author">Update Author</label>
                    <input value="<?php echo $blogs_author; ?>" name="blog_author" type="text" class="form-control" id="blog-author">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="blog-status">Update Blog Status</label>
                    <input value="<?php echo $blogs_status; ?>" name="blog_status" type="text" class="form-control" id="blog-status">
                </div>
                <div class="form-group col-md-6">
                    <label for="blog-image">Update New Image</label>
                    <input name="blog_image" type="file" class="form-control" id="blog-image">
                    <?php if ($blogs_image): ?>
                        <img src="../images/<?php echo $blogs_image; ?>" alt="Blog Image" style="max-width: 100%; margin-top: 10px;">
                    <?php endif; ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="blog-content">Update Content</label>
                    <textarea class="form-control" name="blog_content" id="blog-content" cols="30" rows="10"><?php echo $blogs_content; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="blog-tags">Update tags</label>
                    <input value="<?php echo $blogs_tags; ?>" name="blog_tags" type="text" class="form-control" id="blog-tags">
                </div>
            </div>
            <?php
            if (isset($_POST['update_blog'])) {
                $update_blog_title = $_POST['blog_title'];
                $update_blog_author = $_POST['blog_author'];
                $update_blog_genre_id = $_POST['blog_genre_id'];
                $update_blog_status = $_POST['blog_status'];
                $update_blog_image = $_FILES['blog_image']['name'];
                $update_blog_image_temp = $_FILES['blog_image']['tmp_name'];
                $update_blog_tags = $_POST['blog_tags'];
                $update_blog_content = $_POST['blog_content'];
                $update_blog_date = date('d-m-y');
                $update_blog_comment_count = 4;

                move_uploaded_file($update_blog_image_temp, "../images/$update_blog_image");

                $query = "UPDATE blogs SET 
                blog_genre_id = '{$update_blog_genre_id}', 
                blog_title = '{$update_blog_title}', 
                blog_author = '{$update_blog_author}', 
                blog_image = '{$update_blog_image}', 
                blog_content = '{$update_blog_content}', 
                blog_tags = '{$update_blog_tags}', 
                blog_date = now(), 
                blog_comment_count = '{$update_blog_comment_count}', 
                blog_status = '{$update_blog_status}' 
                WHERE blog_id = {$the_blog_id}";
                $update_blog_query = mysqli_query($connection, $query);
                if (!$update_blog_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                header("location: blog-table.php");
            }
            ?>
            <div class="form-group col-md-6">
                <input class="btn btn-primary" type="submit" name="update_blog" value="Update Genre">
            </div>
<?php  }
    }
}

?>