function submitForm(){
    
    var userN = document.getElementById("uN").value
    var pass = document.getElementById("ps").value
    var warn = document.getElementById("warn")
    
    if(userN == "" || pass == ""){
        warn.style.display = 'block'
    }
    else{
        document.getElementById("dwform").submit();
    }
}

window.onresize = function(event){
    document.getElementById("body").style.width = innerWidth;
}