<div id="menu">
    <ul id="navigation" >
        <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=admin<?= $vd->scriviToken('?')?>"><strong>Home</strong></a></li>
        <li class="<?= $vd->getSottoPagina() == 'about' ? 'current_page_item' : '' ?>"><a href="index.php?page=admin&subpage=about<?= $vd->scriviToken('?')?>"><strong>About</strong></a></li>
        <li class="logout"> <a href="admin?cmd=logout"><strong>Logout</strong></a></li> 
    </ul>
</div>
