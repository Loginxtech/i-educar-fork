function resetCampos() {
    let inMotivo_generic = $j('#inMotivo_GENERIC');
    let inMotivo_transferencia = $j('#inMotivo_TRANSFERENCIA');
    let inMotivo_deslocamento  = $j('#inMotivo_DESLOCAMENTO');
    let inMotivo_Intencao      = $j('#inMotivo_INTENCAO');

    inMotivo_transferencia.val("");
    inMotivo_deslocamento.val("");
    inMotivo_Intencao.val("");

    inMotivo_transferencia.attr('disabled', 'disabled');
    inMotivo_deslocamento.attr('disabled', 'disabled');
    inMotivo_Intencao.attr('disabled', 'disabled');

    inMotivo_generic.css('display', 'block');
    inMotivo_transferencia.css('display', 'none');
    inMotivo_deslocamento.css('display', 'none');
    inMotivo_Intencao.css('display', 'none');
}

function HandleMotivoTransferencia() {
    let inFase = $j('#inFase').val();
    let inMotivo_generic = $j('#inMotivo_GENERIC');
    let inMotivo_transferencia = $j('#inMotivo_TRANSFERENCIA');
    let inMotivo_deslocamento  = $j('#inMotivo_DESLOCAMENTO');
    let inMotivo_Intencao      = $j('#inMotivo_INTENCAO');

    resetCampos();

    if (inFase != "" && inFase != null) {

        if (inFase == 8) {
            inMotivo_generic.attr('disabled', 'disabled');
            inMotivo_generic.css('display', 'none');
            inMotivo_deslocamento.removeAttr('disabled');
            inMotivo_deslocamento.css('display', 'block');
        } else if (inFase == 9) {
            inMotivo_generic.attr('disabled', 'disabled');
            inMotivo_generic.css('display', 'none');
            inMotivo_Intencao.removeAttr('disabled');
            inMotivo_Intencao.css('display', 'block');
        } else {
            inMotivo_generic.attr('disabled', 'disabled');
            inMotivo_generic.css('display', 'none');
            inMotivo_transferencia.removeAttr('disabled');
            inMotivo_transferencia.css('display', 'block');
        }
    }
}

$j(document).ready(function () {
    $j('#inFase').change(function () {
        HandleMotivoTransferencia();
    });
});
