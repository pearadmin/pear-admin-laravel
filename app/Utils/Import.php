<?php

namespace App\Utils;
use phpDocumentor\Reflection\Types\Integer;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Import
{
	/**
	 * 根据文件自动获取类型并读取返回文件内容
	 * @param string $inputFile
	 * @param int $row
	 * @return array
	 * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
	 */
	public static function loadFile(string $inputFile,int $row): array
	{
		$whatTable = 0;
		/**  识别 $inputFileName 的类型   **/
		$inputFileType = IOFactory::identify($inputFile);
		/**  创建一个已识别类型的新 Reader  **/
		$reader = IOFactory::createReader($inputFileType); //实例化阅读器对象。
		$reader->setReadDataOnly(true);
		$spreadsheet = $reader->load($inputFile);  //将文件读取到到$spreadsheet对象中

		//读取活动工作表的内容
		/*$worksheet = $spreadsheet->getActiveSheet();   //获取当前文件内容
		$sheetAllCount = $spreadsheet->getSheetCount(); // 工作表总数
		for ($index = 0; $index < $sheetAllCount; $index++) {   //工作表标题
			$title[] = $spreadsheet->getSheet($index)->getTitle();
		}*/

		//读取第一个工作表的内容
		try {
			$sheet = $spreadsheet->getSheet($whatTable);
			//取得总行数
			$highest_row = $sheet->getHighestRow();
			//取得列数
			$highest_column = $sheet->getHighestColumn();
			//转化为数字
			try {
				$highestColumnIndex = Coordinate::columnIndexFromString($highest_column);
				$contents = [];
				for ($i = 1; $i <= $highestColumnIndex; $i++) {
					for ($j = $row; $j <= $highest_row; $j++) {
                		//$content = $sheet->getCellByColumnAndRow($i, $j)->getValue();
						$content = $sheet->getCellByColumnAndRow($i, $j)->getCalculatedValue();
						$contents[$j-$row][$i-1] = $content;
					}
				}
				return $contents;
			} catch (Exception $e) {
				return ["code"=>500,"data"=>$e->getMessage()];
			}
		} catch (Exception $e) {
			return ["code"=>500,"data"=>$e->getMessage()];
		}
	}
}
