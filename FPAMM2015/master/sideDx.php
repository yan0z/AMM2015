<div id="menu-sx">

        <?php if(isset($_SESSION['logged']) == false): ?>

            <p> <strong>Wellcome to B&B - AMM</strong> </p>


        <?php endif;?>


        <?php if(isset($_SESSION['logged'])): ?>

   

	            <p><strong>Bentornato:</br></strong> <?php= $_SESSION['username'];?></p>

	            <p><strong>Grado:</br></strong> <?php= $_SESSION['livello'];?></p>


	        
                <?php if($_SESSION['livello'] == "admin"): ?>

                    <ul>  
                        <li><a href="../adminFunction/serchBooking.php"><strong>Cerca Prenotazioni</strong></a></li> 
                    <li><a href="../adminFunction/deleteBooking.php"><strong>Cancella Prenotazioni</strong></a></li> 
                    </ul>


        <?php else: ?>

                <ul>
                    <li><a href="../userFunction/booking.php"><strong>Prenota</strong></a></li>
                    <li><a href="../userFunction/viewBooking.php"><strong>Le mie Prenotazioni</strong></a></li>
                </ul>
               
        <?php endif;?>
        <?php endif;?>
     <ul>   
</ul>
 </div>

 

