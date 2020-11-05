<footer class="container w-90 mt-3 p-2 mx-auto pt-4 border-top">
    <?php get_template_part('parts/footer-menu') ?>
    <div class="row mx-auto pt-3">
        <div class="col custom-footer">
            <span style="padding-right: 5px!important;">
            <?php echo '&copy '; ?>
            </span>
            <?php if (is_active_sidebar('footer')): ?>
                <?php dynamic_sidebar('footer'); ?>
                <?php bloginfo('name'); ?>
            <?php endif ?>
            <?php echo ("Lietuvos teatros ir muzikos akademija. ".get_the_date('Y')); ?>
        </div>
    </div>
</footer>
</div>
</main>
<?php include 'parts/scripts.php'; ?>
</body>
</html>