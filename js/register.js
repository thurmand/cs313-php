function submitRegForm(){
    var username = document.getElementById('uN').value
    var pass = document.getElementById('ps').value
    var cPass = document.getElementById('cps').value
    var warn1 = document.getElementById("warn1")
    var warn2 = document.getElementById("warn2")
    var warn3 = document.getElementById("warn3")
    
     if(username == "" || pass == ""){
        warn1.style.display = 'block'
    }
    else if(pass != cPass){
        warn2.style.display = 'block'
    }
    else{
        document.getElementById("registerForm").submit();
    } 
}

function checkUserName(value){
    var xhttp = new XMLHttpRequest();
    var url = "checkUser.php?username=" + value
    
    
        xhttp.onreadystatechange = function()
        {
            
            if (xhttp.readyState == 4) {
                // print readystat and status
                console.log("Readystate " + xhttp.readyState 
                            + " Status " + xhttp.status)
                
                var text = xhttp.responseText
                console.log(text)                
            }   
        }
        xhttp.open("GET", url, true);
        xhttp.send();
}