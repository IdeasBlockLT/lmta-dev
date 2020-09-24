<footer class="container w-90 mt-3 p-2 mx-auto pt-4">
<?php get_template_part('parts/footer-menu') ?>
    <div class="row mx-auto pt-3">
        <div class="col custom-footer">
            <?php echo '&copy' . get_the_date('Y') ?>
            <?php if (is_active_sidebar('footer')): ?>

                <?php dynamic_sidebar('footer'); ?>
                <?php bloginfo('name'); ?>
            <?php endif ?>
<!--            <span class="horizontal-line">text</span>-->
        </div>
    </div>
</footer>
</div>
</main>
<?php include 'parts/scripts.php'; ?>
</body>
</html>