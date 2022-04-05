
<!DOCTYPE html>
<html>
<head>
<title>PHP</title>
<style>
.table{padding:5px;margin:25px;}
h1{text-align:center;color:DarkRed;}
.container{text-align:center;}
</style>
</head>
<body>
<h1>The First Task</h1>
<div class="container">
<table  style="border:black 4px solid;"class="table">
<?php
for($row=0;$row<9;$row++)
{ echo'<tr>';
      for($cols=0;$cols<8;$cols++)
      { if(($cols+$row) %2 ==0)
            {echo'<td style="background-color:white; height:50px; width:50px">';}
            else
            {echo'<td  style="background-color:black; height:50px; width:50px">';}
      echo'</td>';
      }
      echo'</tr>';
} 
?>
</table>
</div>
</body>
</html>