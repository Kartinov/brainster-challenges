<?php

require_once __DIR__ . '/Model.php';

class Registration extends Model
{
    protected string $table = 'registrations';

    public function registrationExpirationColor(object $registration): string
    {
        $today = time();
        $expired_at = strtotime($registration->registration_expired_at);
        $monthBefore = strtotime($registration->registration_expired_at . ' - 30 days');

        $textColor = 'text-dark';

        if ($today > $expired_at) {
            $textColor = 'text-danger';
        } elseif ($today > $monthBefore) {
            $textColor = 'text-warning';
        }

        return $textColor;
    }

    public function isExtendable(object $registration): bool
    {
        $today = time();
        $expired_at = strtotime($registration->registration_expired_at);
        $monthBefore = strtotime($registration->registration_expired_at . ' - 30 days');

        $isExtendable = false;

        if ($today > $expired_at || $today > $monthBefore) {
            $isExtendable = true;
        }

        return $isExtendable;
    }
}
