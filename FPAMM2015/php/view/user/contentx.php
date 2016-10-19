<div id="contentx">
    <div class="box">
        <h2>Il B&B - AMM</h2>
        <img src="../images/casa.jpg" class="illustrazione" alt="La casa">
        <br/>
        <p>Situato in uno dei migliori quartieri di Cagliari ma lontano dal frastuono cittadino.<br/>
           La villa, in stile moderno/rustico, offre tutto quello che un visitatore può sperare.
           Anche se risulta vicino al centro, e' in una zona tranquilla dove i nostri visitatori possono godersi il sole e il cielo di Cagliari magari a bordo piscina.
           Completa di tutti i confort (Piscina, sdraio, aria condizionata, wi-fi, lavatrice) a prezzi vantaggiosi gode di un ottimo staff pronto a soddisfare le vostre esigente.
           Venite a trovarci.
        </p>
        <div class="tblhomeuser">
        <ul>
            <li class="<?= $vd->getSottoPagina() == 'prenota' ? 'current_page_item' : '' ?>"><a href="index.php?page=user&subpage=prenota<?= $vd->scriviToken('?')?>"><strong>Prenota</strong></a></li>
            <li class="<?= $vd->getSottoPagina() == 'visualizzaPrenotazione' ? 'current_page_item' : '' ?>"><a href="index.php?page=user&subpage=visualizzaPrenotazione<?= $vd->scriviToken('?')?>"><strong>Le mie Prenotazioni</strong></a></li>
        </ul>
        </div>
    </div>
</div>
      
                 