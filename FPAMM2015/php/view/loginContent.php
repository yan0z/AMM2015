<html>
    <body> 
        <div id="contentx">
            <div class="box">
                <h1>Accedi ed effettua le tue prenotazioni!</h1>
                <table id="tbllogin">
                    <tr>
                        <td><div class="img"></div></td>
                        <td>
                            <div class="formlogin">
                                <form style="margin:20px 0 20px 0;" method="post" action="login">
                                    <input type="hidden" name="cmd" value="login">
                                    <label for="username">Username</label><br>
                                    <input type="text" name="username" id="username" class="username"/><br>
                                    <label for="password">Password </label><br>
                                    <input type="password" name="password" id="password" class="password"/><br>
                                    <div id="button_log">
                                        <input type="submit" value="Login"/>
                                    </div>
                                </form>
                            </div>
                            <?php
                                if ($vd->getMessaggioErrore() != null)
                                {?>
                                    <div class="error">
                                        <div><?=$vd->getMessaggioErrore();?></div>
                                    </div>
                                <?php
                                }
                            ?>
                        </td>
                        <td><div class="img"></div></td>
                    </tr>
                </table>
            </div>            
        </div>
    </body>
</html>
