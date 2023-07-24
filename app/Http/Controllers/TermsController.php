<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\term;
use Illuminate\Http\Request;
use Exception;

class TermsController extends Controller
{

    /**
     * Display a listing of the terms.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $term = term::first();
        if($term){
            return view('terms.edit', compact('term'));
        }else{
            return view('terms.create');
        }

        return view('terms.index', compact('terms'));
    }

    /**
     * Show the form for creating a new term.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('terms.create');
    }

    /**
     * Store a new term in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            term::create($data);

            return redirect()->route('terms.term.index')
                ->with('success_message', trans('terms.model_was_added'));
        } catch (Exception $exception) {
dd($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('terms.unexpected_error')]);
        }
    }

    /**
     * Display the specified term.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $term = term::findOrFail($id);

        return view('terms.show', compact('term'));
    }

    /**
     * Show the form for editing the specified term.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $term = term::findOrFail($id);


        return view('terms.edit', compact('term'));
    }

    /**
     * Update the specified term in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $term = term::findOrFail($id);
            $term->update($data);

            return redirect()->route('terms.term.index')
                ->with('success_message', trans('terms.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('terms.unexpected_error')]);
        }
    }

    /**
     * Remove the specified term from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $term = term::findOrFail($id);
            $term->delete();

            return redirect()->route('terms.term.index')
                ->with('success_message', trans('terms.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('terms.unexpected_error')]);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'term_ar' => 'string|min:1|nullable',
            'term_en' => 'string|min:1|nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
