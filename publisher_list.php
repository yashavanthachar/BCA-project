<?php
	session_start();
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "SELECT * FROM publisher ORDER BY publisherid";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty publisher ! Something wrong! check again";
		exit;
	}

	
?>
<body class="back">
         <nav id="navbar">
             
             <ul>
                    <li class="item"><a href="index.php">simple online bookstore</a></li>
                    <li class="item"><a href="publisher_list.php">publishers</a></li>
                    <li class="item"><a href="books.php">books</a></li>
                    <li class="item"><a href="ufeedback.php">feedback</a></li>
                    <li class="item"><a href="cart.php">my cart</a></li>
            </ul>
                     <br>
                     <br>
                     <br>
                     
                     
        </nav>
            
     
	<div class="h5 fw-bolder text-center">List of Publisher</div>
	<!-- <hr> -->
	<div class="list-group">
		<a class="list-group-item list-group-item-action" href="books.php">
			<h3>List of All Books</h3>
		</a>
	<?php 
		while($row = mysqli_fetch_assoc($result)){
			$count = 0; 
			$query = "SELECT publisherid FROM books";
			$result2 = mysqli_query($conn, $query);
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($pubInBook = mysqli_fetch_assoc($result2)){
				if($pubInBook['publisherid'] == $row['publisherid']){
					$count++;
				}
			}
	?>
		<a class="list-group-item list-group-item-action" href="bookPerPub.php?pubid=<?php echo $row['publisherid']; ?>">
			<span class="badge badge-primary bg-primary rounded-pill"><?php echo $count; ?></span>
			<?php echo $row['publisher_name']; ?>
		</a>
	<?php } ?>
	</div>
<?php
	mysqli_close($conn);
?>
<html>
	<head>
        
    <h3><a class="back-button" href="index.php">back</h3>
        </body>
		<style>


#navbar{
    display: flex;
    align-items: center;
    background-color:black;
    position: sticky;
    top: 0px;
}
.back-button {
    /* display: inline-block; */
    /* padding: 10px 10px; */
    background-color: #f1f1f1;
    color: #333;
    text-decoration: none;
    /* border-radius: 4px; */
    font-weight: bold;
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
    border-radius: 20px;
    text-decoration: none;
}

#navbar ul li a:hover{
    color: black;
    background-color: white;
}
				.fw-bolder {
    font-weight: bolder !important
}
.h5,
h5 {
    font-size: 2.25rem
}
.text-center {
    text-align: center !important
}
.list-group {
    display: flex;
    flex-direction: column;
    padding-left: 0;
    margin-bottom: 0;
    border-radius: .25rem
    border: 1px solid rgba(0, 20, 0, .125);
}
.list-group-item-action {
    width: 100%;
    color: #495057;
    text-align: inherit
}
.list-group-item {
    position: relative;
    display: flex;
    align-items:center;
    justify-content:center;

    padding: 1rem 1rem;
    color: white;
    text-decoration: none;
    background: transparent;
    border: solid white 1px ;
    
}
.bg-primary {
    --bs-bg-opacity: 1;
    background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) !important
}
.rounded-pill {

   
    border-radius: 200rem !important;

    height:13px !important;
    width:13px !important;
    display: flex;
    align-items:center;
    justify-content:center;
    margin-right:3px;
    padding:2px;
    background-color:blue !important;
    color:White;
    font-weight:300;

    

}
.back{
    background-color:pink;
}


			</style>
			</head>
			      
        
        
 
     </body>
     
		</html>