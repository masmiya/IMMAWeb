<?php

namespace App\Http\Controllers;

use App\Category;
use App\GlobalDoc;
use App\Product;
use App\Setting;
use App\UserDoc;
use Illuminate\Http\Request;
use App\Port;
use App\PortSupplier;
use App\User;
use App\Link;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function ports(Request $request) {
        $ports = Port::all();

        return view('pages.ports.ports', [
            'ports' => $ports
        ]);
    }

    public function showNewPort(Request $request) {
        return view('pages.ports.new_port');
    }

    public function showEditPort(Request $request, $id) {
        $port = Port::find($id);


        return view('pages.ports.edit_port', [
            'port' => $port
        ]);
    }

    public function storePort(Request $request, $id) {
        $port = Port::findOrNew($id);

        if($request->has('name')) {
            $port->name = $request->input('name');
        }

        if($request->has('longitude')) {
            $long = $request->input('longitude');

            $long = preg_replace('/[^0-9.\-]/', '', $long);
            $port->longitude = $long;
        }

        if($request->has('latitude')) {
            $lat = $request->input('latitude');

            $lat = preg_replace('/[^0-9.\-]/', '', $lat);
            $port->latitude = $lat;
        }

        if($request->has('country')) {
            $port->country = $request->input('country');
        }

        if($request->has('description')) {
            $port->description = $request->input('description');
        }

        $port->save();

        return redirect()->route('ports');
    }

    public function newPort(Request $request) {
        $port = new Port;

        if($request->has('name')) {
            $port->name = $request->input('name');
        }

        if($request->has('longitude')) {
            $long = $request->input('longitude');

            $long = preg_replace('/[^0-9.\-]/', '', $long);
            $port->longitude = $long;
        }

        if($request->has('latitude')) {
            $lat = $request->input('latitude');

            $lat = preg_replace('/[^0-9.\-]/', '', $lat);
            $port->latitude = $lat;
        }

        if($request->has('country')) {
            $port->country = $request->input('country');
        }

        if($request->has('description')) {
            $port->description = $request->input('description');
        }

        $port->save();

        return redirect()->route('ports');
    }


    public function deletePort(Request $request, $id) {
        $port = Port::find($id);

        if($port != null) {
            $port->delete();
        }

        return redirect()->route('ports');
    }




    /* Port Suppliers */

    public function suppliers(Request $request) {
        $port_id = $request->input('port_id');

        if ($port_id == null) {
            $suppliers = PortSupplier::all();
        } else {
            $port = Port::findOrFail($port_id);
            $suppliers = $port->suppliers();
        }
        

        return view('pages.suppliers.suppliers', [
            'suppliers' => $suppliers
        ]);
    }

    public function showNewSupplier(Request $request) {
        $ports = Port::all();
        return view('pages.suppliers.new_supplier', [
                'ports' => $ports
            ]);
    }

    public function showEditSupplier(Request $request, $id) {
        $supplier = PortSupplier::find($id);
        $ports = Port::all();


        return view('pages.suppliers.edit_supplier', [
            'ports' => $ports,
            'supplier' => $supplier
        ]);
    }

    public function storeSupplier(Request $request, $id) {
        $supplier = PortSupplier::findOrNew($id);

        if($request->has('company_name')) {
            $supplier->company_name = $request->input('company_name');
        }

        if($request->has('port_id')) {
            $supplier->port_id = $request->input('port_id');
        }

        if($request->has('issa_membership_number')) {
            $supplier->issa_membership_number = $request->input('issa_membership_number');
        }

        if($request->has('website')) {
            $supplier->website = $request->input('website');
        }

        if($request->has('category')) {
            $supplier->category = $request->input('category');
        }

        if($request->has('specialised_in')) {
            $supplier->specialised_in = $request->input('specialised_in');
        }

        if($request->has('address')) {
            $supplier->address = $request->input('address');
        }

        if($request->has('phone')) {
            $supplier->phone = $request->input('phone');
        }

        if($request->has('fax')) {
            $supplier->fax = $request->input('fax');
        }

        if($request->has('hours')) {
            $supplier->hours = $request->input('hours');
        }

        if($request->has('email')) {
            $supplier->email = $request->input('email');
        }

        if($request->has('contact1_name')) {
            $supplier->contact1_name = $request->input('contact1_name');
        }

        if($request->has('contact1_mobile')) {
            $supplier->contact1_mobile = $request->input('contact1_mobile');
        }

        if($request->has('contact2_name')) {
            $supplier->contact2_name = $request->input('contact2_name');
        }

        if($request->has('contact2_mobile')) {
            $supplier->contact2_mobile = $request->input('contact2_mobile');
        }

        if($request->has('also_serves')) {
            $supplier->also_serves = $request->input('also_serves');
        }

        if($request->has('iso')) {
            $supplier->iso = $request->input('iso');
        }



        $supplier->save();

        return redirect()->route('suppliers');
    }

    public function newSupplier(Request $request) {
        $supplier = new PortSupplier();

        if($request->has('company_name')) {
            $supplier->company_name = $request->input('company_name');
        }

        if($request->has('port_id')) {
            $supplier->port_id = $request->input('port_id');
        }

        if($request->has('issa_membership_number')) {
            $supplier->issa_membership_number = $request->input('issa_membership_number');
        }

        if($request->has('website')) {
            $supplier->website = $request->input('website');
        }

        if($request->has('category')) {
            $supplier->category = $request->input('category');
        }

        if($request->has('specialised_in')) {
            $supplier->specialised_in = $request->input('specialised_in');
        }

        if($request->has('address')) {
            $supplier->address = $request->input('address');
        }

        if($request->has('phone')) {
            $supplier->phone = $request->input('phone');
        }

        if($request->has('fax')) {
            $supplier->fax = $request->input('fax');
        }

        if($request->has('hours')) {
            $supplier->hours = $request->input('hours');
        }

        if($request->has('email')) {
            $supplier->email = $request->input('email');
        }

        if($request->has('contact1_name')) {
            $supplier->contact1_name = $request->input('contact1_name');
        }

        if($request->has('contact1_mobile')) {
            $supplier->contact1_mobile = $request->input('contact1_mobile');
        }

        if($request->has('contact2_name')) {
            $supplier->contact2_name = $request->input('contact2_name');
        }

        if($request->has('contact2_mobile')) {
            $supplier->contact2_mobile = $request->input('contact2_mobile');
        }

        if($request->has('also_serves')) {
            $supplier->also_serves = $request->input('also_serves');
        }

        if($request->has('iso')) {
            $supplier->iso = $request->input('iso');
        }



        $supplier->save();

        return redirect()->route('suppliers');
    }


    public function deleteSupplier(Request $request, $id) {
        $supplier = PortSupplier::find($id);

        if($supplier != null) {
            $supplier->delete();
        }

        return redirect()->route('suppliers');
    }


    /*
     * Settings
     */

    public function settings(Request $request) {
        $setting = Setting::all()->first();

        $admin = User::where('type', 'admin')->get()->first();

        if($setting == null) {
            $setting = new Setting();
        }

        return view('pages.settings.settings', [
            'setting'=>$setting,
            'admin'=>$admin,
        ]);
    }

    public function storeSettings(Request $request) {
        $setting = Setting::all()->first();
        $admin = User::where('type', 'admin')->get()->first();

        if($admin == null) {
            $admin = new User;

            $admin->type = 'admin';
        }

        if($setting == null) {
            $setting = new Setting;
        }

        $admin->name = $request->input('admin_username');
        $admin->email = $request->input('admin_email');
        if($request->has('admin_password') && $request->input('admin_password') != "") {
            $admin->password = Hash::make($request->input('admin_password'));
        }
        
        $admin->save();

        if($request->has('order_emails')) {
            $setting->order_emails = $request->input('order_emails');
        }

        if($request->has('info_page')) {
            $setting->info_page = $request->info_page;
        }
        $setting->save();



        return redirect()->route('settings');
    }

    /*
     * Global Documents
     */

    public function globaldocs(Request $request) {
        $docs = GlobalDoc::all();

        return view('pages.documents.globaldocs', [
            'docs' => $docs
        ]);
    }

    public function showNewGlobalDoc(Request $request) {
        return view('pages.documents.new_globaldoc');
    }

    public function showEditGlobalDoc(Request $request, $id) {
        $doc = GlobalDoc::find($id);


        return view('pages.documents.edit_globaldoc', [
            'doc' => $doc
        ]);
    }

    public function storeGlobalDoc(Request $request, $id) {
        $doc = GlobalDoc::findOrNew($id);

        if($request->has('document_name')) {
            $doc->document_name = $request->input('document_name');
        }

        if($request->hasFile('docfile')) {
            if($doc->version == null) {
                $doc->version = 1;
            } else {
                $doc->version = $doc->version+1;
            }

            $file_name = 'file_'.$id.'_v'.$doc->version.'.' .
                $request->file('docfile')->getClientOriginalExtension();

            $request->file('docfile')->move(
                base_path() . '/public/attachments/', $file_name
            );

            $doc->url = './attachments/' . $file_name;
        }

        $doc->save();



        return redirect()->route('globaldocs');
    }

    public function newGlobalDoc(Request $request) {
        $doc = new GlobalDoc();

        if($request->has('document_name')) {
            $doc->document_name = $request->input('document_name');
        }

        $doc->version = 0;

        if($request->hasFile('docfile')) {
            $doc->save();
            $id = $doc->id;


            if($doc->version == null) {
                $doc->version = 1;
            } else {
                $doc->version = $doc->version+1;
            }

            $file_name = 'file_'.$id.'_v'.$doc->version.'.' .
                $request->file('docfile')->getClientOriginalExtension();


            $request->file('docfile')->move(
                base_path() . '/public/attachments/', $file_name
            );

            $doc->url = './attachments/' . $file_name;
        }

        $doc->save();

        return redirect()->route('globaldocs');
    }


    public function deleteGlobalDoc(Request $request, $id) {
        $doc = GlobalDoc::find($id);

        if($doc != null) {
            $doc->delete();
        }

        return redirect()->route('globaldocs');
    }

    /*
     * User Documents
     */

    public function userdocs(Request $request) {
        $docs = UserDoc::all();

        return view('pages.documents.userdocs', [
            'docs' => $docs
        ]);
    }


    /*
     * Product Categories & Subcategories
     */

    public function showCategories(Request $request) {
        $categories = Category::all();

        return view('pages.categories.categories', [
            'categories' => $categories
        ]);
    }

    public function showCreateCategory(Request $request) {
        return view('pages.categories.new_category');
    }

    public function showEditCategory(Request $request, $id) {
        $c = Category::findOrNew($id);

        return view('pages.categories.edit_category', [
            'category'=>$c,
        ]);
    }

    public function deleteCategory(Request $request, $id) {
        $c = Category::find($id);

        if($c != null) {
            $c->delete();
        }

        return redirect()->route('categories');
    }

    public function newCategory(Request $request) {
        $c = new Category();

        if($request->has('name')) {
            $c->name = $request->input('name');
        }

        if($request->has('order')) {
            $c->order = $request->input('order');
        }

        if($request->has('info')) {
            $c->info = $request->input('info');
        }

        $c->save();

        return redirect()->route('categories');
    }

    public function storeCategory(Request $request, $id) {
        $c = Category::findOrNew($id);

        if($request->has('name')) {
            $c->name = $request->input('name');
        }

        if($request->has('order')) {
            $c->order = $request->input('order');
        }

        if($request->has('info')) {
            $c->info = $request->input('info');
        }

        $c->save();

        return redirect()->route('categories');
    }

    public function showCreateSubCategory(Request $request, $id) {
        $c = Category::findOrFail($id);

        return view('pages.categories.new_subcategory', [
            'category'=>$c
        ]);
    }

    public function showEditSubCategory(Request $request, $id, $subid) {
        $c = Category::findOrFail($id);
        // $s = SubCategory::findOrFail($subid);

        return view('pages.categories.edit_subcategory', [
            'category'=>$c,
            // 'subcategory' =>$s,
        ]);
    }

    public function deleteSubCategory(Request $request, $id, $subid) {
        $s = SubCategory::find($subid);

        if($s != null)
        {
            $s->delete();
        }

        return redirect('/categories/'.$id.'/edit');
    }

    public function createSubCategory(Request $request, $id) {
        $s = new SubCategory();
        $s->category_id = $id;

        if($request->has('name')) {
            $s->name = $request->input('name');
        }

        if($request->has('order')) {
            $s->order = $request->input('order');
        }
        $s->save();

        return redirect('/categories/'.$id.'/edit');
    }

    public function storeSubCategory(Request $request, $id, $subid) {
        $s = SubCategory::find($subid);
        $s->category_id = $id;

        if($request->has('name')) {
            $s->name = $request->input('name');
        }

        if($request->has('order')) {
            $s->order = $request->input('order');
        }
        $s->save();

        return redirect('/categories/'.$id.'/edit');
    }

    /*
     * Products & Sub Products
     */

    public function showProducts(Request $request) {
        if($request->has('category_id')) {
            $category_id = $request->input('category_id');
            $category = Category::find($category_id);
        } else {
            $category = Category::first();
        }

        $products = $category->productsOnly();

        $categories = Category::all();

        return view('pages.products.products', [
            'products' => $products,
            'categories' => $categories,
            'category_id' => $category->id,
        ]);
    }

    public function showCreateProduct(Request $request) {
        $categories = Category::orderBy('order')->get();
        return view('pages.products.new_product', [
                'categories'=>$categories,
            ]);
    }

    public function showEditProduct(Request $request, $id) {
        $p = Product::findOrNew($id);
        $subproducts = $p->subproducts();

        $categories = Category::orderBy('order')->get();

        return view('pages.products.edit_product', [
            'categories'=>$categories,
            'product'=>$p,
            'subproducts'=>$subproducts
        ]);
    }

    public function deleteProduct(Request $request, $id) {
        $p = Product::find($id);

        if($p != null) {
            $p->delete();
        }

        return redirect()->route('products');
    }

    public function newProduct(Request $request) {


        $p = new Product;

        if($request->has('category_id')) {
            $p->category_id = $request->input('category_id');
        }
        $p->sub_product_of = "";

        if($request->has('imma_id_code')) {
            $p->imma_id_code = $request->input('imma_id_code');
        }

        if($request->has('order')) {
            $p->order = $request->input('order');
        }

        if($request->has('name')) {
            $p->name = $request->input('name');
        }
        if($request->has('description')) {
            $p->description = $request->input('description');
        }


        if($request->has('rec_quantity_10')) {
            $p->rec_quantity_10 = $request->input('rec_quantity_10');
        }

        if($request->has('rec_quantity_20')) {
            $p->rec_quantity_20 = $request->input('rec_quantity_20');
        }
        if($request->has('rec_quantity_30')) {
            $p->rec_quantity_30 = $request->input('rec_quantity_30');
        }

        if($request->has('rec_quantity_40')) {
            $p->rec_quantity_40 = $request->input('rec_quantity_40');
        }

        if($request->has('comment')) {
            $p->comment = $request->input('comment');
        }

        if($request->has('more_than_24')) {
            $p->more_than_24 = $request->input('more_than_24');
        }

        if($request->has('less_than_24')) {
            $p->less_than_24 = $request->input('less_than_24');
        }

        if($request->has('less_than_2')) {
            $p->less_than_2 = $request->input('less_than_2');
        }

        if($request->has('dosage')) {
            $p->dosage = $request->input('dosage');
        }

        if($request->has('reference')) {
            $p->reference = $request->input('reference');
        }

        if($request->has('ordering_size')) {
            $p->ordering_size = $request->input('ordering_size');
        }

        if($request->has('quantity_required')) {
            $p->quantity_required = $request->input('quantity_required');
        }

        if($request->hasFile('image')) {
            $p->save();
            $id = $p->id;


            $file_name = 'p'.$id.'.' .
                $request->file('image')->getClientOriginalExtension();


            $request->file('image')->move(
                base_path() . '/public/attachments/', $file_name
            );

            $p->image_url = './attachments/' . $file_name;
        }

        $p->save();

        return redirect('/products/'.$p->id.'/edit');
    }

    public function storeProduct(Request $request, $id) {
        $p = Product::findOrFail($id);

        if($request->has('sub_category_id')) {
            $p->sub_category_id = $request->input('sub_category_id');
        }

        if($request->has('imma_id_code')) {
            $p->imma_id_code = $request->input('imma_id_code');
        }

        if($request->has('order')) {
            $p->order = $request->input('order');
        }

        if($request->has('name')) {
            $p->name = $request->input('name');
        }
        if($request->has('description')) {
            $p->description = $request->input('description');
        }



        if($request->has('rec_quantity_10')) {
            $p->rec_quantity_10 = $request->input('rec_quantity_10');
        }

        if($request->has('rec_quantity_20')) {
            $p->rec_quantity_20 = $request->input('rec_quantity_20');
        }
        if($request->has('rec_quantity_30')) {
            $p->rec_quantity_30 = $request->input('rec_quantity_30');
        }

        if($request->has('rec_quantity_40')) {
            $p->rec_quantity_40 = $request->input('rec_quantity_40');
        }

        if($request->has('comment')) {
            $p->comment = $request->input('comment');
        }

        if($request->has('more_than_24')) {
            $p->more_than_24 = $request->input('more_than_24');
        }

        if($request->has('less_than_24')) {
            $p->less_than_24 = $request->input('less_than_24');
        }

        if($request->has('less_than_2')) {
            $p->less_than_2 = $request->input('less_than_2');
        }

        if($request->has('dosage')) {
            $p->dosage = $request->input('dosage');
        }

        if($request->has('reference')) {
            $p->reference = $request->input('reference');
        }

        if($request->has('ordering_size')) {
            $p->ordering_size = $request->input('ordering_size');
        }

        if($request->has('quantity_required')) {
            $p->quantity_required = $request->input('quantity_required');
        }

        if($request->hasFile('image')) {
            $id = $p->id;

            $file_name = 'p'.$id.'.' .
                $request->file('image')->getClientOriginalExtension();


            $request->file('image')->move(
                base_path() . '/public/attachments/', $file_name
            );

            $p->image_url = './attachments/' . $file_name;
        }

        $p->save();

        return redirect()->route('products');
    }

    public function showCreateSubProduct(Request $request, $id) {
        $p = Product::findOrFail($id);

        return view('pages.products.new_subproduct', [
            'product'=>$p
        ]);
    }

    public function showEditSubProduct(Request $request, $id, $subid) {
        $p = Product::findOrFail($id);
        $s = Product::findOrFail($subid);
        $subproducts = $p->subproducts();

        return view('pages.products.edit_subproduct', [
            'product'=>$p,
            'sub_product' =>$s,
            'subproducts' =>$subproducts,
        ]);
    }

    public function deleteSubProduct(Request $request, $id, $subid) {
        $s = Product::find($subid);

        if($s != null)
        {
            $s->delete();
        }

        return redirect('/products/'.$id.'/edit');
    }

    public function createSubProduct(Request $request, $id) {
        $s = new Product();
        $p = Product::find($id);
        $s->sub_product_of = $p->imma_id_code;
        $s->category_id = $p->category_id;

        if($request->has('imma_id_code')) {
            $s->imma_id_code = $request->input('imma_id_code');
        }

        if($request->has('order')) {
            $s->order = $request->input('order');
        }

        if($request->has('name')) {
            $s->name = $request->input('name');
        }
        if($request->has('description')) {
            $s->description = $request->input('description');
        }

        if($request->has('rec_quantity_10')) {
            $s->rec_quantity_10 = $request->input('rec_quantity_10');
        }

        if($request->has('rec_quantity_20')) {
            $s->rec_quantity_20 = $request->input('rec_quantity_20');
        }
        if($request->has('rec_quantity_30')) {
            $s->rec_quantity_30 = $request->input('rec_quantity_30');
        }

        if($request->has('rec_quantity_40')) {
            $s->rec_quantity_40 = $request->input('rec_quantity_40');
        }

        if($request->has('comment')) {
            $s->comment = $request->input('comment');
        }

        if($request->has('more_than_24')) {
            $s->more_than_24 = $request->input('more_than_24');
        }

        if($request->has('less_than_24')) {
            $s->less_than_24 = $request->input('less_than_24');
        }

        if($request->has('less_than_2')) {
            $s->less_than_2 = $request->input('less_than_2');
        }

        if($request->has('dosage')) {
            $s->dosage = $request->input('dosage');
        }

        if($request->has('reference')) {
            $s->reference = $request->input('reference');
        }

        if($request->has('ordering_size')) {
            $s->ordering_size = $request->input('ordering_size');
        }

        if($request->has('quantity_required')) {
            $s->quantity_required = $request->input('quantity_required');
        }

        if($request->hasFile('image')) {
            $s->save();
            $id = $s->id;


            $file_name = 'p'.$id.'.' .
                $request->file('image')->getClientOriginalExtension();


            $request->file('image')->move(
                base_path() . '/public/attachments/', $file_name
            );

            $s->image_url = './attachments/' . $file_name;
        }

        $s->save();

        return redirect('/products/'.$id.'/edit');
    }

    public function storeSubProduct(Request $request, $id, $subid) {
        $s = Product::find($subid);

        if($request->has('imma_id_code')) {
            $s->imma_id_code = $request->input('imma_id_code');
        }

        if($request->has('order')) {
            $s->order = $request->input('order');
        }

        if($request->has('name')) {
            $s->name = $request->input('name');
        }
        if($request->has('description')) {
            $s->description = $request->input('description');
        }

        if($request->has('rec_quantity_10')) {
            $s->rec_quantity_10 = $request->input('rec_quantity_10');
        }

        if($request->has('rec_quantity_20')) {
            $s->rec_quantity_20 = $request->input('rec_quantity_20');
        }
        if($request->has('rec_quantity_30')) {
            $s->rec_quantity_30 = $request->input('rec_quantity_30');
        }

        if($request->has('rec_quantity_40')) {
            $s->rec_quantity_40 = $request->input('rec_quantity_40');
        }

        if($request->has('comment')) {
            $s->comment = $request->input('comment');
        }

        if($request->has('more_than_24')) {
            $s->more_than_24 = $request->input('more_than_24');
        }

        if($request->has('less_than_24')) {
            $s->less_than_24 = $request->input('less_than_24');
        }

        if($request->has('less_than_2')) {
            $s->less_than_2 = $request->input('less_than_2');
        }

        if($request->has('dosage')) {
            $s->dosage = $request->input('dosage');
        }

        if($request->has('reference')) {
            $s->reference = $request->input('reference');
        }

        if($request->has('ordering_size')) {
            $s->ordering_size = $request->input('ordering_size');
        }

        if($request->has('quantity_required')) {
            $s->quantity_required = $request->input('quantity_required');
        }

        if($request->hasFile('image')) {
            $id = $s->id;


            $file_name = 'p'.$id.'.' .
                $request->file('image')->getClientOriginalExtension();


            $request->file('image')->move(
                base_path() . '/public/attachments/', $file_name
            );

            $s->image_url = './attachments/' . $file_name;
        }

        $s->save();

        return redirect('/products/'.$id.'/edit');
    }

}
