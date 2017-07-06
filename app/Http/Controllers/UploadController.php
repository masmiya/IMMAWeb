<?php

namespace App\Http\Controllers;

use App\Category;
use App\GlobalDoc;
use App\Product;
use App\Setting;
use App\SubCategory;
use App\SubProduct;
use App\UserDoc;
use Illuminate\Http\Request;
use App\Port;
use App\PortSupplier;
use App\User;
use App\Link;
use Illuminate\Support\Facades\Hash;

class UploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function processLink(Request $request) {
        if($request->has('key')) {
            $key = $request->input('key');

            $link = Link::where('key', $key)->get()->first();

            if($link) {
                $user_id = $link->user_id;
                $slot = $link->slot;

                return view('pages.upload', [
                    'user_id'=> $user_id,
                    'slot'=> $slot
                    ]);
            }

        }

        return "Invalid Request";
        
    }

    public function processUpload(Request $request) {
        $user_id = $request->input('user_id');
        $slot = $request->input('slot');

        if($request->has('name')) {
            $name = $request->input('name');
        } else {
            $name = 'unamed';
        }
        

        $doc = UserDoc::where('user_id', $user_id)->where('slot', $slot)->get()->first();

        if($doc == null) {
            $doc = new UserDoc;
            $doc->user_id = $user_id;
            $doc->slot = $slot;
        }

        $doc->document_name = $name;

        if($request->hasFile('docfile')) {
            $file_name = 'file_'.$user_id.'_slot'.$slot.'.' .
                $request->file('docfile')->getClientOriginalExtension();

            $request->file('docfile')->move(
                base_path() . '/public/attachments/', $file_name
            );

            $doc->url = './attachments/' . $file_name;

            $doc->save();

            $link = Link::where('user_id', $user_id)->where('slot', $slot)->get()->first();
            $link->delete();

            return view('pages.success');
            
        } else {
            return view('pages.upload', [
                'user_id'=>$user_id,
                'slot'=>$slot
                ]);
        }
    }
}