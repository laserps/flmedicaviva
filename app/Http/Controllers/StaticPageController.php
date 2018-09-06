<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Paypalpayment;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.home');
    }

    public function agent()
    {
        $data['Agents'] = \App\Models\Agents::get();
        return view('front.authorized',$data);
    }

    public function product()
    {
        return \View::make('front.product',['products'=>\App\Models\Products::paginate(8)]);
    }

    public function payment()
    {
        $insert = [
            'order_no' => 1,
            'sum_price' => str_replace(',','',\Cart::total()),
            'customer_id' => \Auth::id(),
            'status' => 'm',
            'created_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $id = \App\Models\Orders::insertGetId($insert);
        foreach(\Cart::content() as $k => $v) {
            $detail = [
                'order_id' => $id,
                'product_id' => $v->id,
                'promotion_id' => null,
                'quantity' => $v->qty,
                'created_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            \App\Models\OrderDetails::insert($detail);
        }
        return \View::make('front.payment');
    }

    public function aboutus()
    {
        return \View::make('front.aboutus');
    }

    public function contactus()
    {
        return \View::make('front.contactus');
    }

    public function howtobuy()
    {
        return \View::make('front.howtobuy');
    }

    public function member()
    {
        return \View::make('front.register');
    }

    public function contactUsStore(Request $request) {
        $data = $request->all();
        unset($data['_token']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        \DB::beginTransaction();
        try {
            if( \App\Models\Contact::insert($data) ){
                \DB::commit();
                $return['type'] = 'success';
                $return['status'] = 0;
                $return['text'] = 'สำเร็จ';
            }else{
                throw new $e;
                $return['status'] = 1;
            }
        } catch (\Exception $e){
            \DB::rollBack();
            $return['status'] = 1;
            $return['type'] = 'error';
            $return['text'] = 'ไม่สำเร็จ'."\n".$e->getMessage();
        }
        $return['title'] = 'เพิ่มข้อมูล';
        return $return;
    }

    public function memberStore(Request $request) {
        $input_all = $request->all();
        unset($input_all['_token']);
        $input_all['created_at'] = date('Y-m-d H:i:s');
        $input_all['password'] = \Hash::make($input_all['password']);
        $input_all['updated_at'] = date('Y-m-d H:i:s');
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|email',
            'password' =>'required|confirmed',
            'name' => 'required',
            'mobile' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                unset($input_all['password_confirmation']);
                $data_insert = $input_all;
                \App\Models\User::insert($data_insert);
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'สำเร็จ';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'ไม่สำเร็จ'. $e->getMessage();
            }
        } else {
            $failedRules = $validator->failed();
            if (isset($failedRules['email']['Required'])) {
                $return['status'] = 2;
                $return['content'] = 'กรุณาระบุอีเมล';
            } elseif (isset($failedRules['email']['Unique'])) {
                $return['status'] = 2;
                $return['content'] = 'มีผู้ใช้งานอีเมลนี้อยู่แล้ว';
            } elseif (isset($failedRules['email']['Email'])) {
                $return['status'] = 2;
                $return['content'] = 'รูปแบบอีเมลเท่านั้น';
            } elseif (isset($failedRules['password']['Required'])) {
                $return['status'] = 2;
                $return['content'] = 'กรุณาระกรอกรหัสผ่าน';
            } elseif (isset($failedRules['mobile']['Required'])) {
                $return['status'] = 2;
                $return['content'] = 'กรุณากรอกเบอร์โทรศัพท์';
            } elseif (isset($failedRules['name']['Required'])) {
                $return['status'] = 2;
                $return['content'] = 'กรุณาระบุชื่อ-นามสกุล';
            } elseif (isset($failedRules['password']['Confirmed'])) {
                $return['status'] = 2;
                $return['content'] = 'รหัสผ่านไม่ตรงกัน';
            } else {
                $return['status'] = 0;
            }
        }
        $return['title'] = '';
        return json_encode($return);
    }
    public function memberEdit(Request $request) {
        if(\Auth::id()) {
            return \View::make('front.editProfile',[
                'data' => \Auth::user(),
                'address' => \App\Models\CustomerAddress::where('customer_id',\Auth::id())->get(),
            ]);
        } else {
            return redirect('/');
        }
    }

    public function memberUpdate(Request $request) {
        $input_all = $request->all();
        $address = $input_all['address'];
        unset($input_all['_token']);
        unset($input_all['address']);
        $input_all['updated_at'] = date('Y-m-d H:i:s');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $data_insert = $input_all;
                \App\Models\User::where('id',\Auth::id())->update($data_insert);
                $arr = [];
                foreach($address as $k => $v) {
                    $v['customer_id'] = \Auth::id();
                    if(!isset($v['status'])) {
                        $v['status'] = 'F';
                    }
                    $id = '';
                    if(isset($v['id'])) {
                        $id = $v['id'];
                        unset($v['id']);
                        \App\Models\CustomerAddress::where('id',$id)->update($v);
                    } else {
                        $id = \App\Models\CustomerAddress::insertGetId($v);
                    }
                    $arr[] = $id;
                }
                \App\Models\CustomerAddress::where('customer_id',\Auth::id())->whereNotIn('id',$arr)->delete();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'สำเร็จ';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'ไม่สำเร็จ'. $e->getMessage();
            }
        } else {
            $failedRules = $validator->failed();
            if (isset($failedRules['name']['Required'])) {
                $return['status'] = 2;
                $return['content'] = 'กรุณาระบุชื่อ-นามสกุล';
            } elseif (isset($failedRules['mobile']['Required'])) {
                $return['status'] = 2;
                $return['content'] = 'กรุณากรอกเบอร์โทรศัพท์';
            } else {
                $return['status'] = 0;
            }
        }
        $return['title'] = '';
        return json_encode($return);
    }

    public function ProductDetail($id=null) {
        if($id!=null) {
            return \View::make('front.productdetail',['details'=>\App\Models\Products::find($id)]);
        }
        return redirect('product');
    }

    public function addProduct($product=null, $qty=null, Request $request) {
        $product_detail = \App\Models\Products::find($product);
        $check = 1;
        $rowId = '';
        if(sizeof(\Cart::content())>0) {
            foreach(\Cart::content() as $k => $v) {
                if($v->id==$product) {
                    $check = 0;
                    $rowId = $k;
                }
            }
            if($check==0) {
                \Cart::update($rowId, ['qty' => ($v->qty+$qty)]);
            } else {
                \Cart::add($product, $product_detail->product_name, $qty, $product_detail->sell_price,['img' => $product_detail->product_image]);
            }
        } else {
            \Cart::add($product, $product_detail->product_name, $qty, $product_detail->sell_price,['img' => $product_detail->product_image]);
        }
        return 0;
    }

    public function Checkout() {
        return \View::make('front.checkout',['details'=>\App\Models\Products::get()[0]]);
    }

    public function CheckoutStore(Request $request) {
        foreach ($request->qty as $k => $v) {
            \Cart::update($k, ['qty' => $v]);
        }
        return json_encode(\Cart::content());
    }

    /*
    * Process payment using credit card
    */
    public function paywithCreditCard()
    {
        // ### Address
        // Base Address object used as shipping or billing
        // address in a payment. [Optional]
        $shippingAddress = Paypalpayment::shippingAddress();
        $shippingAddress->setLine1("3909 Witmer Road")
            ->setLine2("Niagara Falls")
            ->setCity("Niagara Falls")
            ->setState("NY")
            ->setPostalCode("14305")
            ->setCountryCode("US")
            ->setPhone("716-298-1822")
            ->setRecipientName("Jhone");

        // ### CreditCard
        $card = Paypalpayment::creditCard();
        $card->setType("visa")
            ->setNumber("4758411877817150")
            ->setExpireMonth("05")
            ->setExpireYear("2019")
            ->setCvv2("456")
            ->setFirstName("Joe")
            ->setLastName("Shopper");

        // ### FundingInstrument
        // A resource representing a Payer's funding instrument.
        // Use a Payer ID (A unique identifier of the payer generated
        // and provided by the facilitator. This is required when
        // creating or using a tokenized funding instrument)
        // and the `CreditCardDetails`
        $fi = Paypalpayment::fundingInstrument();
        $fi->setCreditCard($card);

        // ### Payer
        // A resource representing a Payer that funds a payment
        // Use the List of `FundingInstrument` and the Payment Method
        // as 'credit_card'
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("credit_card")
            ->setFundingInstruments([$fi]);

        $item1 = Paypalpayment::item();
        $item1->setName('Ground Coffee 40 oz')
                ->setDescription('Ground Coffee 40 oz')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setTax(0.3)
                ->setPrice(7.50);

        $item2 = Paypalpayment::item();
        $item2->setName('Granola bars')
                ->setDescription('Granola Bars with Peanuts')
                ->setCurrency('USD')
                ->setQuantity(5)
                ->setTax(0.2)
                ->setPrice(2);


        $itemList = Paypalpayment::itemList();
        $itemList->setItems([$item1,$item2])
            ->setShippingAddress($shippingAddress);


        $details = Paypalpayment::details();
        $details->setShipping("1.2")
                ->setTax("1.3")
                //total of items prices
                ->setSubtotal("17.5");

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency("USD")
                // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
                ->setTotal("20")
                ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions([$transaction]);

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
            $payment->create(Paypalpayment::apiContext());
            \Cart::destroy();
        } catch (\PPConnectionException $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }

        return response()->json([$payment->toArray()], 200);
    }
}
