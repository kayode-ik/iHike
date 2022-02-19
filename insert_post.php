<?php 
include("includes/connect.php");
// $con = mysqli_connect("localhost","root","","i_hike") or die("Connection was not established");


    if(isset($_POST['submit'])){

        // echo "hereeeeee";
		global $con;
		global $user_id;

		$content = htmlentities(mysqli_real_escape_string($con,$_POST['content']));
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100);

        // echo "$content , contenttt";
        // echo "$upload_image , upload imagesss";

		if(strlen($content) > 250){
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				// move_uploaded_file($image_tmp, "assets/imagepost/$upload_image");
				// move_uploaded_file($image_tmp, "../assets/imagepost/$upload_image");
				move_uploaded_file($image_tmp, "assets/imagepost/$upload_image");
				$insert = "insert into posts (user_id, post_content, upload_image, post_date) values('$user_id', '$content', '$upload_image', NOW())";
				// $insert = "insert into posts (user_id, post_content, upload_image, post_date) values('$user_id', '$content', '$upload_image', NOW())";
				

				$query = mysqli_query($con, $insert);

				if($query){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";

					$update = "update users set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}

				exit();

			}else{
				if($upload_image=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($image_tmp, "assets/imagepost/$upload_image");
						$insert = "insert into posts (user_id,post_content,upload_image,post_date) values ('$user_id','No','$upload_image',NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}

						exit();
					}else{
						// echo"$content, got hereee";
						$insert = "insert into posts (user_id, post_content,upload_image,post_date) values('$user_id', '$content', 'No', NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}
					}
				}
			}
		}
	}
