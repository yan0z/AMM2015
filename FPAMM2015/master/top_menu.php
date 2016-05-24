<!DOCTYPE html>
<html>
    <body>
        <div id="header" >
            <h1>B&B - AMM</h1>
            <img src="../images/sfondo.png" class="logo"/>
            <div id="logIn">
                <?php if (isset($_SESSION['logged'])):?>
                    <ul>     
                        <li>
                            <a href='../log/logOut.php'><span>Logout</span></a>
                        </li>
		    </ul>
	   
                <?php else: ?>
                    <ul>
                        <li>
                            <a href='../log/logIn.php'><span>Login</span></a>
                        </li>     
                    </ul>
                <?php endif; ?>
            </div>
	</div>

        <div id="header_2">
        </div>
        
        <div id="header_3">
        </div>

        <div id="content">
            <div id="menu">
                <ul id="navigation" >
                    <li><a href="../master/master.php" ><strong>Home</strong></a></li>
                    <li><a href="../master/servizi.php"><strong>Camere e prezzi</strong></a></li>
                    <li><a href="../master/staff.php"><strong>Il nostro staff</strong></a></li>
                </ul>
            </div>
	</div>
    </body>
</html>
