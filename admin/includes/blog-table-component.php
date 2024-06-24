<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Blog Title</th>
            <th>Blog Author</th>
            <th>Blog Image</th>
            <th>Blog Tags</th>
            <th>Blog Comments</th>
            <th>Blog Status</th>
            <th>Blog Date</th>

        </tr>
    </thead>
    <?php showBlogsInTable(); ?>
    <!--delete option -->
    <?php deleteBlog(); ?>
    </tbody>
</table>