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
                    $query1="SELECT * FROM blogs";
                    $blog_all_collumns=mysqli_query($connection, $query1);
                    while($row=mysqli_fetch_assoc($blog_all_collumns)){
                        $blog_title=$row['blog_title'];
                        $blog_author=$row['blog_author'];
                        $blog_date=$row['blog_date'];
                        $blog_image=$row['blog_image'];
                        $blog_content=$row['blog_content'];
                        ?>
                        <!-- <h1 class="page-header">
                    Welcome to CineHub
                    <small>Below are some popular reviews and Movie lists</small>
                </h1> -->
                <h2>
                    <a href="#"><?php echo $blog_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $blog_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on  <?php echo $blog_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $blog_image ?>" alt="">
                <hr>
                <p><?php echo $blog_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                    <?php } ?>
                                    <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"?>