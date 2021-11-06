<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *	This controller handles all the excel exports
 *	Further excel exporting methods should be added to this controller
 * 	PHPExcel third_party library has been used to generate the excel files (application/third_party)
 * 	Excel.php extending the PHPExcel class can be found in application/libraries
*/


class Excel_exports extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('is_logged_in')){
			redirect('/login','refresh');
		}
		else{
			$this->load->model('recruiter_model');
		}
	}


	//export the received applications to excel
	public function excel_received_applications()
	{
		$session_data = $this->session->userdata('is_logged_in');
		$heading = 'Received Applications For '.$session_data['username'];
		$this->load->library('excel');

		$this->excel->setActiveSheetIndex(0);
        //name the worksheet
		$this->excel->getActiveSheet()->setTitle('Received Applications');
        //set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', $heading);
		$this->excel->getActiveSheet()->setCellValue('A4', 'DATE_TIME');
		$this->excel->getActiveSheet()->setCellValue('B4', 'ROLL NUMBER');
		$this->excel->getActiveSheet()->setCellValue('C4', 'FIRST NAME');
		$this->excel->getActiveSheet()->setCellValue('D4', 'LAST NAME');
		$this->excel->getActiveSheet()->setCellValue('E4', 'DOB');
		$this->excel->getActiveSheet()->setCellValue('F4', 'EMAIL');
		$this->excel->getActiveSheet()->setCellValue('G4', 'MOBILE');
		$this->excel->getActiveSheet()->setCellValue('H4', 'Xth AGGREGATE');
		$this->excel->getActiveSheet()->setCellValue('I4', 'XIIth AGGREGATE');
		$this->excel->getActiveSheet()->setCellValue('J4', 'UG BRANCH');
		$this->excel->getActiveSheet()->setCellValue('K4', 'SEM1 UG');
		$this->excel->getActiveSheet()->setCellValue('L4', 'SEM2 UG');
		$this->excel->getActiveSheet()->setCellValue('M4', 'SEM3 UG');
		$this->excel->getActiveSheet()->setCellValue('N4', 'SEM4 UG');
		$this->excel->getActiveSheet()->setCellValue('O4', 'SEM5 UG');
		$this->excel->getActiveSheet()->setCellValue('P4', 'SEM6 UG');
		$this->excel->getActiveSheet()->setCellValue('Q4', 'SEM7 UG');
		$this->excel->getActiveSheet()->setCellValue('R4', 'SEM8 UG');
		$this->excel->getActiveSheet()->setCellValue('S4', 'AGGREGATE UG');
		$this->excel->getActiveSheet()->setCellValue('T4', 'PG BRANCH');
		$this->excel->getActiveSheet()->setCellValue('U4', 'SEM1 PG');
		$this->excel->getActiveSheet()->setCellValue('V4', 'SEM2 PG');
		$this->excel->getActiveSheet()->setCellValue('W4', 'SEM3 PG');
		$this->excel->getActiveSheet()->setCellValue('X4', 'SEM4 PG');
		$this->excel->getActiveSheet()->setCellValue('Y4', 'AGGREGATE PG');
		$this->excel->getActiveSheet()->setCellValue('Z4', 'RESUME LINK');
        $this->excel->getActiveSheet()->setCellValue('AA4', 'EXTRA CURRICULARS');
        $this->excel->getActiveSheet()->setCellValue('AB4', 'PROFESSIONAL SOC');
        $this->excel->getActiveSheet()->setCellValue('AC4', 'NUMBER OF BACKLOGS');
        $this->excel->getActiveSheet()->setCellValue('AD4', 'BACKLOG SUBJECTS');
        //merge cell A1 until C1
		$this->excel->getActiveSheet()->mergeCells('A1:H1');
        //set aligment to center for that merged cell (A1 to C1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A4:AD4')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
		$this->excel->getActiveSheet()->getStyle('A4:AD4')->getFont()->setSize(12);
		$this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
		for($col = ord('A'); $col <= ord('Z'); $col++){
        //set column dimension
			$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
        //change the font size
			$this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

			$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		}
        //retrive contries table data
		$exceldata="";
		foreach ($this->recruiter_model->export_received_applications_excel() as $row){
			$exceldata[] = $row;
		}
        //Fill data 
		$this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');

		$this->excel->getActiveSheet()->getStyle('A4:AD4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		//$this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		//$this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $filename= date('d-m-y').'_ReceivedApplications_'.$session_data['username'].'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        ob_clean();
        $objWriter->save('php://output');
    }




    //export the final list of selected students to excel
    public function excel_final_selected()
    {
    	$session_data = $this->session->userdata('is_logged_in');
    	$heading = 'Final Selected Students For '.$session_data['username'];
    	$this->load->library('excel');

    	$this->excel->setActiveSheetIndex(0);
        //name the worksheet
    	$this->excel->getActiveSheet()->setTitle('Received Applications');
        //set cell A1 content with some text
    	$this->excel->getActiveSheet()->setCellValue('A1', $heading);
    	$this->excel->getActiveSheet()->setCellValue('A4', 'DATE_TIME');
    	$this->excel->getActiveSheet()->setCellValue('B4', 'ROLL NUMBER');
    	$this->excel->getActiveSheet()->setCellValue('C4', 'FIRST NAME');
    	$this->excel->getActiveSheet()->setCellValue('D4', 'LAST NAME');
    	$this->excel->getActiveSheet()->setCellValue('E4', 'DOB');
    	$this->excel->getActiveSheet()->setCellValue('F4', 'EMAIL');
    	$this->excel->getActiveSheet()->setCellValue('G4', 'MOBILE');
    	$this->excel->getActiveSheet()->setCellValue('H4', 'Xth AGGREGATE');
    	$this->excel->getActiveSheet()->setCellValue('I4', 'XIIth AGGREGATE');
    	$this->excel->getActiveSheet()->setCellValue('J4', 'UG BRANCH');
    	$this->excel->getActiveSheet()->setCellValue('K4', 'SEM1 UG');
    	$this->excel->getActiveSheet()->setCellValue('L4', 'SEM2 UG');
    	$this->excel->getActiveSheet()->setCellValue('M4', 'SEM3 UG');
    	$this->excel->getActiveSheet()->setCellValue('N4', 'SEM4 UG');
    	$this->excel->getActiveSheet()->setCellValue('O4', 'SEM5 UG');
    	$this->excel->getActiveSheet()->setCellValue('P4', 'SEM6 UG');
    	$this->excel->getActiveSheet()->setCellValue('Q4', 'SEM7 UG');
    	$this->excel->getActiveSheet()->setCellValue('R4', 'SEM8 UG');
    	$this->excel->getActiveSheet()->setCellValue('S4', 'AGGREGATE UG');
    	$this->excel->getActiveSheet()->setCellValue('T4', 'PG BRANCH');
    	$this->excel->getActiveSheet()->setCellValue('U4', 'SEM1 PG');
    	$this->excel->getActiveSheet()->setCellValue('V4', 'SEM2 PG');
    	$this->excel->getActiveSheet()->setCellValue('W4', 'SEM3 PG');
    	$this->excel->getActiveSheet()->setCellValue('X4', 'SEM4 PG');
    	$this->excel->getActiveSheet()->setCellValue('Y4', 'AGGREGATE PG');
    	$this->excel->getActiveSheet()->setCellValue('Z4', 'RESUME LINK');
        $this->excel->getActiveSheet()->setCellValue('AA4', 'EXTRA CURRICULARS');
        $this->excel->getActiveSheet()->setCellValue('AB4', 'PROFESSIONAL SOC');
        $this->excel->getActiveSheet()->setCellValue('AC4', 'NUMBER OF BACKLOGS');
        $this->excel->getActiveSheet()->setCellValue('AD4', 'BACKLOG SUBJECTS');
        //merge cell A1 until C1
    	$this->excel->getActiveSheet()->mergeCells('A1:H1');
        //set aligment to center for that merged cell (A1 to C1)
    	$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //make the font become bold
    	$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    	$this->excel->getActiveSheet()->getStyle('A4:AD4')->getFont()->setBold(true);
    	$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
    	$this->excel->getActiveSheet()->getStyle('A4:AD4')->getFont()->setSize(12);
    	$this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
    	for($col = ord('A'); $col <= ord('Z'); $col++){
        //set column dimension
    		$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
        //change the font size
    		$this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);

    		$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    	}
        //retrive contries table data
    	$exceldata="";
    	foreach ($this->recruiter_model->export_final_selected_excel() as $row){
    		$exceldata[] = $row;
    	}
        //Fill data 
    	$this->excel->getActiveSheet()->fromArray($exceldata, null, 'A5');

    	$this->excel->getActiveSheet()->getStyle('A4:AD4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		//$this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		//$this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $filename= date('d-m-y').'_FinalSelectedStudents_'.$session_data['username'].'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        ob_clean();
        $objWriter->save('php://output');
    }




}