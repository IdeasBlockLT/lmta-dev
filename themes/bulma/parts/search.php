<div class="mx-auto order-3 order-md-1 text-center wrap">
    <div class="search custom-grid">
        <input type="text"
               class="searchTerm backgroundColor-<?= !empty($args['input-color']) ? 'blue color-white' : ' ' . 'color-black__holder' ?>"
               placeholder="<?= ($args['placeholder']) ?>"
            >
        <button type="submit"
                class="searchButton backgroundColor-<?= !empty($args['input-color'])  ? 'blue' : 'white' . ' color-black' ?>"
            >
            <i class="fa fa-search fa-flip-horizontal"></i>
        </button>
    </div>
</div>