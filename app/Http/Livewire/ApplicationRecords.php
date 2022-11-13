<?php

namespace App\Http\Livewire;

use App\Models\Bidder;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplicationRecords extends Component
{
    public $sendInvoice = false;
    public $file_name;
    public $selected_id;
    use WithFileUploads;
    public function render()
    {
        return view('livewire.application-records', [
            'applications' => Bidder::where('user_id', Auth::user()->id)->get(),
        ]);
    }
    public function loadModal($id)
    {
        $this->sendInvoice = true;
        $this->selected_id = $id;
    }
    public function send()
    {
        $filename = $this->file_name->getClientOriginalName();
        $this->validate([
            'file_name' => 'required|mimes:pdf,docx',
        ]);
        $temp = Bidder::find($this->selected_id);
        $temp->invoice_file = $filename;
        $temp->save();
        Invoice::create([
            'user_id' => Auth::user()->id,
            'post_id' => $temp->post_id,
            'bidder_id' => $this->selected_id,
            'status' => 'Pending',
            'file_name' => $this->file_name->storeAs('invoices', $filename, 'do'),
        ]);
        toastr()->addSuccess('Send Invoice Successfully');
        $this->sendInvoice = false;
    }
}
