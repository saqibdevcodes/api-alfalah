<?php

// app/Http/Controllers/RespondentController.php
namespace App\Http\Controllers;

use App\Models\Respondent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RespondentController extends Controller
{
    public function import(Request $request)
    {
        ini_set('memory_limit', '512M');
        set_time_limit(300); // Increase execution time to 5 minutes
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Load the Excel file
        $data = Excel::toArray([], $file)[0];

        // Skip the header row
        $header = array_shift($data);
        $header2 = array_shift($data);

        // Assuming the data is in the second column and needs to be mapped to gender
        foreach ($data as $row) {

            // echo "Row data: " . print_r($row[46], true) . "\n";

            $dateValue = $row[43];
            // Convert the Excel serial date to a Carbon date
            $formattedDate = Carbon::createFromDate(1900, 1, 1)->addDays($dateValue - 2)->format('Y-m-d');
            // echo "Formatted date value: " . $formattedDate . "\n";




            Respondent::create([
                'gender' => $row[1] == 1 ? 'Male' : 'Female', //Q#1
                'account_holder' => isset($row[2]) ? ($row[2] == 1 ? 'Yes' : 'No') : 'No', // Defaulting to 'No' if not set Q#2
                // Q#5
                'existing_customers' => $row[3],
                'widrawing_money' => ($row[5] == 1 || $row[6] == 1 || $row[7] == 1 || $row[8] == 1) ? 'Yes' : 'null',
                'opening_new_acc' => ($row[5] == 2 || $row[6] == 2 || $row[7] == 2 || $row[8] == 2) ? 'Yes' : 'null',
                'deposit' => ($row[5] == 3 || $row[6] == 3 || $row[7] == 3 || $row[8] == 3) ? 'Yes' : 'null',
                'update_personal_info' => ($row[5] == 4 || $row[6] == 4 || $row[7] == 4 || $row[8] == 4) ? 'Yes' : 'null',
                'closing_acc' => ($row[5] == 5 || $row[6] == 5 || $row[7] == 5 || $row[8] == 5) ? 'Yes' : 'null',
                'transferring_fund' => ($row[5] == 6 || $row[6] == 6 || $row[7] == 6 || $row[8] == 6) ? 'Yes' : 'null',
                'loan_service' => ($row[5] == 7 || $row[6] == 7 || $row[7] == 7 || $row[8] == 7) ? 'Yes' : 'null',
                'complain_resolution' => ($row[5] == 8 || $row[6] == 8 || $row[7] == 8 || $row[8] == 8) ? 'Yes' : 'null',
                'foreign_exchange' => ($row[5] == 9 || $row[6] == 9 || $row[7] == 9 || $row[8] == 9) ? 'Yes' : 'null',
                'credit_card' => ($row[5] == 10 || $row[6] == 10 || $row[7] == 10 || $row[8] == 10) ? 'Yes' : 'null',
                'investment_service' => ($row[5] == 11 || $row[6] == 11 || $row[7] == 11 || $row[8] == 11) ? 'Yes' : 'null',
                'financial_advice' => ($row[5] == 12 || $row[6] == 12 || $row[7] == 12 || $row[8] == 12) ? 'Yes' : 'null',
                'customer_support' => ($row[5] == 13 || $row[6] == 13 || $row[7] == 13 || $row[8] == 13) ? 'Yes' : 'null',
                'digital_banking' => ($row[5] == 14 || $row[6] == 14 || $row[7] == 14 || $row[8] == 14) ? 'Yes' : 'null',
                'money_pay_order' => ($row[5] == 15 || $row[6] == 15 || $row[7] == 15 || $row[8] == 15) ? 'Yes' : 'null',
                'safe_deposit' => ($row[5] == 16 || $row[6] == 16 || $row[7] == 16 || $row[8] == 16) ? 'Yes' : 'null',
                'payment_dues' => ($row[5] == 17 || $row[6] == 17 || $row[7] == 17 || $row[8] == 17) ? 'Yes' : 'null',
                'cheque_deposit' => ($row[5] == 18 || $row[6] == 18 || $row[7] == 18 || $row[8] == 18) ? 'Yes' : 'null',
                'issuance_cheque_book' => ($row[5] == 19 || $row[6] == 19 || $row[7] == 19 || $row[8] == 19) ? 'Yes' : 'null',
                'bank_statement' => ($row[5] == 20 || $row[6] == 20 || $row[7] == 20 || $row[8] == 20) ? 'Yes' : 'null',
                'online_transaction' => ($row[5] == 21 || $row[6] == 21 || $row[7] == 21 || $row[8] == 21) ? 'Yes' : 'null',
                'installment_plot' => ($row[5] == 22 || $row[6] == 22 || $row[7] == 22 || $row[8] == 22) ? 'Yes' : 'null',
                'receive_atm' => ($row[5] == 23 || $row[6] == 23 || $row[7] == 23 || $row[8] == 23) ? 'Yes' : 'null',
                'credit_card_payment' => ($row[5] == 24 || $row[6] == 24 || $row[7] == 24 || $row[8] == 24) ? 'Yes' : 'null',
                'biometric_purpose' => ($row[5] == 25 || $row[6] == 25 || $row[7] == 25 || $row[8] == 25) ? 'Yes' : 'null',
                'tax_payment' => ($row[5] == 26 || $row[6] == 26 || $row[7] == 26 || $row[8] == 26) ? 'Yes' : 'null',
                'info_new_account' => ($row[5] == 27 || $row[6] == 27 || $row[7] == 27 || $row[8] == 27) ? 'Yes' : 'null',
                'reactivation_dormant_acc' => ($row[5] == 29 || $row[6] == 29 || $row[7] == 29 || $row[8] == 29) ? 'Yes' : 'null',
                'policy_cancellation' => ($row[5] == 30 || $row[6] == 30 || $row[7] == 30 || $row[8] == 30) ? 'Yes' : 'null',
                'receive_maintenance_certificate' => ($row[5] == 31 || $row[6] == 31 || $row[7] == 31 || $row[8] == 31) ? 'Yes' : 'null',
                'activation_atm_card' => ($row[5] == 32 || $row[6] == 32 || $row[7] == 32 || $row[8] == 32) ? 'Yes' : 'null',
                'receiving_pay_order' => ($row[5] == 33 || $row[6] == 33 || $row[7] == 33 || $row[8] == 33) ? 'Yes' : 'null',
                'opening_new_acc_friend/relative' => ($row[5] == 34 || $row[6] == 34 || $row[7] == 34 || $row[8] == 34) ? 'Yes' : 'null',
                'deactivation_atm_card' => ($row[5] == 35 || $row[6] == 35 || $row[7] == 35 || $row[8] == 35) ? 'Yes' : 'null',
                'cancellation_insurance_policy' => ($row[5] == 36 || $row[6] == 36 || $row[7] == 36 || $row[8] == 36) ? 'Yes' : 'null',
                'car_financing_info' => ($row[5] == 37 || $row[6] == 37 || $row[7] == 37 || $row[8] == 37) ? 'Yes' : 'null',
                'doc_submission' => ($row[5] == 38 || $row[6] == 38 || $row[7] == 38 || $row[8] == 38) ? 'Yes' : 'null',
                'pension_card_isuance' => ($row[5] == 39 || $row[6] == 39 || $row[7] == 39 || $row[8] == 39) ? 'Yes' : 'null',
                'to_unblock_account' => ($row[5] == 40 || $row[6] == 40 || $row[7] == 40 || $row[8] == 40) ? 'Yes' : 'null',
                'issuance_ATM_card' => ($row[5] == 41 || $row[6] == 41 || $row[7] == 41 || $row[8] == 41) ? 'Yes' : 'null',
                'credit_card_machine_upgradation' => ($row[5] == 42 || $row[6] == 42 || $row[7] == 42 || $row[8] == 42) ? 'Yes' : 'null',
                'balance_inquiry' => ($row[5] == 43 || $row[6] == 43 || $row[7] == 43 || $row[8] == 43) ? 'Yes' : 'null',
                'eobi_payment' => ($row[5] == 44 || $row[6] == 44 || $row[7] == 44 || $row[8] == 44) ? 'Yes' : 'null',
                'alfalah_app_issue' => ($row[5] == 45 || $row[6] == 45 || $row[7] == 45 || $row[8] == 45) ? 'Yes' : 'null',
                'check_transfer' => ($row[5] == 46 || $row[6] == 46 || $row[7] == 46 || $row[8] == 46) ? 'Yes' : 'null',
                // End
                // End Of file
                'Date' => $formattedDate,
                'city' => $row[44] == 1 ? 'Karachi' : ($row[44] == 2 ? 'Lahore' : 'Islamabad'),
                // 'branch' => $row[46] == 30 ? 'Shahrah-e-Faisal, Karachi' : ($row[46] == 425 ? 'Z Block DHA Phase III, Lahore' : 'I-10 Markaz, Islamabad'), //fetching with branch code
                'branch' => $row[45],
                //Q#6
                'purpose_of_visit' => $row[23] == 1 ? 'Highly dissatisfied' : ($row[23] == 2 ? 'Somewhat Dissatisfied' : ($row[23] == 3 ? 'Neither Satisfied nor Dissatisfied' : ($row[23] == 4 ? 'Somewhat Satisfied' : 'Highly satisfied'))),
                // Q#8
                'staff_interaction' => $row[29] == 1 ? 'Highly dissatisfied' : ($row[29] == 2 ? 'Somewhat Dissatisfied' : ($row[29] == 3 ? 'Neither Satisfied nor Dissatisfied' : ($row[29] == 4 ? 'Somewhat Satisfied' : 'Highly satisfied'))),
                // Q#10
                'turn_around_time_mins' => $row[35],

                // Q#11
                'turn_around_time' => $row[36] == 1 ? 'Highly dissatisfied' : ($row[36] == 2 ? 'Somewhat Dissatisfied' : ($row[36] == 3 ? 'Neither Satisfied nor Dissatisfied' : ($row[36] == 4 ? 'Somewhat Satisfied' : 'Highly satisfied'))),
                //Q#12
                'over_all_satisfactory' => $row[37] == 1 ? 'Highly dissatisfied' : ($row[37] == 2 ? 'Somewhat Dissatisfied' : ($row[37] == 3 ? 'Neither Satisfied nor Dissatisfied' : ($row[37] == 4 ? 'Somewhat Satisfied' : 'Highly satisfied'))),
                'branch_type' => $row[50] == 1 ? 'Conventional' : ($row[50] == 2 ? 'Islamic' : 'Corporate'),

            ]);
        }
        return view('success_upload');
    }


    public function get_gender()
    {
        $respondents = Respondent::all();
        return response()->json($respondents);
    }

    public function get_data_by_gender($gender)
    {
        $respondents = Respondent::where('gender', $gender)->get();
        return response()->json($respondents);
    }

    public function get_data_by_account_holder($account_holder)
    {
        $respondents = Respondent::where('account_holder', $account_holder)->get();
        return response()->json($respondents);
    }
    public function get_data_by_city($city)
    {
        $respondents = Respondent::where('city', $city)->get();
        return response()->json($respondents);
    }
    public function clear_db()
    {
        DB::table('respondents')->truncate(); // Clears the table and resets IDs
        return response()->json(['message' => 'Database cleared and IDs reset.']);
    }
    public function purpose_of_visit($purpose_of_visit)
    {
        $respondents = Respondent::where('purpose_of_visit', $purpose_of_visit)->get();
        return response()->json($respondents);
    }
}
