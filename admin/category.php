<?php include "includes/admin-header.php" ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin-nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row col-lg-12">
                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Category
                            <small>Add new Category</small>
                        </h1>
                        <ol class="breadcrumb">
                        <form action="#" method="post">
                    <div class="input-group col-lg-6">
                        <input name="add_category" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="Add" class="btn btn-default" type="submit">
                                <span>Add</span>
                        </button>
                        </span>
                    </div>
                    </form>
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
