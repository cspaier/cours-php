<form action="index.php" method="GET">

<label for="mois">Durée d'ensolleillement du mois de </label>

<select name="mois">
<?php foreach($mois as $m){
    echo "<option value=\"$m\">$m</option>" . PHP_EOL;
} ?>
    
</select>
<button type="submit">Envoyer</button>
</form>