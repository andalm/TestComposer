<h4>Prueba Bootstrap</h4>

<?php 
    echo HtmlHelper::anchorTag(
        "#", 
        "Link Principal", 
        array(
            'class' => 'btn btn-primary btn-lg disabled',
            'role' => 'button',
        )
    ) 
?>

<?php 
    echo HtmlHelper::anchorTag(
        "#", 
        "Link", 
        array(
            'class' => 'btn btn-default btn-lg disabled',
            'role' => 'button',
        )
    ) 
?>