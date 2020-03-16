<?php
namespace App\Http\Repository;

class ExamineeResultRepository
{
    public function processCorrectByQuestionType(array $correct) :array
    {
        $correctValues = [];
        foreach (array_keys($correct) as $value)  {
            // Changing the keys of an array into column name of tbl_examinee_result
            $values[] = str_replace(' ', '_', rtrim(substr(strtolower($value), 0, -1), '_'));
        }
        
        return array_count_values($values);    
    }
}