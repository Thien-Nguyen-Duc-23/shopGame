<?php

namespace App\Repositories\Admin;

use App\Models\ConfigSystem;
use App\Models\User;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Services\Telegram;

class ConfigSystemRepository
{
    protected $user;
    protected $log_activity;
    protected $serviceTelegram;
    protected $configSystem;

    public function __construct()
    {
        $this->user = new User();
        $this->log_activity = new LogActivity();
        $this->configSystem = new ConfigSystem();
        $this->serviceTelegram = new Telegram();
    }

    public function saveChange($request)
    {
        // dd($request);
        try {
            /** Config System */
            // website company
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_company'
                ],
                [
                    'setting' => $request['website_company']
                ]
            );
            // website title
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_title'
                ],
                [
                    'setting' => $request['website_title']
                ]
            );
            // website name
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_name'
                ],
                [
                    'setting' => $request['website_name']
                ]
            );
            // website email
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_email'
                ],
                [
                    'setting' => $request['website_email']
                ]
            );
            // website address
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_address'
                ],
                [
                    'setting' => $request['website_address']
                ]
            );
            // website domain
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_domain'
                ],
                [
                    'setting' => $request['website_domain']
                ]
            );
            // website domain customer
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_domain_customer'
                ],
                [
                    'setting' => $request['website_domain_customer']
                ]
            );
            // website phone
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_phone'
                ],
                [
                    'setting' => $request['website_phone']
                ]
            );
            // website facebook contact
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'facebook_contact',
                ],
                [
                    'setting' => $request['facebook_contact']
                ]
            );
            // zalo contact
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'zalo_contact',
                ],
                [
                    'setting' => $request['zalo_contact']
                ]
            );
            // facebook channel
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'facebook_channel'
                ],
                [
                    'setting' => $request['facebook_channel']
                ]
            );
            // zalo channel
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'zalo_channel'
                ],
                [
                    'setting' => $request['zalo_channel']
                ]
            );
            //telegram channel
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'telegram_channel'
                ],
                [
                    'setting' => $request['telegram_channel']
                ]
            );
            // website_logo
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_logo'
                ],
                [
                    'setting' => $request['website_logo']
                ]
            );
            // website_logo
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_logo_w',
                ],
                [
                    'setting' => $request['website_logo_w']
                ]
            );
            // website_favicon
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'website_favicon'
                ],
                [
                    'setting' => $request['website_favicon']
                ]
            );
            /** ./Config System */
            /** SMTP Mail */
            // email
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'smtp_email'
                ],
                [
                    'setting' => $request['email']
                ]
            );
            // password
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'smtp_password'
                ],
                [
                    'setting' => $request['password']
                ]
            );
            // mailDrive
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'smtp_drive'
                ],
                [
                    'setting' => $request['mailDrive']
                ]
            );
            // mailHost
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'smtp_host'
                ],
                [
                    'setting' => $request['mailHost']
                ]
            );
            // smtpPort
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'smtp_port'
                ],
                [
                    'setting' => $request['smtpPort']
                ]
            );
            // smtpSSLType
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'smtp_ssl'
                ],
                [
                    'setting' => $request['smtpSSLType']
                ]
            );
            // sender_name
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'sender_name'
                ],
                [
                    'setting' => $request['sender_name']
                ]
            );
            // sender_email
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'sender_email'
                ],
                [
                    'setting' => $request['sender_email']
                ]
            );
            // email_signature
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'email_signature'
                ],
                [
                    'setting' => $request['email_signature']
                ]
            );
            /** ./SMTP Mail */
            /** Payment System */
            // payment amount min
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'payment_amount_min'
                ],
                [
                    'setting' => str_replace([',', '.'], ['', ''], $request['payment_amount_min'])
                ]
            );
            // payment amount max
            $this->configSystem->updateOrCreate(
                [
                    'type' => 'payment_amount_max'
                ],
                [
                    'setting' => str_replace([',', '.'], ['', ''], $request['payment_amount_max'])
                ]
            );
            // thông tin các ngân hàng thanh toán
            if ( !empty( $request['payment_bank_type'] ) ) {
                $this->configSystem->where('type', 'payment_bank')->delete();
                foreach ($request['payment_bank_type'] as $key => $payment_bank_type) {
                    $payment_bank = [
                        'type' => 'payment_bank',
                        'setting' => $payment_bank_type,
                        'value' => $request['payment_account_name'][$key],
                        'content' => $request['payment_account_code'][$key],
                        'note' => !empty($request['payment_account_note' . $key]) ? 1 : 0,
                    ];
                    $this->configSystem->create($payment_bank);
                }
            }
            /** ./Payment System */
            /** Telegram System */
            //telegram_url
            if (!empty($request['telegram_url'])) {
                // payment amount max
                $this->configSystem->updateOrCreate(
                    [
                        'type' => 'telegram_url'
                    ],
                    [
                        'setting' => $request['telegram_url']
                    ]
                );
            }
            //telegram_url
            if (!empty($request['telegram_token'])) {
                // payment amount max
                $this->configSystem->updateOrCreate(
                    [
                        'type' => 'telegram_token'
                    ],
                    [
                        'setting' => $request['telegram_token']
                    ]
                );
            }
            //telegram_url
            if (!empty($request['telegram_chat_id'])) {
                // payment amount max
                $this->configSystem->updateOrCreate(
                    [
                        'type' => 'telegram_chat_id'
                    ],
                    [
                        'setting' => $request['telegram_chat_id']
                    ]
                );
            }
            /** ./Telegram System */

            // ghi log
            $data_log = [
                'user_id' => Auth::id(),
                'action' => 'cập nhật',
                'model' => 'Admin/Event',
                'admin' => ' thiết lập hệ thống',
            ];
            $this->log_activity->create($data_log);

            return true;
        } catch (\Throwable $th) {
            //throw $th;
            Log::info(json_encode($request));
            report($th);
            return false;
        }
    }

    public function systemConfig()
    {
        $website_company = $this->configSystem->where('type', 'website_company')->first();
        $website_title = $this->configSystem->where('type', 'website_title')->first();
        $website_name = $this->configSystem->where('type', 'website_name')->first();
        $website_email = $this->configSystem->where('type', 'website_email')->first();
        $website_address = $this->configSystem->where('type', 'website_address')->first();
        $website_domain = $this->configSystem->where('type', 'website_domain')->first();
        $website_domain_customer = $this->configSystem->where('type', 'website_domain_customer')->first();
        $website_phone = $this->configSystem->where('type', 'website_phone')->first();
        $facebook_contact = $this->configSystem->where('type', 'facebook_contact')->first();
        $zalo_contact = $this->configSystem->where('type', 'zalo_contact')->first();
        $facebook_channel = $this->configSystem->where('type', 'facebook_channel')->first();
        $zalo_channel = $this->configSystem->where('type', 'zalo_channel')->first();
        $telegram_channel = $this->configSystem->where('type', 'telegram_channel')->first();
        $website_logo = $this->configSystem->where('type', 'website_logo')->first();
        $website_logo_w = $this->configSystem->where('type', 'website_logo_w')->first();
        $website_favicon = $this->configSystem->where('type', 'website_favicon')->first();
        $header_script = $this->configSystem->where('type', 'header_script')->first();
        $body_script = $this->configSystem->where('type', 'body_script')->first();
        $footer_script = $this->configSystem->where('type', 'footer_script')->first();
        $active_remind_update_profile = $this->configSystem->where('type', 'active_remind_update_profile')->first();
        $content_remind_update_profile = $this->configSystem->where('type', 'content_remind_update_profile')->first();
        return [
            'website_company' => !empty($website_company->setting) ? $website_company->setting : '',
            'website_title' => !empty($website_title->setting) ? $website_title->setting : '',
            'website_name' => !empty($website_name->setting) ? $website_name->setting : '',
            'website_email' => !empty($website_email->setting) ? $website_email->setting : '',
            'website_address' => !empty($website_address->setting) ? $website_address->setting : '',
            'website_domain' => !empty($website_domain->setting) ? $website_domain->setting : '',
            'website_domain_customer' => !empty($website_domain_customer->setting) ? $website_domain_customer->setting : '',
            'website_phone' => !empty($website_phone->setting) ? $website_phone->setting : '',
            'facebook_contact' => !empty($facebook_contact->setting) ? $facebook_contact->setting : '',
            'zalo_contact' => !empty($zalo_contact->setting) ? $zalo_contact->setting : '',
            'facebook_channel' => !empty($facebook_channel->setting) ? $facebook_channel->setting : '',
            'zalo_channel' => !empty($zalo_channel->setting) ? $zalo_channel->setting : '',
            'telegram_channel' => !empty($telegram_channel->setting) ? $telegram_channel->setting : '',
            'website_logo' => !empty($website_logo->setting) ? $website_logo->setting : '',
            'website_logo_w' => !empty($website_logo_w->setting) ? $website_logo_w->setting : '',
            'website_favicon' => !empty($website_favicon->setting) ? $website_favicon->setting : '',
            'header_script' => !empty($header_script->setting) ? $header_script->setting : '',
            'body_script' => !empty($body_script->setting) ? $body_script->setting : '',
            'footer_script' => !empty($footer_script->setting) ? $footer_script->setting : '',
            'active_remind_update_profile' => !empty($active_remind_update_profile->setting) ? 1 : 0,
            'content_remind_update_profile' => !empty($content_remind_update_profile->setting) ? $content_remind_update_profile->setting : '',
        ];
    }

    public function configSmtpMail()
    {
        $smtp_email = $this->configSystem->where('type', 'smtp_email')->first();
        $smtp_password = $this->configSystem->where('type', 'smtp_password')->first();
        $smtp_drive = $this->configSystem->where('type', 'smtp_drive')->first();
        $smtp_host = $this->configSystem->where('type', 'smtp_host')->first();
        $smtp_port = $this->configSystem->where('type', 'smtp_port')->first();
        $smtp_ssl = $this->configSystem->where('type', 'smtp_ssl')->first();
        $sender_name = $this->configSystem->where('type', 'sender_name')->first();
        $sender_email = $this->configSystem->where('type', 'sender_email')->first();
        $email_signature = $this->configSystem->where('type', 'email_signature')->first();
        return [
            'smtp_email' => !empty($smtp_email->setting) ? $smtp_email->setting : '',
            'smtp_password' => !empty($smtp_password->setting) ? $smtp_password->setting : '',
            'smtp_drive' => !empty($smtp_drive->setting) ? $smtp_drive->setting : '',
            'smtp_host' => !empty($smtp_host->setting) ? $smtp_host->setting : '',
            'smtp_port' => !empty($smtp_port->setting) ? $smtp_port->setting : '',
            'smtp_ssl' => !empty($smtp_ssl->setting) ? $smtp_ssl->setting : '',
            'sender_name' => !empty($sender_name->setting) ? $sender_name->setting : '',
            'sender_email' => !empty($sender_email->setting) ? $sender_email->setting : '',
            'email_signature' => !empty($email_signature->setting) ? $email_signature->setting : '',
        ];
    }

    public function configPayment()
    {
        $payment_amount_min = $this->configSystem->where('type', 'payment_amount_min')->first();
        $payment_amount_max = $this->configSystem->where('type', 'payment_amount_max')->first();
        $payment_bank = $this->configSystem->where('type', 'payment_bank')->get();
        return [
            'payment_amount_min' => !empty($payment_amount_min->setting) ? $payment_amount_min->setting : '',
            'payment_amount_max' => !empty($payment_amount_max->setting) ? $payment_amount_max->setting : '',
            'list_config_payment' => $payment_bank,
        ];
    }

    public function configTelegram()
    {
        $telegram_url = $this->configSystem->where('type', 'telegram_url')->first();
        $telegram_token = $this->configSystem->where('type', 'telegram_token')->first();
        $telegram_chat_id = $this->configSystem->where('type', 'telegram_chat_id')->first();
        return [
            'telegram_url' => !empty($telegram_url->setting) ? $telegram_url->setting : '',
            'telegram_token' => !empty($telegram_token->setting) ? $telegram_token->setting : '',
            'telegram_chat_id' => !empty($telegram_chat_id->setting) ? $telegram_chat_id->setting : '',
        ];
        /*cloud_zone_shop_game_bot*/
    }

    public function sendMailTest($request)
    {
        try {
            if ( !empty($request['smtp_email']) && !empty($request['smtp_password']) && !empty($request['smtp_drive']) && !empty($request['smtp_host']) ) {
                $sender_email = !empty($request['sender_email']) ? $request['sender_email'] : 'support@cloudzone.vn';
                $sender_name  = !empty($request['sender_name']) ? $request['sender_name'] : 'Portal Cloudzone';
                $config = [
                    'driver'     =>     $request['smtp_drive'],
                    'host'       =>     $request['smtp_host'],
                    'port'       =>     !empty($request['smtp_port']) ? $request['smtp_port'] : 25,
                    'username'   =>     $request['smtp_email'],
                    'password'   =>     $request['smtp_password'],
                    'encryption' =>     !empty($request['smtp_ssl']) ? $request['smtp_ssl'] : null,
                    'from'       =>     array('address' => $sender_email, 'name' => $sender_name),
                ];
                // Log::info($config);
                Config::set('mail', $config);

                $this->email_to = $request['email_to'];
                $this->data = [ 'content' =>  'Kiểm tra thiết lập email' ];
                $data_log = [
                    'user_id' => Auth::id(),
                    'action' => 'kiểm tra',
                    'model' => 'Admin/System',
                    'admin' =>  ' gởi mail trong thiết lập email',
                ];
                $this->log_activity->create($data_log);
                Mail::send('admins.cron_mails.admin_send_mail', $this->data, function($message){
                    $message->to($this->email_to)->subject('Kiểm tra thiết lập email');
                });
                return [
                    'error' => 0,
                    'message' => 'Gửi mail thành công'
                ];

            } else {
                return [
                    'error' => 2,
                    'message' => 'Lỗi! Không được để trống các trường cài đặt'
                ];
            }
        } catch (\Throwable $th) {
            //throw $th;
            report($th);
            return [
                'error' => 1,
                'message' => 'Truy vẫn lỗi!'
            ];
        }
    }

    public function sendTelegramTest($request) : array
    {
        try {
            $telegram_url = !empty($request['telegram_url']) ? $request['telegram_url'] : '';
            $telegram_token = !empty($request['telegram_token']) ? $request['telegram_token'] : '';
            $telegram_chat_id = !empty($request['telegram_chat_id']) ? $request['telegram_chat_id'] : '';

            $data_log = [
                'user_id' => Auth::id(),
                'action' => 'kiểm tra',
                'model' => 'Admin/System',
                'admin' =>  ' gởi telegram trong thiết lập telegram',
            ];
            $this->log_activity->create($data_log);

            $check = $this->serviceTelegram->sendTelegramTest($telegram_url, $telegram_token, $telegram_chat_id);
            if (!empty($check)) {
                return [
                    'error' => 0,
                    'message' => 'Gửi tin nhắn Telegram thành công'
                ];
            }

            return [
                'error' => 1,
                'message' => 'Gửi tin nhắn Telegram không thành công'
            ];
        } catch (\Exception $e) {
            report($e);
            return [
                'error' => 1,
                'message' => 'Kết nối Telegram thất bại'
            ];
        }
    }

}
