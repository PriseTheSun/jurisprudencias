$(document).ready(function () {
  $("#cod_processo").mask("0#");
});

function mostraPesquisaAvacada() {
  $(".inative").toggle();
  $("#acoes").toggleClass("mt-3");
  $("#icone_seta").toggleClass("fa-arrow-down fa-arrow-up");
}

function mostraMaisEmenta() {
  $("#ementa_descricao").toggleClass("expandir");
  $("#mostra_menos").toggleClass("fa-square-caret-down fa-square-caret-up");
}

function mostraMaisAcordao() {
  $("#acordao_descricao").toggleClass("expandir");
  $("#mostra_menos_acordao").toggleClass(
    "fa-square-caret-down fa-square-caret-up"
  );
}

function mostraPreviaEmenta() {
  $(".previa-ementa").toggleClass("mostrar-tudo");
}

function copiaEmenta() {
  mostraAlerta("As informações da ementa foram copiadas com sucesso.");
}

function copiaAcordao() {
  mostraAlerta("As informações do acordão foram copiadas com sucesso.");
}

function copiaInformacoesDoProcesso() {
  mostraAlerta("As informações do processo foram copiadas com sucesso.");
}

function imprimiInteroTeor() {
  var opcoes = {
    margin: 1,
    filename: "interero teor easyjur.pdf",
    image: { type: "jpeg", quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
  };

  html2pdf()
    .set(opcoes)
    .from($("#div_intero_teor_impressao")[0])
    .toPdf()
    .get("pdf")
    .then(function (pdf) {
      window.open(pdf.output("bloburl"), "_blank");
    });
}

function imprimiListagem() {
  var opcoes = {
    margin: 1,
    filename: "relação jurisprudências easyjur.pdf",
    image: { type: "jpeg", quality: 0.98 },
    html2canvas: { scale: 2 },
    jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
  };

  html2pdf()
    .set(opcoes)
    .from($("#div_listagem_impressao")[0])
    .toPdf()
    .get("pdf")
    .then(function (pdf) {
      window.open(pdf.output("bloburl"), "_blank");
    });
}

function inicialisaCalendarioNosInputs(selector) {
  $(selector).datepicker({
    dateFormat: "dd/mm/yy",
    dayNames: [
      "Domingo",
      "Segunda",
      "Terça",
      "Quarta",
      "Quinta",
      "Sexta",
      "Sábado",
    ],
    dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
    dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
    monthNames: [
      "Janeiro",
      "Fevereiro",
      "Março",
      "Abril",
      "Maio",
      "Junho",
      "Julho",
      "Agosto",
      "Setembro",
      "Outubro",
      "Novembro",
      "Dezembro",
    ],
    monthNamesShort: [
      "Jan",
      "Fev",
      "Mar",
      "Abr",
      "Mai",
      "Jun",
      "Jul",
      "Ago",
      "Set",
      "Out",
      "Nov",
      "Dez",
    ],
    nextText: "Próximo",
    prevText: "Anterior",
    changeYear: true,
    yearRange: "c-100:c+20",
  });
}

$(function () {
  inicialisaCalendarioNosInputs("#datainicio_pub");
  inicialisaCalendarioNosInputs("#datafim_pub");
  inicialisaCalendarioNosInputs("#datainicio_jul");
  inicialisaCalendarioNosInputs("#datafim_jul");
});

function mostraAlerta(content) {
  $.alert({
    title: '<img src="assets/img/logo.png" style="width: 135px">',
    content: content,
    buttons: {
      alert: {
        text: "OK",
        btnClass: "btn-blue",
      },
    },
  });
}
