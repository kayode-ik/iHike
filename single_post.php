<?php
include("includes/connect.php");

if(isset($_GET['post_id'])) {
    global $con;

    $get_id = $_GET['post_id'];

    $get_posts = "select * from posts where post_id='$get_id'";

    $run_posts = mysqli_query($con, $get_posts);

    $row_posts = mysqli_fetch_array($run_posts);

    $post_id = $row_posts['post_id'];
    $user_id = $row_posts['user_id'];
    $content = $row_posts['post_content'];
    $upload_image = $row_posts['upload_image'];
    $post_date = $row_posts['post_date'];


    $user = "select * from users where user_id='$user_id' AND posts='yes'";

    $run_user = mysqli_query($con, $user);
    $row_user = mysqli_fetch_array($run_user);

    $user_name = $row_user['user_name'];
    $user_image = $row_user['user_image'];

    $user_com = $_SESSION['user_email'];

    $get_com = "select * from users where user_email='$user_com'";

    $run_com = mysqli_query($con, $get_com);
    $row_com = mysqli_fetch_array($run_com);

    $user_com_id = $row_com['user_id'];
    $user_com_name = $row_com['user_name'];

    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
    }

    $get_posts = "select post_id from users where post_id='$post_id'";
    $run_user = mysqli_query($con, $get_posts);

    $post_id = $_GET['post_id'];

    $post = $_GET['post_id'];
    $get_user = "select * from posts where post_id='$post'";
    $run_user = mysqli_query($con, $get_user);
    $row = mysqli_fetch_array($run_user);

    $p_id = $row['post_id'];

    if($p_id != $post_id){
        echo "<script>alert('ERROR')</script>";
        echo "<script>window.open('home.php', '_self')</script>";

    }else {

        if ($content == "No" && strlen($upload_image) >= 1) {
            echo "
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-2'>
                            <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <img id='posts-img' src='assets/imagepost/$upload_image' style='height:350px;'>
                            </div>
                        </div><br>
                        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
                ";
        } 
        else if (strlen($content) >= 1 && $upload_image == "No") {
            echo "
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-2'>
                            <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h3><p>$content</p></h3>
                            </div>
                        </div><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
                ";
        } 
        else if (strlen($content) >= 1 && strlen($upload_image) >= 1) {
            echo "
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-2'>
                            <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                            <h3><p>$content</p></h3>
                                <img id='posts-img' src='assets/imagepost/$upload_image' style='height:350px;'>
                            </div>
                        </div><br>
                        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
                ";
        } 
        else {
            echo "
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-2'>
                            <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h3><p>$content</p></h3>
                            </div>
                        </div><br>
                        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
                ";
        } //else condition ending

        include("comments.php");

        echo "
            <div class='row'>
                <div class='col-md-6 col-md-offset-3'>
                    <div class='panel panel-info'>
                        <div class='panel-body'>
                            <form action='' method='post' class='form-inline'>
                                <textarea placeholder='Write your comment here!'
                                    class='pb-cmnt-textarea' name='comment'>
                                </textarea>
                                <button class='btn btn-info pull-right' name='reply'> Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        ";

        if(isset($_POST['reply'])){
            $comment = htmlentities($_POST['comment']);

            if($comment == " ") {
                echo "<script>alert('Enter your comment!')</script>";
                echo "<script>window.open('single.php?post_id=$post_id', '_self')</script>";

            }else {
                $insert = "insert into comments (post_id, user_id,comment,comment_author,date)
                values('$post_id', '$user_id', '$comment','$user_com_name', NOW())";

                $run = mysqli_query($con, $insert);

                echo "<script>alert('Your Comment Added!')</script>";
                echo "<script>window.open('single.php?post_id=$post_id', '_self')</script>";

            }
        }

    }

}


?>