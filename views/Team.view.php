<?php
class TeamView
{
    public function render($data)
    {
        $no = 1;
        $dataTeam = null;
        foreach ($data as $val) {
            list($id_team, $nama_team, $pelatih_team) = $val;
            $dataTeam .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama_team . "</td>
                <td>" . $pelatih_team . "</td>
                <td>
                <a href='team.php?id_hapus=" . $id_team . "' class='btn btn-danger''>Hapus</a>
                <a href='./templates/editTeam.php?id_team=" . $id_team . "&nama_team=" . $nama_team . "&pelatih_team=" . $pelatih_team . "' class='btn btn-success''>Edit</a>
                </td>
                </tr>";
        }
        $tpl = new Template("templates/team.html");
        $tpl->replace("DATA_TABEL", $dataTeam);
        $tpl->write();
    }
}
