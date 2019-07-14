<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class monthlyModel extends CI_Model {
	function viewCurrentMonthCapital() {
		return  $this->db->query("SELECT SUM(capital_amount) AS capital_amount FROM capital WHERE NOT status = 'deleted' AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())")->result();
		// where(["status !=", 'deleted'])->get('capital')->result();
	}
	function viewCurrentMonthAdmissions() {
		return  $this->db->query("SELECT COUNT(*) as allAdmissions FROM admission WHERE NOT trash_status = 'deleted' AND MONTH(a_student_currentdate) = MONTH(CURRENT_DATE()) AND YEAR(a_student_currentdate) = YEAR(CURRENT_DATE())")->result();
		// where(["status !=", 'deleted'])->get('capital')->result();
	}
	function viewCurrentMonthInquiries(){
		return $this->db->query("SELECT * FROM inquiry_form WHERE NOT status = 'deleted' AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())")->result();
		// return $this->db->where("status !=", 'deleted')->get('inquiry_form')->result();
	}
	function viewCurrentMonthTarget(){
		return  $this->db->query("SELECT m_target as allTagets FROM monthlytarget WHERE NOT m_status = 'deleted' AND MONTH(m_target_date) = MONTH(CURRENT_DATE()) AND YEAR(m_target_date) = YEAR(CURRENT_DATE())")->result();
		// return $this->db->where("status !=", 'deleted')->get('inquiry_form')->result();
	}
}
