function bloqueiaCamposQuantidade() {
  $j('#coat_pants_qty').val('').attr('disabled', 'disabled');
  $j('#shirt_short_qty').val('').attr('disabled', 'disabled');
  $j('#shirt_long_qty').val('').attr('disabled', 'disabled');
  $j('#socks_qty').val('').attr('disabled', 'disabled');
  $j('#shorts_tactel_qty').val('').attr('disabled', 'disabled');
  $j('#shorts_coton_qty').val('').attr('disabled', 'disabled');
  $j('#sneakers_qty').val('').attr('disabled', 'disabled');
  $j('#kids_shirt_qty').val('').attr('disabled', 'disabled');
  $j('#pants_jeans_qty').val('').attr('disabled', 'disabled');
  $j('#skirt_qty').val('').attr('disabled', 'disabled');
  $j('#coat_jacket_qty').val('').attr('disabled', 'disabled');
  return true;
}

function liberaCamposQuantidade() {
  $j('#coat_pants_qty').val('').removeAttr('disabled');
  $j('#shirt_short_qty').val('').removeAttr('disabled');
  $j('#shirt_long_qty').val('').removeAttr('disabled');
  $j('#socks_qty').val('').removeAttr('disabled');
  $j('#shorts_tactel_qty').val('').removeAttr('disabled');
  $j('#shorts_coton_qty').val('').removeAttr('disabled');
  $j('#sneakers_qty').val('').removeAttr('disabled');
  $j('#kids_shirt_qty').val('').removeAttr('disabled');
  $j('#pants_jeans_qty').val('').removeAttr('disabled');
  $j('#skirt_qty').val('').removeAttr('disabled');
  $j('#coat_jacket_qty').val('').removeAttr('disabled');
}


function escondeCamposItens() {
  $j('#coat_pants_qty').closest('tr').hide();
  $j('#shirt_short_qty').closest('tr').hide();
  $j('#shirt_long_qty').closest('tr').hide();
  $j('#socks_qty').closest('tr').hide();
  $j('#shorts_tactel_qty').closest('tr').hide();
  $j('#shorts_coton_qty').closest('tr').hide();
  $j('#sneakers_qty').closest('tr').hide();
  $j('#kids_shirt_qty').closest('tr').hide();
  $j('#pants_jeans_qty').closest('tr').hide();
  $j('#skirt_qty').closest('tr').hide();
  $j('#coat_jacket_qty').closest('tr').hide();
  return true;
}

function apresentaCamposItens() {
  $j('#coat_pants_qty').closest('tr').show();
  $j('#shirt_short_qty').closest('tr').show();
  $j('#shirt_long_qty').closest('tr').show();
  $j('#socks_qty').closest('tr').show();
  $j('#shorts_tactel_qty').closest('tr').show();
  $j('#shorts_coton_qty').closest('tr').show();
  $j('#sneakers_qty').closest('tr').show();
  $j('#kids_shirt_qty').closest('tr').show();
  $j('#pants_jeans_qty').closest('tr').show();
  $j('#skirt_qty').closest('tr').show();
  $j('#coat_jacket_qty').closest('tr').show();
  return true;
}


$j(document).ready(function () {
  $j('#kit_size').closest('tr').hide();

  if ($j('#kit_type').val() == 1)
    bloqueiaCamposQuantidade();

  if ($j('#kit_type').val() == 2 || $j('#kit_type').val() == 3)  {
    escondeCamposItens();
    $j('#kit_size').closest('tr').show();
  }

  $j('#kit_type').on('change', function () {
    if ($j('#kit_type').val() == 1) {
      bloqueiaCamposQuantidade();
      apresentaCamposItens();
      $j('#kit_size').closest('tr').hide();
    }
    else if ($j('#kit_type').val() == 2 || $j('#kit_type').val() == 3) {
      escondeCamposItens();
      $j('#kit_size').closest('tr').show();
    }
    else {
      liberaCamposQuantidade();
      apresentaCamposItens();
      $j('#kit_size').closest('tr').hide();
    }
  });

  if ($j('#type').val() != 'Entregue')
    $j("#distribution_date").closest('tr').hide();

  $j('#type').on('change', function () {
    if ($j('#type').val() == 'Entregue') {
      $j("#distribution_date").closest('tr').show();
      $j('#distribution_date').attr('required', 'required');
    } else {
      $j("#distribution_date").closest('tr').hide();
      $j('#distribution_date').removeAttr('required');
    }
  });
  $j("#ref_cod_instituicao").trigger("chosen:updated");
  $j("#ref_cod_escola").trigger("chosen:updated");
})

