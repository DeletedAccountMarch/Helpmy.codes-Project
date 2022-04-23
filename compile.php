<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compile Your C++ Code</title>
    <link rel="stylesheet" type="text/css" href="css/compiler.css">
</head>

<body>
    <?php include 'components/_nav.php' ?>

        <div class="divcompile">

            <div class="left compile_container">
                <div class="options">
                    <button class="run_btn lefttop" onclick="findcin()" type="button">Run Code</button>
                    <button class="run_btn lefttop" id="copy" onclick="func_copy()">Copy Code</button>
                    <button class="run_btn righttop" onclick="clear_code()">Clear Code</button>

                </div>

                <textarea id="code" class="code_field">// Your First C++ Program

#include <iostream>
using namespace std;

int main() {
    cout << "Hello World!";
    return 0;
}</textarea>
            </div>
            <div class="right compile_container">
                <div class="outputspace">
                    <h1 id="out_text">Output</h1>
                    <hr>
                    <textarea id="first_text" class="show" disabled>Hello World!</textarea>
                    <textarea id="out" class="hide" disabled>Compiling code </textarea>
                    <div id="dis" class="hide">
                        <div id="entervalue"></div>
                        
                        <button onclick="sendinput()" class="run_btn">Run output</button>
                    </div>
                </div>
            </div>

        </div>

    <?php include 'components/_footer.php' ?>

    <script src="js/compile.js"></script>
</body>

</html>