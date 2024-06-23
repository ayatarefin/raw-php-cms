<?php include "includes/admin-header.php" ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin-nav.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row col-lg-12">
                <div class="col-lg-6">
                    <?php
                    ?>
                    <h1 class="page-header">
                        Genre Manager
                    </h1>
                    <div class="col-xs-6">
                        <!-- Edit field -->
                        <form action="#" method="post">
                            <!--edit option -->
                            <?php updateGenre(); ?>
                        </form>
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
                            <?php showGenreInTable();
                            ?>



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