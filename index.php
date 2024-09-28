
      
<html>
        <head>
            <body class="back">
          <style>
       /*      .x{
                    padding: 300px ; 
                     background-image: url("j.jpg");
                     background-size: cover;
                }
                .topnav{
                    /* margin:10px;
                    padding:50px;
                    background-color: rgb(24, 77, 117); */
                    /* background-color:rgb(0, 12, 12);
                    overflow: hidden;
                    
                }
                 .c{ 
                    margin:0px;
                    padding: 21px;
                    background-color: rgb(175, 199, 220);
                    color: white;
                    
                }
                .topnav a{
                    float:left;
                    color:#e7e8ee;
                    text-align: center;
                    padding: 21px;
                    text-decoration: none;
                    font-size: 17px;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                    

                }
                .topnav a:hover{
                    
                    background-color: rgb(237, 237, 239);
                    color: rgb(36, 17, 17);
                }
                .topnav a:active{
                    
                    background-color: rgb(6, 126, 44);
                    color: white;
                }  */
                #navbar{
    display: flex;
    align-items: center;
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
    border-radius: 20px;
    text-decoration: none;
}

#navbar ul li a:hover{
    color: black;
    background-color: white;
}
</style>
</head>
<!--         
        <div class="topnav"> -->
         <!-- <nav> -->
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
        
 
    


<?php
  session_start();
  $count = 0;
  
 
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4LatestBook($conn);
?>
    <!-- <h3 ><a href="index.html" class="text-white text-decoration-none">BACK</a></h3> -->
   
     <center><h1 class="text-white"> Latest books</h1></center>

      
      <div class="row">
        <?php foreach($row as $book) { ?>
      	<div class="col-lg-3 col-md-4 col-sm-6  py-2 mb-2">
      		<a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>" class="card rounded-0 shadow text-reset text-decoration-none">
             <div class="img-holder overflow-hidden">
              <img class="pimg" src="./picture/img/<?php echo $book['book_image']; ?>">
             </div> 
            <div class="card-body">
              <div class="text-white card-title fw-bolder h5 text-center"><?= $book['book_title'] ?></div>
            </div>
          </a>
      	</div>
        <?php } ?>
      </div>


      <!DOCTYPE html>
<html>
<head>
    <title>Back Button Example</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <a class="back-button" href="index.html">Back</a>
</body>
</html>
<style>
.back-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #f1f1f1;
    color: #333;
    text-decoration: none;
    border-radius: 4px;
    font-weight: bold;
}

.back-button:hover {
    background-color: #ddd;
}
</style>



<html>

<style>
      .tex-dec{
        text-decoration: none;
        /* color: aliceblue; */
        color:rgb(215, 230, 5);
       
    }
    .clogo{
        
    }
    .pimg:hover{
       transform:scale(1.2);
        
    }
   
.col-lg-3 {
        flex: 0 0 auto;
        width: 20%
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
        width: 40%
        padding-right: 5px;
    }
    .col-sm-6 {
        flex: 0 0 auto;
        width: 20%
        padding-right: 5px;
    }
    .py-2 {
    padding-top: .5rem !important;
    padding-bottom: .5rem !important;
    padding-right:4px;
}
.mb-2 {
    margin-bottom: .5rem !important
    padding-right:4px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: transparent;
    /* background-clip: border-box; */
    /* border: 1px solid rgba(0, 0, 0, .125); */
    /* border-radius: .25rem */
}
.rounded-0 {
    border-radius: 0 !important
}
.text-white{
    color:white;
}
/* .shadow {
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important
} */
.text-reset {
    --bs-text-opacity: 1;
    color: inherit !important
}
.text-decoration-none {
    text-decoration: none !important
}
.overflow-hidden {
    overflow: hidden !important
}
.card-body {
    height:100px;
    width: 250px;
    flex: 1 1 auto;
    padding: 1rem 1rem
}
.card-title {
    padding-left :35px;
    margin-bottom: .95rem

}
.fw-bolder {
    font-weight: bolder !important
}
.h5,
h5 {
    font-size: 1.5rem
}
.pimg{
    height: 300px;
    width:200px;
    padding-left: 50px;
    display:flex;
}


.back{
    /* background:url("back.jpg"); */
    background:linear-gradient(grey,black);
    /* background:url("WhatsApp Image 2023-04-30 at 9.22.10 AM.jpeg"); */
}
.btn{
  display:inline-block;
  font-weight:400;
  line-height:1.5;
  text-align:center;
  vertical-align:middle;
  user-select:none;
  border:1px solid white transparent;
  padding:.375rem.75rem;
  font-size:1rem;
}               
            </style>
        </body>
        </html>

