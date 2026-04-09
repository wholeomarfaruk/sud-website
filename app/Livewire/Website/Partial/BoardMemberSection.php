<?php

namespace App\Livewire\Website\Partial;

use App\Models\Members;
use Livewire\Component;

class BoardMemberSection extends Component
{
    public $selectedMember;
    public $memberModalOpen = false;

    public function render()
    {
        $members = Members::where('status', 1)->orderBy('order', 'asc')->get();

        return view('livewire.website.partial.board-member-section', compact('members'));
    }
    public function memberDetails($id)
    {
        $member = Members::find($id);
        $this->selectedMember = $member;
        $this->memberModalOpen = true;

    }
}
