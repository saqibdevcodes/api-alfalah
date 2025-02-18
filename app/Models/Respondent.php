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
        'update_personal_info',
        'closing_acc',
        'transferring_fund',
        'loan_service',
        'complain_resolution',
        'foreign_exchange',
        'credit_card',
        'investment_service',
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
        'receive_atm',
        'credit_card_payment',
        'turn_around_time_mins',
        'branch_type',
        'biometric_purpose',
        'tax_payment',
        'info_new_account',
        'reactivation_dormant_acc',
        'policy_cancellation',
        'receive_maintenance_certificate',
        'activation_atm_card',
        'receiving_pay_order',
        'opening_new_acc_friend/relative',
        'deactivation_atm_card',
        'cancellation_insurance_policy',
        'car_financing_info',
        'doc_submission',
        'pension_card_isuance',
        'to_unblock_account',
        'issuance_ATM_card',
        'credit_card_machine_upgradation',
        'balance_inquiry',
        'eobi_payment',
        'alfalah_app_issue',
        'check_transfer',
        'cdm_machine_complain',
        'trade_document_submission',
        'insurance_policy_info',
        'prize_bond_encashment',
    ];
}
