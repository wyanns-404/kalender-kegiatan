<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

class MigrateAgendaToEvents extends Command
{
    protected $signature = 'migrate:agenda';
    protected $description = 'Migrasi data dari agenda ke events';

    public function handle()
    {
        $agendas = DB::table('tbl_suratmasuk')->get();

        foreach ($agendas as $agenda) {
            $start = $agenda->Tanggal_Agenda . 'T' . $agenda->jam;

            Event::create([
                'title' => $agenda->kegiatan,
                'start' => $start,
                'all_day' => false,
                'extended_props' => [
                    'tempat' => $agenda->tempat,
                    'pendamping' => $agenda->pendamping,
                ],
                'background_color' => '#3788d8', // contoh default
            ]);
        }

        $this->info('Data berhasil dimigrasi!');
    }
}
