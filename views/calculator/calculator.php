<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>计算器</title>
</head>
<body>

    <input type="number" name="first" id="first">
    <select name="sign" id="sign">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
        <option value="%">%</option>
    </select>
    <input type="number" name="second" id="second">=
    <input type="number" id="result" readonly>
    <button type="button" id="calculator">计算</button>
    <p id="show"></p>

    <script src="../resource/js/jquery.min.js"></script>
    <script>
        $(function () {
           $('#calculator').click(function (event) {
               var $sign = $('#sign'),
                   $first = $('#first'),
                   $second = $('#second'),
                   $result = $('#result'),
                   $show = $('#show');

               $.ajax({
                 url: '../../Controllers/CalculatorController.php',
                 type: 'POST',
                 dataType: 'json',
                 data: {
                   sign: $sign.val(),
                   first: $first.val(),
                   second: $second.val(),
                 },
                 success:function(data){
                   console.log(data);
                   if(data.status===1){
                       $result.val(data.result);
                       $show.text($first.val()+' '+$sign.val()+' '+$second.val()+' = '+data.result);
                   }else{
                       $show.text('除数不能为0');
                   }
                 }
               });

           })
        });
    </script>

</body>
</html>
