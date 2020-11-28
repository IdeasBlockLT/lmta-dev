<?php
    if (isset($args['one-line'])){
        $col = $args['one-line'];
    }else{
        $col = 'col-md-6';
    }
?>
<div class="<?php echo $col; ?> mx-auto">
    <div class="mb-4 custom-size" style="text-align: right">
        <strong><label class="mr-4" for="Vaizdavimas"
                       style="display: inline"><?php pll_e('Vaizdavimas');?></label>
        </strong>
<!--        autofocus="true"-->
        <button type="button" data-checked="true" name="switch" value="1"
                class="inputs" id="horizontal">
            <i class="fas fa-grip-horizontal" style="color: black"></i>
        </button>
        <button type="button" name="switch" value="1"
                class="inputs" id="vertical">
            <i class="fas fa-grip-lines"></i>
        </button>
    </div>
</div>