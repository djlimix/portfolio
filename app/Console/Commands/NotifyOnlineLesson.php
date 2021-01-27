<?php

namespace App\Console\Commands;

use App\Lesson;
use App\Notifications\OnlineLessonNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotifyOnlineLesson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'school:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if there is any upcoming online lesson, if so, then send me an email 10 minutes before lesson';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command
     */
    public function handle()
    {
        $carbon = Carbon::now()->addMinutes(10);
        $time = $carbon->format('H:i') . ':00';

        $week = ($carbon->weekOfYear % 2) + 1;

        $day = $carbon->dayOfWeek;

        if ($time == "07:40:00") {
            $this->info("Checking for online lessons for the whole day");
            $lessons = Lesson::where('day', '=', $day)->whereWeek($week)->orderBy('start')->get();
            if (count($lessons) > 0) {
                $this->info("Lessons found, notifying user...");
                $user = new User();
                $user->email = 'maximilian.csank.student@gymes.eu';
                $user->notify(new OnlineLessonNotification($lessons));
                return $this->info("User was notified.");
            }

        } else {
            $this->info("Checking for online lessons");
            $lesson = Lesson::whereStart($time)->where('day', '=', $day)->whereWeek($week);
            if ($lesson->exists()) {
                $this->info("Lesson found, notifying user...");
                $user = new User();
                $user->email = 'maximilian.csank.student@gymes.eu';
                $user->notify(new OnlineLessonNotification($lesson->get()));
                return $this->info("User was notified.");
            }
        }
        return $this->info("There is no upcoming lesson");
    }
}
