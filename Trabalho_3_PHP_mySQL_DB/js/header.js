function showHidePesquisa(){
    let block = document.getElementsByClassName('blocoDePesquisa')[0];
    if(block.style.display == 'none') block.style.display = 'block';
    else block.style.display = 'none';
}
function hidePesquisa(){
    document.getElementsByClassName('blocoDePesquisa')[0].style.display = 'none';
}

function filtrar(){
    let serchWord = document.getElementsByClassName('linhaDePesquisa');
    let serchNonCase = serchWord.value.toUpperCase();
    //console.log(serchNonCase);
    if(serchNonCase.length > 2){
        let orderTabel = document.getElementById("orProductList");
        let lines = orderTabel.querySelectorAll("table tr");       
        //console.log(lines);
        alert('está aqui')
        for (let i = 0; i < lines.length; i++) {
            let textLine = lines[i].innerText;
            //console.log(textLine);
            lines[i].style.display = "none"
            if(textLine.toUpperCase().indexOf(serchNonCase) > -1) lines[i].style.display = "block";
        }
     }
 }