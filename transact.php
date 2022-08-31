<?php

require_once'conn.php';

require_once'http.php';

	if (isset($_REQUEST['action'])) {

		switch ($_REQUEST['action']) {

			
			case 'login':

			if (isset($_POST['name'])

			and isset($_POST['pass']))

			{

			$sql = "SELECT name, password " .

			"FROM user " .

			"WHERE name='" . $_POST['name'] . "' " .

			"AND password='" . $_POST['pass'] . "'";

			$result = $conn->query($sql);

			if ($result->num_rows >0) {

				$row = $result->fetch_assoc();

				session_start();

				$_SESSION['name'] = $row['name'];

				$conn->close();

				redirect('adminhome.php');

				break;

				}

			}

			redirect('index.php');

			break;			
				
			case 'deleteBlog':

			if (isset($_GET['id']) &&  is_numeric($_GET['id']) &&isset($_GET['action']))

				{
					$sql="Select * from blog where id =".$_GET['id'];
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					$id=$row['id'];
					$ext=$row['ext'];
					unlink("C:/wamp64/www/CRUD/assets/blog/".$id.$ext);
					$sql = "Delete FROM blog where id=".$_GET['id'];

					$result = $conn->query($sql);

					$conn->close();
					
					 

				}

				redirect('adminviewblog.php');

				break;

			case 'deletePicture':

				if (isset($_GET['id']) &&  is_numeric($_GET['id']) &&isset($_GET['action']))

					{
						$sql="Select * from picture where id =".$_GET['id'];
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
						$id=$row['id'];
						$ext=$row['ext'];
						unlink("C:/wamp64/www/CRUD/assets/picture/".$id.$ext);
						$sql = "Delete FROM picture where id=".$_GET['id'];

						$result = $conn->query($sql);

						$conn->close();
						
							

					}

					redirect('adminviewpicture.php');

					break;
				
			case 'deletePublication':

				if (isset($_GET['id']) &&  is_numeric($_GET['id']) &&isset($_GET['action']))

					{
						$id=$_GET['id'];
						$ext='.pdf';
						unlink("C:/wamp64/www/CRUD/assets/publication/".$id.$ext);
						$sql = "Delete FROM publication where id=".$_GET['id'];

						$result = $conn->query($sql);

						$conn->close();
						
							

					}

					redirect('adminviewPublication.php');

					break;
				
						
				
				
			case 'deleteVideo':

			if (isset($_GET['id']) &&  is_numeric($_GET['id']) &&isset($_GET['action']))

				{

					$sql = "Delete FROM video where id=".$_GET['id'];

					$result = $conn->query($sql);

					$conn->close();
					$id=$_GET['id'];
					$ext =".MP4";
					unlink("C:/wamp64/www/CRUD/assets/video/".$id.$ext);
				}

				redirect('adminviewvideo.php');

				break;
				
			case 'Update Publication':

			if (isset($_POST['id']) &&  is_numeric($_POST['id']) &&isset($_POST['action']))

				{

                    $title =htmlspecialchars($_POST['title'], ENT_QUOTES);
			        $author =htmlspecialchars($_POST['author'], ENT_QUOTES);
                    $abstract =htmlspecialchars($_POST['abstract'], ENT_QUOTES);
                    $date=$_POST['date'];
			        $id=$_POST['id'];

					$sql = "Update publication set title='$title', author ='$author', abstract='$abstract', date ='$date' where id =$id";
					$result = $conn->query($sql);

					$conn->close();

				}

				redirect('adminviewpublication.php');

				break;	
				
				case 'Update Blog':

					if (isset($_POST['id']) &&  is_numeric($_POST['id']) &&isset($_POST['action']))
		
						{
		
							$title =htmlspecialchars($_POST['title'], ENT_QUOTES);
							$content =htmlspecialchars($_POST['content'], ENT_QUOTES);
							$id=$_POST['id'];
		
							$sql = "Update blog set title='$title', content ='$content' where id =$id";
							$result = $conn->query($sql);
		
							$conn->close();
		
						}
		
						redirect('adminviewblog.php');
		
						break;	
				
			case 'Update Picture':

				if (isset($_POST['id']) &&  is_numeric($_POST['id']) &&isset($_POST['action']))
	
					{
	
						$title =htmlspecialchars($_POST['title'], ENT_QUOTES);
						$discription =htmlspecialchars($_POST['discription'], ENT_QUOTES);
						$id=$_POST['id'];
	
						$sql = "Update picture set title='$title', discription ='$discription' where id =$id";
						$result = $conn->query($sql);
	
						$conn->close();
	
					}
	
					redirect('adminviewpicture.php');
	
					break;	

			case 'Update Video':

				if (isset($_POST['id']) &&  is_numeric($_POST['id']) &&isset($_POST['action']))
	
					{
	
						$title =htmlspecialchars($_POST['title'], ENT_QUOTES);
						$id=$_POST['id'];
	
						$sql = "Update video set title='$title' where id =$id";
						$result = $conn->query($sql);
	
						$conn->close();
	
					}
	
					redirect('adminViewVideo.php');
	
					break;	
						

                
			case 'Add Publication':	
                $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
                $author = htmlspecialchars($_POST['author'], ENT_QUOTES);
                $abstract = htmlspecialchars($_POST['abstract'], ENT_QUOTES);
                $vId = $_POST['vId'];
                $image_tempname = $_FILES['image_filename']['name'];
                $date=  htmlspecialchars($_POST['date'], ENT_QUOTES);;
                //upload image and check for image type
                //make sure to change your path to match your images directory
                $ImageDir ="C:/wamp64/www/CRUD/assets/publication/";
                $ImageName = $ImageDir . $image_tempname;
                if (move_uploaded_file($_FILES['image_filename']['tmp_name'], $ImageName)) 
                    {
                    $ext=".pdf";
                    
                    //insert info into image table
                    $sql = "INSERT INTO publication
                    (title, author,abstract, date)
                    VALUES
                    ('$title', '$author', '$abstract', CURRENT_TIMESTAMP())";
    
                    if ($conn->query($sql) === TRUE) {
                      //  echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
    
    
                    $lastpicid = $conn->insert_id;
                    $conn->close();
                    
                    $newfilename = $ImageDir . $lastpicid . $ext;
                    rename($ImageName, $newfilename); 
                    
                    }
                
                redirect('adminViewPublication.php');
			break;
			
			
			case 'Add Blog':
			$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
			$content = htmlspecialchars($_POST['content'], ENT_QUOTES);
			$image_tempname = $_FILES['image_filename']['name'];
			$today = date("Y-m-d");
			//upload image and check for image type
			//make sure to change your path to match your images directory
			$ImageDir ="C:/wamp64/www/CRUD/assets/blog/";
			$ImageName = $ImageDir . $image_tempname;
			if (move_uploaded_file($_FILES['image_filename']['tmp_name'], $ImageName)) 
				{
				//get info about the image being uploaded
				list($width, $height, $type, $attr) = getimagesize($ImageName);
						switch ($type) {
							case 1:
							$ext = ".gif";
							break;
							case 2:
							$ext = ".jpg";
							break;
							case 3:
							$ext = ".png";
							break;
							default:
							echo "Sorry, but the file you uploaded was not a GIF, JPG, or " .
							"PNG file.<br>";
							echo "Please hit your browser's 'back' button and try again.";
						}
				//insert info into image table
				$sql = "INSERT INTO blog
				(title, content, date, ext)
				VALUES
				('$title', '$content', '$today','$ext')";

				if ($conn->query($sql) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}


				$lastpicid = $conn->insert_id;
				$conn->close();
				$newfilename = $ImageDir . $lastpicid . $ext;
				rename($ImageName, $newfilename);
				}
			redirect('adminViewBlog.php');
			break;
			
			case 'Add Picture':
			$title = $_POST['title'];
			$discription = htmlspecialchars($_POST['discription'], ENT_QUOTES);
			$image_tempname = $_FILES['image_filename']['name'];
			//$today = date("Y-m-d");
			//upload image and check for image type
			//make sure to change your path to match your images directory
			$ImageDir ="C:/wamp64/www/CRUD/assets/picture/";
			$ImageName = $ImageDir . $image_tempname;
			if (move_uploaded_file($_FILES['image_filename']['tmp_name'], $ImageName)) 
				{
				//get info about the image being uploaded
				list($width, $height, $type, $attr) = getimagesize($ImageName);
						switch ($type) {
							case 1:
							$ext = ".gif";
							break;
							case 2:
							$ext = ".jpg";
							break;
							case 3:
							$ext = ".png";
							break;
							default:
							echo "Sorry, but the file you uploaded was not a GIF, JPG, or " .
							"PNG file.<br>";
							echo "Please hit your browser's 'back' button and try again.";
						}
				//insert info into image table
				$sql = "INSERT INTO picture
				(title, discription, ext)
				VALUES
				('$title', '$discription','$ext')";

				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}


				$lastpicid = $conn->insert_id;
				$conn->close();
				$newfilename = $ImageDir . $lastpicid . $ext;
				rename($ImageName, $newfilename);
				}
			redirect('adminViewPicture.php');
			break;
			
			case 'Add Video':
			//$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
			//$content = htmlspecialchars($_POST['content'], ENT_QUOTES);
			$image_tempname = $_FILES['image_filename']['name'];
			//$today = date("Y-m-d");
			//upload image and check for image type
			//make sure to change your path to match your images directory
			$ImageDir ="C:/wamp64/www/CRUD/assets/video/";
			$ImageName = $ImageDir . $image_tempname;
			$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
			if (move_uploaded_file($_FILES['image_filename']['tmp_name'], $ImageName)) 
				{
				$ext=".mp4";
				//insert info into image table
				$sql = "INSERT INTO video
				(title, ext)
				VALUES
				('$title', '$ext')";

				if ($conn->query($sql) === TRUE) {
					//echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}


				$lastpicid = $conn->insert_id;
				$conn->close();
				
				
				$newfilename = $ImageDir . $lastpicid . $ext;
				rename($ImageName, $newfilename); 
				
				}
			
			redirect('adminViewVideo.php');
			break;

			case 'Logout':

			session_start();

			session_unset();

			session_destroy();

			redirect('index.php');

			break;

		}

	}



?>