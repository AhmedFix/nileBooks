<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\BookResource as BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Validator;

class BooksController extends BaseController
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        
        return $this->sendResponse(BookResource::collection($books), 'Books retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'details' => 'required',
            'imgPath' => 'required',
            'pdfUrl' => 'required',
            'rate' => 'required',
            'pagesCount' => 'required',
            'state'  => 'required',
            'author_id' => 'required|exists:App\Models\Author,id',
            'category_id' => 'required|exists:App\Models\Category,id'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $book = Book::create([
            'name' => $input['name'],
            'details' => $input['details'],
            'imgPath' => $input['imgPath'],
            'pdfUrl' => $input['pdfUrl'],
            'rate' => $input['rate'],
            'pagesCount' => $input['pagesCount'],
            'state'  => $input['state'],
        ]);


        $book->authers()->attach($input['author_id']);
        $book->categories()->attach($input['category_id']);
        

        return $this->sendResponse(new BookResource($book), 'Book created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
  
        if (is_null($book)) {
            return $this->sendError('Book not found.');
        }
        return $this->sendResponse(new BookResource($book), 'Book retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'details' => 'required',
            'imgPath' => 'required',
            'pdfUrl' => 'required',
            'rate' => 'required',
            'pagesCount' => 'required',
            'state'  => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $book->name = $input['name'];
        $book->details = $input['details'];
        $book->imgPath = $input['imgPath'];
        $book->pdfUrl = $input['pdfUrl'];
        $book->rate = $input['rate'];
        $book->pagesCount = $input['pagesCount'];
        $book->state = $input['state'];
        $book->save();
   
        return $this->sendResponse(new BookResource($book), 'Book updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
   
        return $this->sendResponse([], 'Book deleted successfully.');
    }
}
