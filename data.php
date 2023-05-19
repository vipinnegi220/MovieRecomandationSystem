<?php
include("connection.php");
if(isset($_POST['submit']))
{
    $c=1;
    $Age=$_POST['Age'];
    $Gender =$_POST['Gender'];
    $Genre =$_POST['Genre'];
    $Pricing=$_POST['Pricing'];

    $Age_cat=0;
    if($Age>0 && $Age<18)
    $Age_cat=0;
    else if($Age>=18 && $Age<50)
    $Age_cat=1;
    else if($Age>=50 && $Age<=70)
    $Age_cat=2;
    else
    $Age_cat=3;
    $res = mysqli_query($conn,"SELECT * FROM movie WHERE Genre='$Genre'OR (Age_cat='$Age_cat' AND Genre='$Genre' ) OR(Age_cat='$Age_cat' AND Gender='$Gender') " );
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Suggested Movies</title>
    <style type="text/css">
        .cont{
            margin-top:50px;
            border-radius:10px;
            box-shadow:0 0 15px 15px green ;
            margin-left:500px;
            width: fit-content;
            background-color:white;
            text-align:center;
            padding: 20px;
        }
        body{
            vertical-align: middle;
            background: url("pic.jpg");
        }
        h1{
            box-shadow:0 0 8px 8px blue;
            font-family:Brush Script MT, Brush Script Std, cursive;
            align-content:center;
            border:2px solid black;
        }
        th{
            font-size:20px;
            font-family:Georgia, serif;
            padding: 10px;
        }
        td{
            font-family:Georgia, serif;
        }
    </style>
</head>
<body>
   
    <div class="cont" >
    <h1>Suggested Movies For You</h1>
        <table class="Results">

            <tr>
                    <th>Poster</th>
                    <th>Movie Name</th>
                    <th>Genre</th>
                    <th>Box-Office collection(in cr) </th>
                </tr>
        <?php
        
            while($row=mysqli_fetch_array($res))
            {
                ?>  
        <tr>
        <td><?php echo '<img src="data:Poster;base64,'.base64_encode($row['Poster']).'" alt="img" style=" width:100px; height:100px;">'; ?></td>
            <td><?php echo $row['Movie_name']?></td>
            <td><?php echo $row['Genre']?></td>
            <td><?php echo $row['Price']?></td>
        </tr>  
        <?php      
            }
        ?>
        </table>
    </div>
</body>
</html>



