function submitRegForm(){
    var username = document.getElementById('uN').value
    var pass = document.getElementById('ps').value
    var cPass = document.getElementById('cps').value
    var warn1 = document.getElementById("warn1")
    var warn2 = document.getElementById("warn2")
    var warn3 = document.getElementById("warn3")
    var warn4 = document.getElementById("warn4")
    var checkMissing = false;
    var checkMatch = false;
    var checkAvailable = false;
    
     if(username == "" || pass == ""){
        warn1.style.display = 'block'
        checkMissing = false;
    }
    else{
        warn1.style.display = 'none'
        checkMissing = true;
    }
    
    if(pass != cPass){
        warn2.style.display = 'block'
        checkMatch = false;
    }
    else{
        warn2.style.display = 'none'
        checkMatch = true;
    }
    
    if(warn4.style.display == 'block'){
        checkAvailable = true;
    }
    else{
        checkAvailable = false;
    }
    
    console.log(checkAvailable, checkMatch, checkMissing)
    if( checkAvailable && checkMatch && checkMissing){
//        console.log("registering")
        document.getElementById("registerForm").submit();
    } 
}

function checkUserName(value){
    var xhttp = new XMLHttpRequest();
    var url = "checkUser.php?username=" + value
    var text = ""
    var warn3 = document.getElementById("warn3")
    var warn4 = document.getElementById("warn4")
    warn4.style.color = 'green'
    
        xhttp.onreadystatechange = function()
        {
            if (xhttp.readyState == 4) {                
                text = xhttp.responseText 
                
                if(text == 'true'){
                        warn3.style.display = 'block'
                        warn4.style.display = 'none'
                    }
                    else{
                        warn3.style.display = 'none'
                        warn4.style.display = 'block'
                    }
            }   
        }
        xhttp.open("GET", url, true);
        xhttp.send();
}