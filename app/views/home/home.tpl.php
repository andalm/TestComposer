
<h4><?= $titulo ?></h4>

<?php
    echo App\Library\HtmlHelper::anchorTagList([
        'Contactanos' => '/clase2PHP/contactos',
        'Respuesta en JSon' => '/clase2PHP/contactos/json',
        'Respuesta en XML' => '/clase2PHP/contactos/xml',
        'Respuesta en String' => '/clase2PHP/contactos/string',
        'Integracion Bootstrap' => '/clase2PHP/contactos/bootstrap',
    ], 'p')
?>
