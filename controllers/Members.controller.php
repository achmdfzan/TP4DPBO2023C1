<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Team.class.php");
include_once("views/Members.view.php");

class MembersController
{
    private $members;
    private $team;

    function __construct()
    {
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->team = new Team(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->members->open();
        $this->team->open();
        $this->members->getMembers();
        $this->team->getTeam();
        $data = array();
        while ($row = $this->members->getResult()) {
            array_push($data, $row);
        }

        $dataTeam = array();
        while ($row = $this->team->getResult()) {
            array_push($dataTeam, $row);
        }

        $this->members->close();
        $this->team->close();

        $view = new MembersView();
        $view->render($data, $dataTeam);
    }

    public function addForm()
    {
        $this->team->open();
        $this->team->getTeam();

        $dataTeam = array();
        while ($row = $this->team->getResult()) {
            array_push($dataTeam, $row);
        }

        $this->team->close();

        $view = new MembersView();
        $view->listTeam($dataTeam);
    }

    public function editForm($id)
    {
        $this->members->open();
        $this->team->open();
        $this->members->getMembers();
        $this->team->getTeam();
        $data = array();
        while ($row = $this->members->getResult()) {
            array_push($data, $row);
        }

        $dataTeam = array();
        while ($row = $this->team->getResult()) {
            array_push($dataTeam, $row);
        }

        $this->members->close();
        $this->team->close();

        $view = new MembersView();
        $view->editMember($id, $data, $dataTeam);
    }

    function add($data)
    {
        $this->members->open();
        $this->members->add($data);
        $this->members->close();

        header("location:index.php");
    }

    function edit($id)
    {
        $this->members->open();
        $this->members->edit($id);
        $this->members->close();

        header("location:index.php");
    }

    function delete($id)
    {
        $this->members->open();
        $this->members->delete($id);
        $this->members->close();

        header("location:index.php");
    }
}
