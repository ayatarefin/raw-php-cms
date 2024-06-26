<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Comment by</th>
            <th>Email Address</th>
            <th>Comment</th>
            <th>Date</th>
            <th>Commented in</th>
            <th>Comment Status</th>
            <th>Set Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <?php
    $query = "SELECT * FROM comments";
    $comment_list = mysqli_query($connection, $query);
    if(!$comment_list){
        die;
    }
    while($row= mysqli_fetch_assoc($comment_list)){
        $comment_id = $row['comment_id'];
        $comment_author = $row['comment_author'];
        $comment_blog_id = $row['comment_blog_id'];
        $comment_author_email = $row['comment_author_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];

        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_author_email</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_date</td>";
        $query = "SELECT * FROM blogs WHERE blog_id={$comment_blog_id}";
        $comment_blog_list = mysqli_query($connection, $query);
        if(!$comment_blog_list){
            die;
        }
        while ($row = mysqli_fetch_assoc($comment_blog_list)) {
            $blog_id= $row['blog_id'];
            $blog_title = $row['blog_title'];
        echo "<td><a href='../blog.php?b_id=$blog_id'>$blog_title</a></td>";

        }
        echo "<td>$comment_status</td>";
        echo "<td>
            <a href='comment-table.php?approve_comment={$comment_id}'><button type='button' class='btn btn-primary'>Approve</button></a>
            <a href='comment-table.php?unapprove_comment={$comment_id}'><button type='button' class='btn btn-secondary'>Unapprove</button></a>
              </td>";
        echo "<td><a href='comment-table.php?delete_comment={$comment_id}'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
        echo "</tr>";
    }    
    ?>
    <!--delete option -->
    <?php
    if (isset($_GET['delete_comment'])) {
        $movie_comment_id = $_GET['delete_comment'];
        $query = "DELETE FROM comments WHERE comment_id={$movie_comment_id}";
        $delete_query = mysqli_query($connection, $query);
        header("location: comment-table.php");
    }
    ?>
    <!-- Approval and Unapproval -->
     <?php
     if (isset($_GET['approve_comment'])){
        $approve_comment = $_GET['approve_comment'];
        $query = "UPDATE comments SET comment_status='Approved' WHERE comment_id = $approve_comment";
        $approve_comment_query = mysqli_query($connection,$query);
        header("location: comment-table.php");
     }
     ?>
     <?php
          if (isset($_GET['unapprove_comment'])){
            $unapprove_comment = $_GET['unapprove_comment'];
            $query = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id = $unapprove_comment";
            $unapprove_comment_query = mysqli_query($connection,$query);
            header("location: comment-table.php");
         }
        ?>
    </tbody>
</table>