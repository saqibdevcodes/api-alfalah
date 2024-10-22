<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender',
        'account_holder',
        'city',
        'branch',
        'staff_interaction',
        'purpose_of_visit',
        'turn_around_time',
        'over_all_satisfactory',
        'Date',
        'existing_customers',
        'widrawing_money',
        'opening_new_acc',
        'deposit',
        'Update_personal_info',
        'closing_acc',
        'transfering_fund',
        'loan_service',
        'Complain_resolution',
        'Foreign_echange',
        'credit_card',
        'Investment_service',
        'financial_advice',
        'customer_support',
        'digital_banking',
        'money_pay_order',
        'safe_deposit',
        'payment_dues',
        'cheque_deposit',
        'issuance_cheque_book',
        'bank_statement',
        'online_transaction',
        'installment_plot',
        'receive_ATM',
        'credit_card_payment',
        'turn_around_time_mins',
        'branch_type',

    ];
}
