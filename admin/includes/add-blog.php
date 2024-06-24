<?php addBlog(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="genre-title">Add Genre</label>
                        <input name="blog_genre_id" type="text" class="form-control" id="genre-title">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="blog-title">Title</label>
                        <input name="blog_title" type="text" class="form-control" id="blog-title">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="blog-author">Author</label>
                        <input name="blog_author" type="text" class="form-control" id="blog-author">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="blog-status">Blog Status</label>
                        <input name="blog_status" type="text" class="form-control" id="blog-status">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="blog-image">Add Image</label>
                        <input name="blog_image" type="file" class="form-control" id="blog-image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="blog-content">Write Content</label>
                    <textarea class="form-control" name="blog_content" id="blog-content" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="blog-tags">Add tags</label>
                    <input name="blog_tags" type="text" class="form-control" id="blog-tags">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="create_blog" value="Publish blog">
                </div>
            </form>
        </div>
    </div>
</div>
