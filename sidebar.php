<aside class="l-contents__right">
    <div class="l-sidebar">
        <span class="l-sidebar__batsu">
        </span>
        <a href="#">Menu</a>
        <?php
            if ( is_active_sidebar( 'menu_widget' ) ) :
                dynamic_sidebar( 'menu_widget' );
            else:
        ?>
        <div class="widget">
            <h2>No Widget</h2>
            <p>ウィジットは設定されていません。</p>
        </div>
        <?php endif; ?>
    </div>
    <div class="l-sidebar2">
    <span class="l-sidebar2__batsu"></span>
    </div>
</aside>