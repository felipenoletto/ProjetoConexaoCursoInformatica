<!--
Aí definimos alguns parâmetros como:

    showSymbol: deverá mostrar o símbolo monetário? (Padrão: false)
    symbol: qual o símbolo? (US$, R$, etc) (Padrão: US$)
    decimal: qual sinal para decimal? ( Nos EUA é ponto(.) e no Brasil é vírgula(,) )
    thousands: qual sinal para casa de milhar? (Nos EUA é vírgula(,) e no Brasil é ponto(.))
    precision: qual o nível de precisão? (Padrão: 2)
    defaultZero: 0 por padrão (true ou false) (Padrão: true)
    allowZero: permitir 0 (Padrão: false)
    allowNegative: permitir valores negativos (Padrão: false)

-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="jquery.maskMoney.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("input.dinheiro").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
            });
        </script>        
    </head>
    <body>
        <h1>Máscara para campos monetários com jquery + maskMoney</h1>
        <form>
            Valor: <input type="text" name="exemplo1" class="dinheiro" />
        </form>
    </body>
</html>
