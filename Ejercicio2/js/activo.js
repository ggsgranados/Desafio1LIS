window.onload = function () {
    document.querySelector("#periodo").addEventListener("change", function(){
        if (this.value.length){
            if (document.querySelector(".visible")){
                document.querySelector(".visible").className = "";
            }
            document.querySelector("#" + this.value).className = "visible";
        }
        else{
            if (document.querySelector(".visible")){
                document.querySelector(".visible").className = "";
            }
            document.querySelector("#" + this.value).className = "nonvisible";
        }
    }, false);
}

