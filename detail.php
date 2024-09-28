<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "List book";
	
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAllrders($conn);
    // Check if the button has already been clicked
$buttonClicked = isset($_SESSION['button_clicked']) && $_SESSION['button_clicked'];

// Process button click
if (isset($_POST['buttonName'])) {
    // Perform necessary actions on button click

    // Set session variable to indicate the button has been clicked
    $_SESSION['button_clicked'] = true;
}
?>
<div class="back">
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
	
	
	
	<?php if(isset($_SESSION['book_success'])): ?>
		<div class="alert alert-success rounded-0">
			<?= $_SESSION['book_success'] ?>
		</div>
	<?php 
		unset($_SESSION['book_success']);
		endif;
	?>

	<h2 class="fw-bolder text-center">order</h2>
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
						<th class="px-2 py-1 align-middle">order id</th>
						<th class="px-2 py-1 align-middle">customer id</th>
						<th class="px-2 py-1 align-middle">amount</th>
						<th class="px-2 py-1 align-middle">date</th>
						<th class="px-2 py-1 align-middle">e-mail </th>
						<th class="px-2 py-1 align-middle">address</th>
						<th class="px-2 py-1 align-middle">city</th>
						<th class="px-2 py-1 align-middle">Action</th>
                        <!-- <th>number</th> -->
                       
					</tr>
					</thead>
					<tbody>
					<?php while($row = mysqli_fetch_assoc($result)){ ?>
					<tr class="belowdata">


                    <td class="px-2 py-1 align-middle"><?php echo $row['orderid']; ?></td>
            <td class="px-2 py-1 align-middle"><?php echo $row['customerid']; ?></td>
            <td class="px-2 py-1 align-middle"><?php echo $row['amount']; ?></td>
						<td class="px-2 py-1 align-middle text-center"><?php echo $row['date']; ?></td>
						<td class="px-2 py-1 align-middle text-center"><?php echo $row['e-mail']; ?></td>
						<td class="px-2 py-1 align-middle text-center"><?php echo $row['ship_address']; ?></p></td>
						<td class="px-2 py-1 align-middle text-center"><?php echo $row['ship_city']; ?></td>
					
                        <?php 
                        $val=$row['status'];?>
                        <!-- <td class="px-2 py-1 align-middle text-center"> -->
                        
							<!-- <div class="btn-group btn-group-sm"> -->
                                
								<!-- <a href="confirm.php?e-mail= ?>" class="btn btn-sm rounded-0 btn-primary cust" title="confirm"><i class="fa fa-edit">confirm </i> -->
                                
                            <!-- </a> -->
                    
							<!-- <center><a href="reject.php?e-mail= ?>" class="btn btn-sm rounded-0 btn-danger cust" title="reject" onclick="if(confirm('Are you sure to cancel this book order?') === false) event.preventDefault()"><i class="fa fa-trash">cancel</i> -->
                          
                        <!-- </a></center> -->
                                
                            </div>
                            <td class="px-2 py-1 align-middle text-center">
                            <?php    if($val=='pending'){?>
    <div class="btn-group btn-group-sm">
        <a href="confirm.php?e-mail=<?php echo $row['e-mail']; ?>&orderid=<?php echo $row['orderid']; ?>" class="btn btn-sm rounded-0 btn-primary cust" title="confirm" onclick="disableButton(this)"><i class="fa fa-edit">confirm </i></a>
        <center><a href="reject.php?e-mail=<?php echo $row['e-mail']; ?>&orderid=<?php echo $row['orderid']; ?>" class="btn btn-sm rounded-0 btn-danger cust" title="reject" onclick="if(confirm('Are you sure to cancel this book order?') === false) event.preventDefault(); else disableButton(this)"><i class="fa fa-trash">cancel</i></a></center>
    </div>
                      <?php          }
                       if($val=='Confirmed')
                      {?>
                        <center><a href="reject.php?e-mail=<?php echo $row['e-mail']; ?>&orderid=<?php echo $row['orderid']; ?>" class="btn btn-sm rounded-0 btn-danger cust" title="reject" onclick="if(confirm('Are you sure to cancel this book order?') === false) event.preventDefault(); else disableButton(this)"><i class="fa fa-trash">cancel</i></a></center>
                      <?php  }?>
                     <?php  if($val=='Canceled')
                      {?>
                       <a href="confirm.php?e-mail=<?php echo $row['e-mail']; ?>&orderid=<?php echo $row['orderid']; ?>" class="btn btn-sm rounded-0 btn-primary cust" title="confirm" onclick="disableButton(this)"><i class="fa fa-edit">confirm </i></a> 
                      <?php  }?>
</td>

<script>

    
function disableButton(button) {
    button.disabled = true;
    button.removeAttribute("onclick");
}

</script>

                        
						
					</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
                    </div>
	<style>
        .btn {
    display: inline-block;
    font-weight: 400;
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
.cust{

    width:50px !important;
  
  
}
.btn-primary {
    color: #fff;
    background-color: #0d6efd;
}
.btn{
	width:200px;
}
		
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
    background:green;
}

.headingcol{

border:2px solid black;

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
    background-color: green;
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
    padding-top: 0.1rem !important;
    padding-bottom: 0.1rem !important;
    height: 30%;
    width:10%;
}
.alert-success .alert-link {
    color: #0c4128
}
.rounded-0 {
    border-radius: 0 !important
}

.px-2 {
    padding-right: 0.01rem !important;
    padding-left: 0.01rem !important;
    height: 35%;
    width:10%;
    justify-content: flex-start
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
    border-width: 2 2px
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


</style>
