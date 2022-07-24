
        function show() {

            document.getElementById('menu-bar').style.cssText = "left:0%!important;";
            document.getElementById('click').className = "fa fa-times icon";
            document.getElementById('click').setAttribute("onclick", "hide()");

        }

        function hide() {

            document.getElementById('menu-bar').style.cssText = "left:-100%!important;";
            document.getElementById('click').className = "fa fa-bars icon";
            document.getElementById('click').setAttribute("onclick", "show()");

        }

        function formsubmit(){
            document.getElementById('logform').submit();
        }