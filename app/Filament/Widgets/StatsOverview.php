<?php

namespace App\Filament\Widgets;

use App\Models\Attendee;
use App\Models\Workshop;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
	protected function getStats(): array
	{
		return [
			Stat::make('Asistentes', Attendee::get()->count()),
			Stat::make('Talleres', Workshop::get()->count()),
		];
	}
}
