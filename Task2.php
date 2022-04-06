
<?php
if($_SERVER['REQUEST_METHOD']== "POST"){

    $name     = $_POST['name'];
   $email    = $_POST['email'];
   $password = $_REQUEST['password'];
   $url      = $_POST['url'];
   $errors = []; 

   # Validate NAME ... 
   if(empty($name)){
 
     $errors['Name']  = "Required"; 
   }elseif(is_string($name)){
    $errors['Name']  = "Please Enter String ";  
   }
   $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
   # VALIDATE EMAIL 
   if(empty($email)){
 
     $errors['Email']  = "Required"; 
   }elseif(!preg_match($regex, $email)){
    $errors['Email']  = "Please Enter Format Email"; 
   }
 
   $number    = preg_match('@[0-9]@', $password);
     # VALIDATE password 
     if(empty($password)){
 
         $errors['Password']  = "Required"; 
       }elseif($number < 6){
        $errors['Password']  = "Please Enter password Atleast 6 character"; 
       }




     # VALIDATE url
     if(empty($address)){
 
        $errors['address']  = "Required"; 
      }if(!strlen($address)<10){

        $errors['address']="At least 10 character";
      }



     # VALIDATE url
     if(empty($url)){
 
        $errors['url']  = "Required"; 
      }
      elseif(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
        $errors['url'] = "Invalid URL";
      }




    # Check ERRORS 
    if(count($errors) > 0 ){

        foreach($errors as $key => $value){
            echo '* '.$key.' : '.$value.'<br>';  
        }

     }else{
         echo 'Valid Data';
     } 
  













}

















?>

<Html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            
        </style>
        <scripts>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </scripts>
    </head>
    <body>
<div class="container">
<div class="row">
    <form action="<?php echo  $_SERVER['PHP_SELF'];?>" method="POST">
<div class="mb-3">
  <label class="form-label">Name</label>
  <input type="text" name="name" class="form-control">
</div>
<div class="mb-3">
  <label  class="form-label">Email</label>
  <input type="text" name="email" class="form-control" >
</div>

<div class="mb-3">
  <label class="form-label">Password</label>
  <input type="password" name="password" class="form-control">
</div>

<div class="mb-3">
  <label class="form-label">Address</label>
  <input type="text" name="address" class="form-control">
</div>
<div class="mb-3">
  <label  class="form-label">URL LinkedIn</label>
  <input type="text"  name="url" class="form-control">
</div>
<div class="mb-3">

  <input type="submit"  value="submit" class="btn btn-primary">
</div>
</form>



</div>




</div>


    </body>
    </html>