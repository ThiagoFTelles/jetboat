<form id="date-range" method="POST" action="">
    {{ csrf_field() }}
    {{ method_field('GET') }}
    <div class="field" >
        <label class="label" for="date-initial">Data Inicial</label>
        <div class="control">
            <input class="input is-rounded  {{ $errors -> has('date-initial') ? 'is-danger' : '' }} " style="width: auto;margin: 5px 0;" value="{{ $di }}" type="date" id="date-initial" name="date-initial" onfocusout="validaDados()" data-date="" data-date-format="DD MMMM YYYY" required>
        </div>        
    </div>

    <div class="field" >
        <label class="label" for="date-final">Data Final</label>
        <div class="control">
            <input class="input is-rounded  {{ $errors -> has('date-final') ? 'is-danger' : '' }} " style="width: auto;margin: 5px 0;" value="{{ $di }}" type="date" id="date-final" name="date-final" onfocusout="validaDados()" data-date="" data-date-format="DD MMMM YYYY" required>
        </div>        
    </div>
            <button type="submit" class="button is-primary">Aplicar</button>
    <!-- <button style="width: auto;margin: 5px 0;"  class="button is-primary" type="submit">Aplicar</button> -->
</form>
<br>

<script type="text/javascript">
    function validaDados() {
            if ($("#date-initial").val() && $("#date-final").val()) {
                $di = $("#date-initial").val();
                $df = $("#date-final").val();
                $action = "/report/?di="+$di+" 00:00:00&df="+$df+" 59:59:99";
                document.getElementById("date-range").action = $action;
            };
        }
</script>