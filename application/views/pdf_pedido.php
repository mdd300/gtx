
<!doctype html>
<html lang="en" >
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?=base_url()?>public/assetsBoot/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


    <meta name="viewport" content="width=1024">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/assets/metronic/custom/css/Website/Pedido/style_pedido.css" rel="stylesheet" />

</head>
<body>

                        <div class="content" style="padding-top: 1px; width: 100%">
                            <div class="row" style="">
                                <div class="col-md-12" style="text-align: center">
                                    <p style="color: black"><b>AUTORIZAÇÃO PARA PRODUÇÃO</b></p>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-md-12" style="text-align: justify">
                                    <p>Obrigado por escolher a GTX SPORTS como fornecedora de seu uniforme esportivo.</p>
                                        <p>Abaixo estão todas as informações do processo de venda e que deverão ser LIDAS
                                            ATENTAMENTE, PREENCHIDAS e CONFERIDAS pelo CLIENTE-CONTRATANTE.</p>
                                    <p>As informações prestadas são de responsabilidade do CLIENTE-CONTRATANTE.</p>
                                       <p>O início da produção estará condicionado ao envio desta AUTORIZAÇÃO
                                        EXPRESSA, juntamente com a confirmação de pagamento para o e-mail do CONSULTOR
                                        GTX. </p>
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-md-12" style="text-align: center">
                                    <p style="color: black"><b>INFORMAÇÕES CADASTRAIS</b></p>
                                </div>
                            </div>
                            <div style="border: 1px solid black;margin-top: 15px">
                                <div class="row" style="border-bottom: 1px solid black; margin-left: 0px; margin-top: 5px;margin-bottom: 10px;">
                                    <div class="col-md-12">
                                        <div style="color: black; "><b>NOME/RAZÃO SOCIAL: </b><?= $cliente->cliente_nome?></div>
                                    </div>
                                </div>
                                <div class="row" style="border-bottom: 1px solid black;margin-left: 0px; margin-top: 5px;margin-bottom: 10px;">
                                    <div class="col-md-4" style="float: left">
                                        <div style="color: black"><b>CPF/CNPJ: </b><?= $cliente->cliente_doc?></div>
                                    </div>
                                    <div class="col-md-4" style="float: left">
                                        <div style="color: black"><b>RG/IE: </b><?= $cliente->cliente_rg?></div>
                                    </div>
                                    <div class="col-md-4" style="float: left">
                                        <div style="color: black" ><b>DATA NASC: </b><?= $cliente->cliente_nasc?></div>
                                    </div>
                                </div>
                                <div class="row" style="border-bottom: 1px solid black;margin-left: 0px; margin-top: 5px;">
                                    <div class="col-md-12">
                                        <div style="color: black"><b>ENDEREÇO: </b><?= $cliente->cliente_endereco?></div>
                                    </div>
                                </div>
                                <div class="row" style="border-bottom: 1px solid black;margin-left: 0px; margin-top: 5px;margin-bottom: 10px;">
                                    <div class="col-md-6">
                                        <div style="color: black"><b>COMPLEMENTO: </b><?= $cliente->cliente_complemento?></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div style="color: black"><b>BAIRRO: </b><?= $cliente->cliente_bairro?></div>
                                    </div>
                                </div>
                                <div class="row" style="border-bottom: 1px solid black;margin-left: 0px; margin-top: 5px;margin-bottom: 10px;">
                                    <div class="col-md-4">
                                        <div style="color: black"><b>CIDADE: </b><?= $cliente->cliente_cidade?></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div style="color: black"><b>ESTADO: </b><?= $cliente->cliente_estado?></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div style="color: black"><b>CEP: </b><?= $cliente->cliente_cep?></div>
                                    </div>
                                </div>
                                <div class="row" style="border-bottom: 1px solid black;margin-left: 0px; margin-top: 5px;margin-bottom: 10px;">
                                    <div class="col-md-12">
                                        <div style="color: black"><b>CONTATO: </b><?= $cliente->cliente_telefone?></div>
                                    </div>
                                </div>
                                <div class="row" style="border-bottom: 1px solid black;margin-left: 0px; margin-top: 5px;">
                                    <div class="col-md-12">
                                        <div style="color: black"><b>E-MAIL: </b><?= $cliente->cliente_email?></div>
                                    </div>
                                </div>
                            </div>
                        <p style="margin-top: 10px">
                            <input ng-model="check.check1" id="check1" type="checkbox" ng-if="check.check1 == 0" name="check" value="1"/>
                            <input ng-model="check.check1" ng-if="check.check1 == 1" id="check1" type="checkbox" checked="checked" name="check" value="1"/>
                            <label> O endereço de entrega é o mesmo informado acima.</label>
                            </p>

                            <div class="row" style="margin-top: 100px">
                                <div class="col-md-12" style="text-align: center">
                                    <p style="color: black"><b>PRODUTOS</b></p>
                                </div>
                            </div>

                            <div style="border: 1px solid black;margin-top: 15px">
                                    <?php foreach ($pedido->produtos as $key => $value) { ?>
                                <div style="border-bottom: 1px solid black;margin-left: 0px;">
                                        <div class="row" style="margin-top: 30px;">
                                            <div class="col-md-12" style="text-align: center">
                                                <p style="color: black"><b><?= $value->produto_nome ?></b></p>
                                            </div>
                                        </div>
                                    <div class="row"
                                         style=" margin-top: 5px;margin-bottom: 5px;margin-left: 10px; float: left; width: 100%">
                                <?php foreach ($value->imgs as $keyimg => $img) { ?>


                                            <div class="col-md-6" style="height: 250px !important; width: 250px; margin-bottom: 10px">
                                                    <img style="float:left;" width="250" height="250" src="<?= base_url('upload/produtos/img/' ).$img->src ?>">
                                            </div>
                                    <?php }?>
                                    </div>
                                </div>
                                    <?php }?>
                            </div>

                            <div class="row" style="margin-top: 30px">
                                <div class="col-md-12" style="text-align: center">
                                    <p style="color: black"><b>CONFERÊNCIA - CHECKLIST</b></p>
                                </div>
                            </div>

                            <ul style="margin-top: 15px">
                                <li><b style="color: black;"> COMO ESCLARECIDO PELO CONSULTOR, </b>as cores do UNIFORME visualizadas na
                                    tela pelo CLIENTE-CONTRATANTE podem sofrer pequenas variações em razão das
                                    diferenças de propriedade dos monitores (brilho, contraste, saturação, número
                                    de pixels, dentre outros) , e ainda, que poderão haver diferenças nas tonalidades
                                    de cores de acabamentos, e entre as peças que compõem o UNIFORME,
                                    tonalidade de camisa e calção por exemplo, devido aos diferentes tipos de
                                    matéria-prima utilizadas na produção desse tipo de material
                                    <input ng-model="check.check2" ng-if="check.check2 == 0" id="check2" type="checkbox" name="check" value="1"/>
                                    <input ng-model="check.check2" ng-if="check.check2 == 1" id="check2" type="checkbox" checked="checked" name="check" value="1"/>

                                    Ciente e de acordo
                                </li>
                                <li>
                                    As cores e o layout são os escolhidos
                                    <input ng-model="check.check3" ng-if="check.check3 == 0" id="check3" type="checkbox" name="check" value="1"/>
                                    <input ng-model="check.check3" ng-if="check.check3 == 1" id="check3" type="checkbox" checked="checked" name="check" value="1"/>
                                    Confere
                                </li>
                                <li>
                                    A GOLA é a escolhida?
                                    <input ng-model="check.check4" ng-if="check.check4 == 0" id="check4" type="checkbox" name="check" value="1"/>
                                    <input ng-model="check.check4" ng-if="check.check4 == 1" id="check4" type="checkbox" checked="checked" name="check" value="1"/>
                                    Confere
                                </li>
                                <li>
                                    Acabamento na MANGA (punho) é o escolhido?
                                    <input ng-model="check.check5" id="check5"  ng-if="check.check5 == 0"  type="checkbox" name="check" value="1"/>
                                    <input ng-model="check.check5" ng-if="check.check5 == 1" id="check5" type="checkbox" checked="checked" name="check" value="1"/>

                                    Confere
                                </li>
                                <li>
                                    O ESCUDO está de acordo?
                                    <input ng-model="check.check6" ng-if="check.check6 == 0" id="check6" type="checkbox" name="check" value="1"/>
                                    <input ng-model="check.check6" ng-if="check.check6 == 1" id="check6" type="checkbox" checked="checked" name="check" value="1"/>
                                    Confere
                                </li>
                                <li>
                                    A localização das logos, marca GTX e PATROCINADOR (es) e ESCUDO estão
                                    corretas?
                                    <input ng-model="check.check7" ng-if="check.check7 == 0" id="check7" type="checkbox" name="check" value="1"/>
                                    <input ng-model="check.check7" ng-if="check.check7 == 1" id="check7" type="checkbox" checked="checked" name="check" value="1"/>
                                    Confere
                                </li>
                                <li>
                                    Os posicionamentos do(s) NUMERO (s) e NOMES estão corretos?
                                    <input ng-model="check.check8" ng-if="check.check8 == 0" id="check8" type="checkbox" name="check" value="1"/>
                                    <input ng-model="check.check8" ng-if="check.check8 == 1" id="check8" type="checkbox" checked="checked" name="check" value="1"/>
                                    Confere
                                </li>
                                <li>
                                    A MODALIDADE do pacote está correta?
                                    <input ng-model="check.check9" ng-if="check.check9 == 0" id="check9" type="checkbox" name="check" value="1"/>
                                    <input ng-model="check.check9" ng-if="check.check9 == 1" id="check9" type="checkbox" checked="checked" name="check" value="1"/>
                                    Confere
                                </li>
                                <li>
                                    O TECIDO, grade DORÇO e grade PERNA estão corretas?
                                    <input ng-model="check.check10" ng-if="check.check10 == 0" id="check10" type="checkbox" name="check" value="1"/>
                                    <input ng-model="check.check10" ng-if="check.check10 == 1" id="check10" type="checkbox" checked="checked" name="check" value="1"/>
                                    Confere
                                </li>
                            </ul>

                            <div class="row" style="margin-top: 30px">
                                 <div class="col-md-12" style="text-align: center">
                                    <p style="color: black"><b>ORÇAMENTO</b></p>
                                </div>
                            </div>

                            <p>Sr(a). <?=$pedido->cliente_nome?>, segue o orçamento na forma em solicitada em, <?= $pedido->pedido_data?></p>

                            <table style="width: 100%">
                                    <tr style="">
                                        <th style="width: 50px;border: 2px solid black;text-align: center;">QTD</th>
                                        <th style="width: 200px;border: 2px solid black;text-align: center;">DESCRIÇÃO</th>
                                        <th style="width: 50px;border: 2px solid black;text-align: center;">VAL.UNIT</th>
                                        <th style="width: 50px;border: 2px solid black;text-align: center;">VALOR TOTAL</th>
                                    </tr>

                                <?php foreach ($pedido->produtos as $key => $value){
                                    $subtotal += ((float) str_replace(',', '.', $value->produto_preco)) * ((float) (count($value->camisas) + 0.00));
                                    ?>
                                <tr>
                                    <td style="border: 1px solid black"><?= count($value->camisas) ?></td>
                                    <td style="border: 1px solid black"><?= $value->produto_nome?></td>
                                    <td style="border: 1px solid black">R$<?= $value->produto_preco?></td>
                                    <td style="border: 1px solid black">R$<?= number_format((float) str_replace(',', '.', $value->produto_preco) * ((float) (count($value->camisas) + 0.00)) , 2, ',', '')?></td>
                                </tr>
                                <?php

                                }?>
                                <tr >
                                    <td style="border: 1px solid black">-</td>
                                    <td style="border: 1px solid black">Despesa com Frete</td>
                                    <td style="border: 1px solid black">-</td>
                                    <td style="border: 1px solid black">R$<?= $pedido->pedido_frete?></td>
                                </tr>
                            </table>
                            <div style="width: 100%;border: 1px solid black">
                                <div style="    width: 100%;float:right; text-align: right; margin-right: 40px">Subtotal: R$<?= number_format($subtotal + (float) str_replace(',', '.', $pedido->pedido_frete),2, ",", "") ?>
                                </div>
                                <?php if($pedido->pedido_desconto != 0){?>
                                <div style="    width: 100%;float:right; text-align: right; margin-right: 40px; color: red">Desconto: R$<?= $pedido->pedido_desconto ?>
                                </div>
                                <?php }?>
                                <div style="    width: 100%;float:right; text-align: right; padding-right: 40px;"><b style="color: black">TOTAL:</b> R$<?= number_format(((float) str_replace(',', '.', $subtotal) + (float) str_replace(',', '.', $pedido->pedido_frete) - (float) str_replace(',', '.', $pedido->pedido_desconto)),2, ",", "") ?>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 30px">
                                <div class="col-md-12" style="text-align: center">
                                    <p style="color: black"><b>LISTAGEM DE NOMES</b></p>
                                </div>
                            </div>

                            <p>TAMANHO DA CAMISA/NÚMERO/NOME E O TAMANHO DO SHORT</p>

                            <?php foreach ($pedido->produtos as $key => $value){
                            ?>
                                <div class="row" style="margin-top: 30px">
                                    <div class="col-md-12" style="text-align: center">
                                        <p><b>UNIFORME - <?= $value->produto_nome?></b></p>
                                    </div>
                                </div>
                            <table style="width: 100%">
                                <tr style="">
                                    <th style="width: 50px;border: 2px solid black;text-align: center;">Tamanho Camisa</th>
                                    <th style="width: 200px;border: 2px solid black;text-align: center;">Número</th>
                                    <th style="width: 50px;border: 2px solid black;text-align: center;">Nome na camisa</th>
                                    <th style="width: 50px;border: 2px solid black;text-align: center;"><?= $value->variacao_unidade?></th>
                                </tr>

                                <?php foreach ($value->camisas as $keyCam=> $valueCam){
                                ?>
                                    <tr>
                                        <td style="border: 1px solid black"><?= $valueCam->camisa_tamanho ?></td>
                                        <td style="border: 1px solid black"><?= $valueCam->camisa_numero?></td>
                                        <td style="border: 1px solid black"><?= $valueCam->camisa_nome?></td>
                                        <td style="border: 1px solid black"><?= $valueCam->camisa_short?></td>

                                    </tr>
                                    <?php
                                }?>
                            </table>
                                <?php
                            }?>
                            <p style="margin-top: 10px"><input ng-model="check.check11" ng-if="check.check11 == 0" id="check11" type="checkbox" name="check" value="1"/>
                                <input ng-model="check.check11" ng-if="check.check11 == 1" id="check11" type="checkbox" checked="checked" name="check" value="1"/>
                                O nome do time, as numerações, os nomes e os tamanhos estão de acordo. </p>

                            <div class="row" style="margin-top: 30px">
                                <div class="col-md-12" style="text-align: center">
                                    <p style="color: black"><b>DISPOSIÇÕES GERAIS</b></p>
                                </div>
                            </div>

                            <p>I - A GTX busca acompanhar as tendências e tecnologias acessíveis no mercado
                                para entregar um produto diferenciado e de QUALIDADE, trabalhando com
                                máxima informação, segurança e transparência, tendo como objetivo a
                                SATISFAÇÃO do CLIENTE-CONTRATANTE.</p>

                            <p> O LAYOUT do PRODUTO é escolhido pelo cliente e deverá ser
                                expressamente aprovado neste contrato, <b style="color: black;">sendo vedado a sua alteração após
                                    seu envio de autorização para a produção. </b></p>

                            <p>III – A CONFERENCIA e as INFORMAÇÕES prestadas pelo CLIENTE-CONTRATANTE
                                são de sua inteira responsabilidade, <b style="color: black;">sendo vedado a sua alteração após o seu
                                    envio de autorização para a produção.</b> </p>
                            <p>IV –<b style="color: black;"> O PEDIDO SOMENTE SEGUIRÁ PARA A PRODUÇÃO </b> após o envio deste
                                <b style="color: black;">contrato </b> devidamente preenchido pelo cliente, juntamente com o comprovante de
                                pagamento.</p>
                            <p>V – Identificada alguma irregularidade no pedido por CULPA DO
                                CLIENTE-CONTRATANTE ou alguma alteração em seu pedido, APÓS O ENVIO DA
                                AUTORIZAÇÃO PARA A PRODUÇÃO é de sua responsabilidade arcar com os custos
                                provenientes dessa alteração, <b style="color: black;"> se possível for.</b> </p>

                            <p>VI – Iniciada ou finda a produção do objeto deste contrato, identificada
                                alguma irregularidade/divergência no pedido por CULPA DO CLIENTECONTRATANTE,
                                <b style="color: black;"> NÃO HÁ QUE SE FALAR EM RESCISÃO CONTRATUAL ou
                                    DEVOLUÇÃO DE QUALQUER VALOR</b> pago antecipadamente. </p>

                            <p>VII – Após o ENVIO DA AUTORIZAÇÃO PARA PRODUÇÃO e do COMPROVANTE
                                DE PAGAMENTO, a GTX SPORTS tem o prazo de 25 dias úteis, considerando
                                estes os dias de funcionamento: de segunda a sexta-feira, <b style="color: black;"> para produção</b> e
                                despacho do material. Este prazo de produção e envio não se aplica para produtos
                                como AGASALHOS, BOLSAS OU MODELOS DE UNIFORMES QUE FOGEM AO
                                PADRÃO DO SIMULADOR ante a complexidade, individualidade e
                                especificidade da mercadoria que requer maior prazo para produção, <b style="color: black;"> o que
                                    será ajustado e previamente combinado entre as partes. </b></p>

                            <p>VIII – O CLIENTE-CONTRATANTE está ciente que as cores do UNIFORME visualizadas
                                na tela do seu computador podem sofrer pequenas variações em razão das
                                diferenças de propriedade e calibração dos monitores, e ainda, que poderão haver
                                diferenças nas tonalidades de cores de acabamentos, patchs, e entre as peças que
                                compõem o UNIFORME devido aos diferentes tipos de matéria-prima utilizadas na
                                produção do material.</p>

                            <p>IX – Finda a produção o CONSULTOR comunicará o CLIENTE-CONTRATANTE por
                                escrito, que deverá proceder ao pagamento do valor remanescente. <b style="color: black;">Após a
                                confirmação do pagamento do valor remanescente, a empresa GTX SPORTS
                                    enviará o produto no prazo de 01 (um) dia útil. </b></p>

                            <p>X - O modo de envio da mercadoria poderá se dar por diversas
                                transportadoras (LATAM, Águia Branca, entre outras no seguimento) possuindo
                                cada qual seu valor, prazo e extensão territorial de atendimento de seus serviços,
                                <b style="color: black;">não tendo a empresa GTX qualquer ingerência e responsabilidade por
                                estes fatores </b>, estando o cliente ciente desde o seu atendimento. O cálculo
                                do valor do frete é composto também pelo custo do translado da encomenda
                                até a transportadora e da filial da transportadora até o local de destino.</p>

                            <p>XI – Caso o PRODUTO não esteja em conformidade com o pedido autorizado,
                                o CLIENTE-CONTRATANTE deverá entrar em contato por escrito no PRAZO DE
                                07 DIAS DO RECEBIMENTO, por e-mail do CONSULTOR atendente que irá
                                autorizar/orientar como proceder a devolução do material, tendo a empresa
                                GTX SPORTS O PRAZO DE 30 DIAS PARA O REPARO, contados a partir do
                                recebimento da mercadoria, nos termos do Art. 18, §1º do Código de Defesa
                                do Consumidor.</p>
                            <p>XII – O uso do material comprova o aceite da mercadoria e revoga o direito
                                de reclamação de divergência do produto. </p>
                            <p style="    display: initial;">Eu,<input type="text" style="display: inline;width: 400px; border: 0px; border-bottom: 1px solid black" id="inputAss" ng-model="check.inputAss"> <a style="color: black;display: initial; font-weight: bold" ng-show="gerar == true">{{check.inputAss}}</a>
                                <b style="color: black;">DECLARO</b> ter prestado as informações e declarações acima, e estar ciente
                                das DISPOSIÇÕES GERAIS constantes neste instrumento e <b style="color: black;">AUTORIZO
                                    EXPRESSAMENTE A PRODUÇÃO DO MATERIAL CONTRATADO.</b> </p>
                        </div>

</body>

</html>