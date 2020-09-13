<?php get_template_part('parts/footer-menu') ?>

<footer class="mt-3 p-2">
    <div class="row text-left">
        <div class="col custom-footer">
            <?php if (is_active_sidebar('footer')): ?>
                <?php echo '&copy' . get_the_date('Y') ?>
                <?php ltrim(dynamic_sidebar('footer')); ?>
                <?php bloginfo('name'); ?>
            <?php endif ?>

        </div>
    </div>
</footer>
</div>
<?php include 'parts/scripts.php'; ?>
</body>
</html>