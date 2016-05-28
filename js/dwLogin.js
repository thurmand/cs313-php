function submitForm(){
    
    var userN = document.getElementById("uN").value
    var pass = document.getElementById("ps").value
    var warn = document.getElementById("warn1")
    
    if(userN == "" || pass == ""){
        warn1.style.display = 'block'
    }
    else{
        document.getElementById("dwform").submit();
    }
}

function setup(){
    document.getElementById("body").style.height = innerHeight + 'px';
    window.onresize = function(event){
        document.getElementById("body").style.width = innerWidth + 'px';
        document.getElementById("body").style.height = innerHeight + 'px';
        console.log(outerHeight)
    }
}