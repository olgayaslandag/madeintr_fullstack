<?php

namespace App\Enums;

enum UserRankEnum: string
{
    case Member = 'member';
    case CompanyUser = 'company_user';
    case Editor = 'editor';
    case Admin = 'admin';

    public function id(): int
    {
        return match ($this) {
            self::Member => 0,
            self::CompanyUser => 1,
            self::Editor => 2,
            self::Admin => 3,
        };
    }

    public function label(): string
    {
        return match($this) {
            self::Member => 'Üye',
            self::CompanyUser => 'Şirket Kullanıcısı',
            self::Editor => 'Editör',
            self::Admin => 'Admin',
        };
    }

    public static function getLabel(int $id): ?string
    {
        foreach (self::cases() as $case) {
            if ($case->id() === $id) {
                return $case->label();
            }
        }

        return null;
    }
}
