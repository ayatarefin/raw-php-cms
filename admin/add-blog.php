<?php include "includes/admin-header.php" ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin-nav.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row col-lg-12">
                <div class="col-lg-6">
                    <?php addGenre(); ?>
                    <h1 class="page-header">
                        Genre Manager
                    </h1>
                    <div class="col-xs-6">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="genre-title">Add Genre</label>
                                <input name="blog_genre_id" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="blog-title">Title</label>
                                <input name="blog_title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="blog-author">Author</label>
                                <input name="blog_author" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input name="date" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image">Add Image</label>
                                <input name="blog_image" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="blog-content">Write Content</label>
                                <input name="blog_content" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="blog-tags">Add tags</label>
                                <input name="blog_tags" type="text" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Genre">
                            </div>
                        </form>

                        <!-- Edit field -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->
<?php include "includes/admin-footer.php" ?>