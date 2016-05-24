<!DOCTYPE html>
<html>

    <?php 
        session_start(); 
        include ('../master/header.php'); 
        include ('../master/top_menu.php');
    ?>

    <body>
	<div id="content">
            <?php include ('../master/sideDx.php'); ?>
            <div id="contentx">
                <div class="box">
       
                    <h3>Ricerca Prenotazione</h3>
                    
                    <form action="../userFunction/function.php" method="post" id="ricerca">
                        <table>
                            <tr>
                                <td>
                                    <label>Nome <span ></span></label>
                                </td>

                                <td>
                                    <input type="text" name="nome" id="nome" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Cognome <span></span></label>
                                </td>

                                <td>
                                    <input type="text" name="cognome" id="cognome" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Data Arrivo<span></span></label>
                                </td>

                                <td>
                                    <input type="date" name="arrivo" id="arrivo" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="submit" name="ricerca" value="ricerca" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                
                <div id="result"></br>  
                </div>  
            </div>  
        </div>

        
        <script type="text/javascript">  
            $('#ricerca').submit( 
                function(event)
                {
                    event.preventDefault();  
                    term = $(this).serialize(); 
                    url = $(this).attr('action');  
                    $.post(  
                        url,  
                        term,  
                        function(data)
                        {
                            $('#result').html(data);
                        }  
                        ).error(
                            function()
                            {
                                $('#result').html('Impossibile inviare il modulo');
                            }
                            )  
                }  
                )
        </script> 
        <?php include('../inc/footer.php');?>  
    </body> 
</html> 