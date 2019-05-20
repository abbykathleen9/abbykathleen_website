<html>
    <head>
      <?php
            // FONTS FOR CSS

            //GET FONTS
            $file = fopen("text_files/fonts.txt", "r") or die("Font file not found");
            $i = 0;
            while(!feof($file)) {
                $fontLine = rtrim(fgets($file));
                if ($fontLine != "") {
                    list($url, $fontName) = explode(";", $fontLine);
                    $fonts[$i][0] = $fontName;
                    $fonts[$i][1] = $url;
                }
                $i++;
            }
            fclose($file);


            // Update fonts in css/fonts.css
            $file = fopen("css/fonts.css", "w") or die("CSS file not found");
            fwrite($file, "/* FONT IMPORTS */\n\n");
            for ($i=0; $i<count($fonts); $i++) {
                $text = "/* Font-Family: ". $fonts[$i][0] . "*/\n@import url('" . $fonts[$i][1] ."');\n\n";
                fwrite($file, $text);
            }
            fclose($file);


            // GET FONT COLORS
            $file = fopen("text_files/font-colors.txt", "r") or die("Font file not found");
            $i = 0;
            while(!feof($file)) {
                $fontLine = rtrim(fgets($file));

                if ($fontLine != "") {
                    list($hex, $rgb) = explode(";", $fontLine);
                    $colors[$i][1] = $hex;
                    $colors[$i][0] = $rgb;
                }
                $i++;
            }
            fclose($file);
        ?>

        <link rel="stylesheet" href="css/fonts.css">
    </head>
    <body>
        <?php

            // CREATE DIV AND PRINT FONT
            for ($i = 0; $i < count($colors); $i++) {

                print("<div style='background-color:" . $colors[$i][1] . "; margin: 20px; padding: 20px; text-align: center;'>");

                for ($j = 0; $j < count($colors); $j++){
                    if ($i != $j){
                        print("<div>");
                        foreach($fonts as $font){
                            print("<h1 style='font-size: 2.5em; color: " . $colors[$j][1] . "; font-family: \"" . $font[0] . "\"; '>FONT: " . $font[0] . "   ->  The quick brown fox jumped over the lazy dog</h1>");
                        }
                        print("</div><br>");
                    }

                }

                print("</div>");
            }

        ?>
    </body>
</html>
