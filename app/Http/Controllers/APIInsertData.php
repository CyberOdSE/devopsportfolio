<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;
use function Symfony\Component\Translation\t;



class APIInsertData extends Controller
{
    // should be main function
    public function storeCustomer()
    {
        $this->storeCustomers();

        return back();
    }
    public function getWeekNumber($dateString)
    {
        // Convert the string date to a DateTime object
        $date = DateTime::createFromFormat('Y-m-d', $dateString);

        // Get the week number using the 'W' format specifier
        $weekNumber = $date->format('W');

        return $weekNumber;
    }
    public function quickCheck($param, $param2 = null)
    {
        $api = new ApiController();
        $apiResponse = json_decode($api->callAPI($param), true);


        if ($param2 != null) {
            $apiResponse = $apiResponse[$param2];
        }

        dd($apiResponse);
    }

    public function getFirstDayOfWeek($week)
    {
        $year = date('Y');


        // Create a new DateTime object
        $date = new DateTime();
        $date->setISODate($year, $week, 1); // Set the ISO date using the year, week number, and day (1 for Monday)


        return $date->format('Y-m-d'); // Format the date as desired (e.g., 'Y-m-d' for 'YYYY-MM-DD')
    }


    public function storeCustomers()
    {
        DB::table('customers')->truncate();
        $currentDate = date('Y-m-d');
        $currentWeek = $this->getWeekNumber($currentDate);

        $api = new ApiController();



        $apiResponseDebtors = json_decode($api->callAPI("debtors"), true);

        $apiResponseInvoices = json_decode($api->callAPI("invoices", null, str_replace('-', '', $this->getFirstDayOfWeek((int)$currentWeek - 8))), true);




        for ($i = 0; $i < count($apiResponseDebtors); ++$i) {
            $weeks = array();
            $weeks['week8'] = 0;
            $weeks['week7'] = 0;
            $weeks['week6'] = 0;
            $weeks['week5'] = 0;
            $weeks['week4'] = 0;
            $weeks['week3'] = 0;
            $weeks['week2'] = 0;
            $weeks['week1'] = 0;
            $weeks['weekcr'] = 0;

            foreach ($apiResponseInvoices as $invoice) {

                if (substr($invoice['debtorId'], 8) == $apiResponseDebtors[$i]['id']) {
                    $invoiceDate = substr($invoice['date'], 0, 10);;
                    $invoiceWeek = $this->getWeekNumber($invoiceDate);
                    if ($invoiceWeek == $currentWeek) {
                        $weeks['weekcr']++;
                    } else if ($invoiceWeek == $currentWeek - 1) {
                        $weeks['week1']++;
                    } else if ($invoiceWeek == $currentWeek - 2) {
                        $weeks['week2']++;
                    } else if ($invoiceWeek == $currentWeek - 3) {
                        $weeks['week3']++;
                    } else if ($invoiceWeek == $currentWeek - 4) {
                        $weeks['week4']++;
                    } else if ($invoiceWeek == $currentWeek - 5) {
                        $weeks['week5']++;
                    } else if ($invoiceWeek == $currentWeek - 6) {
                        $weeks['week6']++;
                    } else if ($invoiceWeek == $currentWeek - 7) {
                        $weeks['week7']++;
                    } else if ($invoiceWeek == $currentWeek - 8) {
                        $weeks['week8']++;
                    }
                }
            }
            if (array_sum($weeks) != 0) {
                $name = "Missing Name!";
                if (!is_null($apiResponseDebtors[$i]['name'])) {
                    $name = $apiResponseDebtors[$i]['name'];
                }

                $address1 = "Missing Address";
                $address2 = "";

                if ($apiResponseDebtors[$i]['addresses'] != null) {
                    if ($apiResponseDebtors[$i]['addresses'][0]['line1'] != null) {
                        $address1 = $apiResponseDebtors[$i]['addresses'][0]['line1'];
                        try {
                            if ($apiResponseDebtors[$i]['addresses'][1]['line1'] != null) {
                                $address2 = $apiResponseDebtors[$i]['2dresses'][1]['line1'];
                            };
                        } catch (\Exception $e) {
                            //nuh uh
                        }
                    }
                }
                $TID = 0;

                switch (substr($apiResponseDebtors[$i]['code'], 0, 2)) {
                    case 'T1':
                        $TID = 1;
                        break;
                    case 'T3':
                        $TID = 3;
                        break;
                    case 'T4':
                        $TID = 4;
                        break;
                    case 'T5':
                        $TID = 5;
                        break;
                    default:
                        $TID = 0;
                }
                // dd($weeks);
                Customer::create($this->validateCustomer($name, $address1, $address2, $TID, $weeks['week4'], $weeks['week3'], $weeks['week2'], $weeks['week1'], $weeks['weekcr']));
            }
        }
    }


    public function validateCustomer($name, $address1, $address2, $truck_id, $week4, $week3, $week2, $week1, $weekcr)
    {
        return [
            'name' => $name,
            'address1' =>  $address1,
            'address2' =>  $address2,
            'truck_id' =>  $truck_id,
            'week4' => $week4,
            'week3' => $week3,
            'week2' => $week2,
            'week1' => $week1,
            'weekcr' => $weekcr,
        ];
    }
}
