<?php include "includes/config.php" ?>
<?php include "includes/header.php" ?>
<!-- Navigation -->
<?php include "includes/nav.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            if (isset($_GET['b_id'])) {
                $the_individual_blog = $_GET['b_id'];
            }
            $query1 = "SELECT * FROM blogs where blog_id = $the_individual_blog";
            $blog_all_collumns = mysqli_query($connection, $query1);
            while ($row = mysqli_fetch_assoc($blog_all_collumns)) {
                $blog_id = $row['blog_id'];
                $blog_title = $row['blog_title'];
                $blog_author = $row['blog_author'];
                $blog_date = $row['blog_date'];
                $blog_image = $row['blog_image'];
                $blog_content = $row['blog_content'];
            ?>
                <h2>
                    <a href="blog.php?b_id=<?php echo $blog_id; ?>"><?php echo $blog_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $blog_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $blog_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $blog_image ?>" alt="">
                <hr>
                <p><?php echo $blog_content ?></p>
                <hr>
            <?php }
            ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>
    </div>
    <!-- /.row -->
    <hr>
    <!-- Comments Form -->
    <div class="well col-md-8">
        <?php 
        if(isset($_POST['create_comment'])){
            $the_individual_blog = $_GET['b_id'];
            $comment_author = $_POST['comment_author'];
            $comment_author_email = $_POST['comment_author_email'];
            $comment_content = $_POST['comment_content'];
            $query = "INSERT INTO comments (comment_blog_id, comment_author, comment_author_email, comment_content, comment_status, comment_date) 
            VALUES 
            ({$the_individual_blog},'{$comment_author}','{$comment_author_email}','{$comment_content}','',now())";
            $create_comment_query = mysqli_query($connection,$query);
            if (!$create_comment_query) {
                die('QUERY FAILED: ' . mysqli_error($connection));
            }else{
                echo "Wait for Approval";
            }
        }
        ?>
        <form method="post" action="" role="form">
            <div class="form-group">
                <label for="comment-author">Your Name</label>
                <input name="comment_author" type="text" class="form-control" id="comment-author">
            </div>
            <div class="form-group">
                <label for="comment-author-email">Your Email</label>
                <input name="comment_author_email" type="email" class="form-control" id="comment-author-email">
            </div>
            <div class="form-group">
                <label for="comment-content">Leave a Comment</label>
                <textarea name="comment_content" class="form-control" id="comment-content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="create_comment">Comment</button>
        </form>
    </div>

    <hr>

    <!-- Comment -->
    <?php
    $query = "SELECT * FROM comments WHERE comment_blog_id = {$the_individual_blog} ";
    $query .= "AND comment_status = 'Approved' ";
    $query .= "ORDER BY comment_id DESC";
    $select_comment_query = mysqli_query($connection,$query);
    if(!$select_comment_query){
        die('Query Failed' . mysqli_error($connection));
    }
    while($row=mysqli_fetch_array($select_comment_query)){
        $comment_date = $row['comment_date'];
        $comment_content = $row['comment_content'];
        $comment_author = $row['comment_author'];
}
    
?>
    <div class="media col-md-8">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $comment_author ?>
                <small><?php echo $comment_date ?></small>
            </h4>
            <?php echo $comment_content ?>
        </div>
    </div>
    <!-- Comment -->
</div>

<!-- Footer -->
<?php include "includes/footer.php" ?>