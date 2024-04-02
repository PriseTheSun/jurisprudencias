<?php
include 'components/modal/modal_inteiro_teor.php';
include 'components/modal/modal_ementa.php';
include 'components/modal/modal_impressao_intero_teor.php';
include 'components/modal/modal_impressao_listagem_modulo.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/date-picker/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="assets/jquery-confirm/v3.3.4/jquery-confirm.min.css">
    <link rel="stylesheet" href="css/style.css" />

    <title>Jurisprudências</title>
</head>


<body id="jurisprudencias_wp">
    <div id="loader_easy" style="display: none;"></div>
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">
                    <img id="logo-jurisprudencia" src="assets/img/logo-branca.svg" alt="Logo_EasyJur" />
                </span>
            </div>
        </nav>
    </header>
    <section class="row justify-content-center">
        <div class="card mt-3 col-12">
            <div class="card-body">
                <div class="d-flex align-items-baseline justify-content-between">
                    <h1 class="fs-3 titulo-modulo">Jurisprudências</h1>
                    <button class="btn botao-impressora d-flex align-items-center justify-content-center" type="submit" style="height: 3rem; width: 3rem" title="Imprimir Jurisprudências" data-bs-toggle="modal" data-bs-target="#imprimi_listagem">
                        <i class="fa-solid fa-print"></i>
                    </button>
                </div>

                <form class="row mt-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="jurisprudencia" placeholder="Pesquisar Ementa ou Acordão" value="" />
                    </div>

                    <div class="col-md-3 margem-personalizada inative">
                        <input type="text" class="form-control" id="inner-input" placeholder="Contendo as palavras (e)" value="" />
                    </div>

                    <div class="col-md-3 margem-personalizada inative">
                        <input type="text" class="form-control" id="" placeholder="Sem conter as palavras (não)" value="" />
                    </div>

                    <div class="col-md-3 mt-3 inative">
                        <input type="text" class="form-control" id="cod_processo" placeholder="Número do Processo" value="" />
                    </div>

                    <div class="col-md-3 mt-3 inative">
                        <input type="text" class="form-control" id="orgao_judicante" placeholder="Órgão Judicante" value="" />
                    </div>

                    <div class="col-md-3 mt-3 inative">
                        <input type="tetx" class="form-control" id="relator" placeholder="Ministro Relator" value="" />
                    </div>

                    <div class="col-md-3 mt-3 inative">
                        <input type="text" class="form-control" id="datainicio_pub" placeholder="Data Inicial da Publicação" value="" />
                    </div>

                    <div class="col-md-3 mt-3 inative">
                        <input type="text" class="form-control" id="datafim_pub" placeholder="Data Final da Publicação" value="" />
                    </div>

                    <div class="col-md-3 mt-3 inative">
                        <input type="text" class="form-control" id="datainicio_jul" placeholder="Data Inicial do Julgamento" value="" />
                    </div>

                    <div class="col-md-3 mt-3 inative">
                        <input type="text" class="form-control" id="datafim_jul" placeholder="Data Final do Julgamento" value="" />
                    </div>

                    <div class="col-md-3 mt-3 inative">
                        <input type="email" class="form-control" id="classe-processo" placeholder="Classe Processual" value="" />
                    </div>

                    <div id="acoes" class="col-md-6 margem-personalizada">
                        <div class="d-flex gap-2">
                            <button class="btn botao-pesquisa d-flex align-items-center justify-content-center gap-2" type="submit" style="height: 2rem; width: 12rem" title="Imprimir Jurisprudências">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <span class="d-none d-md-block">Pesquisar</span>
                            </button>
                            <button class="btn botao-limpa-filtro d-flex align-items-center justify-content-center gap-2" type="submit" style="height: 2rem; width: 12rem" title="Imprimir Jurisprudências">
                                <i class="fa-solid fa-eraser"></i>
                                <span class="d-none d-md-block">Limpar Filtro</span>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="row align-items-center justify-content-between mt-3">
                    <div class="checkboxes d-flex align-items-center gap-2 col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" />
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                STJ
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate" />
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                TST
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <select class="form-select margem-personalizada" aria-label="Default select example">
                            <option selected>Ordernar por</option>
                            <option value="1">Mais Recente</option>
                            <option value="2">Mais Antigo</option>
                        </select>
                    </div>
                </div>

                <div class="mt-3 ativador-pesquisa-avancada">
                    <a id="pesquisa_avancada" class="link-pesquisa" href="#" onclick="mostraPesquisaAvacada();"><i id="icone_seta" class="fa-solid fa-arrow-down"></i> Pesquisa
                        Avançada
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="row justify-content-center">
        <div class="card mt-3">
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="header-tabela-personalizado">
                        <tr>
                            <th style="width: 25%">Processo</th>
                            <th style="width: 60%">Ementa</th>
                            <th style="width: 15%">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="body-tabela-personalizado">
                        <tr>
                            <td class="d-flex flex-column">
                                <span class="dado-tabela">
                                    <span id="processo" class="titulo">Processo:</span>
                                    <span>consectetur adipisicing</span>
                                </span>
                                <span class="dado-tabela">
                                    <span id="orgao" class="titulo">Órgão:</span>
                                    <span>consectetur adipisicing</span></span>
                                <span class="dado-tabela">
                                    <span id="orgao_judicante" class="titulo">Órgão Judicante:</span>
                                    <span>consectetur adipisicing</span></span>
                                <span class="dado-tabela">
                                    <span id="ministro_relator" class="titulo">Ministro Relator:</span>
                                    <span>consectetur adipisicing</span></span>

                                <span class="dado-tabela">
                                    <span id="data_pubicacao" class="titulo">Data Publicação:</span>
                                    <span>21/03/2024</span></span>
                                <span class="dado-tabela">
                                    <span id="data_fim_pubicacao" class="titulo">Data Final da Publicação:</span>
                                    <span>28/03/2024</span></span>

                                <span class="dado-tabela">
                                    <span id="dataj" class="titulo">Data do Julgamento:</span>
                                    <span>20/05/2024</span></span>
                                <span class="dado-tabela">
                                    <span id="dataj" class="titulo">Data Final do Julgamento:</span>
                                    <span>03/07/2024</span></span>

                                <a class="icon-link d-none" href="#"><i class="fa-solid fa-download "></i> Download da decisão
                                </a>
                            </td>

                            <td>
                                <div class="previa-ementa" onclick="mostraPreviaEmenta();">
                                    Lorem@@@@ ipsum dolor sit amet consectetur adipisicing elit.
                                    Provident voluptate ullam ea! Ut sunt nemo aliquam molestiae
                                    dignissimos. Ducimus sequi molestiae fuga, omnis illum fugit
                                    odio corporis facere sed tempora! Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit. Provident voluptate ullam ea!
                                    Ut sunt nemo aliquam molestiae dignissimos. Ducimus sequi
                                    molestiae fuga, omnis illum fugit odio corporis facere sed
                                    tempora! Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Provident voluptate ullam ea! Ut sunt nemo aliquam
                                    molestiae dignissimos. Ducimus sequi molestiae fuga, omnis
                                    illum fugit odio corporis facere sed tempora!
                                </div>
                                <a class="icon-link d-none" data-bs-toggle="modal" data-bs-target="#ementa_completa" style="cursor: pointer">
                                    <i class="fa-regular fa-eye"></i> Ver ementa completa</a>
                            </td>
                            <td>
                                <div class="conteudo-botoes d-flex align-items-center justify-content-center w-100">
                                    <div class="grid-acoes">
                                        <button class="btn botao-primario d-none" data-bs-toggle="modal" data-bs-target="#visualiza_documento" style="width: 3rem" title="Inteiro teor">
                                            <i class="fa-solid fa-book"></i>
                                        </button>
                                        <button class="btn botao-secundario d-none" style="width: 3rem" title="Imprimir" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#imprimi_intero_teor">
                                            <i class="fa-solid fa-print"></i>
                                        </button>
                                        <button class="btn botao-primario d-none" style="width: 3rem" onclick="copiaEmenta();" title="Copiar ementa">
                                            <i class="fa-regular fa-copy"></i>
                                        </button>
                                        <button class="btn botao-primario d-none" style="width: 3rem" onclick="copiaInformacoesDoProcesso();" title="Copiar informações do processo">
                                            <i class="fa-solid fa-copy"></i>
                                        </button>


                                        <!--Ver dados do processo-->
                                        <button class="btn botao-primario" style="width: 3rem" title="Ver dados do processo">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex align-items-center justify-content-center">
                    <footer aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#">Anterior</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Proxímo</a>
                            </li>
                        </ul>
                    </footer>
                </div>
            </div>
        </div>

    </section>

    <script src="assets/jquery/jquery-3.7.1.min.js"></script>
    <script src="assets/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="assets/date-picker/jquery-ui.min.js"></script>
    <script src="assets/jquery-mask/1.14.16/jquery.mask.min.js"></script>
    <script src="assets/html2pdfjs/html2pdf.bundle.min.js"></script>
    <script src="assets/jquery-confirm/v3.3.4/jquery-confirm.min.js"></script>
    <script src="script/script.js"></script>


</body>

</html>