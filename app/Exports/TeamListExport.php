<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\User;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\TeamMember;

class TeamListExport implements FromCollection, WithMapping,WithHeadings
{
    public function collection()
    {
        $data = User::role('participant')->with('team_member')->get();
        $alldata = collect();
        // dd($data->all());
        
        foreach ($data as $teamkey => $teamvalue) {
            foreach ($teamvalue->team_member as $key => $value) {
                $alldata->push([
                    'team_name'=>$teamvalue->name,
                    'team_email'=>$teamvalue->email,
                    'school'=>$value->univercity->name,
                    'course'=>$value->univercity->course,
                    'level'=>TeamMember::levelText($value->level),
                    'name'=>$value->name,
                    'email'=>$value->email,
                    'phone'=>$value->phone,
                    'created_at'=>$teamvalue->created_at->toDateTimeString(),
                ]);
            }
        }
        // dump($alldata);

        return $alldata;
    }

    /**
    * @var Invoice $invoice
    */
    public function map($team): array
    {
        return [
            $team['team_name'],
            $team['team_email'],
            $team['school'],
            $team['course'],
            $team['level'],
            $team['name'],
            $team['email'],
            $team['phone'],
            $team['created_at'],
        ];
    }

    public function headings(): array
    {
        return [
            'Team Name',
            'Team Email',
            'School',
            'Course',
            'Level',
            'Name',
            'Email',
            'Phone',
            'Date',
        ];
    }
}