<style>
   .searchContainer{
       display: flex;
        align-items: center;
        justify-content: center;
        border: 5px solid #e6e6e6;
        margin-left: 10%;
        margin-right: 10%;
        margin-bottom: 20px;
   } 
</style>
<?php
include("includes/connect.php");

    global $con;

    if(isset($_GET['search_user_btn'])) {
        $search_query = htmlentities($_GET['search_user']);
        $get_user = "select * from users where f_name like '%$search_query%' OR
        l_name like '%$search_query%' OR user_name like '%$search_query%' ";
    } else {
        $get_user = "select * from users";
    }

    $run_user = mysqli_query($con, $get_user);

    while ($row_user=mysqli_fetch_array($run_user)) {

        $user_id = $row_user['user_id'];
        $f_name = $row_user['f_name'];
        $l_name = $row_user['l_name'];
        $username = $row_user['user_name'];
        $user_image = $row_user['user_image'];

        echo "
        <div class='searchContainer' id='find_people'>        
                    <div class='user_image1'>
                        <a href='user_profile.php?u_id=$user_id'>
                        <img src='users/$user_image' width='150px' height='140px' title='$username' stlye='float: left; margin:1px;' />
                        </a>
                    </div>
                    <br><br>
                    <div class='search_name'>
                        <a style='text-decoration:none; cursor:pointer; color: #3897f0;
                        'href='user_profile.php?u_id=$user_id'><strong><h2>
                        $f_name $l_name</h2></strong>
                        </a>
                    </div>
            
        </div>
        
        ";
    }

?>