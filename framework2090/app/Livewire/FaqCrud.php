<?php

namespace App\Livewire;

use App\Models\Faq;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class FaqCrud extends Component
{
    use WithFileUploads, WithPagination;


    // To customize the pagination theme if needed (optional)
    protected $paginationTheme = 'bootstrap';
    // Form fields
    public $faq_id, $question, $answer, $search;

    // Flag to switch between create and edit mode
    public $isEditMode = false;

    // When updating any property, reset the page to 1
    protected $updatesQueryString = ['page'];

    // This property will hold the available tags from the database.
    public $availableTags = [];


    public function render()
    {
        $faqs = Faq::where('question', 'like', '%' . $this->search . '%')
            ->orWhere('answer', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view('livewire.admin.faq-crud', compact('faqs'));
    }


    public function resetInputFields()
    {
        $this->question = '';
        $this->answer = '';
        $this->faq_id = null;
        $this->isEditMode = false;
    }

    public function store()
    {
        try {
            $this->validate([
                'question' => 'required|string:max:255',
                'answer' => 'required|string:max:255',
            ]);

            Faq::create([
                'question' => $this->question,
                'answer' => $this->answer
            ]);
        } catch (\Exception $exception) {
            session()->flash('message', $exception->getMessage().'=>'.$exception->getLine());
        }

        session()->flash('message', 'Faq created successfully.');
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $faqs = Faq::findOrFail($id);
        $this->question = $faqs->question;
        $this->answer = $faqs->answer;
        $this->faq_id = $faqs->id;
        $this->isEditMode = true;

        // Dispatch a browser event to scroll to the form
        $this->dispatch('scroll-to-form');
    }


    public function update()
    {
        try {
            $this->validate([
                'question' => 'required|string:max:255',
                'answer' => 'required|string:max:255',
            ]);

            $portfolio = Faq::findOrFail($this->faq_id);

            $portfolio->update([
                'question' => $this->question,
                'answer' => $this->answer
            ]);
        } catch (\Exception $exception) {
            session()->flash('message', $exception->getMessage().'=>'.$exception->getLine());
        }

        session()->flash('message', "Faq updated successfully.");
        $this->resetInputFields();
    }

    // Delete a portfolio record
    public function delete($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        session()->flash('message', "Faq deleted successfully.");
    }
}
