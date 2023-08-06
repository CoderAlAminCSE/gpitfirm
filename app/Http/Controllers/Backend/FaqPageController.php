<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\FaqPageContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FaqPageController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $faqs = FaqPageContent::where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('question', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $faqs = FaqPageContent::latest()->paginate(10);
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
        return view('backend.pages.faq.index', compact('faqs'));
    }



    public function create(Request $request)
    {
        // validation start
        $validate = $request->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ]); // end of validation

        try {
            $faq = new FaqPageContent();
            $faq->icon_name = $request->icon_name;
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->active = $request->active ? true : false;
            $faq->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'FAQ added successfully');
        return back();
    }


    public function edit($id)
    {
        $faq = FaqPageContent::findOrFail($id);
        return view('backend.pages.faq.edit', compact('faq'));
    }


    public function update(Request $request, $id)
    {
        // validation start
        $validate = $request->validate([
            'question' => ['required'],
            'answer' => ['required'],
        ]); // end of validation

        try {
            $faq = FaqPageContent::findOrFail($id);
            $faq->icon_name = $request->icon_name;
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->active = $request->active ? true : false;
            $faq->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'FAQ updated successfully');
        return redirect()->route('pages.faq.index');
    }


    public function delete($id)
    {
        $faq = FaqPageContent::findOrFail($id);
        $faq->delete();
        Session::flash('success', 'FAQ deleted successfully');
        return back();
    }
}
