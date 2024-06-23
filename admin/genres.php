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
                                <input name="genre_title" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Genre">
                            </div>
                        </form>

                        <!-- Edit field -->
                    </div>

                    <!-- add table -->
                    <div class="col-xs-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Genre Title</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <?php showGenreInTable(); ?>
                            <!--delete option -->
                            <?php deleteGenre(); ?>
                            </tbody>
                        </table>
                    </div>

                    </ol>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/admin-footer.php" ?>