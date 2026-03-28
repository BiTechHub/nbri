<?php

namespace App\Imports;

use App\Models\AdmitCardNew;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Session;
use Exception;

class CandidateImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $exam_cat;

    public function __construct($exam_cat)
    {
        $this->exam_cat = $exam_cat;
    }


    public function model(array $row)
    {
        // 👉 Skip header row (optional)
        if ($row[0] == 'roll_no' || $row[12] == 'test_id') {
            return null;
        }

        // ❌ Validate test_id
        if (($row[12] ?? null) != $this->exam_cat) {
            throw new Exception("Test ID mismatch in Excel. Expected: {$this->exam_cat}, Found: {$row[12]}");
        }
        
        $dob = null;
        if (!empty($row[4])) {
            try {
                // If it's a valid Excel date serial number
                if (is_numeric($row[4])) {
                    $dob = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4])->format('Y-m-d');
                } else {
                    // If it's a string like 10/12/1990 or 1990-12-10
                    $dob = date('Y-m-d', strtotime($row[4]));
                }
            } catch (\Exception $e) {
                $dob = null; // fallback if invalid
            }
        }

        return new AdmitCardNew([
            'roll_no'            => $row[0] ?? '',
            'application_no'     => $row[1] ?? '',
            'candidate_name'     => $row[2] ?? '',
            'father_name'        => $row[3] ?? '',
            'date_of_birth'      => $dob,
            'address'            => $row[5] ?? '',
            'gender'             => $row[6] ?? '',
            'caste_category'     => $row[7] ?? '',
            'type_of_disability' => $row[8] ?? '',
            'email'              => $row[9] ?? '',
            'image_link'         => $row[10] ?? '',
            'sign_link'          => $row[11] ?? '',
            'test_id'            => $row[12] ?? '',
        ]);
    }
}
