function survey() {
    
    document.getElementById("img1").addEventListener("click", wasClicked)
    document.getElementById("img2").addEventListener("click", wasClicked)
    document.getElementById("img3").addEventListener("click", wasClicked)
    document.getElementById("img4").addEventListener("click", wasClicked)
    document.getElementById("img5").addEventListener("click", wasClicked)
   
}

function wasClicked(event) {
    console.log("clicked " + this.id)

    if(this.style.width == "100%"){
        this.style.width = "33%"
        this.style.borderRadius = "0px"
        this.name = "passTime"
        
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
        this.style.width = "100%"
        this.style.borderRadius = "10px"
        this.name = ""
        
         for(var i = 1; i < 6; ++i){
            if(i != this.id.slice(3)){
               document.getElementById("img" + i).style.display = "none"
            }
        }
    }
}