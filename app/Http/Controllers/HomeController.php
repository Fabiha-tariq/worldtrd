<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    public function index()
    {

        $whatsappgroup = Db::select('select * from whatsappgroup');
        session()->put('whatsapplink', $whatsappgroup[0]->link);

        $withdrawcount = DB::select('select count(*) as withdrawcount from transaction,withdraw  where transaction.transaction_id = withdraw.withdraw_id and transaction.type = 1 and transaction.status = 0');
        $depositcount = DB::select('select count(*) as depositcount from transaction,deposit  where transaction.transaction_id = deposit.deposit_id and transaction.type = 0 and transaction.status = 0');

        session()->put('withdrawcount', $withdrawcount[0]->withdrawcount);
        session()->put('depositcount', $depositcount[0]->depositcount);

        $notification = Db::select('select * from notification_table limit 1');

        session()->put('notification', $notification[0]->notification_desc);

        $result = Db::select('SELECT * FROM dollar_charges');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);

        $data = Db::select('SELECT *,plan.status as pstatus from plan INNER join plan_category on plan.cat_id = plan_category.cat_id limit 4');

        return view('frontend.index', compact('data'));
    }
    public function about()
    {

        $notification = Db::select('select * from notification_table limit 1');

        session()->put('notification', $notification[0]->notification_desc);

        return view('frontend.about');
    }
    public function plans()
    {

        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);

        $whatsappgroup = Db::select('select * from whatsappgroup');
        session()->put('whatsapplink', $whatsappgroup[0]->link);

        $notification = Db::select('select * from notification_table limit 1');

        session()->put('notification', $notification[0]->notification_desc);


        $data = Db::select('SELECT *,plan.status as pstatus from plan INNER join plan_category
         on plan.cat_id = plan_category.cat_id where plan.is_deleted = 0 order by plan.profit_daily');

        return view('frontend.plans', compact('data'));
    }
    public function contact()
    {

        $notification = Db::select('select * from notification_table limit 1');

        $data = Db::select('SELECT * FROM `service_center` limit 1');



        session()->put('notification', $notification[0]->notification_desc);

        return view('frontend.contact', compact('data'));
    }

    function contactstore(Request $req)
    {
        $req->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'text' => 'required',
            'message' => 'required'
        ]);
    }

    public function login()
    {

        $notification = Db::select('select * from notification_table limit 1');

        session()->put('notification', $notification[0]->notification_desc);


        if (session()->has('email')) {
            return redirect('/');
        }

        return view('frontend.login');
    }

    public function loginstore(Request $req)
    {
        $req->validate([
            'email' => 'required | max: 50',
            'password' => 'required | max: 50',
        ]);

        $whatsappgroup = Db::select('select * from whatsappgroup');
        session()->put('whatsapplink', $whatsappgroup[0]->link);



        $result = Db::select(
            'select * from user where user_email = ? and user_password = ? ',
            [$req->email, $req->password]
        );

        if (!$result) {

            session()->flash('status', 'Login Failed! Email and Password is In Correct');


            return redirect('/login');
        }
        if ($result) {


            if ($result[0]->status == 0 || $result[0]->delstatus == 1) {

                session()->flash('status', 'Login Failed! Your Account is Inactive');
                return redirect('/login');
            } else {


                $upliner = Db::select('select * from user where user_id = ?', [$result[0]->parent_id]);
                if ($upliner) {

                    session()->put('upliner', $upliner[0]->user_name);
                }
                session()->flash('statusl', '1');

                session()->put('id', $result[0]->user_id);
                session()->put('name', $result[0]->user_name);
                session()->put('email', $result[0]->user_email);
                session()->put('role', $result[0]->role);
                session()->put('access', $result[0]->access);


                if (session()->get('role') == 3) {
                    return redirect('/dashboard');
                }
            }

            return redirect('/');
        }
    }

    public function invest($id)
    {

        $notification = Db::select('select * from notification_table limit 1');

        session()->put('notification', $notification[0]->notification_desc);

        $investamount =  Db::select('SELECT sum(invest.amount) as iamount
        FROM `invest` inner join plan on invest.plan_id = plan.plan_id
       inner join user on user.user_id = invest.user_id WHERE now() BETWEEN invest.date AND invest.end_date
        and plan.plan_id = ? and user.user_id = ?',[$id,session()->get('id')]);


        $data = Db::select('select * from plan where plan_id = ?', [$id]);
        return view('frontend.invest', compact('data','investamount'));
    }

    public function investstore(Request $req, $id)
    {
        $req->validate([
            'amount' => 'required'
        ]);

        $rsult = Db::select('select * from plan where plan_id = ?', [$id]);

    //     $data =  Db::select('SELECT invest.invest_id,plan.plan_id,invest.amount
    //     FROM `invest` inner join plan on invest.plan_id = plan.plan_id
    //    inner join user on user.user_id = invest.user_id WHERE now() BETWEEN invest.date AND invest.end_date
    //    and plan.profit_daily != 1 and plan.plan_id = ? and user.user_id = ?',[$id,session()->get('id')]);

       $data =  Db::select('SELECT sum(invest.amount) as iamount
        FROM `invest` inner join plan on invest.plan_id = plan.plan_id
       inner join user on user.user_id = invest.user_id WHERE now() BETWEEN invest.date AND invest.end_date
        and plan.plan_id = ? and user.user_id = ?',[$id,session()->get('id')]);

      $itamount = $data[0]->iamount;

      $itamount += $req->amount;

    if($itamount > $rsult[0]->maximum_amount){

            session()->flash('status', 'Your Amount is Exceed from Maximum Amount !!!');

            $ffsdd = "invest/$id";
            return redirect($ffsdd);
    }

        if ($rsult) {

            $deposit = Db::select('SELECT sum(transaction.amount) as depositamount from transaction, deposit INNER JOIN user on
            deposit.user_id = user.user_id where
        deposit.deposit_id  = transaction.transaction_id and deposit.user_id = ? and
        transaction.status = 1 and transaction.type = 0', [session()->get('id')]);

        $withdraw = Db::select('SELECT sum(transaction.amount) as withdrawamount from transaction,
            withdraw  INNER JOIN user on
        withdraw.user_id = user.user_id where withdraw.withdraw_id  = transaction.transaction_id and
        withdraw.user_id = ?  and transaction.type = 1 and transaction.status != 2', [session()->get('id')]);

            $invest = Db::select('SELECT sum(transaction.amount) as investamount from transaction, invest
        INNER JOIN user on
        invest.user_id = user.user_id where invest.invest_id  = transaction.transaction_id and
        invest.user_id = ? and transaction.status = 1 and transaction.type = 2', [session()->get('id')]);

            $profit = Db::select('SELECT sum(profite.amount) as profitamount from profite inner join user on profite.user_id = user.user_id
            inner join transaction on transaction.transaction_id = profite.profite_id where user.user_id = ?
            and transaction.type = 3', [session()->get('id')]);

            $chargescut = Db::select('SELECT sum(charges_tbl.amount) as chargesamount from charges_tbl inner join user on charges_tbl.user_id = user.user_id
            inner join transaction on transaction.transaction_id = charges_tbl.charges_id where user.user_id = ?
            and transaction.type = 5 and charges_tbl.status = 1', [session()->get('id')]);


            $commission = Db::select('SELECT sum(comission.amount) as comissionamount from comission inner join user on comission.user_id = user.user_id
            inner join transaction on transaction.transaction_id = comission.comissionid where user.user_id = ?
            and transaction.type = 4', [session()->get('id')]);

            $aamount_return = Db::select('SELECT sum(capital_amount.amount) as capitalamount from capital_amount inner join user on capital_amount.user_id = user.user_id
            inner join transaction on transaction.transaction_id = capital_amount.capital_id where user.user_id = ?
            and transaction.type = 6', [session()->get('id')]);

            $balance = $deposit[0]->depositamount - $invest[0]->investamount;

            $balance = $balance - $withdraw[0]->withdrawamount;
            $balance = $balance - $chargescut[0]->chargesamount;

            $balance = $balance +  round($profit[0]->profitamount, 2) +
                $commission[0]->comissionamount + $aamount_return[0]->capitalamount;

            if ($balance >= $req->amount) {

                $data = Db::select('select * from plan where plan_id = ?', [$id]);

                if ($req->amount >= $data[0]->minimum_amount && $req->amount <= $data[0]->maximum_amount) {
                    $a = $data[0]->duration_number;
                    $b = $data[0]->duration_type;

                    $result1 = Db::insert(
                        "insert into invest(plan_id,user_id,amount,status,end_date) values(?,?,?,?,date_add(CURRENT_TIMESTAMP(),interval $a day))",
                        [$id, session()->get('id'), $req->amount, 1]
                    );

                    if ($result1) {

                        $data = Db::select('select * from invest order by invest_id desc limit 1');

                        Db::insert(
                            'insert into transaction(type,transaction_id,user_id,amount,status) values(?,?,?,?,?)',
                            [2, $data[0]->invest_id, session()->get('id'), $req->amount, 1]
                        );

                        $user = Db::select('select * from user where user_id = ?', [session()->get('id')]);

                        $l1  = Db::select('select * from user where user_id  = ?', [$user[0]->parent_id]);

                        $com = Db::select('select * from teamcomission where level = 1');

                        $per = $req->amount / 100;
                        $per = $per * $com[0]->comission_per;

                        if ($l1) {
                            DB::insert(
                                'insert into comission(invest_id,user_id,from_user,amount) values(?,?,?,?)',
                                [$data[0]->invest_id, $l1[0]->user_id, session()->get('id'), $per]
                            );

                            $dd = Db::select('select * from comission order by comissionid desc limit 1');

                            Db::insert('insert into transaction(type,transaction_id,user_id,amount,status)
                            values(?,?,?,?,?)', [4, $dd[0]->comissionid, $l1[0]->user_id, $per, 1]);
                            $l2  = Db::select('select * from user where user_id  = ?', [$l1[0]->parent_id]);

                            if ($l2) {
                                $com = Db::select('select * from teamcomission where level = 2');

                                $per = $req->amount / 100;
                                $per = $per * $com[0]->comission_per;

                                DB::insert(
                                    'insert into comission(invest_id,user_id,from_user,amount) values(?,?,?,?)',
                                    [$data[0]->invest_id, $l2[0]->user_id, session()->get('id'), $per]
                                );

                                $dd = Db::select('select * from comission order by comissionid desc limit 1');

                                Db::insert('insert into transaction(type,transaction_id,user_id,amount,status)
                                values(?,?,?,?,?)', [4, $dd[0]->comissionid, $l2[0]->user_id, $per, 1]);

                                $l3  = Db::select('select * from user where user_id  = ?', [$l2[0]->parent_id]);

                                if ($l3) {
                                    $com = Db::select('select * from teamcomission where level = 3');

                                    $per = $req->amount / 100;
                                    $per = $per * $com[0]->comission_per;

                                    DB::insert(
                                        'insert into comission(invest_id,user_id,from_user,amount) values(?,?,?,?)',
                                        [$data[0]->invest_id, $l3[0]->user_id, session()->get('id'), $per]
                                    );
                                    $dd = Db::select('select * from comission order by comissionid desc limit 1');

                                    Db::insert('insert into transaction(type,transaction_id,user_id,amount,status)
                                values(?,?,?,?,?)', [4, $dd[0]->comissionid, $l3[0]->user_id, $per, 1]);

                                    $l4  = Db::select('select * from user where user_id  = ?', [$l3[0]->parent_id]);
                                    if ($l4) {
                                        $com = Db::select('select * from teamcomission where level = 4');

                                        $per = $req->amount / 100;
                                        $per = $per * $com[0]->comission_per;

                                        DB::insert(
                                            'insert into comission(invest_id,user_id,from_user,amount) values(?,?,?,?)',
                                            [$data[0]->invest_id, $l4[0]->user_id, session()->get('id'), $per]
                                        );

                                        $dd = Db::select('select * from comission order by comissionid desc limit 1');

                                        Db::insert('insert into transaction(type,transaction_id,user_id,amount,status)
                                values(?,?,?,?,?)', [4, $dd[0]->comissionid, $l4[0]->user_id, $per, 1]);
                                    }
                                }
                            }
                        }

                        session()->flash('status', 'Invest Successfully');
                        return redirect('/plans');
                    }
                } else {

                    session()->flash('status', 'Invalid Amount Check Minimum and Maximum Amount');

                    return redirect()->back();
                }
            }




            session()->flash('status1', 'First You Deposit Amount');
            return redirect('/plans');
        }
        return redirect('/plans');
    }

    public function register($id)
    {

        if (session()->has('email')) {

            return redirect('/');
        } else {


            $notification = Db::select('select * from notification_table limit 1');

            session()->put('notification', $notification[0]->notification_desc);


            $pid = (($id) / 2033149);

            $result = Db::select('select * from user where user_id = ?', [$pid]);
            if ($result) {

                return view('frontend.register', compact('pid'));
            } else {
                $pid = 0;
                return view('frontend.register', compact('pid'));
            }
        }
    }

    public function registerstore(Request $req, $id)
    {


        $pid = (($id) / 2033149);


        $req->validate([
            'name' => 'required | max:50',
            'phone' => 'required | max:12',
            'email' => 'required | email | max:50',
            'password' => 'required | min:6 | max:50',
            'conpassword' => 'required | max:50 | same:password',

        ]);

        $result1 = Db::select('select * from user where user_email = ?', [$req->email]);

        if ($result1) {
            session()->flash('status', 'Email Already Registered');
            return redirect()->back();
        } else {

            $result2 = DB::insert('insert into user (user_name,user_phone,user_email,user_password,status,parent_id,role)
            values (?,?,?,?,?,?,?)', [$req->name, $req->phone, $req->email, $req->password, 1, $id, 0]);
            if ($result2) {
                session()->flash('status1', 'You are Registered');
                return redirect()->back();
            }
        }
    }

    public function logout()
    {

        session()->forget('id');
        session()->forget('name');
        session()->forget('email');
        session()->forget('role');
        session()->forget('upliner');
        session()->forget('access');

        return redirect('/');
    }
}
