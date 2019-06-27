<?php    
    include ('config/init.php');
    include ('models/produto.php');
    include ('models/prd_tamano.php');
    include ('database/prod_tamanho.php');

    if (!isset($_SESSION['username'])) die;
    global $guidEnc;
    $route;
        
    $itemPedido = new PrdTamanho();
    
    if($_POST['guidLn'] == "") { // modo de criação da encomenda
        $itemPedido->setAutoGuidEnc();        
        $route = "Location: produto_list_cl.php";
    }
    else{ // modo de alteração
        $itemPedido->setGuidEnc($_POST['guidLn']); 
        clearTamanho($_POST['guidLn']);

        $route = "Location: encomedna_edit.php"; 
    }    

    // echo $route;
    //echo $itemPedido->getGuidEnc();
    

    $itemPedido->setGuid($_POST['guidPr']);
    // $itemPedido->setRef($_POST['ref']);
    // $itemPedido->setNome($_POST['nome']);
    // $itemPedido->setFoto($_POST['foto']);
    $itemPedido->setPrice($_POST['price']);

    if($_POST['T35'] > 0) $itemPedido->addToLstProd('35', $_POST['T35']);
    if($_POST['T36'] > 0) $itemPedido->addToLstProd('36', $_POST['T36']);
    if($_POST['T37'] > 0) $itemPedido->addToLstProd('37', $_POST['T37']);
    if($_POST['T38'] > 0) $itemPedido->addToLstProd('38', $_POST['T38']);
    if($_POST['T39'] > 0) $itemPedido->addToLstProd('39', $_POST['T39']);
    if($_POST['T40'] > 0) $itemPedido->addToLstProd('40', $_POST['T40']);
    if($_POST['T41'] > 0) $itemPedido->addToLstProd('41', $_POST['T41']);
    if($_POST['T42'] > 0) $itemPedido->addToLstProd('42', $_POST['T42']);
    if($_POST['T43'] > 0) $itemPedido->addToLstProd('43', $_POST['T43']);
    if($_POST['T44'] > 0) $itemPedido->addToLstProd('44', $_POST['T44']);
    if($_POST['T45'] > 0) $itemPedido->addToLstProd('45', $_POST['T45']);
    if($_POST['T46'] > 0) $itemPedido->addToLstProd('46', $_POST['T46']);
    if($_POST['T47'] > 0) $itemPedido->addToLstProd('47', $_POST['T47']);
    if($_POST['T48'] > 0) $itemPedido->addToLstProd('48', $_POST['T48']);

    if($_POST['guidLn'] == "") updateCarinho($_SESSION['userID'], $itemPedido->getGuid(), $itemPedido->getGuidEnc(), $itemPedido->getTotalQtd(), $itemPedido->getPrice());

    //echo $itemPedido->getGuidEnc().'<br>';

    foreach($itemPedido->getLstTamanhos() as $size => $qtd){
        //echo "Tamanho $size tem $qtd <br>";
        //echo $itemPedido->getGuidEnc() .' tam-' . $size .' qtd-' . $qtd .'<br>';
        updateTamanho($itemPedido->getGuidEnc(), $size, $qtd);
        // $a =  $itemPedido->getGuidEnc();
        // echo "($a, $size, $qtd)";
    }
        
    // $totalQtd = getTotais()['qtd'];
    // $totalVal = getTotais()['val'];
    // $totalVal = number_format($totalVal, 2, '.', '');

    // echo 'qtd: '.$totalQtd.' Val: '.$totalVal;

    //header ('Location: produto_list_cl.php?qtd='.$totalQtd.'&val='.$totalVal);
    header ($route );
    //produto_list_cl.php?qtd=10&val=200)
?>