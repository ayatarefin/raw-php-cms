<?php include "includes/admin-header.php" ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin-nav.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row col-lg-12">
                    <h1 class="page-header">
                        Blogs Manager
                    </h1>
                    <!-- add table -->
                     <?php
                     if(isset($_GET['source'])){
                        $source= $_GET['source'];
                     } else{
                        $source='';
                     }
                     switch($source){

                        case 'add post';
                        include "includes/add-blog.php";
                        break;

                        case '132';
                        echo "its 132";
                        break;

                        case '122';
                        echo "its 122";
                        break;

                        default:
                        include "includes/blog-table-component.php";
                        break;

                     }

                     ?>
                    </ol>
                </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/admin-footer.php" ?>