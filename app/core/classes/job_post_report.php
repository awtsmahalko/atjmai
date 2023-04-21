<?php
class JobPostReport extends Connection
{
    private $table = 'tbl_jobs';
    public function per_year()
    {
        $Ind = new Industries();
        $industries = json_decode($Ind->data())->industries;

        $date_from = $this->post('year_from');
        $date_to = $this->post('year_to');

        $years = range($date_from, $date_to);

        $response['sub_title'] = array('text' => "$date_from - $date_to");
        $response['xAxis'] = array('categories' => $years, 'crosshair' => true);


        $response['series'] = array();
        foreach ($industries as $row) {
            $data = [];

            foreach ($years as $year) {
                $data[] = $this->postPerIndustryPerYear($row->industry_id, $year);
            }
            $series = array(
                'name' => $row->industry_name,
                'data' => $data,
            );
            array_push($response['series'], $series);
        }
        return json_encode($response);
    }

    public function postPerIndustryPerYear($industry_id, $year)
    {
        $result = $this->select($this->table, '*', "industry_id = '$industry_id' AND YEAR(created_at) = '$year'");
        return (int) $result->num_rows;
    }

    public function per_month()
    {
        $Ind = new Industries();
        $industries = json_decode($Ind->data())->industries;

        $year = $this->post('year');

        $months = range(1, 12);

        $response['sub_title'] = array('text' => $year);


        $response['series'] = array();
        foreach ($industries as $row) {
            $data = [];

            foreach ($months as $month) {
                $data[] = $this->postPerIndustryPerMonth($row->industry_id, $year, $month);
            }
            $series = array(
                'name' => $row->industry_name,
                'data' => $data,
            );
            array_push($response['series'], $series);
        }
        return json_encode($response);
    }

    public function postPerIndustryPerMonth($industry_id, $year, $month)
    {
        $result = $this->select($this->table, '*', "industry_id = '$industry_id' AND YEAR(created_at) = '$year' AND MONTH(created_at) = '$month'");
        return (int) $result->num_rows;
    }
}
