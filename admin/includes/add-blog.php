<?php addBlog(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="select-genre">Select Genre</label>
                        <select name="blog_genre_id" id="select-genre" class="form-control">
                            <?php 
                            $query = "SELECT * FROM genres";
                            $select_genres = mysqli_query($connection, $query);

                            confirmQuery($select_genres);

                            while($row =mysqli_fetch_assoc($select_genres)){
                                $genre_id = $row['genre_id'];
                                $genre_title = $row['genre_name'];
                                echo "<option value='{$genre_id}'>{$genre_title}</option>";
                            }
                            ?>
                        </select>
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
                    <label for="blog-tags">Add Tags</label>
                    <input name="blog_tags" type="text" class="form-control" id="blog-tags">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="create_blog" value="Publish Blog">
                </div>
            </form>
        </div>
    </div>
</div>
