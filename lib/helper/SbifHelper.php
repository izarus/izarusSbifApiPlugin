<?php

function sbif_uf_actual()
{
  $template = '<span id="sbif_uf_actual">...</span>';
  $url = url_for('sbifdata/getUfActual');
  $script = <<<EOF
<script>
jQuery(document).ready(function(){
  jQuery.ajax({
    url: '$url',
    type: 'get',
    dataType: 'json',
    timeout: 5000,
    success: function(data){
      if (data.UFs) {
        jQuery('#sbif_uf_actual').text('$'+data.UFs[0].Valor);
      } else {
        jQuery('#sbif_uf_actual').text('No Disp.');
        console.log(data);
      }
    },
    error: function(object, textStatus){
      console.log('Error al obtener UF: '+textStatus);
      jQuery('#sbif_uf_actual').text('No Disp.');
    }
  });
});
</script>
EOF;
  return $template."\n".$script;
}

function sbif_dolar_actual()
{
  $template = '<span id="sbif_dolar_actual">...</span>';
  $url = url_for('sbifdata/getDolarActual');
  $script = <<<EOF
<script>
jQuery(document).ready(function(){
  jQuery.ajax({
    url: '$url',
    type: 'get',
    dataType: 'json',
    timeout: 5000,
    success: function(data){
      if (data.Dolares) {
        jQuery('#sbif_dolar_actual').text('$'+data.Dolares[0].Valor);
      } else {
        jQuery('#sbif_dolar_actual').text('No Disp.');
        console.log(data);
      }
    },
    error: function(object, textStatus){
      console.log('Error al obtener Dólar: '+textStatus);
      jQuery('#sbif_dolar_actual').text('No Disp.');
    }
  });
});
</script>
EOF;
  return $template."\n".$script;
}

function sbif_euro_actual()
{
  $template = '<span id="sbif_euro_actual">...</span>';
  $url = url_for('sbifdata/getEuroActual');
  $script = <<<EOF
<script>
jQuery(document).ready(function(){
  jQuery.ajax({
    url: '$url',
    type: 'get',
    dataType: 'json',
    timeout: 5000,
    success: function(data){
      if (data.Euros) {
        jQuery('#sbif_euro_actual').text('$'+data.Euros[0].Valor);
      } else {
        jQuery('#sbif_euro_actual').text('No Disp.');
        console.log(data);
      }
    },
    error: function(object, textStatus){
      console.log('Error al obtener Euro: '+textStatus);
      jQuery('#sbif_euro_actual').text('No Disp.');
    }
  });
});
</script>
EOF;
  return $template."\n".$script;
}

function sbif_utm_actual()
{
  $template = '<span id="sbif_utm_actual">...</span>';
  $url = url_for('sbifdata/getUtmActual');
  $script = <<<EOF
<script>
jQuery(document).ready(function(){
  jQuery.ajax({
    url: '$url',
    type: 'get',
    dataType: 'json',
    timeout: 5000,
    success: function(data){
      if (data.UTMs) {
        jQuery('#sbif_utm_actual').text('$'+data.UTMs[0].Valor);
      } else {
        jQuery('#sbif_utm_actual').text('No Disp.');
        console.log(data);
      }
    },
    error: function(object, textStatus){
      console.log('Error al obtener UTM: '+textStatus);
      jQuery('#sbif_utm_actual').text('No Disp.');
    }
  });
});
</script>
EOF;
  return $template."\n".$script;
}