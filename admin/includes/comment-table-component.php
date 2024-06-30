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
            <th>Approval</th>
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
            $blog_title = $row['blog_title'];
        echo "<td>$blog_title</td>";

        }
        echo "<td>$comment_status</td>";
        echo "<td><a href=''>Approved</a></td>";
        echo "<td><a href=''>Deleted</a></td>";
        echo "</tr>";
    }


    
    
    
    
    
    
    ?>
    <!--delete option -->
    <?php deleteBlog(); ?>
    </tbody>
</table>