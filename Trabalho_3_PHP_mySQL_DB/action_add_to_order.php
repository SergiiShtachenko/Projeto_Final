<?php    
    include ('config/init.php');
    include ('models/prd_tamano.php');
    
    
    $orederItem = new PrdTamanho($_POST['guidPr'], $_POST['pricePr'], $_POST['T35'], $_POST['T36'], $_POST['T37'], $_POST['T38'], $_POST['T39'], $_POST['T40'], $_POST['T41'], $_POST['T42'], $_POST['T43'], $_POST['T44'], $_POST['T45'], $_POST['T46'], $_POST['T47'], $_POST['T48']);

    if($orederItem->getTotalQtd() > 0) $_SESSION['carinho'][] = $orederItem;
    
    $totalQtd = 0;
    $totalVal = 0;

    foreach($_SESSION['carinho'] as $compra){
        $totalQtd = $compra->getTotalQtd();
        $totalVal = $compra->getTotalVal();
    }

    $totalVal = number_format($totalVal, 2, '.', '');

    header ('Location: produto_list_cl.php?qtd='.$totalQtd.'&val='.$totalVal);
    //produto_list_cl.php?qtd=10&val=200)
?>