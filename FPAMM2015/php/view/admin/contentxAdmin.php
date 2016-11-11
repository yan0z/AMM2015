<div id="contentx">
    <div class="box">
        <h2>Gestione sito B&B - AMM</h2>
        <div class="box3">
            <img src="../images/casa.jpg" class="illustrazione" alt="La casa">
            <br/>
            <p>In questa pagina potrai gestire le prenotazioni effettuate presso il tuo B&B-AMM.<br/>
               Potrai visualizzare l'elenco di tutte le prenotazioni effettuate.<br/>
               Potrai cancellare ogni singola prenotazione oppure cancellare l'itero elenco.
            </p>
            <ul id="navigation2">
                <li class="<?= $vd->getSottoPagina() == 'visualizzaPrenotazioneAdmin' ? 'current_page_item' : '' ?>"><a href="index.php?page=admin&subpage=visualizzaPrenotazioneAdmin<?= $vd->scriviToken('?')?>"><strong>Elenco Prenotazioni</strong></a></li>
            </ul>
        </div>
    </div>
</div>
