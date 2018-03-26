<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div><img src="<?php echo $this->users->get_model_by_username($this->session->userdata['logged_in']['username'])->get_avarta()?>" alt="user-img" class="img-circle"></div>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->users->get_model_by_username($this->session->userdata['logged_in']['username'])->full_name?> <span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="<?php echo base_url('admin/site/profile')?>"><i class="ti-user"></i> My Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url('admin/login/logout')?>"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li class="nav-small-cap m-t-10">--- Main Menu</li>
<!--            <li><a href="--><?php //echo base_url('admin/site')?><!--" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu">Dashboard</span></a></li>-->

            <?php foreach ($this->menus->show_menus() as $menu_id => $menu): ?>
                <li>
                    <a href="<?php echo !empty($menu['menu_link']) ? base_url($menu['menu_link']) : 'javascript:void(0)'?>" class="waves-effect"><i class="<?php echo $menu['menu_icon'] ?>" data-icon="v"></i> 
                        <span class="hide-menu"> <?php echo $menu['menu_name'] ?>
                            <?php if (!empty($menu['childs'])): ?>
                                <span class="fa arrow"></span>
                            <?php endif ?>
                        </span>
                    </a>
                    <?php if (!empty($menu['childs'])): ?>
                        <ul class="nav nav-second-level">
                            <?php foreach ($menu['childs'] as $child_id => $child): ?>
                                <li><a href=" <?php echo !empty($child['menu_link']) ? base_url($child['menu_link']) : 'javascript:void(0)'?>"><i class="<?php echo $child['menu_icon'] ?>" data-icon="v"></i> <?php echo $child['menu_name'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<!-- Left navbar-header end -->