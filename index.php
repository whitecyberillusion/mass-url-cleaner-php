<html>
  <head>
    <title>Mass URL Cleaner</title>
  </head>
  <body>
    <center>
      <strong>Mass URL Cleaner By ./randiXploit</strong><br>
      <form action="" method="post">
        <textarea name="domain" cols="30" rows="10" placeholder="domain"></textarea><br><br>
        <button name="submit">clean</button>
      </form><br>
      <?php
        if (isset($_POST["submit"])) {
          $domain=htmlspecialchars(strtolower($_POST["domain"]));
          $explode=explode("\n", $domain);
          echo '<textarea id="output" cols="30" rows="10" readonly>';
          foreach ($explode as $key => $domain) {
            if (strpos($domain, "https://") !== false) {
              $replace=str_replace("https://", "", $domain);
              echo $replace."\n";
            } elseif (strpos($domain, "http://") !== false) {
              $replace=str_replace("http://", "", $domain);
              echo $replace."\n";
            } elseif (strpos($domain, "www.") !== false) {
              $replace=str_replace("www.", "", $domain);
              echo $replace."\n";
            }
          }
          echo '</textarea><br>
          <button type="button" onclick="copy()">copy</button>';
        }
      ?>
    </center>
    <script>
      function copy() {
        var output=document.getElementById("output").select();
        document.execCommand("copy");
      }
    </script>
  </body>
</html>