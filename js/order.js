
function ordShow(id){
    document.getElementById(id).style.display = 'block';
}

function ordHide(id){
    document.getElementById(id).style.display = 'none';
}

function calcTotal(){
    let totQtd = 0;
    let totVal = 0.0;

    let lines = document.querySelectorAll("table tr");    

    for(let i = 0; i < lines.length; i++){
        //console.log(lines[i]);
        let input = lines[i].getElementsByTagName("input");
        for(let i = 0; i < input.length; i++){
            //console.log(input[i].value);
            if(input[i] != null) totQtd += Number(input[i].value);
        }
        //if(input != null ) totQtd += Number(input.value);
    }

    document.getElementById("totalQtd").innerHTML = totQtd;
    document.getElementById("totalVal").innerHTML = (totQtd*33.5);

}
