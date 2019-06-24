<?php    
    include ('config/init.php');
    include ('models/prd_tamano.php');
    

    $orederItem = new PrdTamanho($_POST['guidPr'], $_POST['T35'], $_POST['T36'], $_POST['T37'], $_POST['T38'], $_POST['T39'], $_POST['T40'], $_POST['T41'], $_POST['T42'], $_POST['T43'], $_POST['T44'], $_POST['T45'], $_POST['T46'], $_POST['T47'], $_POST['T48']);

    $totalQtd = getTotalQtd();
    $totalVal = getTotalVal();

    $carinho[] = $orederItem;

    header ('Location: produto_list_cl.php?totalQtd='.$totalQtd.'&totalVal='.$totalVal);
?>