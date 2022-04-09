
<?php
function clean ($input){
$input=trim($input);
$input=strip_tags($input);
$input=stripcslashes($input);
return $input;
}
?>
<?php
if($_SERVER['REQUEST_METHOD']== "POST"){
    
  $title = clean($_POST['title']);
  $content=clean($_POST['content']);

   $errors = []; 
     # VALIDATE Title 
     if(empty($title)){
        $errors['title']  = "Required"; 
       }
    
    
   # VALIDATE Content 
   if(empty($content)){
    $errors['content']  = "Required"; 
   }elseif(strlen($content)<50){
    $errors['content']="At most 50 character";
   }
   if(!empty($_FILES['image']['name'])) {

    $name    = $_FILES['image']['name'];
    $temPath = $_FILES['image']['tmp_name'];
    $size    = $_FILES['image']['size'];
    $type    = $_FILES['image']['type'];
    // image/png 

    $typesInfo  =  explode('/', $type);   // convert string to array ... 
    $extension  =  strtolower( end($typesInfo));      // get last element in array .... 
    $allowedExtension = ['png', 'jpeg', 'jpg'];   // allowed Extension    // PNG JPG 
    if (in_array($extension, $allowedExtension)) {

        # Create Final Name ... 
        $FinalName = time() . rand() . '.' . $extension;

        $disPath = 'uploads/' . $FinalName;

        if (move_uploaded_file($temPath, $disPath)) {
            echo "Image Uploaded\n";    
        } else {
            $errors['image']  = "Error Try Again"; 
        }
    } else {
        $errors['image']  = "InValid Extension"; 
    }
} else {
    $errors['image']  = "Image Required"; 
}





    # Check ERRORS 
    if(count($errors) > 0 ){

        foreach($errors as $key => $value){
            echo '* '.$key.' : '.$value.'<br>';  
        }

     }else{
         echo 'Valid Data';

 
     $file = fopen('info.txt','a')  or die("can't open file");

     $text = "title : ".$title."\n"; 
     $text.="content : ".$content."\n";
     $text.="image-name : ".$name."\n";

    
     fwrite($file,$text);
     
 fclose($file);
  
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
    <form action="<?php echo  $_SERVER['PHP_SELF'];?>" method="POST"enctype="multipart/form-data">

<div class="mb-3">
  <label  class="form-label">title</label>
  <input type="text" name="title" class="form-control">
</div>

<div class="mb-3">
  <label  class="form-label">content</label>
  <textarea type="text" name="content" class="form-control"></textarea>
</div>

<div class="mb-3">
  <label  class="form-label">Image</label>
  <input type="file" name="image" class="form-control">
</div>
<div class="mb-3">

  <input type="submit"  value="submit" class="btn btn-primary">
</div>
</form>



</div>




</div>


    </body>
    </html>