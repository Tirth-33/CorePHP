<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<style>
    *{
        box-sizing: border-box;
        margin: 1;
        padding: 1;
    }
    .container
    {
        background: violet;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .calculator
    {
        background: silver;
        width: 50%;
        display: grid;
        place-items: center;
    }
    input
    {
        border: 1px solid;
        height: 40px;
        width: 25%;
        margin: 12px 0;
        font-family: Arial;
        font-size: 24px;
        font-weight: bold;
    }
    .row
    {
        background-color: lightblue;
        display: flex;
        flex-wrap: wrap;
        width: 180px;
        gap: 5px;
    }
    .col
    {
        border: 1px solid;
        height: 40px;
        width: 40px;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
    }
</style>
<body>
    <div class="container">
        <div class="calculator">
            <input type="text" name="" id="">
            <div class="row">
                <div class="col" onclick = "AC()">AC</div>
                <div class="col" onclick = "Del()">DEL</div>
                <div class="col" onclick = "getSymbol('%')">%</div>
                <div class="col" onclick = "getSymbol('/')">/</div>
                <div class="col" onclick = "getSymbol('+')">+</div>
                <div class="col" onclick = "getSymbol('-')">-</div>
                <div class="col" onclick = "getSymbol('*')">*</div>

                <div class="col" onclick = "getSymbol('7')">7</div>
                <div class="col" onclick = "getSymbol('8')">8</div>
                <div class="col" onclick = "getSymbol('9')">9</div>
                <div class="col" onclick = "getSymbol('4')">4</div>
                <div class="col" onclick = "getSymbol('5')">5</div>
                <div class="col" onclick = "getSymbol('6')">6</div>
                <div class="col" onclick = "getSymbol('1')">1</div>
                <div class="col" onclick = "getSymbol('2')">2</div>
                <div class="col" onclick = "getSymbol('3')">3</div>
                <div class="col" onclick = "getSymbol('0')">0</div>
                <div class="col" onclick = "Calc()">=</div>
            </div>
        </div>
    </div>
    <script>
        inp1 = document.querySelector('input');
        inp1.value = "";
        function getSymbol(x)
        {
            inp1.value = inp1.value + x;
        }

        function AC()
        {
            inp1.value = "";
        }

        function Calc()
        {
            inp1.value = eval(inp1.value);
        }

        function Del()
        {
            inp1.value = inp1.value.slice(0,-1);
        }
    </script>
</body>
</html>