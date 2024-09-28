 <?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT book_isbn, book_image, book_title FROM books";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

?>
  <body>
        
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
             <h3 ><a href="index.html" class="text-white text-decoration-none">BACK</a></h3>
 <center><h1 class="white"> List of All Books</h1></center>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      
      <div class="row">
        <?php while($book = mysqli_fetch_assoc($result)){ ?>
          
          <div class="col-lg-3 col-md-4 col-sm-6  py-2 mb-2">
            
      		<a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>" class="card rounded-0 shadow  text-reset text-decoration-none">
            <div class="img-holder overflow-hidden">
              <img class="pimg" src="./picture/img/<?php echo $book['book_image']; ?>">
            </div>
            <div class="card-body">
              <div class="text-deco card-title fw-bolder h5 "><?= $book['book_title'] ?></div>
            </div>
            
          </a>
      	</div>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }

?>
</body>
<html>
  <head>

<style>
                	body{
                            background:url("HD-wallpaper-books-library-shelves-lighting.jpg");
                    }
                #navbar{
    display: flex;
    align-items: center;
    background-color:black;
    position: sticky;
    top: 0px;
    z-index: 2;
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
    opacity: 0.10;
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
.img-holder{
    z-index: -1;
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
.white{
    color:white;
}
.text-decoration-none {
    text-decoration: none !important
}
.text-white{
    color:white;
}
.rounded-0 {
    border-radius: 0 !important
}
.col-lg-3 {
        flex: 0 0 auto;
        width: 25%
        height:100%;
       
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

.col-md-4 {
        flex: 0 0 auto;
        width: 33.33333333%
        
    }
    .col-sm-6 {
        flex: 0 0 auto;
        width: 25%
        
    }
    .py-2 {
    padding-top: .5rem !important;
    padding-bottom: .5rem !important
}
.mb-2 {
    margin-bottom: .25rem !important
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color:transparent;
    background-clip: border-box;
    
    /* border: 1px solid rgba(0, 0, 10, .125);
    border-radius: .25rem */
    

}
.text-deco{
    color: aliceblue;
    text-decoration: none;
}
.rounded-0 {
    border-radius: 0 !important
}
/* .shadow {
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important
} */
.text-reset {
    --bs-text-opacity: 1;
    color: inherit !important
}
.text-decoration-none {
    text-decoration: bold !important
    
    
}
.overflow-hidden {
    overflow: hidden !important
}
.card-body {
    flex: 1 1 auto;
    padding: 1rem 1rem
    height: 100px;
    width   :200px;
    margin-left: 10px;
    
}
.card-title {
    /* margin-bottom: .2rem */
    padding-left :15px;
    width: 200px;
    height: 70px;
    margin-bottom: 1rem
    /* text-align:center; */
    
    

}
.fw-bolder {
    font-weight: bolder !important
}
.h5,
h5 {
    font-size: 1.25rem
}
.lead {
    font-size: 1.25rem;
    font-weight: 300
}
.text-center {
    text-align: center !important
}
.text-muted {
    --bs-text-opacity: 1;
    color: #6c757d !important
}

.pimg{
    height: 300px;
    width:200px;
    
}


                  
input[type="pimg"]:hover{
    border-color: white;
    transition:.5s ;



}
.pimg:hover{
  transform:scale(1.2);
}
            </style>
    </head>
  
        <div class="x">
    <div class="cc">

       </div>
<!-- <img src="2.jpg"></img> -->
</div>
    </body>
</html>	

