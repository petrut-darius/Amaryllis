<?php

namespace App\Filament\Widgets;

use App\Mail\AdminUserContacted;
use App\Mail\UserContacted;
use App\Mail\UserSubscribed;
use App\Models\Subscriber;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Override;

class SendEmailWidget extends Widget
{
    protected string $view = 'filament.widgets.send-email-widget';

    public string $selectedMail = "";

    #[Override]
    public static function canView(): bool
    {
        //laravelu stie sa bage useru authenticat ca parametru in Gate::define -> AppServiceProvider
        return Gate::allows("send-newsletter-mails");
    }

    protected array $excludedMailables = [
        AdminUserContacted::class,
        UserContacted::class,
        UserSubscribed::class,
    ];

    /**
     * Ia toate mailurile din namespaceul app/mail
     * @return array
     */
    public function getAvailableMailables(): array {
        $mailables = [];

        //ia pathul pentru folderul aplicatiei Mail
        $mail_path = app_path("Mail");

        //glob() -> gaseste pathnames dupa o anumita logica
        foreach(glob($mail_path . "/*.php") as $file) {
            //basename() -> gen din /abc/file.php -> da doar file.php in cazu meu da doar file, ca se sterge .php
            $class = "App\\Mail\\" . basename($file, ".php");

            if(in_array($class, $this->excludedMailables)) {
                continue;
            }

            //daca extinde
            if(is_subclass_of($class, \Illuminate\Mail\Mailable::class)) {
                $mailables[$class] = basename($file, ".php");
            }
        }

        return $mailables;
    }

    public function dispatchMail(): void {
        abort_unless(Gate::allows("send-newsletter-mails"), 403);

        if(!$this->selectedMail || !class_exists($this->selectedMail)) {
            Notification::make()
                ->title("Selected a mail first")
                ->warning()
                ->send();
            
            return;
        }

        $subscribers = Subscriber::whereColumn("subscribed_at", ">", "unsubscribed_at")->orWhereNull("unsubscribed_at")->get();

        foreach($subscribers as $subscriber) {
            Mail::to($subscriber)->queue(new $this->selectedMail($subscriber->token));
        }

        Notification::make()
            ->title("Queued for {$subscribers->count()} subscribers")
            ->success()
            ->send();
    }

    public function getActions(): array {
        return [
            Action::make("dispatchMail")
                ->requiresConfirmation()
                ->modalHeading("Are you sure?")
                ->action(fn () => $this->dispatchMail()),
        ];
    }
}
