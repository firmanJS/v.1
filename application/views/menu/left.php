<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="side-menu">
      <li style="text-align:center">
        <img class="gbr-prof" src="gbr/user/<?php echo $user_foto; ?>" alt=""><br>
        <p style="margin-top:10px; text-align:center;font-weight: 600;">
          <?php echo $namalengkap; ?>
        </p>
      </li>
      <? foreach ($menu['menu'] as $m) { ?>
        <? if(count($menu['submenu'][$m->id]) == 0) { ?>
          <li><a href="<? echo $m->target; ?>"><i class="fa <? echo $m->icon; ?>"></i> <? echo $m->nama; ?> </a></li>
        <? }else{ ?>
          <li><a href=""><i class="fa <? echo $m->icon; ?>"></i> <? echo $m->nama; ?> <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <? foreach ($menu['submenu'][$m->id] as $s) { ?>
                <li><a href="<? echo $m->target.'/'.$s->target; ?>">
                  <i class="fa <? echo $s->icon; ?>"></i> <? echo $s->nama; ?></a></li>
              <? } ?>
            </ul>
          </li>
        <? } ?>
      <? } ?>
    </ul>
  </div>
</nav>
