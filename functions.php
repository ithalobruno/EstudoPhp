<?php
function MontaMenu($sqgrupologado)
{
  $Menus1 = VWCarregaMenu::Where(["nivelmenu"=>1, "sqgrupo"=>$sqgrupologado])->order("nome");
  if(isset($Menus1))
  {
    echo '<aside class="main-sidebar">
    <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
    <li class="treeview">
    <a href="#">';

    foreach ($Menus1 as $menu1)
    {
      if ($menu1->temsubmenu == 1)	{
        echo'
        <li class="treeview">
        <a href="#">
        <i class="'.$menu1->class.'"></i> <span>'.$menu1->nome.'</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">';
        MontaMenuNivel2($menu1->sqmenu);
        echo '</ul>
        </li>
        </li>';
       
      }
      else {
        echo '<li><a href="'.$menu1->link.'"><i class"'.$menu1->class.'"></i> <span>'. $menu1->nome.'</span></a></li>';
      }
    }
    echo '</ul>
    </section>
    </aside>';  
  }
}

function MontaMenuNivel2($sqmenu1)
{
  $Menus2 = VWCarregaMenu::Where(["submenu"=>$sqmenu1, "nivelmenu"=>2]);
  if(isset($Menus2))
  {
    foreach ($Menus2 as $menu2)
    {
      if ($menu2->temsubmenu == 1)	{
      }
      else {
        echo '<li><a href="'.$menu2->link.'"> <i class="'.$menu2->class.'"></i> <span>'. $menu2->nome.'</span></a></li>';
      }
    }
  }
}

function MontaMenuAdministrador()
{
  $Menus1 = Menu::Where(["nivelmenu"=>1])->order("nome");
  if(isset($Menus1))
  {
    echo '<aside class="main-sidebar">
    <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
    <li class="treeview">
    <a href="#">';


    foreach ($Menus1 as $menu1)
    {
     if ($menu1->temsubmenu == 1) 
     {
      echo '
      <li class="treeview"> 
      <a href="#">
      <i class="'.$menu1->class.'"></i> <span>'.$menu1->nome.'</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">';
      MontaMenuAdministradorNivel2($menu1->sqmenu);
      echo '</ul>
      </li>
      </li>';
    } 

    else {
      echo '<li><a href="'.$menu1->link.'"><i class"'.$menu1->class.'"></i> <span>'. $menu1->nome.'</span></a></li>';
    }
  }

  echo '</ul>
  </section>
  </aside>';
}
}

function MontaMenuAdministradorNivel2($sqmenu1)
{
  $Menus2 = Menu::Where(["submenu"=>$sqmenu1, "nivelmenu"=>2])->order("ordem");
  if(isset($Menus2))
  {
    foreach ($Menus2 as $menu2)
    {
      if ($menu2->temsubmenu == 1)	{
      }
      else {
        echo '<li><a href="'.$menu2->link.'"> <i class="'.$menu2->class.'"></i> <span>'. $menu2->nome.'</span></a></li>';
      }
    }
  }
}
?>
