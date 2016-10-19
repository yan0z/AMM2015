<div id="menu">
    <ul id="navigationUser" >
        <li><a href="../php/index.php?page=user" ><strong>Home</strong></a></li>
        <li class="<?= $vd->getSottoPagina() == 'servizi' ? 'current_page_item' : '' ?>"><a href="index.php?page=user&subpage=servizi<?= $vd->scriviToken('?')?>"><strong>Camere e prezzi</strong></a></li>
        <li class="<?= $vd->getSottoPagina() == 'staff' ? 'current_page_item' : '' ?>"><a href="index.php?page=user&subpage=staff<?= $vd->scriviToken('?')?>"><strong>Il nostro staff</strong></a></li>
        <li class="<?= $vd->getSottoPagina() == 'about' ? 'current_page_item' : '' ?>"><a href="index.php?page=user&subpage=about<?= $vd->scriviToken('?')?>"><strong>About</strong></a></li>
        <li class="logout"><a href="user?cmd=logout"><strong>Logout</strong></a> </li> 
    </ul>
</div>