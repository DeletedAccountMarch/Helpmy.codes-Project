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

    <?php include 'carosel/index.php' ?>

  
    <br><br>
    <h1><center>Helping you to find bugs on your code!</center></h1>
    <br><br>
    <div>

    <br>

    <center><textarea name="code" id="code" placeholder="Enter your C++ source code here.. " rows="15" cols="100%" style="padding:10px;font-size:18px">// Your First C++ Program

#include <iostream>
int main() {
    std::cout << "Hello World!";
    return 0;
}</textarea></center>
    <center><textarea name="input" id="input" placeholder="Enter input here.. " rows="4" cols="40%" style="padding:10px;font-size:18px"></textarea></center>
    
    <center><button onclick="runcode();" style="cursor:pointer;padding:5px;display:flex;align-content:center;text-decoration:none;justify-content:space-around;background:brown;color:white;width:50%;">Run code</button>
</center>

   </div>
    <br><br>
    
    <div class="hide" id="myoutput">
    <h1><center>Output - </center></h1>
    <br><br>

    <div>
    <center><textarea placeholder="waiting.... " rows="15" cols="100%" style="padding:10px;font-size:18px" id="out"></textarea></center>
    </div>

    <center><a href="#" style="cursor:pointer;padding:5px;display:flex;align-content:center;text-decoration:none;justify-content:space-around;background:brown;color:white;width:50%;">Fix Bug on this code!</a>
</center><br>
    <br><br>
</div>

    <script>
        function runcode(){

            document.getElementById('myoutput').setAttribute("class","show");
            
            $codevalue= encodeURIComponent(document.getElementById('code').value);
            $input = document.getElementById('input').value;
            const xhr = new XMLHttpRequest();

            xhr.onload = function(){
            const serverResponse = document.getElementById("out");
            serverResponse.innerHTML = this.responseText;
            };

            console.log($codevalue);
            xhr.open("POST","runcode.php");
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send("code="+$codevalue+"&input="+$input);
        } 

        
    </script>
    <?php include 'components/_footer.php' ?>


</body>
</html>