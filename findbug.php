<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Helping you to find bugs on your codes!</title>
    
    <link rel="icon" href="images/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="carosel/css/style.css">
    <style>
        .hide{
            display:none;
        }
        .show{
            display:inline;
        }
    </style>
</head>
<body>
    <?php include 'components/_nav.php' ?>
    <br><br>
    <h1><center>Helping you to find bugs on your code!</center></h1>
    <br><br>
    <div>
    <center><a onclick="runcode()" href="#" style="padding:5px;display:flex;align-content:center;text-decoration:none;justify-content:space-around;background:brown;color:white;width:50%;">Run code</a>
</center><br>

    <center><textarea placeholder="Enter your C++ source code here.. " rows="15" cols="100%" style="padding:10px;font-size:18px"></textarea></center>
    </div>
    <br><br>
    
    <div class="hide" id="out">
    <h1><center>Output - </center></h1>
    <br><br>

    <div>
    <center><textarea placeholder="waiting.... " rows="15" cols="100%" style="padding:10px;font-size:18px"></textarea></center>
    </div>

    <center><a href="#" style="padding:5px;display:flex;align-content:center;text-decoration:none;justify-content:space-around;background:brown;color:white;width:50%;">Fix Bug on this code!</a>
</center><br>
    <br><br>
</div>

    <?php include 'components/_footer.php' ?>

    <script>
        function runcode(){
            document.getElementById('out').setAttribute("class","display");
        } 
    </script>
</body>
</html>