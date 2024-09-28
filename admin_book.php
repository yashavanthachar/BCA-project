<?php
	session_start();
	// require_once "./functions/admin1.php";
	$title = "List book";
	
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>
<!-- <div class="back"> -->

	
	
	
	<?php if(isset($_SESSION['book_success'])): ?>
		<div class="alert alert-success rounded-0">
			<?= $_SESSION['book_success'] ?>
		</div>
	<?php 
		unset($_SESSION['book_success']);
		endif;
	?>
    <body >
        
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
					</body>
	
	<h2 class="fw-bolder text-center">Book List</h2>
	<div class="card rounded-0">
		<div class="card-body back">
			<div class="container-fluid">
				<table class="table table-striped table-bordered" border="1" >
				<colgroup>
					<col width="10%">
					<col width="15%">
					<col width="15%">
					<col width="10%">
					<col width="15%">
					<col width="10%">
					<col width="15%">
					<col width="5%">
                   
				</colgroup>
					<thead>
					<tr class="headingcol">
						<th class="px-2 py-1 align-middle">ISBN</th>
						<th class="px-2 py-1 align-middle">Title</th>
						<th class="px-2 py-1 align-middle">Author</th>
						<th class="px-2 py-1 align-middle">Image</th>
						<th class="px-2 py-1 align-middle">Description</th>
						<th class="px-2 py-1 align-middle">Price</th>
						<th class="px-2 py-1 align-middle">Publisher</th>
						<th class="px-2 py-1 align-middle">Action</th>
                        <!-- <th>number</th> -->
                       
					</tr>
					</thead>
					<tbody>
					<?php while($row = mysqli_fetch_assoc($result)){ ?>
					<tr class="belowdata">
						<td class="underline px-2 py-1 align-middle"><?php echo $row['book_isbn'];?></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['book_title']; ?></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['book_author']; ?></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['book_image']; ?></td>
						<td class="px-2 py-1 align-middle"><p class="text-truncate" style="width:15em"><?php echo $row['book_descr']; ?></p></td>
						<td class="px-2 py-1 align-middle"><?php echo $row['book_price']; ?></td>
						<td class="px-2 py-1 align-middle"><?php echo getPubName($conn, $row['publisherid']); ?></td>
						<td class="px-2 py-1 align-middle text-center">
                        
							<div class="btn-group btn-group-sm">
                                
								<a href="admin_edit.php?bookisbn=<?php echo $row['book_isbn']; ?>" class="btn btn-sm rounded-0 btn-primary" title="Edit"><i class="fa fa-edit"></i>
                                <svg class="svg-inline--fa fa-pen-to-square" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-to-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"></path></svg>
                            </a>
                    
							<center><a href="admin_delete.php?bookisbn=<?php echo $row['book_isbn']; ?>" class="btn btn-sm rounded-0 btn-danger" title="Delete" onclick="if(confirm('Are you sure to delete this book?') === false) event.preventDefault()"><i class="fa fa-trash"></i>
                            <svg class="svg-inline--fa fa-trash" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"></path></svg>
                        </a></center>
                                
                            </div>
                        
						
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
                    </div>
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
    border-radius: 20px;
    text-decoration: none;
}

#navbar ul li a:hover{
    color: black;
    background-color: white;
}
.h2{
	text-size:.25rem;
}
.btn-danger:hover {
    color: #fff;
    background-color: #bb2d3b;
    border-color: #b02a37
}

.btn{
    background:blue;
}

.headingcol{

border:1px solid black;

}
	.btn {
    display: inline-block;
    font-weight: 300;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    border-radius: .25rem;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
    
}
	.fw-bolder {
    font-weight: bolder !important
}
/* .btn-check:active+.btn-primary:focus,
.btn-check:checked+.btn-primary:focus,
.btn-primary.active:focus,
.btn-primary:active:focus,
.show>.btn-primary.dropdown-toggle:focus {
    box-shadow: 0 0 0 .25rem rgba(49, 132, 253, .5)
} */
.btn-primary {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd
   
   
} 
.btn-danger{
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
   
} 
.align-middle {
    vertical-align: middle !important
}
.text-center {
    text-align: center !important
}
.bg-warning {
    --bs-bg-opacity: 1;
    background-color: rgba(var(--bs-warning-rgb), var(--bs-bg-opacity)) !important
}
.btn-group-sm>.btn,
.btn-sm {
    padding: .25rem .5rem;
    font-size: .875rem;
    border-radius: .2rem
}
.btn-check {
    position: absolute;
    clip: rect(0, 0, 0, 0);
    pointer-events: none
}
.btn-group-sm>.btn+.dropdown-toggle-split,
.btn-sm+.dropdown-toggle-split {
    padding-right: .375rem;
    padding-left: .375rem
}
.alert {
    position: relative;
    padding: 1rem 1rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem
}
.alert-success {
    color: #0f5132;
    background-color: #d1e7dd;
    border-color: #badbcc
}
.text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap
}
.py-1 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important
}
.alert-success .alert-link {
    color: #0c4128
}
.rounded-0 {
    border-radius: 0 !important
}

.px-2 {
    padding-right: 0.25rem !important;
    padding-left: 0.25rem !important
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
    flex: 1 1 auto;
    padding: 1rem 1rem
}
.container,
.container-fluid,
.container-lg,
.container-md,
.container-sm,
.container-xl,
.container-xxl {
    width: 100%;
    padding-right: var(--bs-gutter-x, .75rem);
    padding-left: var(--bs-gutter-x, .75rem);
    margin-right: auto;
    margin-left: auto
}
table {
    caption-side: bottom;
    border-collapse: collapse
}
.table-striped>tbody>tr:nth-of-type(odd) {
    --bs-table-accent-bg: var(--bs-table-striped-bg);
    color: var(--bs-table-striped-color)
}
 
.table-bordered>:not(caption)>* {
    border-width: 2px 0
}

.table-bordered>:not(caption)>*>* {
    border-width: 1 2px
}
.align-middle {
    vertical-align: middle !important
}
.btn-group,
.btn-group-vertical {
    position: relative;
    display: inline-flex;
    vertical-align: middle
}

.btn-group-vertical>.btn,
.btn-group>.btn {
    position: relative;
    flex: 1 1 auto
}

.btn-group-vertical>.btn-check:checked+.btn,
.btn-group-vertical>.btn-check:focus+.btn,
.btn-group-vertical>.btn.active,
.btn-group-vertical>.btn:active,
.btn-group-vertical>.btn:focus,
.btn-group-vertical>.btn:hover,
.btn-group>.btn-check:checked+.btn,
.btn-group>.btn-check:focus+.btn,
.btn-group>.btn.active,
.btn-group>.btn:active,
.btn-group>.btn:focus,
.btn-group>.btn:hover {
    z-index: 1
}

.btn-toolbar {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start
}

.btn-toolbar .input-group {
    width: auto
}

.btn-group>.btn-group:not(:first-child),
.btn-group>.btn:not(:first-child) {
    margin-left: -1px
}

.btn-group>.btn-group:not(:last-child)>.btn,
.btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0
}

.btn-group>.btn-group:not(:first-child)>.btn,
.btn-group>.btn:nth-child(n+3),
.btn-group>:not(.btn-check)+.btn {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0
}
.belowdata{
	border:1px solid black;
}
.btn-primary,
.btn-danger{
width:20px;
height: 20px;
}
/* .back{
    background:url("1.png");
} */

</style>
