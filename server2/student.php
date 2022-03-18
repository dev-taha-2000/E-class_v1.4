
                
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css"> 
    <title>student</title>  
</head> 
<body> 
  <!-- :::::::::::::::::::::::::::::: -->
  <?php
                        session_start();
                        if(empty($_SESSION['Email'])){  
                                header("Location:index.php"); 
                            } 

                    ?> 

            <?php   
                 
                 $connect=mysqli_connect("localhost","root","","e_classe_db");  
                
                 if(isset($_POST['submit'])){ 
                   if(!empty($_POST['Name']) || !empty($_POST['Email']) || !empty($_POST['phone'])){
                    $Name = $_POST['Name']; 
                    $Email = $_POST['Email'];  
                    $phone = $_POST['phone']; 
                    $Enrollnumber = $_POST['Enroll_number'];
                    $Dateofadmission = $_POST['Date_of_admission'];  
                    $sql = "INSERT INTO `student`( `Name`, `Email`, `phone`, `Enroll_number`, `Date_of_admission`) VALUES  ('$Name','$Email',' $phone',' $Enrollnumber',' $Dateofadmission')"; 
                    $query=mysqli_query($connect,$sql);  
                    if($query){
                     echo "<script>Swal.fire({
                       position: 'top-end',
                       icon: 'success',
                       title: 'Your student is add', 
                       showConfirmButton: false,
                       timer: 2000
                     })</script>";
                    }
                    
                   }else{
                    echo "<script>Swal.fire({
                      position: 'top-end',
                      icon: 'oops',
                      title: 'error',   
                      showConfirmButton: false,
                      timer: 2000
                    })</script>"; 
                   }                        
               
              }
            
            ?>  
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">add student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div  class="register"> 
                    <form action="" method="post"> 
                        <input type="text" name="Name"  class="form-control"placeholder="Name"><br>
                        <input type="text" name="Email" class="form-control" placeholder="Email" ><br>
                       
                        <input type="text" name="phone" class="form-control" placeholder="phone" ><br>
                       
                        <input type="text" name="Enroll number" class="form-control" placeholder="Enroll_number" > <br>  
                      
                        <input type="text" name="Date of admission" class="form-control" placeholder="Date_of_admission" ><br>  
                        <button type="submit" name="submit" class="btn btn-primary" style="width:100px">add</button>      

                        <!-- <input type="submit" name="submit">  -->
                    </form>    
                          
              </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <div class="container-fluide" style="width: 100%;"> 
                    <?php 
                        
                       if( time()-$_SESSION['time']>86400){ 
                           header("Location:index.php");
                       } 
                     include ('header.html');
                    
                    ?> 
        
        <div class="row" style="height: 100vh;"> 
               
                            <?php
                             include ('aside.php');    
                            ?>  
               <div class="col-lg-10 ">

                        
               <?php include 'navbar.html' ?> 
                          
                             <main style="height:125vh; background-color: #eef0f0;margin: 0px;margin-left: -14px; margin-right: -14px;padding: 20px;">   
                            <div class=" h-80 " style="width: 97%; "> 
                                <img src="svg/student_list.svg" alt="image">  
                                <div class=" d-inline-block float-right rounded-3 " style="background-color: #00C1FE;width: 200px;">
                                <a href="enregistrer_student.php" data-bs-toggle="modal" data-bs-target="#exampleModal" style="text-decoration:none;"><p class="text-light text-center " >ADD NEW STUDENT</p></a>   
                                           
                                </div>
                             
                              
                           </div>

                            <?php
                                  include ('table_student.php');   
                            ?>

          </div>   
                 
              
    </div>

  

   <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>