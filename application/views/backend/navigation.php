<?php
$controller = "";
if ($user_type == 'parent') {
  $controller = 'parents';
} else {
  $controller = $user_type;
}
?>

<style>
  .leftside-menu {
    background-color: #f8f9fa;
    /* Light background */
    padding: 20px 15px;
    width: 250px;
    transition: all 0.3s ease;
  }

  .leftside-menu-detached.show {
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
    margin-left: -54px;
    margin-top: -10px;
  }

  .leftbar-user {
    text-align: center;
    margin-bottom: 20px;
  }

  .leftbar-user img {
    border: 2px solid #ddd;
    margin-bottom: 10px;
  }

  .leftbar-user-name {
    display: block;
    font-size: 18px;
    font-weight: 600;
    color: #333;
  }

  .side-nav {
    padding-left: 0;
    list-style: none;
  }

  .side-nav-title {
    font-size: 14px;
    font-weight: bold;
    color: #888;
    margin-bottom: 15px;
  }

  .side-nav-item {
    margin-bottom: 5px;
  }

  .side-nav-link {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    text-decoration: none;
    color: #333;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.2s;
    border-radius: 8px;
  }

  .side-nav-link i {
    font-size: 16px;
    margin-right: 10px;
  }

  .side-nav-link:hover {
    background-color: #FFDFE8;
    color: #333;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  }

  .side-nav-link.active {
    background-color: #FFDFE8;
    color: #FF4B8B;
    font-weight: 600;
  }

  .menu-arrow {
    margin-left: auto;
    transition: transform 0.3s;
  }

  .collapse.show .menu-arrow {
    transform: rotate(-90deg);
  }

  .side-nav-second-level {
    list-style: none;
    padding-left: 20px;
    margin-top: 5px;
  }

  .side-nav-third-level {
    list-style: none;
    padding-left: 25px;
  }

  .side-nav-second-level li a,
  .side-nav-third-level li a {
    font-size: 13px;
    color: #666;
    padding: 8px 0;
    display: block;
    text-decoration: none;
    transition: all 0.3s;
  }

  .side-nav-second-level li a:hover,
  .side-nav-third-level li a:hover {
    color: #FF4B8B;
  }

  /* Submenu transition */
  .collapse {
    transition: all 0.3s ease;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .leftside-menu {
      width: 100%;
    }
  }
</style>

<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu leftside-menu-detached">

  <div class="leftbar-user">
    <a href="javascript: void(0);">
      <img src="<?php echo $this->user_model->get_user_image($this->session->userdata('user_id')); ?>" alt="user-image"
        height="42" class="rounded-circle shadow-sm">
      <?php
      $user_details = $this->user_model->get_user_details($this->session->userdata('user_id'));
      ?>
      <span class="leftbar-user-name"><?php echo $user_details['name']; ?></span>
    </a>
  </div>
  <!--- Sidemenu -->
  <ul class="side-nav">
    <li class="side-nav-title side-nav-item py-2"><?php echo get_phrase('MENU'); ?></li>
    <li class="side-nav-item">
      <a href="<?php echo site_url($controller . '/dashboard'); ?>" class="side-nav-link py-2 active">
        <i class="dripicons-meter"></i>
        <span> <?php echo get_phrase('dashboard'); ?> </span>
      </a>
    </li>

    <?php
    $this->db->order_by('sort_order', 'asc');
    $main_menus = $this->db->get_where('menus', array('parent' => 0, 'status' => 1, $this->session->userdata('user_type') . '_access' => 1))->result_array();
    foreach ($main_menus as $main_menu) {
      ?>
      <li class="side-nav-item"><?php
      $this->db->order_by('sort_order', 'asc');
      $check_menus = $this->db->get_where('menus', array('parent' => $main_menu['id'], 'status' => 1, $this->session->userdata('user_type') . '_access' => 1));
      if ($check_menus->num_rows() > 0) { ?>
          <a data-bs-toggle="collapse" href="#<?php echo $main_menu['unique_identifier']; ?>" aria-expanded="false"
            aria-controls="<?php echo $main_menu['unique_identifier']; ?>" class="side-nav-link py-2">
            <i class="<?php echo $main_menu['icon']; ?>"></i>
            <span><?php echo get_phrase($main_menu['displayed_name']); ?></span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="<?php echo $main_menu['unique_identifier']; ?>">
            <ul class="side-nav-second-level">
              <?php $this->db->order_by('sort_order', 'asc'); ?>
              <?php $menus = $this->db->get_where('menus', array('parent' => $main_menu['id'], 'status' => 1, $this->session->userdata('user_type') . '_access' => 1))->result_array();
              foreach ($menus as $menu) {
                $this->db->order_by('sort_order', 'asc');
                $check_sub_menus = $this->db->get_where('menus', array('parent' => $menu['id'], 'status' => 1, $this->session->userdata('user_type') . '_access' => 1));
                if ($check_sub_menus->num_rows() > 0) { ?>
                  <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#<?php echo $menu['unique_identifier']; ?>" aria-expanded="false"
                      aria-controls="<?php echo $menu['unique_identifier']; ?>"><?php echo get_phrase($menu['displayed_name']); ?>
                      <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="<?php echo $menu['unique_identifier']; ?>">
                      <ul class="side-nav-third-level">
                        <?php
                        $this->db->order_by('sort_order', 'asc');
                        $sub_menus = $this->db->get_where('menus', array('parent' => $menu['id'], $this->session->userdata('user_type') . '_access' => 1))->result_array();
                        foreach ($sub_menus as $sub_menu) {
                          ?>
                          <li>
                            <?php
                            if ($menu['is_addon']) {
                              $route = 'addons/' . $sub_menu['route_name'];
                            } else {
                              $route = $controller . '/' . $sub_menu['route_name'];
                            }
                            ?>
                            <a href="<?php echo site_url($route); ?>"><?php echo get_phrase($sub_menu['displayed_name']); ?></a>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </li>
                <?php } else { ?>
                  <li>
                    <?php
                    if ($menu['is_addon']) {
                      $route = 'addons/' . $menu['route_name'];
                    } else {
                      $route = $controller . '/' . $menu['route_name'];
                    }
                    ?>
                    <a href="<?php echo site_url($route); ?>"><?php echo get_phrase($menu['displayed_name']); ?></a>
                  </li>
                <?php } ?>
              <?php } ?>
            </ul>
          </div>
        <?php } else { ?>
          <a href="<?php echo site_url($controller . '/' . $main_menu['route_name']); ?>" class="side-nav-link py-2">
            <i class="<?php echo $main_menu['icon']; ?>"></i>
            <span> <?php echo get_phrase($main_menu['displayed_name']); ?> </span>
          </a>
        <?php } ?>
      </li>
    <?php } ?>
  </ul>
</div>