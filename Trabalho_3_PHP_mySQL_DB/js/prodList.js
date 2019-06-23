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