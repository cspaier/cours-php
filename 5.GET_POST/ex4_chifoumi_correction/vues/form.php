
<h2>Jouer</h2>
<form action="jouer.php" method="GET">
<fieldset>
    <legend>Faites votre choix</legend>
      <input type="radio"  name="choix" value="0">
      <label for="0">
        <?php
          $choix = 0;
          include('vues/choix.php')
        ?>
      </label>
      <input type="radio"  name="choix" value="1">
      <label for="1">
        <?php
          $choix = 1;
          include('vues/choix.php')
        ?>
      </label>
      <input type="radio" name="choix" value="2">
      <label for="2">
        <?php
          $choix = 2;
          include('vues/choix.php')
        ?>
      </label>
</fieldset>

<button type="submit">Envoyer</button>
</form>
