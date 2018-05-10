<?php

namespace App\Exports;

use App\TeamMember;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhoneNumber;

class TeamListExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = User::role('participant')->whereVerify(true)->with('team_member')->get();
        $alldata = collect();
        // dd($data->all());

        foreach ($data as $teamkey => $teamvalue) {
            $teamdata = collect([
                'id'=> $teamvalue->id,
                'created_at'=> $teamvalue->created_at->toDateTimeString(),
                'team_name' => $teamvalue->name,
                'team_email'=> $teamvalue->email,
                'split'     => '',
            ]);
            for ($i = 1; $i < 6; $i++) {
                $value = $teamvalue->team_member()->whereLevel($i)->first();
                if ($value) {
                    $teamdata->push([
                        'level' => TeamMember::levelText($value->level),
                        'school'=> $value->univercity->name,
                        'course'=> $value->univercity->course,
                        'name'  => $value->name,
                        'email' => $value->email,
                        'phone' => PhoneNumber::make($value->phone, 'tw')->formatInternational(),
                        'split' => '',
                    ]);
                } else {
                    $teamdata->push([
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                    ]);
                }
            }
            $alldata->push($teamdata->flatten());
        }
        // dd($alldata->toArray());

        return $alldata;
    }

    public function headings(): array
    {
        return [
            '編號',
            '建立時間',
            '隊伍名稱',
            '隊伍電子郵件',
            '',
            '職位',
            '學校',
            '系所',
            '姓名',
            '隊員 Email',
            '聯絡電話',
            '',
            '職位',
            '學校',
            '系所',
            '姓名',
            '隊員 Email',
            '聯絡電話',
            '',
            '職位',
            '學校',
            '系所',
            '姓名',
            '隊員 Email',
            '聯絡電話',
            '',
            '職位',
            '學校',
            '系所',
            '姓名',
            '隊員 Email',
            '聯絡電話',
            '',
            '職位',
            '學校',
            '系所',
            '姓名',
            '隊員 Email',
            '聯絡電話',
            '',
        ];
    }
}
