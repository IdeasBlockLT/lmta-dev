<?php

$a = new resourcespaceNew();
//dd($a->search('pyragas'));


?>


<div class="mx-auto order-3 order-md-1 text-center wrap">
    <div class="search custom-grid">
        <form action="wp-json/api/search" method="post">
            <input type="text"
                   class="searchTerm backgroundColor-<?= !empty($args['input-color']) ? 'blue color-white' : ' ' . 'color-black__holder' ?>"
                   placeholder="<?= ($args['placeholder']) ?> "
                   size="4"
            >
            <button type="submit"
                    class="searchButton backgroundColor-<?= !empty($args['input-color']) ? 'blue' : 'white' . ' color-black' ?>"
            >
                <i class="fa fa-search fa-flip-horizontal"></i>
            </button>
        </form>
    </div>
</div>