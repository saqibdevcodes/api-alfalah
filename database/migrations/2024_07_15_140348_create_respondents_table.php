<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondentsTable extends Migration
{
    public function up()
    {
        Schema::create('respondents', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->string('account_holder');
            $table->string('city');
            $table->string('branch');
            $table->string('staff_interaction');
            $table->string('purpose_of_visit');
            $table->string('turn_around_time');
            $table->string('over_all_satisfactory');
            $table->string('existing_customers')->nullable();
            $table->string('widrawing_money')->nullable();
            $table->string('opening_new_acc')->nullable();
            $table->string('deposit')->nullable();
            $table->string('Update_personal_info')->nullable();
            $table->string('closing_acc')->nullable();
            $table->string('transfering_fund')->nullable();
            $table->string('loan_service')->nullable();
            $table->string('Complain_resolution')->nullable();
            $table->string('Foreign_echange')->nullable();
            $table->string('credit_card')->nullable();
            $table->string('Investment_service')->nullable();
            $table->string('financial_advice')->nullable();
            $table->string('customer_support')->nullable();
            $table->string('digital_banking')->nullable();
            $table->string('money_pay_order')->nullable();
            $table->string('safe_deposit')->nullable();
            $table->string('payment_dues')->nullable();
            $table->string('cheque_deposit')->nullable();
            $table->string('issuance_cheque_book')->nullable();
            $table->string('bank_statement')->nullable();
            $table->string('online_transaction')->nullable();
            $table->string('installment_plot')->nullable();
            $table->string('receive_ATM')->nullable();
            $table->string('credit_card_payment')->nullable();
            $table->date('Date');
            $table->string('turn_around_time_mins');
            $table->string('branch_type')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('respondents');
    }
}
