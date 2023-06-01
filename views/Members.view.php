<?php
class MembersView
{
    public function render($data, $dataTeam)
    {
        $no = 1;
        $dataMembers = null;
        foreach ($data as $val) {
            list($id, $name, $email, $phone, $join_date, $id_team) = $val;
            $nama_team = '';
            $id_member = $id;
            foreach ($dataTeam as $team) {
                list($id, $nama) = $team;
                if ($id == $id_team) {
                    $nama_team = $nama;
                    break;
                }
            }
            $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $nama_team . "</td>
                <td>
                <a href='index.php?id_hapus=" . $id_member . "' class='btn btn-danger''>Hapus</a>
                <a href='index.php?editForm=" . $id_member . "' class='btn btn-success''>Edit</a>
                </td>
                </tr>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->write();
    }

    public function listTeam($dataTeam)
    {
        $listTeam = null;
        foreach ($dataTeam as $val) {
            list($id, $nama) = $val;
            $listTeam .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $tpl = new Template("templates/addMembers.html");
        $tpl->replace("OPTION", $listTeam);
        $tpl->write();
    }

    public function editMember($idMember, $data, $dataTeam)
    {
        $dataMember = null;
        $teamMember = 0;
        foreach ($data as $val) {
            list($id, $name, $email, $phone, $join_date, $id_team) = $val;
            if ($idMember == $id) {
                $dataMember .=
                "<input type='hidden' name='id_edit' value='$id' class='form-control'> <br>

                <label> NAME: </label>
                <input type='text' name='name' value='$name' class='form-control'> <br>
                <label> EMAIL: </label>
                <input type='text' name='email' value='$email' class='form-control'> <br>
                <label> PHONE: </label>
                <input type='text' name='phone' value='$phone' class='form-control'> <br>
                 <label> JOIN DATE: </label>
                <input type='date' name='join_date' value='$join_date' class='form-control''> <br>
                <label> team:</label>
            ";
                $teamMember = $id_team;
                break;
            }
        }

        $listTeam = null;
        foreach ($dataTeam as $val) {
            list($id, $nama) = $val;
            if ($id == $teamMember) {
                $listTeam .= "<option selected value='" . $id . "'>" . $nama . "</option>";
            } else {
                $listTeam .= "<option value='" . $id . "'>" . $nama . "</option>";
            }
        }

        $tpl = new Template("templates/editMembers.php");
        $tpl->replace("FORM_MEMBER", $dataMember);
        $tpl->replace("TEAM_MEMBER", $listTeam);
        $tpl->write();
    }
}
