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
                    <li class="active">
                        <a href="<?php echo site_url('clients/boards/index/notes'); ?>"> <i class="menu-icon fa fa-dashboard"></i>Notes </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('clients/boards/index/tasks'); ?>"> <i class="menu-icon fa fa-spinner"></i>Tasks </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('clients/boards/index/links'); ?>"> <i class="menu-icon fa fa-id-badge"></i>Links </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('clients/boards/index/diary'); ?>"> <i class="menu-icon fa fa-book"></i>Diary </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('clients/boards/index/bcard'); ?>"> <i class="menu-icon fa fa-id-card-o"></i>Business Card </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->