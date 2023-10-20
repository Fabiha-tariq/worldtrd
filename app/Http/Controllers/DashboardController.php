<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        if ($req->withdraw) {

            if ($req->withdraw == 1) {

                Db::update('update withdrawoff set status = 1');
                return redirect('/dashboard');
            } else {

                Db::update('update withdrawoff set status = 0');
                return redirect('/dashboard');
            }
        }


        $whatsappgroup = Db::select('select * from whatsappgroup');
        session()->put('whatsapplink', $whatsappgroup[0]->link);

        $withdrawoff = Db::select('select * from withdrawoff');
        session()->put('withdrawoff', $withdrawoff[0]->status);


        $withdrawcount = DB::select('select count(*) as withdrawcount from transaction,withdraw  where transaction.transaction_id = withdraw.withdraw_id and transaction.type = 1 and transaction.status = 0');
        $depositcount = DB::select('select count(*) as depositcount from transaction,deposit  where transaction.transaction_id = deposit.deposit_id and transaction.type = 0 and transaction.status = 0');

        session()->put('withdrawcount', $withdrawcount[0]->withdrawcount);
        session()->put('depositcount', $depositcount[0]->depositcount);


        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);


        Db::update('UPDATE invest INNER JOIN plan on plan.plan_id = invest.plan_id
        set invest.status = 2 WHERE not now() BETWEEN date AND end_date');

        $returnamount2 =  Db::select('SELECT * FROM `invest` inner join plan on invest.plan_id = plan.plan_id
        WHERE plan.profit_daily = 0 and not now() BETWEEN date AND end_date');

        foreach ($returnamount2 as $item) {

            $dailyper = $item->daily_profit_percentage;
            $monthlyper = $dailyper * $item->duration_number;
            $amount = $item->amount;
            $one_per = $amount / 100;
            $montly_amount  = $one_per * $monthlyper;
            $userid = $item->user_id;

            $result2 =  Db::select(
                "select * from capital_amount where invest_id = ? and user_id = ? and plan_id = ?  ",
                [$item->invest_id, $item->user_id, $item->plan_id]
            );


            if (!$result2) {


                Db::insert("INSERT INTO profite(invest_id,user_id,amount,date,status)
                VALUES ($item->invest_id,$userid,$montly_amount,now(),1)");

                $row = Db::select('select * from profite order by profite_id desc limit 1');

                Db::insert('insert into transaction(type,transaction_id,user_id,amount,status)
                   values(?,?,?,?,?)', [3, $row[0]->profite_id, $userid, $montly_amount, 1]);
            }
        }


        $returnamount =  Db::select('SELECT * FROM `invest` inner join plan on invest.plan_id = plan.plan_id
        WHERE not now() BETWEEN date AND end_date');

        if ($returnamount) {

            foreach ($returnamount as $item) {

                $result2 =  Db::select(
                    "select * from capital_amount where invest_id = ? and user_id = ? and plan_id = ?  ",
                    [$item->invest_id, $item->user_id, $item->plan_id]
                );

                if (!$result2) {

                    $aa =  Db::insert(
                        'insert into capital_amount(user_id,plan_id,invest_id,amount,expire_date_of_plan) values(?,?,?,?,?)',
                        [$item->user_id, $item->plan_id, $item->invest_id, $item->amount, $item->end_date]
                    );

                    if ($aa) {

                        $dd = Db::select('select * from capital_amount order by capital_id desc limit 1');
                        if ($dd) {

                            Db::insert('INSERT INTO `transaction`(`type`, `transaction_id`, `user_id`, `amount`, `status`) VALUES
                (?,?,?,?,?)', [6, $dd[0]->capital_id, $dd[0]->user_id, $dd[0]->amount, 1]);
                        }
                    }
                } else {
                }
            }
        }



        $data = DB::select("SELECT * FROM `invest` inner join plan on invest.plan_id = plan.plan_id
        WHERE plan.profit_daily = 1 and now() > date_add(date ,INTERVAL 24 hour) AND now() BETWEEN date AND end_date");



        if ($data) {

            foreach ($data as $item) {
                $date = $item->date;
                $investid = $item->invest_id;
                $userid = $item->user_id;
                $amount = $item->amount;
                $per = $item->daily_profit_percentage;
                $one_per = $amount / 100;
                $profit = $one_per * $per;

                $result2 =  Db::select("select * from profite where invest_id = ? and user_id = ? and date(date) = date(now())", [$investid, $userid]);

                if (!$result2) {

                    Db::insert("INSERT INTO profite(invest_id,user_id,amount,date,status)
                 VALUES ($investid,$userid,$profit,now(),1)");

                    $row = Db::select('select * from profite order by profite_id desc limit 1');

                    Db::insert('insert into transaction(type,transaction_id,user_id,amount,status)
                    values(?,?,?,?,?)', [3, $row[0]->profite_id, $userid, $profit, 1]);
                } else {
                }
            }
        }



        if (session()->get('role') == 0) {

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

            $mycommission = 0;
            $pendingwithdraw = 0;
        } else if (session()->get('role') == 1) {

            $investeduser = 0;
            $chargescut = 0;
            $aamount_return = 0;
            $mycommission = 0;
            $deposit = 0;
            $withdraw = 0;
            $balance = 0;
            $invest = 0;
            $profit = 0;
            $countuser = 0;
            $deluser = 0;
            $commission = 0;
            $pendingwithdraw = 0;

            return view('dashboard.‌index', compact('investeduser', 'chargescut', 'aamount_return', 'mycommission', 'deposit', 'withdraw', 'balance', 'invest', 'profit', 'countuser', 'deluser', 'commission', 'pendingwithdraw'));
        } else {

            $deposit = Db::select('SELECT sum(transaction.amount) as depositamount from transaction,
            deposit INNER JOIN user on deposit.user_id = user.user_id where
        deposit.deposit_id  = transaction.transaction_id  and transaction.type = 0 and transaction.status = 1');

            $withdraw = Db::select('SELECT sum(transaction.amount) as withdrawamount from transaction, withdraw
        INNER JOIN user on withdraw.user_id = user.user_id where withdraw.withdraw_id  = transaction.transaction_id
         and transaction.type = 1 and transaction.status != 2');

            $pendingwithdraw = Db::select('SELECT sum(transaction.amount) as withdrawamount from transaction,
            withdraw  INNER JOIN user on
                withdraw.user_id = user.user_id where withdraw.withdraw_id  = transaction.transaction_id
             and transaction.type = 1 and transaction.status != 1 and transaction.status != 2');

            //     $todaydeposit = Db::select('SELECT sum(transaction.amount) as depositamount from transaction,
            //     deposit  INNER JOIN user on
            //         deposit.user_id = user.user_id where deposit.deposit_id  = transaction.transaction_id
            //      and transaction.type = 0 and transaction.status = 1 and date(transaction.date) = ?',[2023-06-22]);

            // dd($todaydeposit);


            $invest = Db::select('SELECT sum(transaction.amount) as investamount from transaction, invest
        INNER JOIN user on
        invest.user_id = user.user_id where invest.invest_id  = transaction.transaction_id
        and transaction.type = 2 and transaction.status = 1');

            $profit = Db::select('SELECT sum(profite.amount) as profitamount from profite inner join user on profite.user_id = user.user_id
            inner join transaction on transaction.transaction_id = profite.profite_id where transaction.type = 3');

            $commission = Db::select('SELECT sum(comission.amount) as comissionamount from comission inner join user on comission.user_id = user.user_id
            inner join transaction on transaction.transaction_id = comission.comissionid
                and transaction.type = 4');


            $chargescut = Db::select('SELECT sum(charges_tbl.amount) as chargesamount from charges_tbl inner join user on charges_tbl.user_id = user.user_id
            inner join transaction on transaction.transaction_id = charges_tbl.charges_id where transaction.type = 5
            and  charges_tbl.status = 1');


            $aamount_return = Db::select('SELECT sum(capital_amount.amount) as capitalamount from capital_amount inner join user on capital_amount.user_id = user.user_id
            inner join transaction on transaction.transaction_id = capital_amount.capital_id where  transaction.type = 6');


            $balance = $deposit[0]->depositamount - $invest[0]->investamount;
            $balance =  $balance - $withdraw[0]->withdrawamount;
            $balance = $balance - $chargescut[0]->chargesamount;

            $balance = $balance +  round($profit[0]->profitamount, 2) +
                $commission[0]->comissionamount + $aamount_return[0]->capitalamount;


            $mycommission = Db::select('SELECT sum(comission.amount) as comissionamount from comission inner join user on
             comission.user_id = user.user_id inner join transaction on transaction.transaction_id = comission.comissionid
              where user.user_id = ? and transaction.type = 4', [session()->get('id')]);
        }

        $countuser =  Db::select('select count(*) as count from user where delstatus = 0 and role = 0');

        $deluser =  Db::select('select count(*) as count from user where delstatus = 1 and role = 0');

        $investeduser =  Db::select('select count(*) as iusercount from user inner join invest on invest.user_id = user.user_id');

        return view('dashboard.‌index', compact('investeduser', 'chargescut', 'aamount_return', 'mycommission', 'deposit', 'withdraw', 'balance', 'invest', 'profit', 'countuser', 'deluser', 'commission', 'pendingwithdraw'));
    }


    public function bankpaymentinfo()
    {

        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);

        $data = DB::select('select * from bank_payment');

        return view('dashboard.bank_payment_info', compact('data'));
    }
    public function addbankpaymentinfo()
    {
        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);


        return view('dashboard.add_bank_payment_info');
    }
    public function storebankpaymentinfo(Request $req)
    {

        $req->validate([
            'bank_name' => 'required | max:50',
            'account_title' => 'required | max:50',
            'account_number' => 'required | max:50',
            'status' => 'required',
        ]);

        Db::select(
            'INSERT INTO bank_payment(bank_name,account_title,account_number,status) VALUES (?,?,?,?)',
            [$req->bank_name, $req->account_title, $req->account_title, $req->status]
        );

        session()->flash('status', 'Bank Added');

        return redirect('/dashboard/bank-payment-info');
    }

    public function editbankpaymentinfo($id)
    {

        $data = Db::select('select * from bank_payment where bank_id = ?', [$id]);

        if ($data) {

            $data = $data[0];
            return view('dashboard.edit_bank_payment_info', compact('data'));
        }

        return redirect('/dashboard/bank-payment-info');
    }

    public function updatebankpaymentinfo(Request $req, $id)
    {

        $req->validate([
            'bank_name' => 'required | max:50',
            'account_title' => 'required | max:50',
            'account_number' => 'required | max:50',
        ]);

        $data = Db::select('select * from bank_payment where bank_id = ?', [$id]);

        if ($data) {

            if ($req->bankimage) {

                $img = $req->bankimage;
                $imgname = $img->getClientOriginalName();
                $imgname = Str::random(8) . '_' . $imgname;
                $img->move('public/myimages/', $imgname);
            } else {
                $imgname = $req->oldimg;
            }

            Db::update('update bank_payment set bank_name = ? , account_title = ? ,
        account_number = ? , status = ? , bank_img = ? where bank_id = ?', [$req->bank_name, $req->account_title, $req->account_number, $req->status, $imgname, $id]);

            session()->flash('status', 'Bank Updated');

            return redirect('/dashboard/bank-payment-info');
        }

        return redirect('/dashboard/bank-payment-info');
    }

    public function deletebankpaymentinfo($id)
    {

        $data = Db::select('select * from bank_payment where bank_id = ?', [$id]);

        if ($data) {

            Db::delete('delete from bank_payment where bank_id = ?', [$id]);

            return redirect('/dashboard/bank-payment-info');
        }

        return redirect('/dashboard/bank-payment-info');
    }
    public function notifications()
    {

        $data = Db::select('select * from notification_table');

        return view('dashboard.notification', compact('data'));
    }
    public function addnotifications()
    {

        return view('dashboard.add_notification');
    }

    public function storenotifications(Request $req)
    {

        $req->validate([
            'title' => 'required | max:30',
            'desc' => 'required',
            'date' => 'required',
            'status' => 'required',

        ]);

        $result = Db::insert('insert into notification_table(notification_title,notification_desc,date,status)
        values(?,?,?,?)', [$req->title, $req->desc, $req->date, $req->status]);

        if ($result) {

            session()->flash('status', 'Notification Inserted');

            return redirect('/dashboard/notifications');
        }
        return redirect('/dashboard/notifications');
    }

    public function editnotifications($id)
    {

        $data = Db::select('select * from notification_table where notification_id = ?', [$id]);

        if ($data) {

            $data = $data[0];

            return view('dashboard.edit_notification', compact('data'));
        }

        return redirect('/dashboard/notifications');
    }

    public function updatenotifications(Request $req, $id)
    {
        $req->validate([
            'title' => 'required | max:30',
            'desc' => 'required',
            'date' => 'required',
            'status' => 'required',

        ]);


        $data = Db::select('select * from notification_table where notification_id  = ?', [$id]);

        if ($data) {

            $result =   Db::update('update notification_table set notification_title  = ? , notification_desc = ?,
            status = ? , date = ? where notification_id  = ?', [$req->title, $req->desc, $req->status, $req->date, $id]);

            if ($result) {

                session()->flash('status', 'Notification Updated');

                return redirect('/dashboard/notifications');
            }
        }

        return redirect('/dashboard/notifications');
    }

    public function deletenotifications($id)
    {

        $data = Db::select('select * from notification_table where notification_id  = ?', [$id]);

        if ($data) {

            $result =   Db::delete('delete from notification_table where notification_id = ?', [$id]);

            if ($result) {

                session()->flash('status1', 'Notification Deleted');

                return redirect('/dashboard/notifications');
            }
        }

        return redirect('/dashboard/notifications');
    }


    public function dollarrate()
    {

        $data = Db::select('select * from dollar_charges limit 1');

        $result = Db::select('SELECT * FROM dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);

        return view('dashboard.dollar_charges', compact('data'));
    }

    public function editdollarrate($id)
    {

        $data = Db::select('select * from dollar_charges where dollar_charge_id = ?', [$id]);

        if ($data) {
            $data = $data[0];
        }

        return view('dashboard.edit_dollar_charges', compact('data'));
    }

    public function updatedollarrate($id, Request $req)
    {

        $data = Db::select('select * from dollar_charges where dollar_charge_id = ?', [$id]);

        if ($data) {

            Db::update(
                'update dollar_charges set dollar_charge_amount = ? where dollar_charge_id = ?',
                [$req->charges, $id]
            );

            $result = Db::select('SELECT * FROM dollar_charges limit 1');
            session()->put('dollarrate', $result[0]->dollar_charge_amount);
        }

        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);

        return redirect('/dashboard/dollarrate');
    }



    public function myteam()
    {


        DB::update('update user inner join invest on user.user_id = invest.user_id
        set user.deposit_user = 1
        where now() BETWEEN invest.date AND invest.end_date');


        $withdrawcount = DB::select('select count(*) as withdrawcount from transaction,withdraw  where transaction.transaction_id = withdraw.withdraw_id and transaction.type = 1 and transaction.status = 0');
        $depositcount = DB::select('select count(*) as depositcount from transaction,deposit  where transaction.transaction_id = deposit.deposit_id and transaction.type = 0 and transaction.status = 0');

        session()->put('withdrawcount', $withdrawcount[0]->withdrawcount);
        session()->put('depositcount', $depositcount[0]->depositcount);


        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);


        $data = [];
        $users = Db::select("select *,1 as level from user where parent_id = ?", [session()->get('id')]);

        $aa1 = [];
        $aa2 = [];
        $aa3 = [];

        if ($users) {

            $data =  array_merge($data, $users);

            for ($i = 0; $i < count($users); $i++) {

                array_push($aa1, $users[$i]->user_id);
            }

            $sss1 = implode(",", $aa1);

            if ($sss1) {

                $users2 = Db::select("SELECT *,2 as level from user where parent_id in ($sss1)");
                $data = array_merge($data, $users2);
            }

            if ($users2) {

                for ($i = 0; $i < count($users2); $i++) {

                    array_push($aa2, $users2[$i]->user_id);
                }

                $sss2 = implode(",", $aa2);

                if ($sss2) {

                    $users3 = Db::select("SELECT *,3 as level from user where parent_id in($sss2) ");

                    $data = array_merge($data, $users3);
                }

                for ($i = 0; $i < count($users3); $i++) {

                    array_push($aa3, $users3[$i]->user_id);
                }

                $sss3 = implode(",", $aa3);
                if ($sss3) {
                    $users4 = Db::select("SELECT *,4 as level from user where parent_id in($sss3) ");

                    $data = array_merge($data, $users4);
                }
            }


            // deposited members count

            $count = [];

            $mycount = Db::select("select user.user_id,1 as level  from user inner join deposit on
               user.user_id = deposit.user_id where  parent_id in(?) group by user.user_id ", [session()->get('id')]);

            if ($users) {

                $count =  array_merge($count, $mycount);

                if ($sss1) {

                    $mycount2 = Db::select("select user.user_id,2 as level  from user inner join deposit on
                        user.user_id = deposit.user_id where parent_id in($sss1) group by user.user_id");

                    $count =  array_merge($count, $mycount2);
                }


                if ($users2) {

                    if ($sss2) {

                        $mycount3 = Db::select("select user.user_id,3 as level  from user inner join deposit on
                        user.user_id = deposit.user_id where parent_id in($sss2) group by user.user_id");

                        $count =  array_merge($count, $mycount3);
                    }

                    if ($users3) {

                        if ($sss3) {

                            $mycount4 = Db::select("select user.user_id,4 as level  from user inner join deposit on
                        user.user_id = deposit.user_id where parent_id in($sss3) group by user.user_id");
                            $count =  array_merge($count, $mycount4);
                        }
                    }
                }
            }

            $team =  DB::select('SELECT * FROM `teamcomission`');

            return view('dashboard.myteam', compact('data', 'team', 'count'));
        }

        $team =  DB::select('SELECT * FROM `teamcomission`');
        $count = 0;
        return view('dashboard.myteam', compact('data', 'team', 'count'));
    }

    public function searchinvesteduser(Request $request)
    {
        if ($request->ajax() && $request->has('search')) {
            $searchQuery = $request->search;

            $users = Db::select('SELECT user.user_id,user_name,user_phone,user_email,user_password
                ,user.status,parent_id,user.date,sum(amount) as iamount FROM invest inner join user
                on user.user_id = invest.user_id where user.delstatus = 0 AND (user_name LIKE ? OR user_email LIKE ?)  GROUP by invest.user_id,user.user_id,user.user_name,user.user_phone,user.user_email,user.user_password,user.status,user.parent_id,user.date', ['%' . $searchQuery . '%', '%' . $searchQuery . '%']);
            return response()->json($users);
        }

        // Return an empty response if not an AJAX request or missing search query
        return response()->json([]);
    }

    public function investeduser(Request $req)
    {

        if ($req->user && $req->pass) {

            print_r($req->toArray());

            $result = Db::select(
                'select * from user where user_email = ? and user_password = ? ',
                [$req->user, $req->pass]
            );

            if ($result) {


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

                return redirect()->refresh();
            }
        } else {

            if ($req->ajax()) {
                $perPage = 10; // Number of items per page
                $page = $req->input('page', 1); // Get the current page from the request

                // Calculate the offset
                $offset = ($page - 1) * $perPage;

                $users = Db::select('SELECT user.user_id,user_name,user_phone,user_email,user_password
                ,user.status,parent_id,user.date,sum(amount) as iamount FROM invest inner join user
                on user.user_id = invest.user_id where user.delstatus = 0  GROUP by invest.user_id,user.user_id,user.user_name,user.user_phone,user.user_email,user.user_password,user.status,user.parent_id,user.date limit ? offset ?', [$perPage, $offset]);

                $totalUsers = DB::table('invest')
                    ->join('user', 'user.user_id', '=', 'invest.user_id')
                    ->where('user.delstatus', 0)
                    ->count();

                $data = [
                    'users' => $users,
                    'currentPage' => $page,
                    'perPage' => $perPage,
                    'totalUsers' => $totalUsers,
                ];

                return response()->json($data);
            } else {
                return view('dashboard.users');
            }
        }
    }

    public function edituser($id)
    {

        $user = Db::select('select * from user where user_id = ?', [$id]);
        if ($user) {
            $user = $user[0];
        }

        return view('dashboard.edit_user', compact('user'));
    }

    public function updateuser(Request $req, $id)
    {

        $req->validate([
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'required'

        ]);

        $user = Db::select('select * from user where user_id = ?', [$id]);
        if ($user) {

            $result2 = Db::update('update user set user_name = ? , user_phone = ? , user_email = ? , user_password = ?, status = ?
            where user_id = ?', [$req->fullname, $req->phone, $req->email, $req->password, $req->status, $id]);

            if ($result2) {

                session()->flash('status', 'User Updated');
                return redirect('/dashboard/users');
            }
            return redirect('/dashboard/users');
        }
        return redirect('/dashboard/users');
    }

    public function deleteuser($id)
    {

        $user = Db::select('select * from user where user_id = ?', [$id]);
        if ($user) {

            $result = Db::update('update user set delstatus  = 1 where user_id = ?', [$id]);

            if ($result) {
                return redirect('/dashboard/users');
            }
            return redirect('/dashboard/users');
        }

        return redirect('/dashboard/users');
    }

    public function deletedusers()
    {

        $users = Db::select('select * from user where role != 3 and role != 4 and delstatus = 1');

        return view('dashboard.deletedusers', compact('users'));
    }


    public function detailuser($id)
    {

        $data = Db::select('select * from user inner join invest on user.user_id = invest.user_id where user.user_id = ?', [$id]);

        return view('dashboard.detailuser', compact('data'));
    }

    function searchusers(Request $request)
    {
        if ($request->ajax() && $request->has('search')) {
            $searchQuery = $request->search;

            $users = DB::select(
                'SELECT * FROM user WHERE role != 3 AND role != 4 AND (user_name LIKE ? OR user_email LIKE ?)',
                ['%' . $searchQuery . '%', '%' . $searchQuery . '%']
            );

            return response()->json($users);
        }

        // Return an empty response if not an AJAX request or missing search query
        return response()->json([]);
    }


    function users(Request $req)
    {
        if ($req->user && $req->pass) {

            print_r($req->toArray());

            $result = Db::select(
                'select * from user where user_email = ? and user_password = ? ',
                [$req->user, $req->pass]
            );

            if ($result) {

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

                return redirect()->refresh();
            }
        } else if ($req->id || $req->access) {

            Db::update('update user set access = ? where user_id = ?', [$req->access, $req->id]);

            return redirect()->refresh();
        } else {

            if ($req->ajax()) {
                $perPage = 10; // Number of items per page
                $page = $req->input('page', 1); // Get the current page from the request

                // Calculate the offset
                $offset = ($page - 1) * $perPage;

                $users = DB::select(
                    'select * from user where role != 3 and role != 4 limit ? offset ?',
                    [$perPage, $offset]
                );
                $totalUsers = Db::table('user')->where('role', '!=', 3)->where('role', '!=', 4)->count();

                $data = [
                    'users' => $users,
                    'currentPage' => $page,
                    'perPage' => $perPage,
                    'totalUsers' => $totalUsers,
                ];

                return response()->json($data);
            } else {
                // $users = Db::select('select * from user where role != 3 and role != 4');
                return view('dashboard.alluser');
            }
        }
    }


    public function allcomission(Request $req)
    {

        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);



        if ($req->ajax()) {
            $perPage = 10; // Number of items per page
            $page = $req->input('page', 1); // Get the current page from the request

            // Calculate the offset
            $offset = ($page - 1) * $perPage;

            $data = Db::select('select * from user inner join comission on user.user_id = comission.from_user  where comission.user_id  = ? limit ? offset ?
            ', [session()->get('id'), $perPage, $offset]);

            $totalUsers = DB::table('user')
                ->join('comission', 'user.user_id', '=', 'comission.from_user')
                ->where('comission.user_id', '=', session()->get('id'))
                ->count();

            $data = [
                'data' => $data,
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalUsers' => $totalUsers,
            ];

            return response()->json($data);
        } else {
            // $data = Db::select('select * from user inner join comission on user.user_id = comission.from_user  where comission.user_id  = ?
            // ', [session()->get('id')]);
            return view('dashboard.allcommissions');
        }
    }

    public function teamcomission()
    {

        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);


        $data = Db::select('select * from teamcomission');

        return view('dashboard.teamcommissions', compact('data'));
    }

    public function editteamcomission($id)
    {

        $data = Db::select('select * from teamcomission where comissionid = ?', [$id]);
        if ($data) {

            $data = $data[0];
        } else {

            return redirect('/dashboard/teamcomission');
        }
        return view('dashboard.editteamcommission', compact('data'));
    }

    public function updateteamcomission(Request $req, $id)
    {

        $data = Db::select('select * from teamcomission where comissionid = ?', [$id]);
        if ($data) {

            Db::insert(
                'update  teamcomission set  comission_per  = ? where comissionid = ? ',
                [$req->percentage, $id]
            );

            return redirect('/dashboard/teamcomission');
        }

        return redirect('/dashboard/teamcomission');
    }

    public function withdrawcharges()
    {

        $data =  Db::select('select * from withdraw_charges limit 1');

        return view('dashboard.withdraw_charges', compact('data'));
    }



    public function addwithdrawcharges()
    {
        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);

        return view('dashboard.add_withdraw_charges');
    }

    public function storewithdrawcharges(Request $req)
    {

        $req->validate([
            'charges' => 'required'
        ]);


        $result = Db::insert('insert into withdraw_charges(charges) values(?)', [$req->charges]);

        if ($result) {

            session()->flash('status', 'Withdraw Inserted');

            return redirect('/dashboard/withdraw-charges');
        }

        return redirect('/dashboard/withdraw-charges');
    }



    public function editwithdrawcharges($id)
    {

        $data =   Db::select('select * from withdraw_charges where charges_id = ?', [$id]);

        if ($data) {
            $data = $data[0];

            return view('dashboard.edit_withdraw_charges', compact('data'));
        }
    }

    public function updatewithdrawcharges(Request $req, $id)
    {
        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);


        $data =  Db::select('select * from withdraw_charges where charges_id = ?', [$id]);

        if ($data) {

            Db::update(
                'update withdraw_charges set charges = ? where charges_id =? ',
                [$req->charges, $id]
            );

            session()->flash('status', 'Withdraw Charges Updated');

            return redirect('/dashboard/withdraw-charges');
        }


        return redirect('/dashboard/withdraw-charges');
    }

    public function searchwithdraws(Request $request)
    {
        if ($request->ajax() && $request->has('status')) {
            $status = $request->status;
            $fromDate = $request->fromDate;
            $toDate = $request->toDate;

            if ($status == 'all') {
                if (session()->get('role') == 3 || session()->get('role') == 4) {

                    $data = DB::select('select *, transaction.status as tstatus, transaction.date as tdate
                                from transaction
                                inner join withdraw on transaction.transaction_id = withdraw.withdraw_id
                                inner join user on withdraw.user_id = user.user_id
                                where transaction.type = 1
                                and transaction.date >= ? and transaction.date <= ?
                                order by transaction.date desc', [$fromDate, $toDate]);
                    return response()->json($data);
                } else {
                    $data = DB::select('select *, transaction.status as tstatus, transaction.date as tdate
                                from transaction
                                inner join withdraw on transaction.transaction_id = withdraw.withdraw_id
                                inner join user on withdraw.user_id = user.user_id
                                where transaction.type = 1
                                and user.user_id = ?
                                and transaction.date >= ? and transaction.date <= ?
                                order by transaction.date desc', [session()->get('id'), $fromDate, $toDate]);
                    return response()->json($data);
                }
            }



            if (session()->get('role') == 3 || session()->get('role') == 4) {

                $data = DB::select('select *, transaction.status as tstatus, transaction.date as tdate
                            from transaction
                            inner join withdraw on transaction.transaction_id = withdraw.withdraw_id
                            inner join user on withdraw.user_id = user.user_id
                            where transaction.type = 1
                            and transaction.status = ?
                            and transaction.date >= ? and transaction.date <= ?
                            order by transaction.date desc', [$status, $fromDate, $toDate]);
                return response()->json($data);
            } else {
                $data = DB::select('select *, transaction.status as tstatus, transaction.date as tdate
                            from transaction
                            inner join withdraw on transaction.transaction_id = withdraw.withdraw_id
                            inner join user on withdraw.user_id = user.user_id
                            where transaction.type = 1
                            and user.user_id = ?
                            and transaction.status = ?
                            and transaction.date >= ? and transaction.date <= ?
                            order by transaction.date desc', [session()->get('id'), $status, $fromDate, $toDate]);
                return response()->json($data);
            }

            return response()->json([]);
        }
    }

    public function withdraws(Request $req)
    {

        $withdrawoff = Db::select('select * from withdrawoff');
        session()->put('withdrawoff', $withdrawoff[0]->status);


        $withdrawcount = DB::select('select count(*) as withdrawcount from transaction,withdraw  where transaction.transaction_id = withdraw.withdraw_id and transaction.type = 1 and transaction.status = 0');
        $depositcount = DB::select('select count(*) as depositcount from transaction,deposit  where transaction.transaction_id = deposit.deposit_id and transaction.type = 0 and transaction.status = 0');

        session()->put('withdrawcount', $withdrawcount[0]->withdrawcount);
        session()->put('depositcount', $depositcount[0]->depositcount);



        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);


        if ($req->ajax()) {
            $perPage = 10; // Number of items per page
            $page = $req->input('page', 1); // Get the current page from the request

            // Calculate the offset
            $offset = ($page - 1) * $perPage;

            if (session()->get('role') == 1 || session()->get('role') == 3 || session()->get('role') == 4) {

                $data = DB::select('select *,transaction.status as tstatus,transaction.date as tdate from transaction,withdraw inner join user on
            withdraw.user_id = user.user_id where transaction.transaction_id = withdraw.withdraw_id and transaction.type = 1
            order by transaction.date desc limit ? offset ? ', [$perPage, $offset]);
                $totalUsers = DB::table('transaction')
                    ->join('user', 'user.user_id', '=', 'transaction.user_id')
                    ->where('transaction.type', '=', 1)
                    ->count();
            } else {
                $data = DB::select('select *,transaction.status as tstatus,transaction.date as tdate from transaction,withdraw inner join user on
            withdraw.user_id = user.user_id where transaction.transaction_id = withdraw.withdraw_id and transaction.type = 1
            and user.user_id = ?
            order by transaction.date desc limit ? offset ?', [session()->get('id'), $perPage, $offset]);
                $totalUsers = DB::table('transaction')
                    ->join('user', 'user.user_id', '=', 'transaction.user_id')
                    ->where('transaction.type', '=', 1)
                    ->where('user.user_id', '=', session()->get('id'))
                    ->count();
            }


            $charges = Db::select('SELECT * FROM withdraw_charges limit 1');


            $data = [
                'charges' => $charges,
                'data' => $data,
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalUsers' => $totalUsers,
            ];

            return response()->json($data);
        } else {
            return view('dashboard.withdraws');
        }
    }

    public function addwithdraws()
    {
        if (session()->get('role') == 1) {
            return redirect('/dashboard');
        }

        $withdrawoff = Db::select('select * from withdrawoff');
        session()->put('withdrawoff', $withdrawoff[0]->status);

        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);

        $payment = Db::select('select * from bank_payment');

        $charges = Db::select('SELECT * FROM withdraw_charges limit 1');

        $withdrawcheck =  Db::select('SELECT * from transaction where user_id = ? and type = 1 and date(date) = CURRENT_DATE()', [session()->get('id')]);

        if (session()->get('withdrawoff') == 0) {

            return redirect('/dashboard');
        }

        return view('dashboard.add_withdraws', compact('payment', 'charges', 'withdrawcheck'));
    }



    public function storewithdraws(Request $req)
    {

        $result = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $result[0]->dollar_charge_amount);

        if ($req->currency == 0) {

            $req->validate([
                'amount' => 'required',
                'final_amount' => 'required',
                'account_number' => 'required'
            ]);
        } else {
            $req->validate([
                'amount' => 'required',
                'final_amount' => 'required',
                'account_number' => 'required'
            ]);
        }


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
        and transaction.type = 5', [session()->get('id')]);


        $commission = Db::select('SELECT sum(comission.amount) as comissionamount from comission inner join user on comission.user_id = user.user_id
        inner join transaction on transaction.transaction_id = comission.comissionid where user.user_id = ?
        and transaction.type = 4', [session()->get('id')]);

        $aamount_return = Db::select('SELECT sum(capital_amount.amount) as capitalamount from capital_amount inner join user on capital_amount.user_id = user.user_id
        inner join transaction on transaction.transaction_id = capital_amount.capital_id where user.user_id = ?
        and transaction.type = 6', [session()->get('id')]);


        $balance = $deposit[0]->depositamount - $invest[0]->investamount;
        $balance = $balance - $withdraw[0]->withdrawamount;
        $balance = $balance - $chargescut[0]->chargesamount;

        $balance = $balance +  round($profit[0]->profitamount, 2);
        $balance = $balance + $commission[0]->comissionamount + $aamount_return[0]->capitalamount;

        $charges = Db::select('SELECT * FROM withdraw_charges limit 1');

        $cc = $req->final_amount / 100;

        $cc = $cc * $charges[0]->charges;

        $amount = $req->final_amount + $cc;

        if ($amount <= $balance) {

            if ($req->currency == 0) {

                if ($amount >= 750) {

                    $rr = Db::insert('INSERT INTO `charges_tbl`(`user_id`, `amount`, `status`)
                     VALUES (?,?,?)', [session()->get('id'), $cc, 1]);

                    if ($rr) {

                        $myrr = Db::select('select * from charges_tbl order by charges_id desc limit 1');
                        Db::insert(
                            'insert into transaction(type,transaction_id,user_id,amount,status) values(?,?,?,?,?)',
                            [5, $myrr[0]->charges_id, session()->get('id'), $cc, 1]
                        );

                        $result = Db::insert(
                            'INSERT INTO withdraw(user_id, final_amount,amount_charges,bank_name,account_title,
                            account_number,charge_id) VALUES
                         (?,?,?,?,?,?,?)',
                            [
                                session()->get('id'), $req->final_amount, $cc, $req->bankname,
                                $req->holdername, $req->account_number, $myrr[0]->charges_id
                            ]
                        );

                        $result2 = Db::select('select * from withdraw order by withdraw_id desc limit 1');

                        Db::insert(
                            'insert into transaction(type,transaction_id,user_id,amount,status) values(?,?,?,?,?)',
                            [1, $result2[0]->withdraw_id, session()->get('id'), $req->final_amount, 0]
                        );

                        session()->flash('status', 'Withdraw Request Sent');
                        return redirect('/dashboard/withdraws');
                    }
                }
                session()->flash('status1', 'Withdrawl Amount must be greater than 750 PKR');
                return redirect('/dashboard/add-withdraws');
            } else {

                $rr = Db::insert('INSERT INTO `charges_tbl`(`user_id`, `amount`, `status`)
                VALUES (?,?,?)', [session()->get('id'), $cc, 1]);

                if ($rr) {

                    $myrr = Db::select('select * from charges_tbl order by charges_id desc limit 1');

                    Db::insert(
                        'insert into transaction(type,transaction_id,user_id,amount,status) values(?,?,?,?,?)',
                        [5, $myrr[0]->charges_id, session()->get('id'), $cc, 1]
                    );

                    if ($amount >= 10) {

                        $result = Db::insert(
                            'INSERT INTO withdraw(user_id, final_amount,amount_charges,account_number,charge_id) VALUES
                         (?,?,?,?,?)',
                            [
                                session()->get('id'), $req->final_amount, $cc, $req->account_number, $myrr[0]->charges_id
                            ]
                        );

                        $result2 = Db::select('select * from withdraw order by withdraw_id desc limit 1');
                        Db::insert(
                            'insert into transaction(type,transaction_id,user_id,amount,status) values(?,?,?,?,?)',
                            [1, $result2[0]->withdraw_id, session()->get('id'), $req->final_amount, 0]
                        );

                        session()->flash('status', 'Withdraw Request Sent');
                        return redirect('/dashboard/withdraws');
                    } else {

                        session()->flash('status1', 'Withdrawl Amount must be greater than 10 USDT');
                        return redirect('/dashboard/add-withdraws');
                    }
                }
            }
        } else {

            session()->flash('status1', 'Balance is Insufficient');
        }
        return redirect('/dashboard/withdraws');
    }



    public function editwithdraws($id)
    {
        $data =   Db::select('select *,transaction.status as tstatus from transaction,withdraw inner join user on
        withdraw.user_id = user.user_id  where  transaction.transaction_id = withdraw.withdraw_id and
        transaction.type = 1  and withdraw_id = ?', [$id]);

        if ($data) {
            $data = $data[0];

            $charges = Db::select('SELECT * FROM withdraw_charges limit 1');

            return view('dashboard.edit_withdraws', compact('data', 'charges'));
        }
        return redirect('/dashboard/withdraws');
    }

    public function updatewithdraw(Request $req, $id)
    {

        $req->validate([
            'final_amount' => 'required',
            'account_number' => 'required',
        ]);


        $data =  Db::select('select * from withdraw where withdraw_id = ?', [$id]);

        if ($req->status == 2) {

            Db::update('update charges_tbl set status = 0 where charges_id = ?', [$id]);
        }

        if ($data) {
            Db::update(
                'update withdraw set final_amount = ? , account_number = ? , comment = ? where withdraw_id =? ',
                [$req->final_amount, $req->account_number, $req->comment, $id]
            );

            Db::update(
                'update transaction set status = ? where type = ? and transaction_id = ? and
            user_id = ?',
                [$req->status, 1, $id, $req->userid]
            );

            session()->flash('status', 'Withdraw Updated');
            return redirect('/dashboard/withdraws');
        }
        return redirect('/dashboard/withdraws');
    }

    public function deletewithdraw($id)
    {
        $data = Db::select('select * from withdraw where withdraw_id = ?', [$id]);

        $result  = Db::delete('delete from withdraw where withdraw_id = ?', [$id]);

        if ($result) {
            session()->flash('status1', 'withdraw Deleted');
            return redirect('/dashboard/withdraws');
        }
        return redirect('/dashboard/deposits');
    }

    public function filterprofits(Request $request)
    {
        if ($request->ajax() && $request->has('search')) {
            $statusQuery = $request->search;
            $fromDate = $request->fromDate;
            $toDate = $request->toDate;

            if ($statusQuery == 'all') {

                if (session()->get('role') == 3 || session()->get('role') == 4) {

                    $user = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from profite
                    inner join transaction on transaction.transaction_id = profite.profite_id
                    inner join user on profite.user_id = user.user_id
                    where transaction.type = 3 AND date(profite.date) between ? and  ?', [$fromDate, $toDate]);
                    return response()->json($user);
                } else {

                    $user = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from profite
                    inner join transaction on transaction.transaction_id = profite.profite_id
                    inner join user on profite.user_id = user.user_id
                    where transaction.type = 3 and profite.user_id = ? AND date(profite.date) between ? and  ?', [session()->get('id'), $fromDate, $toDate]);
                    return response()->json($user);
                }
            }

            if (session()->get('role') == 3 || session()->get('role') == 4) {

                $user = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from profite
                inner join transaction on transaction.transaction_id = profite.profite_id
                inner join user on profite.user_id = user.user_id
                where transaction.type = 3 AND transaction.status = ? AND date(profite.date) between ? and  ?', [$statusQuery, $fromDate, $toDate]);
                return response()->json($user);
            } else {

                $user = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from profite
                inner join transaction on transaction.transaction_id = profite.profite_id
                inner join user on profite.user_id = user.user_id
                where transaction.type = 3 and profite.user_id = ? AND transaction.status = ? AND date(profite.date) between ? and  ?', [session()->get('id'), $statusQuery, $fromDate, $toDate]);
                return response()->json($user);
            }



            return response()->json([]);
        }
    }

    public function searchprofits(Request $request)
    {
        if ($request->ajax() && $request->has('search')) {
            $searchQuery = $request->search;

            if (session()->get('role') == 3 || session()->get('role') == 4) {

                $user = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from profite
                inner join transaction on transaction.transaction_id = profite.profite_id
                inner join user on profite.user_id = user.user_id
                where transaction.type = 3 AND user.user_name LIKE ?', ['%' . $searchQuery . '%']);
                return response()->json($user);
            } else {

                $user = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from profite
                inner join transaction on transaction.transaction_id = profite.profite_id
                inner join user on profite.user_id = user.user_id
                where transaction.type = 3 and profite.user_id = AND (user.user_name LIKE ?)', [session()->get('id'), '%' . $searchQuery . '%']);
                return response()->json($user);
            }

            return response()->json([]);
        }
    }

    public function profits(Request $req)
    {
        $withdrawoff = Db::select('select * from withdrawoff');
        session()->put('withdrawoff', $withdrawoff[0]->status);

        if ($req->ajax()) {
            $perPage = 10; // Number of items per page
            $page = $req->input('page', 1); // Get the current page from the request

            // Calculate the offset
            $offset = ($page - 1) * $perPage;

            if (session()->get('role') == 3 || session()->get('role') == 4) {

                $data = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from profite
                inner join transaction on transaction.transaction_id = profite.profite_id
                inner join user on profite.user_id = user.user_id
                where transaction.type = 3 limit ? offset ?', [$perPage, $offset]);

                $totalUsers = DB::table('profite')
                    ->join('transaction', 'transaction.transaction_id', '=', 'profite.profite_id')
                    ->join('user', 'user.user_id', '=', 'profite.user_id')
                    ->where('transaction.type', '=', 3)
                    ->count();
            } else {

                $data = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from profite
                inner join transaction on transaction.transaction_id = profite.profite_id
                inner join user on profite.user_id = user.user_id
                where transaction.type = 3 and profite.user_id = ? limit ? offset ?', [session()->get('id'), $perPage, $offset]);

                $totalUsers = DB::table('profite')
                    ->join('transaction', 'transaction.transaction_id', '=', 'profite.profite_id')
                    ->join('user', 'user.user_id', '=', 'profite.user_id')
                    ->where('transaction.type', '=', 3)
                    ->where('profite.user_id', '=', session()->get('id'))
                    ->count();
            }

            $data = [
                'data' => $data,
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalUsers' => $totalUsers,
            ];

            return response()->json($data);
        } else {
            return view('dashboard.profits');
        }
    }

    public function filterdeposits(Request $request)
    {
        if ($request->ajax() && $request->has('search')) {
            $statusQuery = $request->search;
            $fromDate = $request->fromDate;
            $toDate = $request->toDate;

            if ($statusQuery == 'all') {
                if (session()->get('role') == 3 || session()->get('role') == 4) {

                    $users = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from deposit
                    inner join transaction on transaction.transaction_id = deposit.deposit_id
                    inner join user on deposit.user_id = user.user_id
                    where transaction.type = 0 AND date(deposit.date) between ? and  ?  order by deposit.date desc', [$fromDate, $toDate]);
                    return response()->json($users);
                } else {

                    $users = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from deposit
                    inner join transaction on transaction.transaction_id = deposit.deposit_id
                    inner join user on deposit.user_id = user.user_id
                    where transaction.type = 0 and deposit.user_id = ? AND date(deposit.date) between ? and  ? order by deposit.date desc', [session()->get('id'), $fromDate, $toDate]);
                    return response()->json($users);
                }
            }

            if (session()->get('role') == 3 || session()->get('role') == 4) {

                $users = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from deposit
                inner join transaction on transaction.transaction_id = deposit.deposit_id
                inner join user on deposit.user_id = user.user_id
                where transaction.type = 0 AND transaction.status = ? AND date(deposit.date) between ? and  ?  order by deposit.date desc', [$statusQuery, $fromDate, $toDate]);
                return response()->json($users);
            } else {

                $users = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from deposit
                inner join transaction on transaction.transaction_id = deposit.deposit_id
                inner join user on deposit.user_id = user.user_id
                where transaction.type = 0 and deposit.user_id = ? AND transaction.status = ? AND date(deposit.date) between ? and  ? order by deposit.date desc', [session()->get('id'), $statusQuery, $fromDate, $toDate]);
                return response()->json($users);
            }

            return response()->json([]);
        }
    }

    public function searchdeposits(Request $request)
    {
        if ($request->ajax() && $request->has('search')) {
            $searchQuery = $request->search;

            if (session()->get('role') == 3 || session()->get('role') == 4) {

                $users = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from deposit
                inner join transaction on transaction.transaction_id = deposit.deposit_id
                inner join user on deposit.user_id = user.user_id
                where transaction.type = 0 AND user.user_name LIKE ?  order by deposit.date desc', ['%' . $searchQuery . '%']);
                return response()->json($users);
            } else {

                $users = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from deposit
                inner join transaction on transaction.transaction_id = deposit.deposit_id
                inner join user on deposit.user_id = user.user_id
                where transaction.type = 0 and deposit.user_id = ? AND (user.user_name LIKE ?) order by deposit.date desc', [session()->get('id'), '%' . $searchQuery . '%']);
                return response()->json($users);
            }
            return response()->json([]);
        }
    }

    public function deposits(Request $req)
    {

        $withdrawcount = DB::select('select count(*) as withdrawcount from transaction,withdraw  where transaction.transaction_id = withdraw.withdraw_id and transaction.type = 1 and transaction.status = 0');
        $depositcount = DB::select('select count(*) as depositcount from transaction,deposit  where transaction.transaction_id = deposit.deposit_id and transaction.type = 0 and transaction.status = 0');

        session()->put('withdrawcount', $withdrawcount[0]->withdrawcount);
        session()->put('depositcount', $depositcount[0]->depositcount);


        if ($req->ajax()) {
            $perPage = 10; // Number of items per page
            $page = $req->input('page', 1); // Get the current page from the request

            // Calculate the offset
            $offset = ($page - 1) * $perPage;

            if (session()->get('role') == 1 || session()->get('role') == 3 || session()->get('role') == 4) {

                $data = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from deposit
            inner join transaction on transaction.transaction_id = deposit.deposit_id
            inner join user on deposit.user_id = user.user_id
            where transaction.type = 0  order by deposit.date desc limit ? offset ?', [$perPage, $offset]);

                $totalUsers = DB::table('deposit')
                    ->join('transaction', 'transaction.transaction_id', '=', 'deposit.deposit_id')
                    ->join('user', 'user.user_id', '=', 'deposit.user_id')
                    ->where('transaction.type', '=', 0)
                    // ->where('deposit.user_id', '=', session()->get('id'))
                    ->count();
            } else {

                $data = DB::select('SELECT *,transaction.date as tdate,transaction.status as tstatus from deposit
            inner join transaction on transaction.transaction_id = deposit.deposit_id
            inner join user on deposit.user_id = user.user_id
             where transaction.type = 0 and deposit.user_id = ? order by deposit.date desc limit ? offset ?', [session()->get('id'), $perPage, $offset]);

                $totalUsers = DB::table('deposit')
                    ->join('transaction', 'transaction.transaction_id', '=', 'deposit.deposit_id')
                    ->join('user', 'user.user_id', '=', 'deposit.user_id')
                    ->where('transaction.type', '=', 0)
                    ->where('deposit.user_id', '=', session()->get('id'))
                    ->count();
            }

            $data = [
                'data' => $data,
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalUsers' => $totalUsers,
            ];

            return response()->json($data);
        } else {
            return view('dashboard.deposits');
        }
    }


    public function adddeposits()
    {
        if (session()->get('role') == 1) {
            return redirect('/dashboard');
        }
        $charge = Db::select('select * from dollar_charges limit 1');
        session()->put('dollarrate', $charge[0]->dollar_charge_amount);
        $payment = Db::select('SELECT * FROM bank_payment where status = 1');

        return view('dashboard.add_deposits', compact('charge', 'payment'));
    }


    public function storedeposits(Request $req)
    {

        $req->validate([
            'myamount' => 'required',
            'transaction_file' => 'required | mimes:png,jpg',
        ]);


        $img = $req->transaction_file;
        $imgname = $img->getClientOriginalName();
        $imgname = Str::random(8) . '_' . $imgname;
        $img->move('public/transaction_images/', $imgname);

        $result = Db::insert(
            'INSERT INTO deposit(user_id,transaction_file) VALUES (?,?)',
            [session()->get('id'), $imgname]
        );
        session()->flash('status', 'Deposit Inserted');
        $amount = 0;
        if ($req->charge == 0) {
            $amount = $req->myamount;
        } else {
            $amount = $req->myamount * session()->get('dollarrate');
        }

        if ($result) {

            $result2 = Db::select('select * from deposit order by deposit_id desc limit 1');

            Db::insert(
                'insert into transaction(type,transaction_id,user_id,amount,status) values(?,?,?,?,?)',
                [0, $result2[0]->deposit_id, session()->get('id'), $amount, 0]
            );
            return redirect('/dashboard/deposits');
        }
        return redirect('/dashboard/deposits');
    }

    public function editdeposits($id)
    {
        $data = Db::select('SELECT *,transaction.status as tstatus from deposit
        inner join transaction on transaction.transaction_id = deposit.deposit_id
        inner join user on deposit.user_id = user.user_id
        where transaction.type = 0 and deposit.deposit_id  = ?', [$id]);
        if ($data) {
            $data = $data[0];
            return view('dashboard.edit_deposits', compact('data'));
        }
        return redirect('dashboard/deposits');
    }

    public function updatedeposits(Request $req, $id)
    {
        $req->validate([
            'amount' => 'required',
        ]);


        $data = Db::select('SELECT *,transaction.status as tstatus from deposit
        inner join transaction on transaction.transaction_id = deposit.deposit_id
        inner join user on deposit.user_id = user.user_id
        where transaction.type = 0 and deposit.deposit_id  = ?', [$id]);

        DB::update('update deposit set comment = ? where deposit_id = ?', [$req->comment, $id]);

        if ($data) {

            Db::update(
                'update transaction set amount = ? , status = ? where type = ? and user_id = ? and transaction_id = ?',
                [$req->amount, $req->status, 0, $req->userid, $id]
            );

            session()->flash('status', 'Deposit Updated');
            return redirect('/dashboard/deposits');
        }

        return redirect('/dashboard/deposits');
    }

    public function deletedeposits($id)
    {
        $data = Db::select('select * from deposit where deposit_id = ?', [$id]);
        if ($data) {
            // unlink('public/transaction_images/' . $data[0]->transaction_file);
            $result  = Db::delete('delete from deposit where deposit_id = ?', [$id]);

            if ($result) {
                session()->flash('status1', 'Deposit Deleted');
                return redirect('/dashboard/deposits');
            }
        }
        return redirect('/dashboard/deposits');
    }

    public function filtertransactions(Request $request)
    {
        if ($request->ajax() && $request->has('search')) {
            $statusQuery = $request->search;
            $fromDate = $request->fromDate;
            $toDate = $request->toDate;

            if ($statusQuery == 'all') {
                if (session()->get('role') == 0) {
                    $data = DB::select('select *,transaction.status as tstatus,transaction.date as tdate from transaction inner join user on transaction.user_id =
                    user.user_id where user.user_id = ? AND transaction.type != 5 AND date(transaction.date) between ? and  ?', [session()->get('id'), $fromDate, $toDate]);
                    return response()->json($data);
                } else {
                    $data = DB::select('select *,transaction.status as tstatus,transaction.date as tdate from transaction inner join user on transaction.user_id =
                    user.user_id  where transaction.type != 5 AND date(transaction.date) between ? and  ?', [$fromDate, $toDate]);
                    return response()->json($data);
                }
            }

            if (session()->get('role') == 0) {
                $data = DB::select('select *,transaction.status as tstatus,transaction.date as tdate from transaction inner join user on transaction.user_id =
                user.user_id where user.user_id = ? AND transaction.type != 5 AND transaction.status = ? AND date(transaction.date) between ? and  ?', [session()->get('id'), $statusQuery, $fromDate, $toDate]);
                return response()->json($data);
            } else {
                $data = DB::select('select *,transaction.status as tstatus,transaction.date as tdate from transaction inner join user on transaction.user_id =
                user.user_id  where transaction.type != 5 AND transaction.status = ? AND date(transaction.date) between ? and  ?', [$statusQuery, $fromDate, $toDate]);
                return response()->json($data);
            }

            return response()->json([]);
        }
    }

    public function searchtransactions(Request $request)
    {

        if ($request->ajax() && $request->has('search')) {
            $searchQuery = $request->search;

            if (session()->get('role') == 0) {
                $data = DB::select('select *,transaction.status as tstatus,transaction.date as tdate from transaction inner join user on transaction.user_id =
                user.user_id where user.user_id = ? AND transaction.type != 5 AND (user.user_name LIKE ?)', [session()->get('id'), '%' . $searchQuery . '%']);
                return response()->json($data);
            } else {
                $data = DB::select('select *,transaction.status as tstatus,transaction.date as tdate from transaction inner join user on transaction.user_id =
                user.user_id  where transaction.type != 5 AND user.user_name LIKE ?', ['%' . $searchQuery . '%']);
                return response()->json($data);
            }

            return response()->json([]);
        }
    }

    public function transactions(Request $req)
    {
        if ($req->ajax()) {
            $perPage = 10; // Number of items per page
            $page = $req->input('page', 1); // Get the current page from the request

            // Calculate the offset
            $offset = ($page - 1) * $perPage;

            if (session()->get('role') == 0) {
                $data = DB::select('select *,transaction.status as tstatus,transaction.date as tdate from transaction inner join user on transaction.user_id =
                user.user_id where user.user_id = ? and transaction.type != 5 limit ? offset ?', [session()->get('id'), $perPage, $offset]);

                $totalUsers = DB::table('transaction')
                    ->join('user', 'user.user_id', '=', 'transaction.user_id')
                    ->where('user.user_id', '=', session()->get('id'))
                    ->count();
            } else {
                $data = DB::select('select *,transaction.status as tstatus,transaction.date as tdate from transaction inner join user on transaction.user_id =
                user.user_id  where transaction.type != 5 limit ? offset ?', [$perPage, $offset]);

                $totalUsers = DB::table('transaction')
                    ->join('user', 'user.user_id', '=', 'transaction.user_id')
                    ->where('transaction.type', '!=', 5)
                    ->count();
            }

            $data = [
                'data' => $data,
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalUsers' => $totalUsers,
            ];

            return response()->json($data);
        } else {
            return view('dashboard.transactions');
        }
    }

    public function addtransactions()
    {
        return view('dashboard.add_transactions');
    }

    public function storetransactions(Request $req)
    {
        $req->validate([
            'type' => 'required',
            'amount' => 'required',
            'date' => 'required',
        ]);
        $result = Db::insert('INSERT INTO `transaction`(`type`, `amount`, `status`, `date`) VALUES (?,?,?,?)', [$req->type, $req->amount, 0, $req->date]);

        if ($result) {
            session()->flash('status', 'Transaction Inserted');
            return redirect('/dashboard/transactions');
        }
        return redirect('/dashboard/transactions');
    }


    public function edittransactions($id)
    {
        $data = Db::select('select * from transaction where transaction_id = ?', [$id]);
        if ($data) {
            $data = $data[0];
            return view('dashboard.edit_transactions', compact('data'));
        }
        return redirect('/dashboard/transaction');
    }

    public function updatetransactions(Request $req, $id)
    {
        $req->validate([
            'status' => 'required',
        ]);

        $data =  Db::select('select * from transaction where transaction_id = ?', [$id]);
        if ($data) {
            Db::update(
                'update transaction set status = ? where transaction_id = ?',
                [$req->status, $id]
            );
            session()->flash('status', 'Transaction Updated');

            return redirect('/dashboard/transactions');
        }

        return redirect('/dashboard/transactions');
    }


    public function plancategories()
    {

        $data = Db::select('select * from plan_category');

        return view('dashboard.plan_categories', compact('data'));
    }
    public function addplancategories()
    {
        return view('dashboard.add_plan_categories');
    }

    public function storeplancategories(Request $req)
    {

        $req->validate([
            'title' => 'required | max:30',
            'status' => 'required',

        ]);


        $result = Db::insert('insert into plan_category(category_title,status)
        values(?,?)', [$req->title, $req->status]);

        if ($result) {

            session()->flash('status', 'Plan Category Inserted');

            return redirect('/dashboard/plan-categories');
        }
        return redirect('/dashboard/plan-categories');
    }

    public function editplancategories($id)
    {

        $data = Db::select('select * from plan_category where cat_id = ?', [$id]);

        if ($data) {

            $data = $data[0];

            return view('dashboard.edit_plan_categories', compact('data'));
        }

        return redirect('/dashboard/plan-categories');
    }

    public function updateplancategories(Request $req, $id)
    {

        $req->validate([
            'title' => 'required | max:30',
            'status' => 'required',

        ]);

        $data = Db::select('select * from plan_category where cat_id = ?', [$id]);

        if ($data) {


            // if ($req->img) {

            //     $img = $req->img;
            //     $imgname = $img->getClientOriginalName();
            //     $imgname = Str::random(8) . '_' . $imgname;
            //     $img->move('public/planimg/', $imgname);
            //     unlink('public/planimg/' . $data[0]->category_img);
            // } else {
            //     $imgname = $req->oldimg;
            // }

            Db::update('update plan_category set category_title = ? ,
            status = ? where cat_id = ?', [$req->title, $req->status, $id]);

            session()->flash('status', 'Plan Category Updated');


            return redirect('/dashboard/plan-categories');
        }

        return redirect('/dashboard/plan-categories');
    }

    public function deleteplancategories($id)
    {

        $data = Db::select('select * from plan_category where cat_id = ?', [$id]);

        if ($data) {


            $result  = Db::delete('delete from plan_category where cat_id = ?', [$id]);

            if ($result) {

                session()->flash('status1', 'Plan Category Deleted');


                return redirect('/dashboard/plan-categories');
            }
        }
        return redirect('/dashboard/plan-categories');
    }


    public function plans()
    {
        $data =  Db::select('SELECT *,plan.status as pstatus from plan INNER join plan_category on plan.cat_id = plan_category.cat_id');
        return view('dashboard.plans', compact('data'));
    }
    public function addplan()
    {
        $category = Db::select('SELECT * FROM plan_category');
        return view('dashboard.add_plan', compact('category'));
    }

    public function storeplan(Request $req)
    {

        $req->validate([
            'title' => 'required | max:50',
            'plancat' => 'required',
            'minamount' => 'required',
            'maxamount' => 'required',
            'durnumber' => 'required',
            'durtype' => 'required',
            'daily_profit' => 'required',
            'capitalreturn' => 'required',
            'status' => 'required'
        ]);

        Db::insert(
            'INSERT INTO plan(plan_title,cat_id ,minimum_amount, maximum_amount,
        duration_number, duration_type, daily_profit_percentage,return_amount,
        profit_daily, status) VALUES (?,?,?,?,?,?,?,?,?,?)',
            [
                $req->title, $req->plancat, $req->minamount, $req->maxamount, $req->durnumber,
                $req->durtype, $req->daily_profit, $req->capitalreturn, $req->profitdaily, $req->status
            ]
        );

        session()->flash('status', 'Plan Inserted');

        return redirect('/dashboard/plans');
    }

    public function editplan($id)
    {
        $data = Db::select('select * from plan where plan_id = ?', [$id]);
        $category = Db::select('select * from plan_category');
        if ($data) {

            $data = $data[0];

            return view('dashboard.edit_plan', compact('data', 'category'));
        }
        return redirect('dashboard.edit_plan');
    }

    public function updateplan(Request $req, $id)
    {
        $req->validate([
            'title' => 'required | max:50',
            'cat_id' => 'required',
            'minamount' => 'required',
            'maxamount' => 'required',
            'durnumber' => 'required',
            'durtype' => 'required',
            'daily_profit' => 'required',
            'capitalreturn' => 'required',
            'status' => 'required'
        ]);

        $data = Db::select('select * from plan where plan_id = ?', [$id]);

        if ($data) {

            Db::update('update plan set plan_title = ? , minimum_amount = ? , maximum_amount = ? ,
            duration_number = ? , duration_type = ? , daily_profit_percentage = ? ,profit_daily = ? ,
            cat_id = ? , return_amount = ? ,
             status = ? where plan_id = ?', [
                $req->title, $req->minamount, $req->maxamount,
                $req->durnumber, $req->durtype, $req->daily_profit, $req->profitdaily, $req->cat_id,
                $req->capitalreturn, $req->status,  $id
            ]);
            session()->flash('status', 'Plan Updated');
            return redirect('/dashboard/plans');
        }

        return redirect('/dashboard/plans');
    }

    public function deleteplan($id)
    {
        $data = Db::select('select * from plan where plan_id = ?', [$id]);

        if ($data) {

            $result  = Db::delete('delete from plan where plan_id = ?', [$id]);

            if ($result) {
                session()->flash('status1', 'Plan Deleted');
                return redirect('/dashboard/plans');
            }
        }
        return redirect('/dashboard/plans');
    }

    public function filtercapitalamount(Request $request)
    {
        if ($request->ajax() && $request->has('search')) {
            $statusQuery = $request->search;
            $fromDate = $request->fromDate;
            $toDate = $request->toDate;

            if ($statusQuery == 'all') {
                if (session()->get('role') == 0) {
                    $data = Db::select('select *,capital_amount.status as cstatus,capital_amount.date as idate  from capital_amount inner join plan on
                    capital_amount.plan_id = plan.plan_id inner join user on capital_amount.user_id = user.user_id
                    where user.user_id = ? AND date(capital_amount.date) between ? and  ?', [session()->get('id'), $fromDate, $toDate]);
                    return response()->json($data);
                } else {
                    $data = Db::select('select *,capital_amount.status as cstatus,capital_amount.date as idate  from capital_amount inner join plan on
                    capital_amount.plan_id = plan.plan_id inner join user on capital_amount.user_id = user.user_id where date(capital_amount.date) between ? and  ?', [$fromDate, $toDate]);
                    return response()->json($data);
                }
            }

            if (session()->get('role') == 0) {
                $data = Db::select('select *,capital_amount.status as cstatus,capital_amount.date as idate  from capital_amount inner join plan on
                capital_amount.plan_id = plan.plan_id inner join user on capital_amount.user_id = user.user_id
                where user.user_id = ? AND capital_amount.status = ? AND date(capital_amount.date) between ? and  ?', [session()->get('id'), $statusQuery, $fromDate, $toDate]);
                return response()->json($data);
            } else {
                $data = Db::select('select *,capital_amount.status as cstatus,capital_amount.date as idate  from capital_amount inner join plan on
                capital_amount.plan_id = plan.plan_id inner join user on capital_amount.user_id = user.user_id where capital_amount.status = ? AND date(capital_amount.date) between ? and  ?', [$statusQuery, $fromDate, $toDate]);
                return response()->json($data);
            }

            return response()->json([]);
        }
    }

    public function searchcapitalamount(Request $request)
    {
        if ($request->ajax() && $request->has('search')) {
            $searchQuery = $request->search;

            if (session()->get('role') == 0) {

                $data = Db::select('select *,capital_amount.status as cstatus,capital_amount.date as idate  from capital_amount inner join plan on
                capital_amount.plan_id = plan.plan_id inner join user on capital_amount.user_id = user.user_id
                where user.user_id = ? AND (user.user_name LIKE ? OR user.user_email LIKE ?)', [session()->get('id'), '%' . $searchQuery . '%', '%' . $searchQuery . '%']);
                return response()->json($data);
            } else {
                $data = Db::select('select *,capital_amount.status as cstatus,capital_amount.date as idate  from capital_amount inner join plan on
                capital_amount.plan_id = plan.plan_id inner join user on capital_amount.user_id = user.user_id where user.user_name LIKE ? OR user.user_email LIKE ?', ['%' . $searchQuery . '%', '%' . $searchQuery . '%']);
                return response()->json($data);
            }

            return response()->json([]);
        }
    }

    public function capitalamount(Request $req)
    {
        if ($req->ajax()) {
            $perPage = 10; // Number of items per page
            $page = $req->input('page', 1); // Get the current page from the request

            // Calculate the offset
            $offset = ($page - 1) * $perPage;

            if (session()->get('role') == 0) {

                $data = Db::select('select *,capital_amount.status as cstatus,capital_amount.date as idate  from capital_amount inner join plan on
                capital_amount.plan_id = plan.plan_id inner join user on capital_amount.user_id = user.user_id
                where user.user_id = ? limit ? offset ?', [session()->get('id'), $perPage, $offset]);

                $totalUsers = DB::table('capital_amount')
                    ->join('plan', 'plan.plan_id', '=', 'capital_amount.plan_id')
                    ->join('user', 'user.user_id', '=', 'capital_amount.user_id')
                    ->where('user.user_id', '=', session()->get('id'))
                    ->count();
            } else {
                $data = Db::select('select *,capital_amount.status as cstatus,capital_amount.date as idate  from capital_amount inner join plan on
                capital_amount.plan_id = plan.plan_id inner join user on capital_amount.user_id = user.user_id  limit ? offset ?', [$perPage, $offset]);

                $totalUsers = DB::table('capital_amount')
                    ->join('plan', 'plan.plan_id', '=', 'capital_amount.plan_id')
                    ->join('user', 'user.user_id', '=', 'capital_amount.user_id')
                    // ->where('user.user_id', '=', session()->get('id'))
                    ->count();
            }

            $data = [
                'data' => $data,
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalUsers' => $totalUsers,
            ];

            return response()->json($data);
        } else {
            return view('dashboard.capitalamount');
        }
    }

    public function searchinvestments(Request $request)
    {
        if ($request->ajax() && $request->has('search')) {
            $searchQuery = $request->search;

            if (session()->get('role') == 0) {
                $data = Db::select('select *,invest.status as istatus,invest.date as idate  from invest inner join plan on
                invest.plan_id = plan.plan_id inner join
                user on invest.user_id = user.user_id
                where user.user_id = ? AND (user.user_email LIKE ?)', [session()->get('id'), '%' . $searchQuery . '%']);
                return response()->json($data);
            } else {
                $data = Db::select('select *,invest.status as istatus,invest.date as idate
                 from invest inner join plan on invest.plan_id = plan.plan_id inner join
                 user on invest.user_id = user.user_id where user.user_email LIKE ?', ['%' . $searchQuery . '%']);
                return response()->json($data);
            }

            return response()->json([]);
        }
    }

    public function investments(Request $req)
    {

        $withdrawoff = Db::select('select * from withdrawoff');
        session()->put('withdrawoff', $withdrawoff[0]->status);

        if ($req->ajax()) {
            $perPage = 10; // Number of items per page
            $page = $req->input('page', 1); // Get the current page from the request

            // Calculate the offset
            $offset = ($page - 1) * $perPage;


            if (session()->get('role') == 0) {

                $data = Db::select('select *,invest.status as istatus,invest.date as idate  from invest inner join plan on
                invest.plan_id = plan.plan_id inner join
                user on invest.user_id = user.user_id
                where user.user_id = ? limit ? offset ?', [session()->get('id'), $perPage, $offset]);

                $totalUsers = DB::table('invest')
                    ->join('plan', 'plan.plan_id', '=', 'invest.plan_id')
                    ->join('user', 'user.user_id', '=', 'invest.user_id')
                    ->where('user.user_id', '=', session()->get('id'))
                    ->count();
            } else {
                $data = Db::select('select *,invest.status as istatus,invest.date as idate
                 from invest inner join plan on invest.plan_id = plan.plan_id inner join
                 user on invest.user_id = user.user_id limit ? offset ?', [$perPage, $offset]);

                $totalUsers = DB::table('invest')
                    ->join('plan', 'plan.plan_id', '=', 'invest.plan_id')
                    ->join('user', 'user.user_id', '=', 'invest.user_id')
                    ->count();
            }

            $data = [
                'data' => $data,
                'currentPage' => $page,
                'perPage' => $perPage,
                'totalUsers' => $totalUsers,
            ];
            return response()->json($data);
        } else {

            Db::update('UPDATE invest INNER JOIN plan on plan.plan_id = invest.plan_id
             set invest.status = 2 WHERE not now() BETWEEN date AND end_date');
            return view('dashboard.investments');
        }
    }


    public function whatsappgroup()
    {

        $data = Db::select('select * from whatsappgroup');

        return view('dashboard.whatsappgroup', compact('data'));
    }

    public function editwhatsappgroup($id)
    {

        $data = Db::select('select * from whatsappgroup where id = ?', [$id]);

        if ($data) {

            $data = $data[0];
            return view('dashboard.edit_whatsapp-group', compact('data'));
        }

        return redirect('/dashboard/whatsapp-group');
    }

    public function updatewhatsappgroup(Request $req, $id)
    {

        $req->validate([
            'link' => 'required',
            'status' => 'required',
        ]);

        $data = Db::select('select * from whatsappgroup where id = ?', [$id]);

        if ($data) {

            Db::update('update whatsappgroup set link = ? , status = ? where
            id = ?', [$req->link, $req->status, $id]);

            session()->put('whatsapplink', $req->link);

            session()->flash('status', 'Whats App Group Link Updated');

            return redirect('/dashboard/whatsapp-group');
        }

        return redirect('/dashboard/whatsapp-group');
    }


    function performancechart(Request $req)
    {

        if (session()->get('role') == 0) {

            $search   = session()->get('email');
        } else {

            $search = $req->search;
        }

        if ($search != null) {

            $data = Db::select('select * from user where user_email = ?', [$search]);

            if ($data) {

                $depositcount = Db::select('select depositcount(?) as dc', [$data[0]->user_id]);
                $withdrawlcount = Db::select('select withdrawlcount(?) as wc', [$data[0]->user_id]);
                $usercount = Db::select('select usercount(?) as uc', [$data[0]->user_id]);
                $iusercount = Db::select('select iusercount(?) as ic', [$data[0]->user_id]);
                // echo $depositcount;
                $dc = $depositcount[0]->dc;
                $wc = $withdrawlcount[0]->wc;
                $uc = $usercount[0]->uc;
                $ic = $iusercount[0]->ic;

                return view('dashboard.performancechart', compact('dc', 'wc', 'uc', 'ic', 'search'));
            }
        }
        $dc = 0;
        $wc = 0;
        $uc = 0;
        $ic = 0;
        return view('dashboard.performancechart', compact('dc', 'wc', 'uc', 'ic', 'search'));
    }






    public function addinvestments()
    {

        return view('dashboard.add_investments');
    }
    public function editinvestments()
    {
        return view('dashboard.edit_investments');
    }
}
