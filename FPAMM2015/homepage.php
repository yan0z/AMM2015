<!doctype html>
<html>
    <head>
        <title>FP AMM</title>
        <meta name="keywords" content="HTML">
        <meta name="Author" content="Stefano Carta 48554">
        <meta name="description" content=Progetto finale AMM">
        <link rel="stylesheet" type="text/css" href="Css/style2.css" media="screen">
    </head>
    
    <body>
        <!--Divisione della pagina con body e sotto sezioni-->
        <div id="allPage">
            <header>
                <div class="social">
                    <ul>
                        <li id="facebook">
                            <a href="www.facebook.com">facebook</a>
                        </li>
                        <li id="twitter">
                            <a href="www.twitter.com">twitter</a>
                        </li>
                    </ul>
                </div>
                
                <!--Sotto sezione header-->
                <div id="header">
                    <!--Sotto sezione title-->
                    <div id="title">
                        <h1>B & B AMM</h1>
                    </div>
                </div>
            </header>
            
            <!--Sotto sezione per il corpo della pagina-->
            <div id="bodyPage">
                <!--Sotto sezione Sinistra-->
                <div id="sideSX">
                    <ul>
                        <li class="serch">
                            <h3 id="serch">Ricerca avanzata</h3>
                        </li>
                        <ul>
                            <li class="formPrezzo">
                                <h5>Prezzo:</h5>
                                <div id="pay">
                                    <form method="get" action="homepage.php">
                                        <label for="minimo">Minimo:</label>
                                        <input name="minimo" id="minimo" 
                                       type="text"/>
                                        <label for="massimo">Massimo:</label>
                                        <input name="massimo" id="massimo" type="text"/>
                                    </form>
                                </div>
                            </li>
                            <hr/>
                            <li class="formRooms">
                                <h5>Posti letto per camera:</h5>
                                <p id="room">
                                    <label for="1">1</label>
                                    <input type="radio" name="number"
                                    id="1Numbers" value="1">
                                    <label for="2">2</label>
                                    <input type="radio" name="number"
                                    id="2Numbers" value="2">
                                    <label for="3">3</label>
                                    <input type="radio" name="number"
                                    id="3Numbers" value="3">
                               </p>
                            </li>
                            <hr/>
                            <li class="child">
                                <h5>Presenza di bambini ( et&agrave; < 10 )</h5>
                                <p id="child">
                                    <label for="Si">Si</label>
                                    <input type="radio" name="child"
                                    id="siChild" value="Si">
                                    <label for="No">No</label>
                                    <input type="radio" name="child"
                                    id="noChild" value="No">
                                </p>
                            </li>
                            <hr/>
                            <li class="date">
                                <h5>Inserisci la data:</h5>
                                    <h6>Arrivo:</h6>
                                    <p id="day">
                                        <h7>Giorno:</h7>
                                        <select name="arrivoGiorno" id="dayAP">
                                            <option value="0"> </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </p>
                                    
                                    <p id="mm">
                                        <h7>Mese:</h7>
                                        <select name="arrivoMese" id="allSelect">
                                            <option value="0"> </option>
                                            <option value="gen">Gen</option>
                                            <option value="feb">Feb</option>
                                            <option value="mar">Mar</option>
                                            <option value="apr">Apr</option>
                                            <option value="mag">Mag</option>
                                            <option value="giu">Giu</option>
                                            <option value="lug">Lug</option>
                                            <option value="ago">Ago</option>
                                            <option value="set">Set</option>
                                            <option value="ott">Ott</option>
                                            <option value="nov">Nov</option>
                                            <option value="dic">Dic</option>
                                        </select>
                                    </p>
                                    
                                    <p id="yy">
                                        <h7>Anno:</h7>
                                        <select name="arrivoAnno" id="allSelect">
                                            <option value="0"> </option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </p>
                                    <hr/>
                                    <h6>Partenza:</h6>
                                    
                                    <p id="dayP">
                                        <h7>Giorno:</h7>
                                        <select name="partenzaGiorno" id="dayAP">
                                            <option value="0"> </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </p>
                                    
                                    <p id="mmP">
                                        <h7>Mese:</h7>
                                        <select name="partenzaMese" id="allSelect">
                                            <option value="0"> </option>
                                            <option value="gen">Gen</option>
                                            <option value="feb">Feb</option>
                                            <option value="mar">Mar</option>
                                            <option value="apr">Apr</option>
                                            <option value="mag">Mag</option>
                                            <option value="giu">Giu</option>
                                            <option value="lug">Lug</option>
                                            <option value="ago">Ago</option>
                                            <option value="set">Set</option>
                                            <option value="ott">Ott</option>
                                            <option value="nov">Nov</option>
                                            <option value="dic">Dic</option>
                                        </select>
                                    </p>
                                    
                                    <p id="yyP">
                                        <h7>Anno:</h7>
                                        <select name="partenzaAnno" id="allSelect">
                                            <option value="0"> </option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </p>
                            </li>
                            <button type="submit" id="buttonCerca">CERCA</button>
                        </ul>
                    </ul>
                </div>  <!Chiusura sideSX-->
                
                <!Sotto sezione centrale-->
                <div id="center">
                    <h1>
                        B & B AMM
                    </h1>
                   
                    <div id="img">
                        
                    </div>
                    
                    <p id="description">
                        <i>Il B & B AMM &egrave; situato a Cagliari, in una zona tranquilla. 
                        Trattasi di Villa singola, al piano terra, circondata sui quattro lati da ampio giardino.
                        La casa &egrave; accogliente negli interni e dotata di tutti i comforts.
                        Dispone di camere con bagno privato e aria condizionata, 
                        ampio soggiorno, veranda esterna e posto auto, 
                        circondato da giardino nel quale potrete gustare la colazione e usufruire del barbecue 
                        per eventuali grigliate o fare una doccia esterna, dotata di acqua calda, al ritorno dal mare. 
                        Una vera oasi di tranquillit&agrave;, ideale per una vacanza di puro relax lontano dal traffico del centro.
                        </i>
                    </p>
                    
                    <div id="panel">
                        <ul id="list">
                            <li id="rooms">
                                <h2>
                                    <a href="camere.php" target="_blank">Le Nostre Camere</a>
                                </h2>
                            </li>
                            
                            <li id="intorni">
                                <h2>
                                    <a href="posto.php" target="_blank">Il Posto</a>
                                </h2>
                            </li>
                            
                            <li id="staff">
                                <h2>
                                    <a href="staff.php" target="_blank">Il Nostro Staff</a>
                                </h2>
                            </li>
                        </ul>
                    </div>
                </div>  <!--Chiusura centrare-->
                
                <!Sotto sezione Destra-->
                <div id="sideDX">
                    <ul>
                        <li class="login">
                            <h3 id="login">Login</h3>
                        </li>
                        
                        <li class="formLogin">
                            <div id="formLogin">
                                <form method="post" action="login">
                                    <label for="username">User:</label>
                                    <input name="username" id="dati" type="text"/>
                                    <label for="password">Password:</label>
                                    <input name="password" id="dati" type="password"/>
                                    <button type="submit" id="buttonLogin" value="login">LOGIN</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <hr/>
                    <ul>
                        <li class="registrazione">
                            <h3 id="registrazione">Registrati</h3>
                        </li>
                        <li class="formRegistrazione">
                            <div id="formRegistrazione">
                                <form method="post" action="registra">
                                    <label for="nome">Nome:</label>
                                    <input name="nome" id="dati" type="text"/>
                                    <label for="cognome">Cognome:</label>
                                    <input name="cognome" id="dati" type="text"/>
                                    <label for="username">User:</label>
                                    <input name="username" id="dati" type="text"/>
                                    <label for="password">Password:</label>
                                    <input name="password" id="dati" type="password"/>
                                    <label for="email">Email:</label>
                                    <input name="email" id="dati" type="text"/>
                                    <button type="submit" id="buttonReg" value="registra">REGISTRATI</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                    
                    
                </div>  <!Chiusura sideDX-->
   
            </div>
           
        </div>
        
    </body>
    
</html>
