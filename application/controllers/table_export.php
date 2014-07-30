<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class table_export extends CI_Controller {

 
        
 
    function index()
    {
        $query = $this->db->query("SELECT
                   
                                        tbl_asset.kode_asset AS 'KODE ASSET',
                                        tbl_asset.nama_asset AS 'NAMA ASSET',
                                        tbl_kategori.nama_kategori AS KATEGORI,
                                        tbl_asset.tanggal_masuk AS 'TANGGAL MASUK',
                                        tbl_asset.tanggal_usia AS 'TANGGAL USIA',
                                        tbl_kantor.nama_kantor AS KANTOR,
                                        tbl_ruangan.nama_ruangan AS RUANGAN,
                                        tbl_asset.status_milik AS 'STATUS MILIK',
                                        tbl_asset.kondisi AS KONDISI
                   
                                        FROM
                                        tbl_asset
                                        INNER JOIN tbl_kantor ON tbl_kantor.id = tbl_asset.id_kantor
                                        INNER JOIN tbl_ruangan ON tbl_ruangan.id = tbl_asset.id_ruangan
                                        INNER JOIN tbl_kategori ON tbl_kategori.id = tbl_asset.id_kategori ");
        if(!$query)
        return false;

        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $fields = $query->list_fields();
        $col = 0;
        foreach ($fields as $field)
        {
             $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 3, $field);
            $col++;
        }
        // Fetching the table data
        $row = 4;
        foreach($query->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                 $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }
        // Set Orientation, size and scaling
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $this->excel->getActiveSheet()->setCellValue('A1', 'LAPORAN DATA ASSET');
        //merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:I1');
        //set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1:D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $this->excel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        $this->excel->getActiveSheet()->getPageSetup()->setFitToPage(true);
        $this->excel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
        $this->excel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

        //set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A3:I3')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('A3:I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        
         
        $filename='just_some_random_name.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
                     
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
         
    }
}