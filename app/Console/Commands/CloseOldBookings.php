<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;

class CloseOldBookings extends Command
{
    protected $signature = 'bookings:close-old
                            {--days=7 : Заявки старше скольких дней закрывать}
                            {--dry-run : Только показать данные}';

    protected $description = 'Закрытие устаревших записей в барбершоп';

    public function handle(): int
    {
        $days = (int) $this->option('days');
        $old = Booking::where('status', 'new')
            ->where('created_at', '<', now()->subDays($days))
            ->get();

        if ($old->isEmpty()) {
            $this->info('Устаревших записей не найдено.');
            return self::SUCCESS;
        }

        $this->table(['ID', 'Клиент', 'Телефон', 'Дата создания'], 
            $old->map(fn($b) => [$b->id, $b->client_name, $b->client_phone, $b->created_at]));

        if ($this->option('dry-run') || !$this->confirm("Закрыть {$old->count()} записей?", true)) {
            return self::SUCCESS;
        }

        $this->withProgressBar($old, fn($b) => $b->update(['status' => 'expired']));
        $this->newLine();
        $this->info('Записи успешно обновлены.');

        return self::SUCCESS;
    }
}