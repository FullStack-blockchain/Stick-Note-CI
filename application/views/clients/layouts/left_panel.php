        <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><!-- <img src="<?php echo site_url('images/logo.png'); ?>" alt="Logo"> --><?php echo APP_NAME; ?></a>
                <a class="navbar-brand hidden" href=""><!-- <img src="<?php echo site_url('images/logo2.png'); ?>" alt="Logo"> --><?php echo substr(APP_NAME, 0, 1); ?></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                        foreach ($lstmenus as $menu) {
                            $url = site_url('clients/boards/index/'.$menu['id']);
                            $cur_menu = ($menu['id'] === $menuitem['id']) ? true : false;
                    ?>
                            <li class="active">
                                <a href="<?php echo $url; ?>" <?php echo ($cur_menu) ? 'style="color: #dc3545 !important"' : ''; ?> > <i class="<?php echo $menu['menu_icon']; ?>" <?php echo ($cur_menu) ? 'style="color: #dc3545 !important"' : ''; ?> ></i><?php echo $menu['title']; ?> </a>
                            </li>
                    <?php
                        }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->