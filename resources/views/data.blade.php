<!doctype html>
<html>
    <body>
        <h1>Rate</h1>
        <p> {{ $rate }}</p>

        <h1>Yunbi</h1>
        <p>
            <?php
                foreach ($yunbi as $k => $v){
                    echo $k . " ";
                    echo json_encode($v);
                    echo "<br>";
                }
            ?>
        </p>

        <h1>Bittrex</h1>
        <p>
            <?php
            foreach ($bittrex as $k => $v){
                echo $k . " ";
                echo json_encode($v);
                echo "<br>";
            }
            ?>
        </p>

        <h1>Yunbi vs Bittrex</h1>
        <p>
            <?php
            foreach ($yunbiBittrexCompare as $k => $v){
                echo $k . " ";
                echo json_encode($v);
                echo "<br>";
            }
            ?>
        </p>

        <h1>Poloniex</h1>
        <p>
            <?php
            foreach ($poloniex as $k => $v){
                echo $k . " ";
                echo json_encode($v);
                echo "<br>";
            }
            ?>
        </p>

        <h1>Yunbi vs Poloniex</h1>
        <p>
            <?php
            foreach ($yunbiPoloniexCompare as $k => $v){
                echo $k . " ";
                echo json_encode($v);
                echo "<br>";
            }
            ?>
        </p>

        <h1>Bitfinex</h1>
        <p>
            <?php
            foreach ($bitfinex as $k => $v){
                echo $k . " ";
                echo json_encode($v);
                echo "<br>";
            }
            ?>
        </p>

        <h1>Yunbi vs Bitfinex</h1>
        <p>
            <?php
            foreach ($yunbiBitfinexCompare as $k => $v){
                echo $k . " ";
                echo json_encode($v);
                echo "<br>";
            }
            ?>
        </p>

    </body>
</html>