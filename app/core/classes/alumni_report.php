<?php
class AlumniReport extends Connection
{
    private $table = 'tbl_alumni';
    private $table_colleges = 'tbl_colleges';
    private $table_courses = 'tbl_courses';
    public $pk = 'alumni_id';

    public function per_batch()
    {
        $batch_year = $this->post('batch_year');
        $response['colleges'] = array();
        $response['batch'] = $batch_year;

        $result = $this->select($this->table_colleges, "college_id,college_name");
        while ($row = $result->fetch_assoc()) {
            $row['alumni'] = [];
            $result2 = $this->select("$this->table AS a,$this->table_courses AS c", "a.*,c.course_code", "a.course_id = c.course_id AND c.college_id = '$row[college_id]' AND YEAR(alumni_graduation) = '$batch_year' ORDER BY a.alumni_lname ASC");
            while ($row2 = $result2->fetch_assoc()) {
                $row2['job_title'] = AlumniJobPreferences::AlumniJobTitle($row2['alumni_id']);
                $row2['email'] = Users::dataOf($row2['user_id'], 'user_email');
                array_push($row['alumni'], $row2);
            }
            array_push($response['colleges'], $row);
        }
        return json_encode($response);
    }

    public function per_college()
    {
        $college_id = $this->post('college_id');
        $response['batches'] = array();
        $response['college_name'] = Colleges::name($college_id);

        $result = $this->select($this->table, "YEAR(alumni_graduation) AS batch", "alumni_id > 0 GROUP BY YEAR(alumni_graduation) ASC");
        while ($row = $result->fetch_assoc()) {
            $row['alumni'] = [];
            $result2 = $this->select("$this->table AS a,$this->table_courses AS c", "a.*,c.course_code", "a.course_id = c.course_id AND c.college_id = '$college_id' AND YEAR(alumni_graduation) = '$row[batch]' ORDER BY a.alumni_lname ASC");
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $row2['job_title'] = AlumniJobPreferences::AlumniJobTitle($row2['alumni_id']);
                    $row2['email'] = Users::dataOf($row2['user_id'], 'user_email');
                    array_push($row['alumni'], $row2);
                }
            }
            array_push($response['batches'], $row);
        }
        return json_encode($response);
    }

    public function per_course()
    {
        $course_id = $this->post('course_id');
        $response['batches'] = array();
        $response['course_name'] = Courses::name($course_id);

        $result = $this->select($this->table, "YEAR(alumni_graduation) AS batch", "alumni_id > 0 GROUP BY YEAR(alumni_graduation) ASC");
        while ($row = $result->fetch_assoc()) {
            $row['alumni'] = [];
            $result2 = $this->select($this->table, "*", "course_id = '$course_id' AND YEAR(alumni_graduation) = '$row[batch]' ORDER BY alumni_lname ASC");
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $row2['job_title'] = AlumniJobPreferences::AlumniJobTitle($row2['alumni_id']);
                    $row2['email'] = Users::dataOf($row2['user_id'], 'user_email');
                    array_push($row['alumni'], $row2);
                }
            }
            array_push($response['batches'], $row);
        }
        return json_encode($response);
    }
}