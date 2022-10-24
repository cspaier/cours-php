<?php include('vues/header.php'); ?>

<h2>
  <?php
    switch($gagnant){
      case 0: echo 'Egalité'; break;
      case 1: echo 'Bravo!'; break;
      case 2: echo 'Perdu'; break;
    }
  ?>
</h2>
<table>
  <thead>
      <tr>
          <th>Vous</th>
          <th> Vs </th>
          <th> Machine </th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td>
            <?php
              $choix = choix_utilisateur;
              include(`vues/choix.php`);
            ?>
          </td>
          <td> Vs </td>
          <td>
            <?php
              $choix = choix_machine;
              include(`vues/choix.php`);
            ?>
          </td>
      </tr>
  </tbody>
</table>

<?php include('vues/form.php');?>

<?php include('vues/footer.php');?>
