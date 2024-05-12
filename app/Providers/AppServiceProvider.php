<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ApprovalLog;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Share notification message with all views
        view()->composer('*', function ($view) {
            if (Auth::check() && Auth::user()->user_type === 'student') {
                $notificationMessage = $this->getNotificationMessage();
                $view->with('notificationMessage', $notificationMessage);
            }
        });
    }

    private function getNotificationMessage()
    {
        $studentId = Auth::user()->student_id;
        $approvalLog = ApprovalLog::where('student_id', $studentId)->first(); // Retrieve only one approval log
        $notificationMessages = [];

        if ($approvalLog) {
            $notificationMessages = [
                'Endorsed Comment' => $approvalLog->notes,
                'Evaluate Comment' => $approvalLog->approve_notes,
                'Register Comment' => $approvalLog->register_notes,
                'Enroll Comment' =>  $approvalLog->enroll_notes,
            ];
        }

        return $notificationMessages;
    }

    
}
