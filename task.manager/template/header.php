<div class="header">
    <div class="logo"><img src="/img/logo.png" width="68" height="23" alt="Project"></div>
    <div class="clearfix"></div>
</div>

<div class="clearfix">
    <ul class="main-menu">
        <?php
            $arr = arraySort($mainMenu, 'asc');
            renderMenu( $arr, '16px');
        ?>
    </ul>
</div>