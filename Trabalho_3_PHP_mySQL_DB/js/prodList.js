function showHidePesquisa(){
    let block = document.getElementsByClassName('blocoDePesquisa')[0];
    if(block.style.display == 'block'){
        block.style.display = 'none';
        document.getElementsByClassName("linhaDePesquisa")[0].value = "";
        filtrar();
    } 
    else block.style.display = 'block';
}

function hidePesquisa(){
    document.getElementsByClassName('blocoDePesquisa')[0].style.display = 'none';
}

function filtrar() {
    let input = document.getElementsByClassName("linhaDePesquisa")[0];
    let filter = input.value.toUpperCase();
    console.log(filter);
    let table = document.getElementsByClassName("orProductList")[0];
    console.log(table);
    let tr = table.getElementsByTagName("tr");
    for(let i = 0; i < tr.length; i++){
        //let tr = table[i].getElementsByTagName("tr");
        console.log(tr[i]);
        let txtValue = tr[i].textContent || tr[i].innerText;
        if(txtValue.toUpperCase().indexOf(filter) > -1) tr[i].style.display = "";
        else tr[i].style.display = "none";
    }
              
}

function ordShow(ref){
    form = document.getElementById(ref+"_f");
    buttn = document.getElementById(ref+"_b");

    if(form.style.display == 'block'){
        form.style.display = 'none';
        buttn.style.display = 'block';       
    } 
    else {
        form.style.display = 'block';
        buttn.style.display = 'none';
    }
}
