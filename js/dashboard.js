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
    
    preCharName = document.getElementById("cName").innerText
    
  /*  if(document.getElementById("cName") == 'NAME'){
        editName()
    }*/
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

function editName(){
   
    var parent = document.getElementById("cName")
    
    parent.innerHTML = "<form id='modName' action='charName.php' method='POST'><input type='text' placeholder='Change Name' name='cName' autofocus></form>"
    var cancel = document.getElementById('canName')
    cancel.style.display = "block"
    cancel.style.fontSize = "1vw"
    cancel.style.color = "cornsilk"
    
    document.getElementById("subName").style.display = "block"
    
    parent.style.fontSize = "1vw"
    parent.style.color = "black"  
    parent.removeAttribute("onclick")
}

function noNameCh(){
    var parent = document.getElementById("cName")
    document.getElementById("subName").style.display = "none"
    
    parent.innerHTML = preCharName
    parent.style.fontSize = "2.7vw"
    parent.style.color = "cornsilk"
    var cancel = document.getElementById('canName')
    parent.setAttribute("onclick", "editName()")
    cancel.style.display = "none"
}

function changeName(){
    document.getElementById("modName").submit()
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

function editWeapons(){
    var xhttp = new XMLHttpRequest();
    var skills = document.getElementById("skills")
    var armour = document.getElementById("armour")
    var weapons = document.getElementById("weapons")
    var divider = document.getElementsByClassName("divider")
    var title = document.getElementsByClassName("title")
    var weaponList = document.getElementById("weaponList")
    var weaponResponse = ""
    
    if(arguments[0] == 1){
       
        for(var i=0;i<divider.length;i++){
                divider[i].style.display = "none"
        }

        armour.style.display = "none"
        weapons.style.width = "100%"
        skills.style.display = "none"
        
        xhttp.onreadystatechange = function()
        {
            if (xhttp.readyState == 4) {                
                var response = JSON.parse(xhttp.responseText)
                //console.log(response)
                weaponResponse = compileView(response)
                //console.log(weaponResponse)
                weaponList.innerHTML = weaponResponse
                setWeaponListeners()
            }   
        }
        xhttp.open("GET", "getWeapons.php", true);
        xhttp.send();
        
        title[2].innerHTML += "<div style='font-size:1.2vw'>Click on a Weapon to add/remove</div>"
        weaponList.style.display = "flex"
        weaponList.style.flexDirection = "row"
        weaponList.style.flexWarp = "wrap"
        weaponList.style.justifyContent = "space-between"
        weaponList.style.padding = "0px 2%"
        
        
    }else{
        
        for(var i=0;i<weaponBlock.length;i++){
                divider[i].style.display = "block"
        }

        armour.style.display = "block"
        weapons.style.width = "32%"
        skills.style.display = "block"
        
    }
}

function compileView(wList){
    
    var text = ""
    
    for(var i = 0; i < wList.length; ++i){
        text += wList[i]
    }
    
    return text 
}

function setWeaponListeners(){
    var blocks = document.getElementsByClassName("weaponBlock1")
    for(var i = 0;i < blocks.length; i++){
        blocks[i].addEventListener("click", clickOnWeapon, false)
    }
}

function clickOnWeapon(event){
    console.log(event, this)
    
   /* if(this.style.backgroundColor == "")
    "<form id='weaponForm' action='editWeapon.php' method='POST'></form>"*/
    
}