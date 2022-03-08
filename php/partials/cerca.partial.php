<style>
    input,
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .button_text {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .button_text:hover {
        background-color: #45a049;
    }

    form {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        margin: 20px;
        border: 1px solid black;
    }
</style>

<form action="../../php/visitant.php" method="POST" enctype="multipart/form-data">
    <h3>Criteris Cerca </h3>
    <div class="form-group">
        <div class="formbuilder-autocomplete form-group field-autocomplete-1646758384155">
            <label for="titol" class="formbuilder-autocomplete-label">Titol</label>
            <input type="text" name="title" class="form-control" >

        </div>
        <div class="form-group">
            <label for="select-1646758412136" class="formbuilder-select-label">Cicle Formatiu</label>
            <select class="form-control" name="ciclo" id="select-1646758412136">
                <option value="DAW" selected="true" id="select-1646758412136-0">DAW</option>
                <option value="DAM" id="select-1646758412136-1">DAM</option>
                <option value="ASIR" id="select-1646758412136-2">ASIR</option>
            </select>
        </div>
        <div class="form-group">
            <label for="select-1646758610900" class="formbuilder-select-label">Curs</label>
            <select class="form-control" name="curs" id="select-1646758610900">
                <option value="1" >11/12</option>
                <option value="2" >12/13</option>
                <option value="3">13/14</option>
                <option value="4" >14/15</option>
                <option value="5" >15/16</option>
                <option value="6" >16/17</option>
                <option value="7" >17/18</option>
                <option value="8" >18/19</option>
                <option value="9" >19/20</option>
                <option value="10" >20/21</option>
                <option value="11" >21/22</option>
            </select>
        </div>
        <div class="form-group">
            <label for="desc" class="formbuilder-autocomplete-label">Descripcio/Paraules Clau</label>
            <input class="form-control" type="text" name="descripcio">

        </div>
        <div class="form-group">
            <label for="autocomplete-1646758856688" class="formbuilder-autocomplete-label">Nom alumnat</label>

            <input class="form-control" type="text" name="nalumnat">


        </div>
        <div class="form-group">
            <label for="autocomplete-1646758856688" class="formbuilder-autocomplete-label">Nom professorat</label>

            <input class="form-control" type="text" name="nprofesorat" >

        </div>
        <div class="form-group">
        
            <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
        </div>
    </div>

</form>