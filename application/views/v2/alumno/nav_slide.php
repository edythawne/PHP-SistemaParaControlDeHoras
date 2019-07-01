<aside class="sidebar pos-absolute z-2" data-role="sidebar" data-toggle="#sidebar-toggle" id="sb">
    <div style="padding-bottom: 52px;">

    </div>
    <div class="sidebar-header" data-image="<?php echo img_url('wallpaper.jpg') ?>">
        <a href="/" class="fg-white sub-action" onclick="Metro.sidebar.close('#sb'); return false;"><span class="mif-arrow-left mif-2x"></span></a>
        <div class="avatar">
            <img src="<?php echo img_url('profile.png'); ?>">
        </div>
        <span class="title fg-white"><?php echo $_SESSION['nombre']; ?></span>
        <span class="subtitle fg-white"><?php echo $_SESSION['apellidos'];?></span>
    </div>
    <ul class="sidebar-menu">
        <li><a><span class="mif-home icon"></span>Home</a></li>
        <li><a><span class="mif-books icon"></span>Guide</a></li>
        <li><a><span class="mif-files-empty icon"></span>Examples</a></li>
        <li class="divider"></li>
        <li><a><span class="mif-images icon"></span>Icons</a></li>
    </ul>
</aside>