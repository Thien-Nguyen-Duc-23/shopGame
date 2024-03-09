<?php
namespace App\Repositories\Command;

use App\Models\CardExchanger;
use App\Models\CardExchangerRate;
use App\Models\CardProvider;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

Class CardProviderRepository
{
    protected $cardExchanger;
    protected $cardProvider;
    protected $cardExchangerRate;
    protected $logActivity;

    public function __construct()
    {
        $this->cardExchanger = new CardExchanger();
        $this->cardProvider = new CardProvider();
        $this->cardExchangerRate = new CardExchangerRate();
        $this->logActivity = new LogActivity();
    }
    
    public function getRateFromProvider()
    {
        try {
            Log::info('Start get rate from provider');
            // get all data
            $cardExchangers = $this->cardExchanger->all();

            // process import data
            foreach ($cardExchangers as $cardExchanger) {
                // check have data
                if (!$cardExchanger->get_rate_url && !$cardExchanger->partner_id) {
                    continue;
                }

                // create url to get data
                $rateUrl = $cardExchanger->get_rate_url . '?partner_id=' . $cardExchanger->partner_id;

                // check invalid url
                if (filter_var($rateUrl, FILTER_VALIDATE_URL) === FALSE) {
                    continue;
                }

                // get data form url
                $client = new Client();
                $response = $client->get($rateUrl);

                if ($response->getStatusCode() != 200) {
                    continue;
                }

                // get data
                $resultProvider = $response->getBody()->getContents();
                $resultProvider = json_decode($resultProvider, true);

                // check have data in responses
                if (!empty($resultProvider)) {
                    foreach ($resultProvider as $result) {
                        $cardProvider = $this->cardProvider->where('name', $result['telco'])->first();
                        if (!$cardProvider) {
                            $cardProvider = $this->cardProvider->create([
                                'name' => $result['telco'],
                                'rate' => null
                            ]);
                        }

                        // crate or update CardExchangerRate
                        $this->cardExchangerRate->updateOrCreate([
                            'card_exchanger_id' => $cardExchanger->id,
                            'card_provider' => $cardProvider->id,
                            'price' => $result['value']
                        ], [
                            'card_exchanger_id' => $cardExchanger->id,
                            'card_provider' => $cardProvider->id,
                            'rate' => $result['fees'],
                            'price' => $result['value']
                        ]);
                    }
                }
            }

            Log::info('End get rate from provider');

            return;
        } catch (\Exception $ex) {
            report($ex);
            Log::info('Have error when get rate from provider');

            return;
        }
    }
}
