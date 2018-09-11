<<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Who is the Ice Man?">
        <title>Ice Ice Baby</title>

        <style>
            body {
                background: black;
            }

            a {
                cursor: default;
            }

            .wrapper {
                height: 100%;
                box-sizing: border-box;
            }

            a.lnk {
                top: calc(50% - 100px);
                position: relative;
                display: block;
                margin: auto;
            }

            a.lnk img.ice-art {
                margin: auto;
                display: block;
            }

        </style>

        <script>

            var go = function(evt) {

                var urls = [
                    'https://twitter.com/witchprom',
                    'https://twitter.com/davidofwatkins',
                    'https://twitter.com/GrantPDesign',
                    'https://twitter.com/TheDrMonkey',
                    'https://twitter.com/KarboBalloon',
                    'https://twitter.com/MxEricJohnE',
                    'https://twitter.com/_er_all_4_all'
                ];

                window.location.href = urls[Math.floor(Math.random() * urls.length)];
            }

        </script>

    </head>
    <body>
        <div class="wrapper">
            <a class="lnk" href="#" onclick="go()">
                <img class="ice-art" src="http://weclipart.com/gimg/11A91C40A4D9AAD3/RcAAqpbpi.png" />
            </a>
        </div>
    </body>
</html>