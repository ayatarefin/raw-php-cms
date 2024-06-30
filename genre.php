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
    if(isset($_GET['t_genre_id'])){
        $the_genre_blog_id = $_GET['t_genre_id'];
        }
    $query1 = "SELECT * FROM blogs where blog_genre_id = $the_genre_blog_id";
    $blog_all_collumns = mysqli_query($connection, $query1);
    while ($row = mysqli_fetch_assoc($blog_all_collumns)) {
        $blog_id = $row['blog_id'];
        $blog_title = $row['blog_title'];
        $blog_author = $row['blog_author'];
        $blog_date = $row['blog_date'];
        $blog_image = $row['blog_image'];
        $blog_content = substr( $row['blog_content'],0,350);
        ?>
      <h2>
            <a href="blog.php?b_id=<?php echo $blog_id;?>"><?php echo $blog_title ?></a>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php echo $blog_author ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $blog_date ?></p>
        <hr>
        <a href="blog.php?b_id=<?php echo $blog_id;?>"><img class="img-responsive" src="images/<?php echo $blog_image ?>" alt=""></a>
        <hr>
        <p><?php echo $blog_content ?></p>
        <a class="btn btn-primary" href="blog.php?b_id=<?php echo $blog_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
    <?php } 
    ?>
</div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>
    </div>
    <!-- /.row -->
    <hr>
    </div>

<!-- Footer -->
<?php include "includes/footer.php" ?>