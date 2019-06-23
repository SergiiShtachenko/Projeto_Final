function showHidePesquisa(){
    let block = document.getElementsByClassName('blocoDePesquisa')[0];
    if(block.style.display == 'block') block.style.display = 'none';
    else block.style.display = 'block';
}
function hidePesquisa(){
    document.getElementsByClassName('blocoDePesquisa')[0].style.display = 'none';
}