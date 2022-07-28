<?php
    include("conexao.php");
    
    $idSorteio = $_SERVER['QUERY_STRING'];

    // seleciona as configurações do sorteio
    try{
        if($idSorteio != ''){
            $importaSorteios = $conexao->prepare("SELECT * from sorteios WHERE id = ".$idSorteio." AND status = 1");	    
        }else {
            $importaSorteios = $conexao->prepare("SELECT * from sorteios WHERE status = 1");		
        }
        $importaSorteios->execute();
        $importaSorteios = $importaSorteios->fetchAll();
        foreach($importaSorteios as $value){
            $preco = $value['preco'];
            $cotaMaxima = $value['qtdCotas'];
            $statusSorteio = $value['status'];
        }
    }catch (PDOWException $erro){ echo $erro;}

    // seleciona as cotas compradas e reservadas do sorteio
    try{
        if($idSorteio != ''){
            $importaCotasCompradas = $conexao->prepare("SELECT * from cotas WHERE idSorteio = ".$idSorteio." AND status <= 1");
        } else {
            $importaCotasCompradas = $conexao->prepare("SELECT * from cotas WHERE status <= 1");  
        }
        $importaCotasCompradas->execute();
        $importaCotasCompradas = $importaCotasCompradas->fetchAll();
    }catch (PDOWException $erro){ echo $erro;}

    $sorteados = [];

    foreach($importaCotasCompradas as $value){
        if($statusSorteio != 1){
            header("Location: ?cotas-excedidas");
        }else {
            array_push($sorteados, $value['cotas'].", ");
        }
    }
    $sorteados = implode($sorteados, "");
?>
<script>

    var URL         = window.location.pathname
    var sorteados   = [<?php echo $sorteados; ?>]
    var valorMaximo = <?php echo $cotaMaxima; ?>;

    function criarUnico() {
        
        if (sorteados.length == valorMaximo) {
            
            sorteados = []
            
        }
        
        var sugestao = Math.ceil(Math.random() * valorMaximo) // Escolher um numero ao acaso

        while (sorteados.indexOf(sugestao) >= 0) {  // Enquanto o numero já existir, escolher outro

            sugestao = Math.ceil(Math.random() * valorMaximo)

        }

        sugestao = ("00000" + sugestao).slice(-5)

        sorteados.push(sugestao) // adicionar este numero à array de numeros sorteados para futura referência
        return sugestao // devolver o numero único

    }

    let preco = <?php echo $preco; ?>;

    valor = 2
    if (URL.includes('sorteio')) {

        setTimeout(function () {
    
            div1            = document.querySelector('.d1')
            div2            = document.querySelector('.d2')
            div3            = document.querySelector('.d3')
            personalizado   = document.querySelector('.d4')
    
    
            opcao1     = document.querySelector('.n1').innerHTML.split("</small>")[1]
            opcao2     = document.querySelector('.n2').innerHTML.split("</small>")[1]
            opcao3     = document.querySelector('.n3').innerHTML.split("</small>")[1]
            opcao4     = document.querySelector('.n4').innerHTML.split("</small>")[1]
             
            participar = document.querySelector('.participar')
    
            valorInput = document.querySelector('.valorInput')
            qtdCotas   = document.querySelector('.qtdCotas')
            cotas      = document.querySelector('.cotas') 
    
            intervalo = ''
    
            let numerosEscolhidos = document.querySelector('.num')
    
            div1.addEventListener("click", function() {
                
                aCotas               = []
                valor                = (preco * opcao1)
                participar.innerHTML = 'PARTICIPAR AGORA <i class="bi bi-check-circle"></i>&nbsp; (R$ ' + valor.toLocaleString('pt-br', {minimumFractionDigits: 2}) + ')'
                qtd                  = valor / preco
    
                valorInput.setAttribute('value', valor)
                qtdCotas.setAttribute('value', qtd)
                
                for(i = 0; i < qtd; i++){
    
                    numero = criarUnico()
                    aCotas.push(numero)
    
                }
    
                cotas.setAttribute('value', aCotas)
                novasCotas = cotas.value.split(",")
                numerosEscolhidos.innerHTML = ''
    
                for(i = 0; i < novasCotas.length; i++){
    
                    numerosEscolhidos.innerHTML += '<li>' + novasCotas[i] + '</li>'
    
                }
    
                document.querySelector('.efetuar-pagamento').addEventListener("click", function() {
    
                    document.querySelector('.qrcode').style.display = 'block'
                    document.querySelector('.efetuar-pagamento').style.display = 'none'
    
                })
                
                efetuarPagamento = document.querySelector
                div1.classList.add("mais-popular")
                div2.classList.remove("mais-popular")
                div3.classList.remove("mais-popular")
                personalizado.classList.remove("mais-popular")
                participar.setAttribute('data-target', '#exampleModalCenter')
    
                document.querySelector('.w100').setAttribute('src', 'libs/img/pagamentos/1.jpg')
                document.querySelector('.codPag').setAttribute('value', '00020101021126580014br.gov.bcb.pix013686fec364-80bd-43f4-bef5-c3186b6a3d6c52040000530398654041.605802BR5925Bruno Victor Ferreira Da 6009SAO PAULO622905251G92HTPMYY4BCVQDPX3WDQGW3630437C3')
    
            });
    
            div2.addEventListener("click", function() {
    
                aCotas               = []
                valor                = (preco * opcao2)
                participar.innerHTML = 'PARTICIPAR AGORA <i class="bi bi-check-circle"></i>&nbsp; (R$ ' + valor.toLocaleString('pt-br', {minimumFractionDigits: 2}) + ')'
                qtd                  = valor / preco
    
                valorInput.setAttribute('value', valor)
                qtdCotas.setAttribute('value', qtd)
                
                for(i = 0; i < qtd; i++){
    
                    numero = criarUnico()
                    aCotas.push(numero)
    
                }
    
                cotas.setAttribute('value', aCotas)
                novasCotas = cotas.value.split(",")
                numerosEscolhidos.innerHTML = ''
                
    
                for(i = 0; i < novasCotas.length; i++){
    
                    numerosEscolhidos.innerHTML += '<li>' + novasCotas[i] + '</li>'
    
                }
    
                document.querySelector('.efetuar-pagamento').addEventListener("click", function() {
    
                    document.querySelector('.qrcode').style.display = 'block'
                    document.querySelector('.efetuar-pagamento').style.display = 'none'
    
                })
                
                efetuarPagamento = document.querySelector
                div1.classList.remove("mais-popular")
                div2.classList.add("mais-popular")
                div3.classList.remove("mais-popular")
                personalizado.classList.remove("mais-popular")
                participar.setAttribute('data-target', '#exampleModalCenter')
    
                document.querySelector('.w100').setAttribute('src', 'libs/img/pagamentos/2.jpg')
                document.querySelector('.codPag').setAttribute('value', '00020101021126580014br.gov.bcb.pix013686fec364-80bd-43f4-bef5-c3186b6a3d6c52040000530398654044.005802BR5925Bruno Victor Ferreira Da 6009SAO PAULO622905251G92HWAHDTH01GXWFW1JP84416304EDE4')
    
            });
    
            div3.addEventListener("click", function() {
                aCotas               = []
                valor                = (preco * opcao3)
                participar.innerHTML = 'PARTICIPAR AGORA <i class="bi bi-check-circle"></i>&nbsp; (R$ ' + valor.toLocaleString('pt-br', {minimumFractionDigits: 2}) + ')'
                qtd                  = valor / preco
    
                valorInput.setAttribute('value', valor)
                qtdCotas.setAttribute('value', qtd)
                
                for(i = 0; i < qtd; i++){
    
                    numero = criarUnico()
                    aCotas.push(numero)
    
                }
    
                cotas.setAttribute('value', aCotas)
                novasCotas = cotas.value.split(",")
                numerosEscolhidos.innerHTML = ''
                
    
                for(i = 0; i < novasCotas.length; i++){
    
                    numerosEscolhidos.innerHTML += '<li>' + novasCotas[i] + '</li>'
    
                }
                document.querySelector('.efetuar-pagamento').addEventListener("click", function() {
    
                    document.querySelector('.qrcode').style.display = 'block'
                    document.querySelector('.efetuar-pagamento').style.display = 'none'
    
                })
                
                efetuarPagamento = document.querySelector
                div1.classList.remove("mais-popular")
                div2.classList.remove("mais-popular")
                div3.classList.add("mais-popular")
                personalizado.classList.remove("mais-popular")
                participar.setAttribute('data-target', '#exampleModalCenter')
    
                document.querySelector('.w100').setAttribute('src', 'libs/img/pagamentos/3.jpg')
                document.querySelector('.codPag').setAttribute('value', '00020101021126580014br.gov.bcb.pix013686fec364-80bd-43f4-bef5-c3186b6a3d6c52040000530398654048.005802BR5925Bruno Victor Ferreira Da 6009SAO PAULO622905251G92HXRZN3JJA0HNK1GPA2Z066304B72C')
            });
    
            personalizado.addEventListener("click", function() {
    
                aCotas               = []
                valor                = (preco * opcao4)
                participar.innerHTML = 'PARTICIPAR AGORA <i class="bi bi-check-circle"></i>&nbsp; (R$ ' + valor.toLocaleString('pt-br', {minimumFractionDigits: 2}) + ')'
                qtd                  = valor / preco
    
                valorInput.setAttribute('value', valor)
                qtdCotas.setAttribute('value', qtd)
                
                for(i = 0; i < qtd; i++){
    
                    numero = criarUnico()
                    aCotas.push(numero)
    
                }
    
                cotas.setAttribute('value', aCotas)
                novasCotas = cotas.value.split(",")
                numerosEscolhidos.innerHTML = ''
                
    
                for(i = 0; i < novasCotas.length; i++){
    
                    numerosEscolhidos.innerHTML += '<li>' + novasCotas[i] + '</li>'
    
                }
    
                document.querySelector('.efetuar-pagamento').addEventListener("click", function() {
    
                    document.querySelector('.qrcode').style.display = 'block'
                    document.querySelector('.efetuar-pagamento').style.display = 'none'
    
                })
    
                efetuarPagamento = document.querySelector
                div1.classList.remove("mais-popular")
                div2.classList.remove("mais-popular")
                div3.classList.remove("mais-popular")
                personalizado.classList.add("mais-popular")
                participar.setAttribute('data-target', '#exampleModalCenter')
    
                document.querySelector('.w100').setAttribute('src', 'libs/img/pagamentos/4.jpg')
                document.querySelector('.codPag').setAttribute('value', '00020101021126580014br.gov.bcb.pix013686fec364-80bd-43f4-bef5-c3186b6a3d6c520400005303986540516.005802BR5925Bruno Victor Ferreira Da 6009SAO PAULO622905251G92HZTPJFX7YG65SWFF7PV6K6304DF53')
            })
    
        }, 1000)

    }// if (URL.includes('sorteio'))

    document.addEventListener("DOMContentLoaded", function(e) {

        let addCotas = document.querySelectorAll('button.add-cotas')
        let seqCotas = document.querySelectorAll('.cotasA')
        qtd          = document.querySelector('select.qtdCotass').value

        for (e = 0; e < addCotas.length; e++) {

            addCotas[e].addEventListener("click", () => {

                aCotas = []

                for (i = 0; i < qtd; i++) {

                    numero = criarUnico()
                    aCotas.push(numero)
                    console.log("numero", numero)
                }
                setTimeout(function () {
                    seqCotas[1].setAttribute('value', aCotas)
                }, 2000)
            })

        }// for (e = 0; e < addCotas.length; e++)
    });
    
</script>