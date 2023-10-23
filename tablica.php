<form action="" method="post">
    <table>
        <tr>
            <th>Riječ</th>
            <th>Broj slova</th>
            <th>Broj suglasnika</th>
            <th>Broj samoglasnika</th>
        </tr>
        <?php
        if (file_exists(__DIR__ . '/words.json')) {
            $json_data = file_get_contents('words.json');
            $rijeci = json_decode($json_data, true);
        }
        else {
            die('File ne postoji!');
        }

        foreach ($rijeci as $rijec) {
            echo '<tr>';
            echo '<td>' . $rijec . '</td>';
            echo '<td>' . strlen($rijec) . '</td>';
            echo '<td>' . preg_match_all('/[b-df-hj-np-tv-z]/i', $rijec) . '</td>';
            echo '<td>' . preg_match_all('/[aeiou]/i', $rijec) . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</form>