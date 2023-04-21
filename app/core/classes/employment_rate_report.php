<?php
class EmploymentRateReport extends Connection
{
    private $table = 'tbl_jobs';
    public function report()
    {
        $group = $this->post('group');

        if ($group == 'per-batch')
            return $this->per_batch();
        if ($group == 'per-college')
            return $this->per_college();
        if ($group == 'per-program')
            return $this->per_program();
    }

    public function per_batch()
    {
        $date_from = $this->post('year_from');
        $date_to = $this->post('year_to');

        $years = range($date_from, $date_to);

        $result = $this->select('tbl_alumni', "YEAR(alumni_graduation) AS batch", "alumni_id > 0 GROUP BY YEAR(alumni_graduation) ASC");

        $batches = [];

        while ($row = $result->fetch_assoc()) {
            $batches[] = $row['batch'];
        }
        $response['title'] = array('text' => "Employement rate by Batch");
        $response['subtitle'] = array('text' => "$date_from - $date_to");
        $response['xAxis'] = array('categories' => $batches, 'title' => array('text' => 'Batch'));
        $response['series'] = array();

        foreach ($years as $year) {
            $data = [];
            foreach ($batches as $batch) {
                $data[] = $this->ratePerBatch($batch, $year);
            }
            $series = array(
                'name' => "Year $year",
                'data' => $data,
            );
            array_push($response['series'], $series);
        }
        return json_encode($response);
    }

    public function per_college()
    {
        $date_from = $this->post('year_from');
        $date_to = $this->post('year_to');

        $years = range($date_from, $date_to);

        $Colleges = new Colleges;
        $college_data = json_decode($Colleges->data())->colleges;

        $categories = [];
        $collge_ids = [];
        foreach ($college_data as $row) {
            $categories[] = $row->college_name;
            $collge_ids[] = $row->college_id;
        }

        $response['subtitle'] = array('text' => "$date_from - $date_to");
        $response['title'] = array('text' => "Employement rate by College");
        $response['xAxis'] = array('categories' => $categories);
        $response['series'] = array();

        foreach ($years as $year) {
            $data = [];
            foreach ($collge_ids as $college_id) {
                $data[] = rand(1, 100);
            }
            $series = array(
                'name' => "Year $year",
                'data' => $data,
            );
            array_push($response['series'], $series);
        }
        return json_encode($response);
    }

    public function per_program()
    {
        $date_from = $this->post('year_from');
        $date_to = $this->post('year_to');

        $years = range($date_from, $date_to);

        $Courses = new Courses;
        $courses_data = json_decode($Courses->data())->courses;

        $categories = [];
        $courses = [];
        foreach ($courses_data as $row) {
            $categories[] = $row->course_code;
            $courses[] = $row->course_id;
        }

        $response['subtitle'] = array('text' => "$date_from - $date_to");
        $response['title'] = array('text' => "Employement rate by Programs");
        $response['xAxis'] = array('categories' => $categories);
        $response['series'] = array();

        foreach ($years as $year) {
            $data = [];
            foreach ($courses as $course_id) {
                $data[] = rand(1, 100);
            }
            $series = array(
                'name' => "Year $year",
                'data' => $data,
            );
            array_push($response['series'], $series);
        }
        return json_encode($response);
    }

    public function ratePerBatch($batch, $year)
    {
        // COUNT ALL BATCH
        $sum_of_alumni_per_batch = $this->sumAlumniPerBatch($batch);
        $sum_of_employed = $this->sumEmployedPerBatch($batch, $year);
        $percentage = $sum_of_employed / $sum_of_alumni_per_batch * 100;
        return $percentage;
    }

    public function sumAlumniPerBatch($batch)
    {
        $result = $this->select('tbl_alumni', "COUNT(*) AS count", "YEAR(alumni_graduation) = '$batch'");
        if ($result->num_rows < 1)
            return 0;
        $row = $result->fetch_assoc();
        return (int) $row['count'];
    }

    public function sumEmployedPerBatch($batch, $year)
    {
        $result = $this->select('tbl_alumni AS a,tbl_job_candidates AS j', "COUNT(DISTINCT(a.alumni_id)) AS count", "a.alumni_id = j.alumni_id AND YEAR(a.alumni_graduation) = '$batch' AND YEAR(j.created_at) = '$year'");
        if ($result->num_rows < 1)
            return 0;
        $row = $result->fetch_assoc();
        return (int) $row['count'];
    }
}
