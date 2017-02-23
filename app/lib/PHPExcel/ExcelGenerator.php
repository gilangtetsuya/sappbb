<?php 

require_once 'PHPExcel.php';

class ExcelGenerator extends PHPExcel {
    
     /**
     * @var Database result
     */
     private $query;
     private $column = array();
     private $header = array();
     private $width = array();
     private $header_bold = TRUE;
     private $start = 1;

     /**
     * @access public 
     * @param $query 
     * @return ExcelGenerator
     */
     public function set_query( $query ) {
         $this->query = $query;
         return $this;
     }
     
     /**
     * @access public
     * @param array $column
     * @return ExcelGenerator
     */
     public function set_column( $column = array() ) {
         $this->column = $column;
         return $this;
     }

     /**
     * @access public
     * @param array $column
     * @return ExcelGenerator
     */
     public function set_header( $header = array(), $set_bold = TRUE ) {
         $this->header = $header;
         $this->header_bold = $set_bold;
         return $this;
     }

     /**
     * @access public
     * @param array $column
     * @return ExcelGenerator
     */
     public function set_width( $width = array() ) {
         $this->width = $width;
         return $this;
     }

     /**
     * @access public
     * @param array $column
     * @return ExcelGenerator
     */
     public function start_at( $start = 1 ) {
         $this->start = $start;
         return $this;
     }

     /**
     * @access public
     * @param array $column
     * @return ExcelGenerator
     */
     public function generate() {
         $start = $this->start;
         if (count($this->header) > 0) {
             $abj = 1;
             foreach ($this->header as $row) {
                 $this->getActiveSheet()->setCellValue($this->columnName($abj) . $this->start, $row);
                 if ($this->header_bold) {
                    $this->getActiveSheet()->getStyle($this->columnName($abj) . $this->start)->getFont()->setBold(TRUE);
                 }
                 $abj++;
             }
             $start = $this->start + 1;
         }

         foreach ($this->query as $result_db) {
             $index = 1;
             foreach ($this->column as $row) {
                if (count($this->width) > 0) {
                    $this->getActiveSheet()->getColumnDimension($this->columnName($index))->setAutoSize(TRUE);
                }
                
                $this->getActiveSheet()->setCellValue($this->columnName($index) . $start, $result_db[$row]);
                $index++;
             }
             $start++;
         }
         return $this;
     }

     private function columnName( $index ) {
         --$index;
         if ($index >= 0 && $index < 26) 
            return chr(ord('A') + $index);
         else if ($index > 25)
            return ($this->columnName($index / 26)) . ($this->columnName($index % 26 + 1));   
         else 
            show_error("Invalid Column # " . ($index + 1));   
     }

    private function writeToFile($filename = 'doc', $writerType = 'Excel5', $mimes = 'application/vnd.ms-excel') {
        $this->generate();
        header("Content-Type: $mimes");
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header("Cache-Control: max-age=0");
        $objWriter = PHPExcel_IOFactory::createWriter($this, $writerType);
        $objWriter->save('php://output');
    }  

   /**
    * @param string $filename
    */
    public function exportTo2003($filename = 'doc') {
        $this->writeToFile($filename . '.xls');
    }

    /**
     * @param string $filename
     */
    public function exportTo2007($filename = 'doc') {
        $this->writeToFile($filename . '.xlsx', 'Excel2007', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }

}