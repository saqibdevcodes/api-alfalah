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
            $table->string('update_personal_info')->nullable();
            $table->string('closing_acc')->nullable();
            $table->string('transferring_fund')->nullable();
            $table->string('loan_service')->nullable();
            $table->string('complain_resolution')->nullable();
            $table->string('foreign_exchange')->nullable();
            $table->string('credit_card')->nullable();
            $table->string('investment_service')->nullable();
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
            $table->string('turn_around_time_mins')->nullable(); // Made nullable if it can be null
            $table->string('branch_type')->nullable();
            // Add missing fields here
            $table->string('biometric_purpose')->nullable();
            $table->string('tax_payment')->nullable();
            $table->string('info_new_account')->nullable();
            $table->string('reactivation_dormant_acc')->nullable();
            $table->string('policy_cancellation')->nullable();
            $table->string('receive_maintenance_certificate')->nullable();
            $table->string('activation_atm_card')->nullable();
            $table->string('receiving_pay_order')->nullable();
            $table->string('opening_new_acc_friend/relative')->nullable();
            $table->string('deactivation_atm_card')->nullable();
            $table->string('cancellation_insurance_policy')->nullable();
            $table->string('car_financing_info')->nullable();
            $table->string('doc_submission')->nullable();
            $table->string('pension_card_isuance')->nullable();
            $table->string('to_unblock_account')->nullable();
            $table->string('issuance_ATM_card')->nullable();
            $table->string('credit_card_machine_upgradation')->nullable();
            $table->string('balance_inquiry')->nullable();
            $table->string('eobi_payment')->nullable();
            $table->string('alfalah_app_issue')->nullable();
            $table->string('check_transfer')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('respondents');
    }
}
