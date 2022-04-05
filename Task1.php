<!DOCTYPE html>
<html>
<head>
<title>PHP</title>
<style>
h1{color:DarkRed;padding:5px;margin:25px;}
.container{
    padding:5px;
    margin:25px;
    font:bold 24px ;}
</style>
</head>
<body>
<h1>The First Task</h1>
<div class="container">
<?php
//declare function char_operation
 function char_operation( $char) {
     $output_char = ++$char; 
         if (strlen($output_char) > 1) 
          {  $output_char = $output_char[0];
     }
         echo $output_char; 
      }
?>
<?php
//call Function char_operation
echo " if input 'a' the output : ";char_operation('a');
echo "<br>";
echo " if input 'z' the output : ";char_operation('z');
echo "<br>";
echo "===================";
?>

<?php
//declare function
function string_operation($url){
 echo substr($url, strrpos($url, '/' )+1)."\n";
}
?>
<?php
echo "<br>";
$url = 'http://www.example.com/5478631';
echo $url ." the output : ";
//call function string_operation
string_operation($url);
?>

</div>
</body>
</html>