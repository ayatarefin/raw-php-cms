<div class="col-md-4">
<div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                </div>
                <!-- Blog Categories Well -->
                <?php 
                
                $query = "SELECT * FROM genres";
                    $genre_list_sidebar= mysqli_query($connection, $query);
                ?>
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                                while($row=mysqli_fetch_assoc($genre_list_sidebar)){
                                    $genre_name=$row['genre_name'];
                                    $genre_id=$row['genre_id'];
                                    echo "<li>
                                    <a href='genre.php?t_genre_id=$genre_id'>$genre_name</a>
                                    </li>";
                                }?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "includes/widget.php" ?>
            </div>