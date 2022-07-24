
var images= ["carosel/img/1.png","carosel/img/2.png","carosel/img/3.png","carosel/img/4.png"];
var caption= ["Talk is cheap!","Good codes","My poems are same as my codes","Any fool can write code that a computer can understand"];
var description=["Show me the source code","Is its own documentation","One compile in compilers and another in your heart","Good programmers write code that a humans can understand"]

i=0;
var n;

function load(n){
    i=i+n;
    if(i<0){
        i=images.length-1;
    }
    else if(i>images.length-1){
        i=0;
    }
    document.getElementById('img').setAttribute("src",images[i]);
    document.getElementById('text').innerText=caption[i];
    document.getElementById('desc').innerText=description[i];
}

setInterval(load, 10000,1);


