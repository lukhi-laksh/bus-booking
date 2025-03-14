<?php 

	session_start();

?>
<?php include("../connection.php")?>



<!DOCTYPE html>
<html>
<head>
  <title>Update Transaction</title>
<link rel="stylesheet" href="../cssfile/signUp.css">
	<style type="text/css">

			body{

		  background-image: url("image/20.jpg");
		  background-position: center;
		  background-size: cover;
		  height: 700px;
		  background-repeat: no-repeat;
      background-attachment: fixed;

		}
		.adminTopic{
			text-align: center;
			color: #fff;
			

		}
    .form_wrap .submit_btn:hover{

      color:#fff;
      font-weight: 600;

    }
    #decription{
      width: 100%;
      border-radius: 3px;
      border: 1px solid #9597a6;
      padding: 10px;
      outline: none;
      color: black;
    }
    .idclass{

      width: 100%;
      border-radius: 3px;
      border: 1px solid #9597a6;
      padding: 10px;
      outline: none;
      color: black;

    }




	</style>
</head>
<body>
   <?php 


      

       if(isset($_POST['updateTransaction'])){

       $id=$_POST['id'];  
     
      $name=$_POST['name'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      $city=$_POST['city'];
      $amount=$_POST['amount'];

       $query="UPDATE `payment` SET amount='$amount',name='$name',email='$email',address='$address',city='$city' where id=$id";


       $query_run=mysqli_query($conn,$query);

      
  

         if($query_run){


              echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Transaction Updated!!!');
    window.location.href='PaymentManage.php';
    </script>");




          }

          else{

               echo '<script type="text/javascript">alert("Booking not updated!!!")</script>';
           }

           

     }

?>



<div class="sidebar2">




   
          

          <div class="wrapper">
  <div class="registration_form">
    <div class="title">
    Update Passenger Booking...
    </div>

    <form action="#" method="POST">
      <div class="form_wrap">


        <div class="input_wrap">
          <label for="title">Id</label>
          <input type="number" id="title" name="id" class="idclass" value="<?php echo $_GET['id'];?>">
        </div>

        <div class="input_wrap">
          <label for="title">Paid Amount</label>
          <input type="number" id="title" name="amount" placeholder="Paid Amount" class="idclass" required>
        </div>
        
        <div class="input_wrap">
          <label for="title">Paid Passenger Name</label>
          <input type="text" id="title" name="name" placeholder="Passenger Name" required>
        </div>


        <div class="input_wrap">
          <label for="title">Address</label>
          <input type="text" id="title" name="address" placeholder="Address" >
        </div>

        <div class="input_wrap">
          <label for="title">E-mail</label>
          <input type="E-mail" id="title" name="email" placeholder="E-mail" class="idclass" required>
        </div>

        <div class="input_wrap">
          <label for="title">City</label>
          <input type="text" id="title" name="city" placeholder="board place" required>
        </div>

        <div class="input_wrap">
          <input type="submit" value="Update Now" class="submit_btn" name="updateTransaction">

        </div>



      </div>
    </form>
  </div>
</div>





</div>

</body>
</html>