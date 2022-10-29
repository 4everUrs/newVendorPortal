<?php

namespace App\Http\Livewire;

use App\Models\Invoice as ModelsInvoice;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Invoice extends Component
{
    public $sendInvoice;
    public $file_name, $company_name;
    use WithFileUploads;
    public function render()
    {
        return view('livewire.invoice', [
            'invoices' => ModelsInvoice::all(),
        ]);
    }
    public function sendInvoice()
    {
        $originalFileName = $this->file_name->getClientOriginalName();
        $validateData = $this->validate([
            'company_name' => 'required|string'
        ]);
        $validateData['user_id'] = Auth::user()->id;
        $validateData['invoice_id'] = rand(1000, 5000);
        $validateData['file_name'] = $this->file_name->storeAs('invoices', $originalFileName, 'do');
        ModelsInvoice::create($validateData);
        toastr()->addSuccess('Send Successfully');
        $this->reset();
        $this->sendInvoice = false;
    }
}
