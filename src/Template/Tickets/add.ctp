<?php
/**
  * @var \App\View\AppView $this
  */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subcategorias'), ['controller' => 'Subcategorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subcategoria'), ['controller' => 'Subcategorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tickets form large-9 medium-8 columns content">
    <?= $this->Form->create($ticket) ?>
    <fieldset>
        <legend><?= __('Add Ticket') ?></legend>
        <?php
            echo $this->Form->control('titulo', ['label' => 'Título']);
            echo $this->Form->control('texto', ['label' => 'Descrição']);
            echo $this->Form->control('categoria_id', ['options' => $categorias, 'label' => 'Categoria']);
            echo $this->Form->control('subcategoria_id', ['label' => 'Subcategoria']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>

subcategorias=<?php
echo json_encode($tudosubcategoria);
?>

//subcategorias = $.map(subcategorias, function(el) { return el });

function fillList( box, arr, idneh ) {
    box.find('option').remove();
    for ( i = 0; i < arr.length; i++ ) {
        if(arr[i]['categoria_id']==idneh){
            option = new Option( arr[i]['id']+" - "+arr[i]['descricao'], arr[i]['id'] );
            box.append(option);
        }
    }
    box.selectedIndex=0;
}

categoriainicial = $('#categoria-id').val();
fillList($('#subcategoria-id'), subcategorias, categoriainicial);
$('#categoria-id').change(function(e){
    categoriaatual = $('#categoria-id').val();
    fillList($('#subcategoria-id'), subcategorias, categoriaatual);
});
</script>