<html>
    <head>
        <?php $this -> load -> view('head'); ?>
    </head>
    <body>
        <div class="la-anim-1"></div>
        <div id="header">
            <div id="site-title">
                <div align="center">
                    <h3 style="background:white"><a href="#"><img src="<?php echo $this->config->item('project_url')?>/images/logo_combined.png" /></a></h3>
                </div>

            </div>

            <?php
                if(isset($hide_menu)==false){
                    $this -> load -> view('header');
            } ?>
        </div>
        <div id="contentView">
            <?php $this -> load -> view($contentView); ?>
        </div>
        <div id="footer">
            <?php $this -> load -> view('footer'); ?>
        </div>
        <?php $this -> load -> view('modals'); ?>
    </body>
</html>
