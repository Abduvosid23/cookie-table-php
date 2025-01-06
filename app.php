<?php

session_start();

class Student {
    public $time;
    public $students;

    public function __construct($time = 36000) {
        $this->time = $time;
        $this->students = isset($_COOKIE['students']) ? unserialize($_COOKIE['students']) : [];
    }
    /**
     * Update Method 
     */
    public function update($info) {
        foreach ($this->getStudentInfo() as &$student) {
            if ($student['id'] == $info['id']) {
                $student['email'] = $info['email'];
                $student['name'] = $info['name'];
                $student['student_id'] = $info['student_id'];
                break; 
            }
        }
        $_SESSION['updated'] = "Student Updated Successfully";

        setcookie('students', serialize($this->getStudentInfo()), time() + $this->time, "/");
    }
    /**
     * /Delete Method
     * @param mixed $id
     * @return void
     */
    public function delete($id) {
        foreach ($this->students as $key => $student) {
            if ($student['id'] == $id) {
                unset($this->students[$key]);
                break;
            }
        }
        $this->students = array_values($this->getStudentInfo());

        $_SESSION['delete'] = "Student Deleted Successfully";

        setcookie('students', serialize($this->getStudentInfo()), time() + $this->time, "/");
    }
    /**
     * Storing Data
     * @param mixed $info
     * @return void
     */
    public function set($info) {
        $info['id'] = $this->generateId();
        $this->students[] = $info;
        setcookie('students', serialize($this->getStudentInfo()), time() + $this->time, "/");
    }
    /**
     * Generating ID 
     * @return float|int
     */
    private function generateId() {
        $id = 0;
        foreach ($this->getStudentInfo() as $student) {
            if ($student['id'] > $id) {
                $id = $student['id'];
            }
        }
        return $id + 1;
    }
    public function getStudentInfo() {
        return $this->students;
    }
}
 
    if (isset($_POST['submit'])) {
        $info['email'] = $_POST['email'];
        $info['name'] = $_POST['name'];
        $info['student_id'] = $_POST['student_id'];

        $students = new Student();
        $students->set($info);

        $_SESSION['added'] = "Student Added Successfully";
        
        header("Location: index.php");
        exit();
    }

    if (isset($_POST['delete_id'])) {
        $id = $_POST['delete_id'];
    
        $students = new Student();
        $students->delete($id);
    
        header("Location: index.php");
        exit();
     }

     
    
?>
