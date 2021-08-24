<?php

namespace App\Utils;

use PhpOffice\PhpSpreadsheet\Spreadsheet;


class Office{

    public $writer = null;

    public $spreadsheet = null;

    public function make($title,$rows,$cols,$list,$width = []){
        $alpha = ["A","B","C","D","E","F","G","H","I","G","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        //导出xls表格
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setCellValueByColumnAndRow(1, 1, $title);
        $cols_num = count($cols);
        for($i=0;$i<$cols_num;$i++){
            $worksheet->setCellValueByColumnAndRow($i+1, 2, $rows[$i]);
        }
        //合并单元格
        $worksheet->mergeCells('A1:'.$alpha[(($cols_num-1)<0?0:($cols_num-1))].'1');
        $title_style = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ];
        $styleArray = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ]
        ];
        $len = count($list);
        $worksheet->getStyle('A1')->applyFromArray($title_style)->getFont()->setSize(20);
        $worksheet->getStyle('A2:'.$alpha[(($cols_num-1)<0?0:($cols_num-1))].'2')->applyFromArray($styleArray)->getFont()->setSize(16);
        $worksheet->getStyle('A3:'.$alpha[(($cols_num-1)<0?0:($cols_num-1))].($len+2))->applyFromArray($styleArray)->getFont()->setSize(14);//字体
        //设置垂直居中
        $worksheet->getStyle('A1:'.$alpha[(($cols_num-1)<0?0:($cols_num-1))].($len+2))->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        for($i=0;$i<$len;$i++){
            $j = $i+3;
            for($v=0;$v<$cols_num;$v++){
                $worksheet->setCellValueByColumnAndRow($v+1, $j, $list[$i][$cols[$v]]);
            }
        }
        $total_rows = $len + 2;
        $styleArrayBody = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '666666'],
                ],
            ]
        ];
        //添加所有边框/居中
        $worksheet->getStyle('A1:'.$alpha[(($cols_num-1)<0?0:($cols_num-1))].$total_rows)->applyFromArray($styleArrayBody);
        //设置默认行高为20
        $worksheet->getDefaultRowDimension()->setRowHeight(24);
        //设置列宽
        if($width && count($width) > 0){
            for($i = 0;$i<$cols_num;$i++){
                $worksheet->getColumnDimension($alpha[$i])->setWidth($width[$i]);
            }
        }else{
            for($i = 0;$i<$cols_num;$i++){
                $worksheet->getColumnDimension($alpha[$i])->setAutoSize(true);
            }
        }
        $this->spreadsheet = $spreadsheet;
        $this->writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        return $this;
    }

    //导出
    public function checkout($file_name){
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$file_name.'"');
        header('Cache-Control: max-age=0');
        return $this->writer->save('php://output');
    }

    //保存
    public function save($path,$filename){
        $this->writer->save($path.$filename);
        return $path.$filename;
    }
}
