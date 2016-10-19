<div id="contentx">
    <div class="box">
        <h2>Gestione sito B&B - AMM</h2>
        <p>In questa pagina potrai gestire le prenotazioni presso il tuo B&B<br/></p>
        <ul id="navigation2">
            <li class="<?= $vd->getSottoPagina() == 'visualizzaPrenotazioneAdmin' ? 'current_page_item' : '' ?>"><a href="index.php?page=admin&subpage=visualizzaPrenotazioneAdmin<?= $vd->scriviToken('?')?>"><strong>Elenco Prenotazioni</strong></a></li>
        </ul>
    </div>
</div>
