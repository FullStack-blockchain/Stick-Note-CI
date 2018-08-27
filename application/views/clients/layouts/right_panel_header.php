    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger" id="btn_search_txt"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <?php echo form_open(site_url('clients/boards/index/'.$menuitem['id']), 'class="search-form" id="search_form"'); ?>
                                <input class="form-control mr-sm-2" type="text" value="<?php echo $search_txt; ?>" name="txt_search" id="txt_search" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo site_url('assets/imgs/admin.jpg'); ?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>
                                <a class="nav-link" href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->


        <div class="content breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $menuitem['name']; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title" style="margin-top: 10px;">
                        <?php echo form_open(site_url('clients/boards/export_to_csv'), 'class="" id="csv_form"'); ?>
                        <?php if($menuitem['id'] != TRASH_BOARD_ID ) { ?>
                        <button type="button" id="btn_notes" class="btn btn-primary" onclick="open_notes_dialog()" data-toggle="modal" data-target="#largeModal"><i class="fa fa-star"></i>&nbsp; <?php echo 'New '.$menuitem['name']; ?></button>
                        <?php } ?>
                        
                        <input type="hidden" value="<?php echo $menuitem['id']; ?>", id="csv_board_id" name="csv_board_id" />
                        <button type="submit" class="btn btn-success"><i class="fa fa-magic"></i>&nbsp; Export</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
