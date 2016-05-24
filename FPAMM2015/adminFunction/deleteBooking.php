<!DOCTYPE html>
<?php
    session_start(); 
    include ('../master/header.php'); 
    include ('../master/top_menu.php');
?>

<body>
    <div id="contenitore">
        <?php include ('../master/sideDx.php'); ?>
            <div id="content">
		<div class="box">
                    <p> Cliccando su Cancella Prenotazioni è possibile cancellare tutte le prenotazioni effettuate </p>
                    <input id="cancella" type="submit" name="cancella" value="Cancella Prenotazioni"/>  
                    <div id="result"> </div>	
		</div>
            </div>
    </div>

    <script type="text/javascript">
        $(document).ready
        (
            function()
            {
                $('input[id="cancella"]').click
                (
                    function()
                    {
                       $.ajax
                        (
                            {
                                type: 'POST',
                                url:  '../adminFunction/delete.php',
                                data: 
                                {
                                    "delete": true
                                },
                                success: function(data)
                                { 
                                    $('#result').html(data);
                                    $('#result').html("Cancellazione Effettuata"); 
                                },
                                error:  function(data) 
                                { 
                                    console.debug('Errore durante la cancellazione');
                                } 
                            }
                        );
                    }
                );
            }
        );
    </script>
    <?php include('../master/footer.php');?>
</body>