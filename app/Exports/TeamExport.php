<?php

namespace App\Exports;

use App\Models\Invitations;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TeamExport implements FromArray, WithHeadings, WithStyles
{
    /**
     * @return array
     */
    public function array(): array
    {
        return $this->teams();
    }

    public function teams(){
        $data = [];

        $teams = Invitations::where('type', 1)
            ->select([
                'id',
                'first_name', 'second_name', 'sur_name', 'age_range', 'national_id',
                'email', 'phone_number', 'university_name', 'university_specialization',
                'graduation_date', 'heard_about', 'reason_participation', 'attendance_dates'
            ])->with('students')->get();


        foreach ($teams as $item) {
            $heard_about = json_decode($item->heard_about, true) ?? [];

            $heard_key = array_search(null, $heard_about);
            if ($heard_key !== false) {
                unset($heard_about[$heard_key]);
                $heard_about = array_values($heard_about);
            }

            $reason_participation = json_decode($item->reason_participation, true) ?? [];

            $reason_key = array_search(null, $reason_participation);
            if ($reason_key !== false) {
                unset($reason_participation[$reason_key]);
                $reason_participation = array_values($reason_participation);
            }

            // Add the team row
            $data[] = [
                'first_name' => $item->first_name,
                'second_name' => $item->second_name,
                'sur_name' => $item->sur_name,
                'age_range' => $item->age_range,
                'national_id' => $item->national_id,
                'email' => $item->email,
                'phone_number' => $item->phone_number,
                'university_name' => $item->university_name,
                'university_specialization' => $item->university_specialization,
                'graduation_date' => $item->graduation_date,
                'heard_about' => implode(', ', $heard_about ?? []),
                'reason_participation' => implode(', ', $reason_participation ?? []),
                'attendance_dates' => implode(', ', $item->attendance_dates ?? []),
            ];

            // Add rows for each student of the team
            foreach ($item->students as $student) {

                $heard_about = json_decode($student->heard_about, true) ?? [];

                $heard_key = array_search(null, $heard_about);
                if ($heard_key !== false) {
                    unset($heard_about[$heard_key]);
                    $heard_about = array_values($heard_about);
                }

                $reason_participation = json_decode($student->reason_participation, true) ?? [];

                $reason_key = array_search(null, $reason_participation);
                if ($reason_key !== false) {
                    unset($reason_participation[$reason_key]);
                    $reason_participation = array_values($reason_participation);
                }

                $data[] = [
                    'first_name' => $student->first_name,
                    'second_name' => $student->second_name,
                    'sur_name' => $student->sur_name,

                    'heard_about' => implode(', ', $heard_about ?? []),
                    'reason_participation' => implode(', ', $reason_participation ?? []),
                    'attendance_dates' => implode(', ', $student->attendance_dates ?? []),
                ];
            }
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'الاسم الاول',
            'الاسم الثاني',
            'اسم العائلة',
            'الفئة العمرية',
            'رقم الهوية الوطنية',
            'البريد الإلكتروني',
            'رقم الهاتف',
            'اسم الجامعة',
            'التخصص الجامعي',
            'تاريخ التخرج',
            'كيف سمعت عن البرنامج',
            'سبب الحضور',
            'أيام الحضور',
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            // Set the default alignment to RTL
            'A1:Z1000' => ['alignment' => ['horizontal' => 'right']],
        ];
    }
}