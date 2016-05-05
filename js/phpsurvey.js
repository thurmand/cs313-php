function survey() {
    
    document.getElementById("img1").addEventListener("click", passSel)
    document.getElementById("img2").addEventListener("click", passSel)
    document.getElementById("img3").addEventListener("click", passSel)
    document.getElementById("img4").addEventListener("click", passSel)
    document.getElementById("img5").addEventListener("click", passSel)
    
    document.getElementById("sFal1").addEventListener("click", seasonSel)
    document.getElementById("sWin2").addEventListener("click", seasonSel)
    document.getElementById("sSpr3").addEventListener("click", seasonSel)
    document.getElementById("sSum4").addEventListener("click", seasonSel)
   
}

function passSel(event) {
    console.log("clicked " + this.id)

    if(document.getElementById("p" + this.id.slice(3)).checked == true){
        this.style.width = "33%" 
        this.style.borderRadius = "0px"
    
        document.getElementById("p" + this.id.slice(3)).checked = false
        
        for(var i = 1; i < 6; ++i){
            if(i != this.id.slice(3)){
               document.getElementById("img" + i).style.display = "block"
            }
            else if(i == 1){
                this.style.borderBottomLeftRadius = "10px"
                this.style.borderTopLeftRadius = "10px"
            }
            else if(i == 5){
                this.style.borderBottomRightRadius = "10px"
                this.style.borderTopRightRadius = "10px" 
            }
            
        }
    }
    else{
         console.log(document.getElementById("p" + this.id.slice(3)).checked)
        this.style.width = "100%"
        this.style.borderRadius = "10px"
        document.getElementById("p" + this.id.slice(3)).checked = true
        
         for(var i = 1; i < 6; ++i){
            if(i != this.id.slice(3)){
               document.getElementById("img" + i).style.display = "none"
            }
        }
    }
}

function seasonSel(event){
    
    if(document.getElementById("check" + this.id.slice(4)).checked == true){
        console.log("unselected")
//        this.style.position = ""
        this.style.bottom = null
        
        document.getElementById("check" + this.id.slice(4)).checked = false
    }
    else{
        console.log("selected")
        this.style.position = "relative"
        this.style.bottom = "20px"
        
        document.getElementById("check" + this.id.slice(4)).checked = true
        
        /*for(var i = 1; i < 5; ++i){
             if(this.id.slice(4) == document.getElementById("check" + i).slice(5)){
                 document.getElementById("check" + i).checked = "true"
             }
                
            }*/
        }
}