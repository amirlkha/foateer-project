<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Foateer;
use App\Models\Foateer_attachments;
use App\Models\Foateer_details;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\User;
use App\Notifications\Newfoateer;
use Illuminate\Support\Facades\Notification;



class FoateerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foateers=Foateer::all();
        return view('foatter.foateer',compact('foateers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $sections=Section::all();
        $products=products::all();
        return view('foatter.addfoateer',compact('sections','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
    { 
        Foateer::create([
            'foateer_number'=>$request->foateer_number,
            'foateer_Date'=>$request->foateer_Date,
            'Due_date'=>$request->Due_date,
            'product'=>$request->product,
            'section_id' => $request->section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'note' => $request->note,
            'Status' => $request->Status ?? 'Pending',
            'Value_Status'=>2
    ]);
         $foateer_id=Foateer::latest()->first()->id;
         Foateer_details::create([
            'id_foateer'=>$foateer_id,
            'foateer_number'=>$request->foateer_number,
            'product'=>$request->product,
            'section'=>$request->section,
            'note' => $request->note,
            'Status' => $request->Status ?? 'Pending',
            'Value_Status'=>2,
            'user'=>(Auth::user()->name)
         ]);
         if ($request->hasFile('pic')) {

            $foateer_id = Foateer::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $foateer_number = $request->foateer_number;

            $attachments = new Foateer_Attachments();
            $attachments->file_name = $file_name;
            $attachments->foateer_number = $foateer_number;
            $attachments->Created_by = Auth::user()->name;
            $attachments->foateer_id = $foateer_id;
            $attachments->save();}
            
            $user = User::find(Auth::user()->id);
            $foateer = Foateer::latest()->first();
            //  $user->notify(new Newfoateer($foateer));
            Notification::send($user, new Newfoateer($foateer));
    
         
            session()->flash('Add', 'تم اضافة الفاتورة بنجاح');
            return back();
         
         }

    /**
     * Display the specified resource.
     */
    public function show(Foateer $foateer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foateer $foateer ,$id)
    {
        $foateer=Foateer::where('id',$id)->first();
        $section=Section::all();
        $product=products::where('id',$foateer->product)->pluck('Product_name')->first();
        return view('foatter.editfoateer',compact('foateer','section','product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foateer $foateer)
    {
      // return $request;
    

   
    $foateer = Foateer::findOrFail($request->foateer_id);
$foateer->update([
    'foateer_number' => $request->foateer_number,
    'foateer_Date' => $request->foateer_Date,
    'Due_date' => $request->Due_date,
    'product' => $request->product,
    'section_id' => $request->section_id,
    'Amount_collection' => $request->Amount_collection,
    'Amount_Commission' => $request->Amount_Commission,
    'Value_VAT' => $request->Value_VAT,
    'Rate_VAT' => $request->Rate_VAT,
    'Total' => $request->Total,
    'note' => $request->note,
]);

    
    session()->flash('edit', 'تم تعديل الفاتورة بنجاح');
    return back();
    
    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
    
        $id=$request->foateer_id;
        $foateer=Foateer::where('id',$id)->first();
        $foateer->delete();

        return redirect('/foateer');

      
    }
    // public function getproducts($id){
    //     $products=DB::table("product")->where("section_id",$id)->pluck("product","id");
        
    //     return json_encode($products);

    // }
    public function getproducts($id)
    {
        $products = DB::table("products")->where("section_id", $id)->pluck("name", "id");
        return response()->json($products);
    }
}
