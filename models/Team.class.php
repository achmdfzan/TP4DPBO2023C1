<?php

class Team extends DB
{
    function getTeam()
    {
        $query = "SELECT * FROM teams";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['nama_team'];
        $pelatih = $data['pelatih_team'];

        $query = " INSERT INTO `teams`(`nama_team`, `pelatih_team`) VALUES ('$nama', '$pelatih')";
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM teams WHERE id_team = '$id'";
        return $this->execute($query);
    }

    function edit($data)
    {
        $nama = $data["nama_team"];
        $pelatih = $data["pelatih_team"];
        $id = $data["id_edit"];

        $query = "UPDATE teams SET nama_team='$nama', pelatih_team='$pelatih' WHERE id_team='$id'";
        return $this->execute($query);
    }
}
