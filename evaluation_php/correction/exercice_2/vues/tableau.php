<table class="table is-hoverable is-striped">
    <theader>
        <tr>
            <th>Mois</th>
            <th>Température (°C)</th>
        </tr>
    </theader>

    <tbody>
        <?php foreach($temperatures as $index => $temp){
            if ($temp > 11.3){
                echo '<tr class="has-text-danger">';
            }
            else{
                echo '<tr>';
            }
            echo "  <td>$mois[$index]</td>
                    <td>$temp</td>
                  </tr>";
        } ?>
    </tbody>

</table>