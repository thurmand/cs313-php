function setup(){
    var menu = document.getElementById("edAbles")
    document.getElementById("body").style.height = innerHeight + 'px';
    menu.style.height = "0px"
    window.onresize = function(event){
        document.getElementById("body").style.width = innerWidth + 'px';
        document.getElementById("body").style.height = innerHeight + 'px';
        console.log(outerHeight)
    }
    num = document.getElementsByClassName("num")
    skillInputs = document.getElementsByClassName("sInput")
}

function editMenuShow(){
    var menu = document.getElementById("edAbles")
    
    if(menu.style.height == "0px"){
        console.log("opening")
        menu.style.height = "100%"
    }
    else{
        console.log("closing")
        menu.style.height = "0px"
    }
}

function editBSkills(){
    
    var skills = document.getElementById("skills")
    var armour = document.getElementById("armour")
    var weapons = document.getElementById("weapons")
    var divider = document.getElementsByClassName("divider")
    var sEB = document.getElementsByClassName("sEB")
    var sBlock = document.getElementsByClassName("skillBlock")
    var buttons = document.getElementsByClassName("saveSkills")
    
    if(arguments[0] == 1){
       
        for(var i=0;i<divider.length;i++){
                divider[i].style.display = "none"
        }

        armour.style.display = "none"
        weapons.style.display = "none"
        skills.style.width = "100%"

        for(var i=0;i<sBlock.length;i++){
                sBlock[i].style.width = "33%"
        }

        for(var i=0;i<sEB.length;i++){
                sEB[i].style.display = "block"
        }
        
        for(var i=0;i<buttons.length;i++){
                buttons[i].style.display = "block"
        }
        
        
    }else{
        
        for(var i=0;i<divider.length;i++){
                divider[i].style.display = "block"
        }

        armour.style.display = "block"
        weapons.style.display = "block"
        skills.style.width = "32%"

        for(var i=0;i<sBlock.length;i++){
                sBlock[i].style.width = "50%"
        }

        for(var i=0;i<sEB.length;i++){
                sEB[i].style.display = "none"
        }
        
        for(var i=0;i<buttons.length;i++){
                buttons[i].style.display = "none"
        }
        
        if(arguments[0]==0){
            saveBSkills()
        }
        
        /*else{
            location.reload();
        }*/
    }
}

function addToSkill(skillB, adds){
     var skillNum = parseInt(num[skillB - 1].innerText)
     
    if(adds == true){
        num[skillB - 1].innerText = skillNum++
    }else{
        num[skillB - 1].innerText = skillNum--
    }
    
      num[skillB - 1].innerText = skillNum
}

function saveBSkills(){
    
    for(var i=0;i<skillInputs.length;i++){
        skillInputs[i].value = num[i].innerText
    }

    document.getElementById("skillsForm").submit()
}

function editWeaons(){
    
     var skills = document.getElementById("skills")
    var armour = document.getElementById("armour")
    var weapons = document.getElementById("weapons")
    var divider = document.getElementsByClassName("divider")
    
    if(arguments[0] == 1){
       
        for(var i=0;i<divider.length;i++){
                divider[i].style.display = "none"
        }

        armour.style.display = "none"
        weapons.style.width = "100%"
        skills.style.display = "none"
        
        
        
    }else{
        
        for(var i=0;i<divider.length;i++){
                divider[i].style.display = "block"
        }

        armour.style.display = "block"
        weapons.style.width = "32%"
        skills.style.display = "block"
        
        
        if(arguments[0]==0){
            saveBSkills()
        }
        /*else{
            location.reload();
        }*/
    }
}