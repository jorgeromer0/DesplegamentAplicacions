<link rel="stylesheet" href="../../recursos/css/view.css">


<div id="contingut" class="mx-auto text-md-center text-left">
        <form id="form_36249" class="appnitro mx-auto text-md-center text-left" action="processaProjecteAlumnat.php" method="POST" enctype="multipart/form-data">
                <div class="form_description">
                        <h2>Dades Projecte</h2>
                        <p></p>
                </div>
                <ul>

                        <li class="form-group mx-auto text-md-center text-left">
                                <label class="description" for="element_1">Titol </label>
                                <div>
                                        <input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value="" required />
                                </div>
                        </li>

                        <li class="form-group mx-auto text-md-center text-left">
                                <label class="description" for="element_8">Cicle Formatiu </label>
                                <div>
                                        <select class="element select medium" id="element_8" name="cicle">
                                                <option value="" selected="selected"></option>
                                                <option value="DAW">DAW</option>
                                                <option value="DAM">DAM</option>
                                                <option value="ASIR">ASIR</option>

                                        </select>
                                </div>
                        </li>
                        <li class="form-group mx-auto text-md-center text-left">
                                <label class="description" for="element_2">Curs </label>
                                <div>
                                        <select class="element select medium" id="exampleFormControlSelect1" name="curs" required>
                                                <option value="" selected="selected"></option>
                                                <option value="1">11/12</option>
                                                <option value="2">12/13</option>
                                                <option value="3">13/14</option>
                                                <option value="4">14/15</option>
                                                <option value="5">15/16</option>
                                                <option value="6">16/17</option>
                                                <option value="7">17/18</option>
                                                <option value="8">18/19</option>
                                                <option value="9">19/20</option>
                                                <option value="10">20/21</option>
                                                <option value="11">21/22</option>

                                        </select>
                                </div>
                        </li>
                        <li class="form-group mx-auto text-md-center text-left">
                                <label class="description" for="element_3">Descripcio </label>
                                <div>
                                        <textarea id="element_3" name="descripcio" class="element textarea medium" required></textarea>
                                </div>
                        </li>
                        <li class="form-group mx-auto text-md-center text-left">
                                <label class="description" for="element_4">Paraules Clau </label>
                                <div>
                                        <textarea id="element_4" name="paraula" class="element textarea small" required></textarea>
                                </div>
                        </li>
                        <li class="form-group mx-auto text-md-center text-left">
                                <label class="description" for="element_5">Nom professorat tutor </label>
                                <div>
                                        <input id="element_5" name="nomprofe" class="element text medium" type="text" maxlength="255" value="" required />
                                </div>
                        </li>
                        <li class="form-group mx-auto text-md-center text-left">
                                <label class="description" for="element_6">Cognoms professorat tutor
                                </label>
                                <div>
                                        <input id="element_6" name="cognomprofe" class="element text medium" type="text" maxlength="255" value="" required />
                                </div>
                        </li>
                        <li class="form-group mx-auto text-md-center text-left">
                                <label class="description" for="element_6">Email professorat tutor
                                </label>
                                <div>
                                        <input id="element_6" name="emailprofe" " class="element text medium" type="email" required />
                                </div>
                        </li>
                        <li class="form-group mx-auto text-md-center text-left">
                                <label class="description" for="the_file">Memoria del projecte (màx. 5MB) </label>
                                <div>
                                        <input id="element_7" name="the_file" class="element file" type="file" required />
                                </div>


                                <?php

                                $parametre = "";
                                if (isset($_GET['parametre'])) {
                                        $parametre = $_GET['parametre'];
                                }


                                if ($parametre == "errorproj") {
                                        echo '    <span class="errorMsg" id="validation">La memòria és massa gran</span>';
                                }


                                ?>

                        </li>

                        <li class="buttons form-group mx-auto text-md-center text-left">
                                <input type="hidden" name="form_id" value="36249" />

                                <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
                        </li>
                </ul>
        </form>

</div>