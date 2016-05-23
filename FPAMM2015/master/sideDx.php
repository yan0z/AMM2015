<div id="menu-sx">
    <?php if(isset($_SESSION['logged']) == false): ?>
        <p> <strong>B&B-AMM</strong></p>
    <?php endif;?>

    <?php if(isset($_SESSION['logged'])): ?>
        <p><strong>Bentornato:</br></strong> <?=$_SESSION['username'];?></p>
        
        <?php if($_SESSION['livello'] == "admin"): ?>
            <ul>  
                <li><a href="../adminFunction/deleteBooking.php"><strong>Cancella Prenotazioni</strong></a></li> 
                <li><a href="../adminFunction/serchBooking.php"><strong>Ricerca Prenotazioni</strong></a></li> 
            </ul>
        
        <?php else: ?>
            <ul>
                <li><a href="../userFunction/booking.php"><strong>Prenota</strong></a></li>
                <li><a href="../userFunction/viewBooking.php"><strong>Riepilogo prenotazioni</strong></a></li>
            </ul>  
        <?php endif;?>
    <?php endif;?>
 </div>


 

