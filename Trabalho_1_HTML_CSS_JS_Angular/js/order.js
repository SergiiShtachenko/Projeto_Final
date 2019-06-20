
function ordShow(id){
    document.getElementById(id).style.display = 'block';
}

function ordHide(id){
    document.getElementById(id).style.display = 'none';
}

function calcTotal(){
    let totQtd = 0;
    let totVal = 0.0;

    let orderTabel = document.getElementById("orProductList");
    let lines = orderTabel.querySelectorAll("table tr");    

    for(let i = 0; i < lines.length; i++){
        //console.log(lines[i]);
        let input = lines[i].getElementsByTagName("input");
        for(let i = 0; i < input.length; i++){
            console.log(input[i].value);
            if(input[i] != null) totQtd += Number(input[i].value);
        }
        //if(input != null ) totQtd += Number(input.value);
    }

    document.getElementById("totalQtd").innerHTML = totQtd;
    document.getElementById("totalVal").innerHTML = (parseFloat(totQtd*33.5).toFixed(2));    
}

function orOpenVid(){
    document.getElementById("orVideoBox").style.display = 'block';
}

function ordCloseVid(){
    document.getElementById("orVideoBox").style.display = 'none';
}

// Não esta finalizada
function ordSerchLine(){
   let serchWord = document.getElementById("orSerch");
   let serchNonCase = serchWord.value.toUpperCase();
   console.log(serchNonCase);
   if(serchNonCase.length > 2){
       let orderTabel = document.getElementById("orProductList");
       let lines = orderTabel.querySelectorAll("table tr");       
       //console.log(lines);
       for (let i = 0; i < lines.length; i++) {
           let textLine = lines[i].innerText;
           console.log(textLine);
           lines[i].style.display = "none"
           if(textLine.toUpperCase().indexOf(serchNonCase) > -1) lines[i].style.display = "block";
       }
    }
}
