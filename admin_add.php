

<?php
	session_start();
	// require_once "./functions/admin1.php";
	$title = "Add new book";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$isbn = trim($_POST['isbn']);
		$isbn = mysqli_real_escape_string($conn, $isbn);
		
		$title = trim($_POST['title']);
		$title = mysqli_real_escape_string($conn, $title);

		$author = trim($_POST['author']);
		$author = mysqli_real_escape_string($conn, $author);
		
		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($conn, $descr);
		
		$price = floatval(trim($_POST['price']));
		$price = mysqli_real_escape_string($conn, $price);
		
		$publisher = trim($_POST['publisher']);
		$publisherid = mysqli_real_escape_string($conn, $publisher);

		// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "picture/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}
$qry="SELECT * FROM books WHERE book_isbn = '$isbn'";
$rs=mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($rs);
$bisbn=$row['book_isbn'];
if($isbn==$bisbn)
{

		echo '<script>alert("book alreay exists");window.location="admin_add.php";</script>';
}
else
{


		$query = "INSERT INTO books (`book_isbn`, `book_title`, `book_author`, `book_image`, `book_descr`, `book_price`, `publisherid`) VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $image . "', '" . $descr . "', '" . $price . "', '" . $publisherid . "')";
	
        $result = mysqli_query($conn, $query);
		if($result){
			$_SESSION['book_success'] = "New Book has been added successfully";
			header("Location: admin_book.php");
		} else {
			$err =  "Can't add new data " . mysqli_error($conn);

		}
	}}
?>
       
		 
	
	
	
	
						<?php if(isset($err)): ?>
							<div class="alert alert-danger rounded-0">
								<?= $_SESSION['err_login'] ?>
							</div>
						<?php 
							endif;
						?>
			
	<html>
		<head>
	<style>

		
		#navbar{
    display: flex;
    align-items: center;
    background-color:black;
    position: sticky;
    top: 0px;
}

#navbar::before{
    content: "";
    background-color: black;
    position: absolute;
    top:0px;
    left:0px;
    height: 100%;
    width:100%;
    z-index: -1;
    opacity: 0.7;
}
#navbar ul{
    display: flex;
    font-family: 'Baloo Bhai', cursive;
}

#navbar ul li{ 
    list-style: none;
    font-size: 1.3rem;
}

#navbar ul li a{
    color: white;
    display: block;
    padding: 3px 22px;
    border-radius: 30px;
    text-decoration: none;
}

#navbar ul li a:hover{
    color: black;
    background-color: white;
}
.fw-bolder {
    font-weight: bolder !important
}
.text-center {
    text-align: center !important
}
.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(var(--bs-gutter-y) * -1);
    margin-right: calc(var(--bs-gutter-x) * -.5);
    margin-left: calc(var(--bs-gutter-x) * -.5)
}
	
.justify-content-center {
    justify-content: center !important
}
.col-lg-6 {
        flex: 0 0 auto;
        width: 50%
    }
	.col-md-8 {
        flex: 0 0 auto;
        width: 66.66666667%
    }
	.col-sm-10 {
        flex: 0 0 auto;
        width: 83.33333333%
    }
	.rounded-0 {
    border-radius: 0 !important
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem
}
.card-body {
    flex: .75 .75 auto;
    padding: .75rem .75rem
	width: 50%;
    height:40%;

}
.container-fluid
 {
    width: 50%;
    height:40%;
    padding-right: var(--bs-gutter-x, .50rem);
    padding-left: var(--bs-gutter-x, .50rem);
    margin-right: auto;
    margin-left: auto
}
.alert {
    position: relative;
    padding: 1rem 1rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem
}
.alert-danger {
    color: #842029;
    background-color: #f8d7da;
    border-color: #f5c2c7
}
.mb-3 {
    margin-bottom: 1rem !important
}
.form-control {
    display: block;
    width: 75%;
    padding: .275rem .50rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: .15rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
}

.form-select {
    display: block;
    width: 75%;
    padding: .375rem 2.25rem .375rem .75rem;
    -moz-padding-start: calc(0.75rem - 3px);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right .75rem center;
    background-size: 16px 12px;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none
}
@media (prefers-reduced-motion:reduce) {
    .btn {
        transition: none
    }
}
.btn-primary {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd
}
.btn-sm {
    padding: .25rem .5rem;
    font-size: .875rem;
    border-radius: .2rem
}
.border {
    border: 1px solid #dee2e6 !important
}
</style>
</head>
<body>
<nav id="navbar">
				   
				   <ul>
						  <li class="item"><a href="">simple online bookstore</a></li>
						  <li class="item"><a href="admin_book.php">book list</a></li>
						  <li class="item"><a href="admin_add.php">Add new book</a></li>
                          <li class="item"><a href="detail.php">orders</a></li>
                          <li class="item"><a href="customer.php">customer</a></li>
                          <li class="item"><a href="blank.php">feedback</a></li>
						  <li class="item"><a href="admin_signout.php">log out</a></li>
					  </ul>
						   
						   
						   
				   </nav>
				   <div class="row justify-content-center">
		<div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
			<div class="card rounded-0 shadow">
				<div class="card-body">
					<div class="container-fluid">
				   <h4 class="fw-bolder text-center">Add New Book</h4>
				   <form method="post" action="admin_add.php" enctype="multipart/form-data">
								<div class="mb-3">
									<label class="control-label">ISBN</label>
									<input class="form-control rounded-0" type="text" name="isbn">
								</div>
								<div class="mb-3">
									<label class="control-label">Title</label>
									<input class="form-control rounded-0" type="text" name="title" required>
								</div>
								<div class="mb-3">
									<label class="control-label">Author</label>
									<input class="form-control rounded-0" type="text" name="author" required>
								</div>
							
								<div class="mb-3">
									<label class="control-label">Image</label>
									<input class="form-control rounded-0" type="file" name="image">
								</div>
								<div class="mb-3">
									<label class="control-label">Description</label>
									<textarea class="form-control rounded-0" name="descr" cols="40" rows="5"></textarea>
								</div>
								<div class="mb-3">
									<label class="control-label">Price</label>
									<input class="form-control rounded-0" type="text" name="price" required>
								</div>
								<div class="mb-3">
									<label class="control-label">Publisher</label>
									<select class="form-select rounded-0"  name="publisher" required>
										<option value="" disabled selected>Please Select Here</option>
										<?php 
										$psql = mysqli_query($conn, "SELECT * FROM `publisher` order by publisher_name asc");
										while($row = mysqli_fetch_assoc($psql)):
										?>
										<option value="<?= $row['publisherid'] ?>"><?= $row['publisher_name'] ?></option>
										<?php endwhile; ?>
										
</select>
</div>
								<div class="text-center">
									<button type="submit" name="add"  class="btn btn-primary btn-sm rounded-0">Save</button>
									<button type="reset" class="btn btn-default btn-sm rounded-0 border">Cancel</button>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

									</body>
				   </html>
				   


	