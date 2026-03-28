<?php

namespace App\Imports;

use App\Models\DirectoryMaster;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DirectoryImport implements ToModel, WithHeadingRow
{
    protected $language;
    protected $category;

    public function __construct($language, $category)
    {
        $this->language = $language;
        $this->category = $category;
    }

    public function model(array $row)
    {
        return new DirectoryMaster([
            'name' => $row['name'],
            'designation' => $row['designation'],
            'area' => $row['area'],
            'twitter' => $row['twitter'],
            'email' => $row['email'],
            'contact' => $row['contact'],
            'language' => $this->language,
            'category' => $this->category,
        ]);
    }
}
