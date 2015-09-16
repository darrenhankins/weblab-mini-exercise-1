<form method="POST"> // post method puts information in the header, not the URL
  <input name="username" placeholder="username" />
  <input name="password" placeholder="password" />
  <input type="submit" />

</form>

<pre><?php print_r($_POST); ?></pre>
