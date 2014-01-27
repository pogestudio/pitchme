<?php

class PaymentsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('payments')->delete();

        $payment1 = new Payment;
        $payment1->pitch_id = 1;
        $payment1->transaction_id = '1231231321';
        $payment1->paypal_profile_id = '123123';
        $payment1->round = 34;
        $payment1->payment_success = true;
        $payment1->save();


        $payment2 = new Payment;
        $payment2->pitch_id = 2;
        $payment2->transaction_id = '1231231321';
        $payment2->paypal_profile_id = '123123';
        $payment2->round = 34;
        $payment2->payment_success = true;
        $payment2->save();

        $payment2 = new Payment;
        $payment2->pitch_id = 3;
        $payment2->transaction_id = '1231231321';
        $payment2->paypal_profile_id = '123123';
        $payment2->round = 34;
        $payment2->payment_success = true;
        $payment2->save();

        $payment2 = new Payment;
        $payment2->pitch_id = 4;
        $payment2->transaction_id = '1231231321';
        $payment2->paypal_profile_id = '123123';
        $payment2->round = 34;
        $payment2->payment_success = true;
        $payment2->save();

        $payment2 = new Payment;
        $payment2->pitch_id = 5;
        $payment2->transaction_id = '1231231321';
        $payment2->paypal_profile_id = '123123';
        $payment2->round = 34;
        $payment2->payment_success = true;
        $payment2->save();

        $payment2 = new Payment;
        $payment2->pitch_id = 6;
        $payment2->transaction_id = '1231231321';
        $payment2->paypal_profile_id = '123123';
        $payment2->round = 34;
        $payment2->payment_success = true;
        $payment2->save();

        $payment2 = new Payment;
        $payment2->pitch_id = 7;
        $payment2->transaction_id = '1231231321';
        $payment2->paypal_profile_id = '123123';
        $payment2->round = 34;
        $payment2->payment_success = true;
        $payment2->save();

        $payment2 = new Payment;
        $payment2->pitch_id = 8;
        $payment2->transaction_id = '1231231321';
        $payment2->paypal_profile_id = '123123';
        $payment2->round = 34;
        $payment2->payment_success = false;
        $payment2->save();

        $payment2 = new Payment;
        $payment2->pitch_id = 9;
        $payment2->transaction_id = '1231231321';
        $payment2->paypal_profile_id = '123123';
        $payment2->round = 34;
        $payment2->payment_success = false;
        $payment2->save();

        $payment2 = new Payment;
        $payment2->pitch_id = 12;
        $payment2->transaction_id = '1231231321';
        $payment2->paypal_profile_id = '123123';
        $payment2->round = 35;
        $payment2->payment_success = true;
        $payment2->save();

        $payment2 = new Payment;
        $payment2->pitch_id = 13;
        $payment2->transaction_id = '1231231321';
        $payment2->paypal_profile_id = '123123';
        $payment2->round = 35;
        $payment2->payment_success = true;
        $payment2->save();

    }

}