<?php
namespace Phppot;

class Config
{

    const LIMIT_PER_PAGE = '15';
}

use Phppot\DataSource;

class Pagination
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    public function getPage()
    {
        // adding limits to select query
        $limit = Config::LIMIT_PER_PAGE;

        // Look for a GET variable page if not found default is 1.
        if (isset($_GET["page"])) {
            $pn = $_GET["page"];
        } else {
            $pn = 1;
        }
        $startFrom = ($pn - 1) * $limit;

        $query = 'SELECT * FROM ordenes LIMIT ? , ?';
        $paramType = 'ii';
        $paramValue = array(
            $startFrom,
            $limit
        );
        $result = $this->ds->select($query, $paramType, $paramValue);
        return $result;
    }

    public function getAllRecords()
    {
        $query = 'SELECT * FROM ordenes';
        $totalRecords = $this->ds->getRecordCount($query);
        return $totalRecords;
    }
}
?>