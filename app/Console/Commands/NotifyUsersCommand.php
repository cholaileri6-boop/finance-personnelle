<?php

namespace App\Console\Commands;

use App\Models\Alert;
use App\Models\User;
use Illuminate\Console\Command;

class NotifyUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notify-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send budget overrun and daily missing expense reminders';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->toDateString();

        User::with(['budgets', 'depenses'])->chunk(100, function ($users) use ($today) {
            foreach ($users as $user) {
                $hasExpenseToday = $user->depenses()->whereDate('date', $today)->exists();

                if (! $hasExpenseToday) {
                    Alert::firstOrCreate(
                        [
                            'user_id' => $user->id,
                            'message' => 'Rappel : vous n\'avez pas encore enregistré de dépense pour aujourd\'hui.',
                        ],
                        [
                            'is_read' => false,
                        ]
                    );
                }

                foreach ($user->budgets as $budget) {
                    $deployed = $user->depenses()
                        ->whereYear('date', $budget->year)
                        ->whereMonth('date', $budget->month)
                        ->sum('amount');

                    if ($deployed > $budget->amount) {
                        Alert::firstOrCreate(
                            [
                                'user_id' => $user->id,
                                'message' => "Attention : le budget de {$budget->month}/{$budget->year} est dépassé.",
                            ],
                            [
                                'is_read' => false,
                            ]
                        );
                    }
                }
            }
        });

        $this->info('Notifications vérifiées et créées.');
        return 0;
    }
}
