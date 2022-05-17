<html>
 <head>
  <title>Hello...</title>

  <meta charset="utf-8"> 

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

     <style>

         table, tr, td {
             border: 1px solid #000;
             padding: 1px;
             text-align: center;
         }
         * {
             box-sizing: border-box;
         }
     </style>

</head>
<body>
        <table style="margin: 20px 20px 20px 20px">
        <?php
        function isPrime(int $number): bool {
            if ($number == 1) {
                return false;
            }

            $maxIteration = sqrt($number);

            for ($i = 2; $i <= $maxIteration; $i++) {
                if ($number % $i == 0) {
                    return false;
                }
            }
            return true;
        }
        $count = 1;
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 10; $j++) {
                if (isPrime($count)) {
                    echo "<td style='background-color: red;'>$count</td>";
                } else {
                    echo "<td>$count</td>";
                }
                $count++;
            }
            echo "</tr>";
        }
        ?>
        </table>
</body>
</html>
