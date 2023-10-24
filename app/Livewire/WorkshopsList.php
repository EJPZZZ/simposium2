<?php

namespace App\Livewire;

use App\Models\Workshop;
use Livewire\Component;

class WorkshopsList extends Component
{
	public $workshops = [];

	public function mount()
	{
		$this->workshops = Workshop::select('name')
			->orderBy('created_at', 'desc')
			->get()
			->toArray();
	}

	public function render()
	{
		return view('livewire.workshops-list');
	}
}
