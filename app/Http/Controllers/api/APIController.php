<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Port;
use App\PortSupplier;
use App\Category;
use App\SubCategory;
use App\Product;
use App\User;
use DB;
use Mailgun;
use App\Setting;
use App\GlobalDoc;
use App\UserDoc;
use App\Link;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{

    public function about() {
        $setting = Setting::all()->first();

        return $setting->info_page;
    }
    public function ports() {
    	$ports = Port::orderBy('country', 'ASC')->orderBy('name', 'ASC')->get();

    	return $ports;
    }

    public function suppliers(Request $request) {
    	if($request->has('port_id')) {
    		$port_id = $request->input('port_id');
    		$port = Port::find($port_id);
    		$suppliers = $port->suppliers()	;
    	} else {
    		$suppliers = PortSupplier::all();
    	} 

    	return $suppliers;
    }

    public function categories(Request $request) {
    	$categories = Category::orderBy('order')->get();

    	return $categories;
    }

    public function subcategories(Request $request) {
        $category_id = $request->input('category_id');
        $c = Category::find($category_id);
        $subcategories = $c->subcategories();

        return $subcategories;
    }

    public function products(Request $request) {
        $cat_id = $request->input('category_id');
        $s = Category::findOrFail($cat_id);
        $products = $s->products();

        return $products;
    }

    public function items(Request $request) {
        $items_list = $request->input('items');
        $items = explode(",", $items_list);

        $ret = array();
        foreach($items as $item) {
            $p = Product::find($item);
            $ret[] = $p;
        }

        return $ret;
    }

    public function purchase(Request $request) {
        $items_list = $request->input('items');
        $items = explode(",", $items_list);

        $purchase_items = array();
        foreach($items as $item) {
            $array = explode(":", $item);
            $id = $array[0];
            $count = $array[1];

            $purchase_items[$id] = array();

            $product = Product::find($id);
            $purchase_items[$id]["name"] = $product->name;
            $purchase_items[$id]["description"] = $product->description;
            $purchase_items[$id]["imma_id_code"] = $product->imma_id_code;
            $purchase_items[$id]["count"] = $count;
        }

        $admin = Setting::all()->first();
        $order_emails = $admin->order_emails;

        $user = Auth::user();
        $user_email = $user->email;

        $data['items'] = $purchase_items;
        if($order_emails && $order_emails != "") {
            $email_addresses = explode("\r\n", $order_emails);
            $email_addresses[] = $user_email;

            if ($email_addresses && count($email_addresses) > 0) {
                Mailgun::send(['html'=>'emails.purchase'], $data, function($message) use ($email_addresses){
                    foreach($email_addresses as $email) {
                        $message->to($email, 'IMMA');
                    }
                    $message->from('test@test.com');
                    $message->subject('IMMA Request');
                });
            } else {

            }
        }

        return response()->json(['status'=>'OK']);
    }

    public function globaldocs() {
        $docs = GlobalDoc::all();

        return $docs;
    }

    public function getUserDocs() {
        $user = Auth::user();

        if ($user) {
            $docs = UserDoc::where('user_id', $user->id)->get();

            return $docs;
        } else {
            //auth failed
        }
    }

    public function storeUserDoc(Request $request) {
        $user = Auth::user();

        if($user) {
            $userid = $user->id;
            $slot = $request->input('slot');

            $doc = UserDoc::where('user_id', $userid)->where('slot', $slot)->get()->first();

            if($doc == null) {
                $doc = new UserDoc;
            }
            

            $doc->user_id = $userid;
            $doc->document_name = $request->input('name');
            $doc->slot = $slot;

            if($request->hasFile('docfile')) {
                $file_name = 'file_'.$user->id.'_slot'.$doc->slot.$doc->version.'.' .
                    $request->file('docfile')->getClientOriginalExtension();

                $request->file('docfile')->move(
                    base_path() . '/public/attachments/', $file_name
                );

                $doc->url = './attachments/' . $file_name;
            }

            $doc->save();

            return $doc;
        }
    }

    public function addSlot(Request $request) {
        $user = Auth::user();

        $user->slots += 1;
        $user->save();

        return $user;
    }

    public function deleteSlot(Request $request) {
        $user = Auth::user();

        $slot = $request->input('slot');
        $userdocs = UserDoc::where('user_id', $user->id)->where('slot', $slot)->get();

        foreach($userdocs as $userdoc) {
            $userdoc->delete();
        }
    }

    public function processUploadRequest(Request $request) {
        $user = Auth::user();
        $slot = $request->input('slot');

        $link = Link::where('user_id', $user->id)->where('slot', $slot)->get()->first();

        if ($link == null) {
            $link = new Link();
        }

        $link->user_id = $user->id;
        $link->slot = $slot;

        $key = str_random(30);
        while(true) {
            $l = Link::where('key', $key)->get()->first();

            if ($l != null) {
                $key = str_random(30);
            } else {
                break;
            }
        }

        $link->key = $key;
        $link->save();

        //send email

        $admin = Setting::all()->first();
        $order_emails = $admin->order_emails;

        $data['url'] = url('/link')."?key=".$key;
        $data['slot'] = $slot;
        $to = $user->email;
        $manager_email = env('MANAGER_EMAIL');
        
        Mailgun::send(['html'=>'emails.link'], $data, function($message) use ($to, $manager_email){
            $message->to($to);
            $message->from($manager_email);
            $message->subject('IMMA Document Upload');
        });
    }

    
}
