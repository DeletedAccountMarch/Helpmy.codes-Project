var c=0;

    var checkme=0;
function findcin() {
    c=0;
    document.getElementById('first_text').setAttribute("class", "hide");
    document.getElementById('entervalue').innerHTML ="";
    document.getElementById('dis').setAttribute("class", "hide");
    
    document.getElementById('out').setAttribute("class", "hide");
    const variables = [];
    const array = [];
    const start = [];
    const end = [];
    var value = " ";
    var input = document.getElementById('code').value;

    var inputlen = input.length;
    var m = 0;
    var j;
    for (var i = 0; i < inputlen; i++) {

        if (input.substr(i, 6) == "system" || input.substr(i, 6) == "System" || input.substr(i, 3) == ":\\" || input.substr(i, 8) == "cygwin64" || input.substr(i, 3) == "bin" || input.substr(i, 2) == "\\"  ) {
            checkme=1;
        }
        else{
            if (input.substr(i, 3) == "cin") {

                start[m] = i + 3;
    
                for (j = i; j < inputlen; j++) {
                    if (input.substr(j, 1) == ";") {
    
                        end[m] = j;
                        break;
                    }
                }
                m++;
    
            }
        }
        
       
    }

    


    for (k = 0; k < m; k++) {
        variables[k] = input.substr(start[k], end[k] - start[k]);
        variables[k] = variables[k].replaceAll(">>", " ");
        value = value + " " + variables[k];
    }


    value = value.replace(/  +/g, ' ');

    var valuearray = value.split(' ');

    arraylen = valuearray.length;


    if (m != 0) {
        document.getElementById('out_text').textContent="Enter Input Values";
        for (i = 1; i < arraylen; i++) {
            document.getElementById('dis').setAttribute("class", "show");
            var myid = 'id="field' + i + '"';
            document.getElementById('entervalue').innerHTML += 'Enter value of ' + valuearray[i] + ' - <input type="text"' + myid + '> <br><br>';

            document.getElementById('field' + i).setAttribute("name", "value" + i);
            c++;
            // var myval = 'value="' + c + '"';
            // document.getElementById('hidendata').innerHTML = '<input type="number" name="totalval" ' + myval + ' hidden >';
        }

    } else {
        if(checkme==0){
            runcode(value);
        }
        else{
            document.getElementById('out_text').textContent="Sorry my boy you cannot execute system command : )";
        }
    }
}

function sendinput(){
    document.getElementById('first_text').setAttribute("class", "hide");
    var inputvalue=" ";
    console.log(c);
        for(i=1;i<=c;i++){
            inputvalue = inputvalue + " " + document.getElementById('field' + i).value;
        }
        inputvalue = inputvalue.replace(/  +/g, ' ');
        
        if(checkme==0){
            runcode(inputvalue);
        }
        else{
            document.getElementById('out_text').textContent="Sorry my boy you cannot execute system command : )";
        }
}

function runcode(myinputvalue) {
    document.getElementById('first_text').setAttribute("class", "hide");
    document.getElementById('out').textContent="Compiling code";
    document.getElementById('out_text').textContent="Output Result";
    document.getElementById('dis').setAttribute("class", "hide");
    
    document.getElementById('out').setAttribute("class", "show");
    $codevalue = encodeURIComponent(document.getElementById('code').value);
    $input = myinputvalue;
    const xhr = new XMLHttpRequest();

    xhr.onload = function () {
        const serverResponse = document.getElementById("out");
        serverResponse.innerHTML = this.responseText;
    };

    xhr.open("POST", "runcode.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("code=" + $codevalue + "&input=" + $input);
}

function func_copy() {
    var copyText = document.getElementById("code");
    copyText.select();
    document.execCommand("copy");
}

function clear_code() {
    var clearText = document.getElementById("code");
    clearText.select();
    document.getElementById('code').value="";

}
