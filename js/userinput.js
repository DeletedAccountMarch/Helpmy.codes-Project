function findcin() {
            
    const start =[];
    const end = [];
    var input = document.getElementById('text').value;
    document.getElementById('res').innerText = input;
    var inputlen = input.length;
    var m =0;
    var j;
    for (var i = 0; i < inputlen; i++) {

        if (input.substr(i, 3) == "cin") {
            
            start[m]=i+3;

            for(j=i;j<inputlen;j++){
                if(input.substr(j, 1) == ";"){

                    end[m]=j;
                    break;
                }
            }
            m++;

        }
    }
    const variables=[];
    var value=" ";
    for(k=0;k<m;k++){
        variables[k] = input.substr(start[k],end[k]-start[k]);
        value = value + " " + variables[k].replaceAll(">>"," ");
        
    }
    value = value.replace(/  +/g, ' ');

    document.getElementById('fields').innerText = value;

    document.getElementById('dis').setAttribute("class","show");
    
}
