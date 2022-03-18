<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">                   
    <link rel="stylesheet" href="body.css">
    <title>Document</title>
</head>
<body>    
             <?php
                          session_start();
                           $username="root";
                           $password="";
                           $connection=new PDO("mysql:host=localhost;dbname=e_classe_db;",$username,$password); 
                           if(isset($_POST['submit1'])){  
                            $Email=htmlspecialchars(strtolower(trim($_POST['Email'])));
                            
                                  $requet_a=$connection->prepare("SELECT *FROM  `sign up` WHERE  Email=:Email");
                                  $Email=htmlspecialchars(strtolower(trim($_POST['Email'])));  
                                  $requet_a->bindParam("Email",$Email); 
    
                                  $requet_a->execute(); 
                                  if($requet_a->rowCount()>0){  
                                           echo '<div class="alert alert-danger" role="alert">
                                           This email has been used by 
                                         </div>';
                                  } 
            
                         
                          else{  
                            $nome=htmlspecialchars(strtolower(trim($_POST['nome']))); 
                            $pnome=htmlspecialchars(strtolower(trim($_POST['prenome'])));
                            $Email=htmlspecialchars(strtolower(trim($_POST['Email'])));  
                            $password=($_POST['password']);  
                            $image=$_POST['image'];  
                            $requet=$connection->prepare("INSERT INTO `sign up`(`first name`, `list name`, `Email`, `password`,`image`) VALUES (:nome,:prenom,:email,:password,:image)");
                        
                            $requet->bindParam("nome",$nome); 
                            $requet->bindParam("prenom",$pnome);
                            $requet->bindParam("email", $Email);
                            $requet->bindParam("password",$password);  
                            $requet->bindParam("image",$image);  
                            if($requet->execute()){      
                              $_SESSION['registe']="registe";
                              header("Location:index.php");                                
                            } 
                           }
                        }  
             ?> 
                            <div class="container  mt-1 bg-light p-2" style="width:30%">  
                            <form method="post">   
                                <h1 class="border-left border-5 border-info ms-4 ">E-classe</h1>      
                                <h4 class="text-center ">sign up</h4>  
                                <p class="text-secondary text-center">Enter your credentials to access your account</p> 

                              <div>
                              <label for="nome" id="test">first name*</label>    
                                <input type="text" id="nome" class="form-control" name="nome"  placeholder="first name"><br> 
                                <span></span>
                              </div>
                               <div>  
                               <label for="nome">last name*</label>
                                <input type="tex" id="prenome"  class="form-control" realpath="/^([a-z]{3,12})$/" name="prenome" required placeholder="last name"><br> 
                                <span></span>
                               </div> 
                               <div>
                               <label for="Email">Email*</label>
                                <input type="text" id="email"  class="form-control"  name="Email" required placeholder=" Email"><br> 
                                <span></span>
                              </div>
                                <div>
                                <label for="pasword">password*</label>
                                <input type="password" id="password" class="form-control"  name="password" required placeholder="password"><br> 
                                <span></span> 
                                </div>
                                    <button type="submit" class="btn btn-primary"  name="submit1">sign up</button> 
                                    <button  class="btn btn-light" > <a href="index.php" class="text-decoration-none text-dark">login</a></button> 
                                    <br>  <input type="file" name="image"> 
                            </form>  
                            </div> 

                                            </body>
</html>

     
                <script type="text/javascript">
                      const nomRegex=/^[a-zA-Z ]+$/;
                      const prenomRegex=/^[a-zA-Z ]+$/;
                      const emailRegex=/^\w+@\w+(\.\w+)+$/;
                      const passwordregex=/^[a-zA-Z0-9!@#$%^&*]{6,16}$/  
                       let nome = document.getElementById('nome');
                       let prenome = document.getElementById('prenome');
                       let email = document.getElementById('email'); 
                       let password = document.getElementById('password');
                       let span = document.getElementsByTagName('span');
                       let form=document.querySelector('form');
                     
                       form.addEventListener('submit',validateform);
                       function validateform(e){
                              if(nome.value.match(nomRegex) && prenome.value.match(prenomRegex) && email.value.match(emailRegex) ){
                                
                                 e.target.submit();  
                               
                              }else{
                                            
                                alert('please check the data you entred');
                                e.preventDefault();
                              }

                      } 
                       nome.onkeydown=function(){  
                         
                         if(nomRegex.test(nome.value)){  
                           span[0].innerText="le nome correct";
                           span[0].style.color="lime";
                         }else{
                           span[0].innerText="le nom incorrect";
                           span[0].style.color="red";
                         }
                       }
                       prenome.onkeydown=function(){  
                         if(prenomRegex.test(prenome.value)){  
                           span[1].innerText="le prenome correct";
                           span[1].style.color="lime";
                         }else{
                           span[1].innerText="le prenom incorrect";
                           span[1].style.color="red";
                         }
                       } 
                       email.onkeydown=function(){  
                         if(emailRegex.test(email.value)){  
                           span[2].innerText="email correct";
                           span[2].style.color="lime";
                         }else{
                           span[2].innerText="email incorrect";
                           span[2].style.color="red";
                         }
                       } 
                      //  password.onkeydown=function(){  
                      //    if(passwordRegex.test(password.value)){  
                      //      span[3].innerText="password correct";
                      //      span[3].style.color="lime";
                      //    }else{
                      //      span[3].innerText="password incorrect"; 
                      //      span[3].style.color="red";
                      //    }
                      //  } 

                </script>
          