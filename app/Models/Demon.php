<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Demon extends Model
{
    /**
     * DEMON ATTRIBUTES
     * $this->attributes['id'] - int - contains the demon primary key (id)
     * $this->attributes['name'] - string - contains the demon name
     * $this->attributes['blood_amount'] - int - contains the demon blood amount
     * $this->attributes['hierarchy'] - string - contains the demon hierarchy
     * $this->attributes['created_at'] - timestamp - contains the creation date
     * $this->attributes['updated_at'] - timestamp - contains the update date
     */
    protected $fillable = [
        'name',
        'blood_amount',
        'hierarchy',
    ];

    public static function validate($request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'blood_amount' => 'required|integer|min:0',
            'hierarchy' => 'required|in:rey,luna,comun',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getBloodAmount(): int
    {
        return $this->attributes['blood_amount'];
    }

    public function setBloodAmount(int $bloodAmount): void
    {
        $this->attributes['blood_amount'] = $bloodAmount;
    }

    public function getHierarchy(): string
    {
        return $this->attributes['hierarchy'];
    }

    public function setHierarchy(string $hierarchy): void
    {
        $this->attributes['hierarchy'] = $hierarchy;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getFormattedCreatedAt(): string
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y H:i');
    }

    public function getDisplayedBloodAmount(): int
    {
        if ($this->getHierarchy() === 'rey') {
            return $this->getBloodAmount() * 2;
        }

        return $this->getBloodAmount();
    }

    public function getBreathingMessage(): string
    {
        if ($this->getHierarchy() === 'luna') {
            return 'Concentra tu respiración';
        }

        return '';
    }

    public function getDisplayedHierarchy(): string
    {
        if ($this->getHierarchy() === 'comun') {
            return 'común';
        }

        return $this->getHierarchy();
    }
}
